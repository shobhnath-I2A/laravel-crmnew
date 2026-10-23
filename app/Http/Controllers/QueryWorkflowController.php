<?php
namespace App\Http\Controllers;

use App\Models\{AppSetting, Query, QueryInvoice, QueryPayment, QueryPaymentSchedule, QuerySupplierBooking, QueryVoucher, QueryGuestDocument, PackageDayItem, QueryLog, Supplier, Itinerary};
use App\Services\{QueryAccess, QueryHistory};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Crypt, DB, Http, Log, Storage};
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class QueryWorkflowController extends Controller
{
    private function money($value): int
    {
        // Input validation restricts precision/range; no binary floating-point arithmetic.
        [$whole, $fraction] = array_pad(explode('.', (string) $value, 2), 2, '');
        return ((int) $whole * 100) + (int) str_pad($fraction, 2, '0');
    }
    private function moneyRules(): array { return ['required', 'regex:/^\d{1,9}(\.\d{1,2})?$/']; }
    private function backTo($id, string $tab) { return redirect()->route('queries.show', ['id' => $id, 'tab' => $tab])->with('success', 'Saved successfully.'); }
    private function gatewayCredentials($user): array
    {
        $countryCode = $user->country_code ?? $user->user_country ?? 91;
        return AppSetting::where('country_code', $countryCode)
            ->where('group_name', 'payment_gateway')
            ->pluck('value', 'key_name')
            ->all();
    }

    private function moneyMinor($value): int
    {
        return $this->money($value);
    }

    private function scheduleCapacity(QueryInvoice $invoice, ?int $exceptId = null): int
    {
        $paid = (int) $invoice->payments()->whereNull('voided_at')->sum('amount_minor');
        $scheduled = (int) $invoice->schedules()
            ->where('status', 'pending')
            ->when($exceptId, fn ($query) => $query->whereKeyNot($exceptId))
            ->sum('amount_minor');

        return max((int) $invoice->amount_minor - $paid - $scheduled, 0);
    }

    public function createPaymentSchedule(Request $request, $query_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Query'), 403);
        $data = $request->validate([
            'amount' => $this->moneyRules(),
            'convenience_fee' => ['required', 'regex:/^\d{1,7}(\.\d{1,2})?$/'],
            'due_on' => 'required|date|after_or_equal:today',
        ]);

        DB::transaction(function () use ($query, $data) {
            Query::whereKey($query->id)->lockForUpdate()->firstOrFail();
            $invoice = $query->invoice()->lockForUpdate()->firstOrFail();
            $amount = $this->moneyMinor($data['amount']);
            $fee = $this->moneyMinor($data['convenience_fee']);
            if ($amount <= 0 || $amount > $this->scheduleCapacity($invoice)) {
                throw ValidationException::withMessages(['amount' => 'Installment amount must fit within the invoice balance not already scheduled.']);
            }

            QueryPaymentSchedule::create([
                'query_id' => $query->id,
                'query_invoice_id' => $invoice->id,
                'amount_minor' => $amount,
                'convenience_fee_minor' => $fee,
                'due_on' => $data['due_on'],
                'created_by' => auth()->id(),
            ]);
        });

        return $this->backTo($query->id, 'billing');
    }

    public function updatePaymentSchedule(Request $request, $query_id, $schedule_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Query'), 403);
        $data = $request->validate([
            'amount' => $this->moneyRules(),
            'convenience_fee' => ['required', 'regex:/^\d{1,7}(\.\d{1,2})?$/'],
            'due_on' => 'required|date',
        ]);

        DB::transaction(function () use ($query, $schedule_id, $data) {
            Query::whereKey($query->id)->lockForUpdate()->firstOrFail();
            $invoice = $query->invoice()->lockForUpdate()->firstOrFail();
            $schedule = $invoice->schedules()->lockForUpdate()->findOrFail($schedule_id);
            abort_unless($schedule->status === 'pending' && !$schedule->razorpay_order_id, 409, 'A scheduled payment cannot be changed after its payment link has been issued.');
            $amount = $this->moneyMinor($data['amount']);
            if ($amount <= 0 || $amount > $this->scheduleCapacity($invoice, $schedule->id)) {
                throw ValidationException::withMessages(['amount' => 'Installment amount must fit within the invoice balance not already scheduled.']);
            }

            $schedule->update([
                'amount_minor' => $amount,
                'convenience_fee_minor' => $this->moneyMinor($data['convenience_fee']),
                'due_on' => $data['due_on'],
                'razorpay_order_id' => null,
                'public_token_hash' => null,
                'public_token_encrypted' => null,
            ]);
        });

        return $this->backTo($query->id, 'billing');
    }

    public function deletePaymentSchedule($query_id, $schedule_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Query'), 403);
        $schedule = $query->invoice()->firstOrFail()->schedules()->findOrFail($schedule_id);
        abort_unless($schedule->status === 'pending' && !$schedule->razorpay_order_id, 409, 'A scheduled payment cannot be deleted after its payment link has been issued.');
        $schedule->delete();

        return $this->backTo($query->id, 'billing');
    }

    public function sendPaymentPlan($query_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Query'), 403);
        $invoice = $query->invoice()->with('schedules')->firstOrFail();
        if (!$query->email) {
            throw ValidationException::withMessages(['email' => 'This query has no customer email address.']);
        }

        $sent = \App\Services\MailService::sendMail(
            $query->email,
            'Payment plan for invoice INV-'.$invoice->id,
            view('billing.payment-plan-email', compact('query', 'invoice'))->render()
        );
        if (!$sent) {
            return redirect()->route('queries.show', ['id' => $query->id, 'tab' => 'billing'])
                ->with('error', 'Payment plan email could not be sent. Check the SMTP settings and try again.');
        }

        return $this->backTo($query->id, 'billing')->with('success', 'Payment plan emailed to '.$query->email.'.');
    }

    public function sendPaymentDetails($query_id, $schedule_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Query'), 403);
        $invoice = $query->invoice()->firstOrFail();
        $schedule = $invoice->schedules()->findOrFail($schedule_id);
        if (!$query->email) {
            throw ValidationException::withMessages(['email' => 'This query has no customer email address.']);
        }

        $countryCode = auth()->user()->country_code ?? auth()->user()->user_country ?? 91;
        $bankInformation = AppSetting::where('country_code', $countryCode)
            ->where('group_name', 'default')
            ->where('key_name', 'bank_information')
            ->value('value');
        $sent = \App\Services\MailService::sendMail(
            $query->email,
            'Payment details for invoice INV-'.$invoice->id,
            view('billing.payment-details-email', compact('query', 'invoice', 'schedule', 'bankInformation'))->render()
        );
        if (!$sent) {
            return redirect()->route('queries.show', ['id' => $query->id, 'tab' => 'billing'])
                ->with('error', 'Payment details email could not be sent. Check the SMTP settings and try again.');
        }

        return $this->backTo($query->id, 'billing')->with('success', 'Payment details emailed to '.$query->email.'.');
    }

    public function sendPaymentLink($query_id, $schedule_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Query'), 403);
        $invoice = $query->invoice()->firstOrFail();
        $schedule = $invoice->schedules()->findOrFail($schedule_id);
        abort_unless($schedule->status === 'pending', 409);
        if (!$query->email) {
            throw ValidationException::withMessages(['email' => 'This query has no customer email address.']);
        }

        $credentials = $this->gatewayCredentials($schedule->creator);
        if (empty($credentials['api_key']) || empty($credentials['api_secret'])) {
            throw ValidationException::withMessages(['payment' => 'Configure Razorpay API credentials before sending a payment link.']);
        }

        $token = DB::transaction(function () use ($schedule, $invoice, $query, $credentials) {
            $lockedSchedule = QueryPaymentSchedule::whereKey($schedule->id)->lockForUpdate()->firstOrFail();
            abort_unless($lockedSchedule->status === 'pending', 409);
            if ($lockedSchedule->razorpay_order_id && $lockedSchedule->public_token_encrypted) {
                return Crypt::decryptString($lockedSchedule->public_token_encrypted);
            }

            $orderResponse = Http::withBasicAuth($credentials['api_key'], $credentials['api_secret'])
                ->timeout(15)
                ->post('https://api.razorpay.com/v1/orders', [
                    'amount' => $lockedSchedule->amount_minor + $lockedSchedule->convenience_fee_minor,
                    'currency' => $invoice->currency,
                    'receipt' => 'schedule-'.$lockedSchedule->id,
                    'notes' => ['query_id' => (string) $query->id, 'schedule_id' => (string) $lockedSchedule->id],
                ]);
            if (!$orderResponse->successful() || !$orderResponse->json('id')) {
                Log::error('Razorpay order creation failed', ['status' => $orderResponse->status(), 'query_id' => $query->id, 'schedule_id' => $lockedSchedule->id]);
                throw ValidationException::withMessages(['payment' => 'Razorpay could not create a payment order. Check gateway settings and try again.']);
            }

            $token = Str::random(64);
            $lockedSchedule->update([
                'razorpay_order_id' => $orderResponse->json('id'),
                'public_token_hash' => hash('sha256', $token),
                'public_token_encrypted' => Crypt::encryptString($token),
            ]);

            return $token;
        });
        $paymentUrl = route('query-payment.show', ['token' => $token]);
        $sent = \App\Services\MailService::sendMail(
            $query->email,
            'Payment link for invoice INV-'.$invoice->id,
            view('billing.payment-link-email', compact('query', 'invoice', 'schedule', 'paymentUrl'))->render()
        );
        if (!$sent) {
            return redirect()->route('queries.show', ['id' => $query->id, 'tab' => 'billing'])
                ->with('error', 'The payment link was created, but the email could not be sent. Check SMTP settings and retry.')
                ->with('payment_link', $paymentUrl);
        }

        return $this->backTo($query->id, 'billing')->with('success', 'Payment link emailed to '.$query->email.'.');
    }

    public function publicPayment($token)
    {
        $schedule = QueryPaymentSchedule::with(['invoice', 'creator'])
            ->where('public_token_hash', hash('sha256', $token))
            ->firstOrFail();
        $credentials = $this->gatewayCredentials($schedule->creator);
        if ($schedule->status === 'pending') {
            abort_unless(!empty($credentials['api_key']), 503, 'Payment gateway is not available.');
        }

        return view('billing.public-payment', compact('schedule', 'token', 'credentials'));
    }

    public function verifyPublicPayment(Request $request, $token)
    {
        $data = $request->validate([
            'razorpay_payment_id' => 'required|string|max:100',
            'razorpay_order_id' => 'required|string|max:100',
            'razorpay_signature' => 'required|string|size:64',
        ]);
        $schedule = QueryPaymentSchedule::with(['invoice', 'creator'])
            ->where('public_token_hash', hash('sha256', $token))
            ->firstOrFail();
        if ($schedule->status === 'paid' && $schedule->payment?->reference === $data['razorpay_payment_id']) {
            return redirect()->route('query-payment.show', ['token' => $token])->with('success', 'Payment received successfully.');
        }
        abort_unless($schedule->status === 'pending', 409);
        abort_unless(hash_equals((string) $schedule->razorpay_order_id, $data['razorpay_order_id']), 422);

        $credentials = $this->gatewayCredentials($schedule->creator);
        abort_unless(!empty($credentials['api_key']) && !empty($credentials['api_secret']), 503);
        $expectedSignature = hash_hmac(
            'sha256',
            $data['razorpay_order_id'].'|'.$data['razorpay_payment_id'],
            $credentials['api_secret']
        );
        abort_unless(hash_equals($expectedSignature, $data['razorpay_signature']), 422, 'Payment verification failed.');

        $paymentResponse = Http::withBasicAuth($credentials['api_key'], $credentials['api_secret'])
            ->timeout(15)
            ->get('https://api.razorpay.com/v1/payments/'.rawurlencode($data['razorpay_payment_id']));
        if (!$paymentResponse->successful()) {
            Log::error('Razorpay payment verification request failed', ['status' => $paymentResponse->status(), 'schedule_id' => $schedule->id]);
            abort(502, 'Payment verification is temporarily unavailable.');
        }
        $providerPayment = $paymentResponse->json();
        abort_unless(
            ($providerPayment['order_id'] ?? null) === $schedule->razorpay_order_id
                && ($providerPayment['status'] ?? null) === 'captured'
                && (int) ($providerPayment['amount'] ?? 0) === $schedule->amount_minor + $schedule->convenience_fee_minor
                && ($providerPayment['currency'] ?? null) === $schedule->invoice->currency,
            422,
            'Razorpay did not confirm the expected captured amount.'
        );

        DB::transaction(function () use ($schedule, $data) {
            Query::whereKey($schedule->query_id)->lockForUpdate()->firstOrFail();
            $locked = QueryPaymentSchedule::whereKey($schedule->id)->lockForUpdate()->firstOrFail();
            if ($locked->status === 'paid') {
                return;
            }
            abort_unless($locked->status === 'pending', 409);
            $invoice = QueryInvoice::whereKey($locked->query_invoice_id)->lockForUpdate()->firstOrFail();
            $remaining = $invoice->amount_minor
                - $invoice->payments()->whereNull('voided_at')->sum('amount_minor')
                - $invoice->schedules()->where('status', 'pending')->sum('amount_minor');
            abort_unless($remaining >= 0, 409, 'Scheduled payments exceed the invoice balance.');
            $payment = QueryPayment::create([
                'query_id' => $locked->query_id,
                'query_invoice_id' => $locked->query_invoice_id,
                'request_key' => (string) Str::uuid(),
                'amount_minor' => $locked->amount_minor,
                'reference' => $data['razorpay_payment_id'],
                'method' => 'Card',
                'paid_on' => now()->toDateString(),
                'created_by' => $locked->created_by,
            ]);
            $locked->update(['status' => 'paid', 'query_payment_id' => $payment->id]);
            QueryLog::create([
                'query_id' => $locked->query_id,
                'added_by' => $locked->created_by,
                'date_added' => now(),
                'log_type' => 'payment_recorded',
                'details' => 'Razorpay payment PAY-'.$payment->id.' recorded',
            ]);
        });

        return redirect()->route('query-payment.show', ['token' => $token])->with('success', 'Payment received successfully.');
    }

    public function invoice(Request $request, $query_id)
    {
        $query = QueryAccess::find($query_id);
        $data = $request->validate(['amount' => $this->moneyRules(), 'currency' => 'required|in:INR,USD,AED,EUR,GBP,NZD,CAD,AUD', 'description' => 'required|string|max:5000']);
        DB::transaction(function () use ($query, $data) {
            Query::whereKey($query->id)->lockForUpdate()->firstOrFail();
            if ($query->invoice()->exists()) { throw ValidationException::withMessages(['amount' => 'An invoice already exists. Use the recorded invoice.']); }
            $itinerary = $query->itineraries()->where('status', 1)->first();
            if (!$itinerary) { throw ValidationException::withMessages(['amount' => 'Accept a proposal before creating its invoice.']); }
            $amount = $this->money($data['amount']);
            if ($amount <= 0) { throw ValidationException::withMessages(['amount' => 'Amount must be greater than zero.']); }
            $invoice = QueryInvoice::create(['query_id' => $query->id, 'itinerary_id' => $itinerary->id,
                'currency' => $data['currency'], 'amount_minor' => $amount, 'description' => $data['description'], 'created_by' => auth()->id()]);
            QueryHistory::record($query->id, 'invoice_created', 'Invoice INV-'.$invoice->id.' created');
        });
        return $this->backTo($query->id, 'billing');
    }

    public function voidPayment(Request $request, $query_id, $payment_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Query'), 403);
        $data = $request->validate(['void_reason' => 'required|string|max:500']);

        DB::transaction(function () use ($query, $payment_id, $data) {
            Query::whereKey($query->id)->lockForUpdate()->firstOrFail();
            $invoice = $query->invoice()->lockForUpdate()->firstOrFail();
            $payment = $invoice->payments()->lockForUpdate()->findOrFail($payment_id);
            abort_unless(!$payment->voided_at, 409, 'This payment has already been voided.');
            abort_if(
                QueryPaymentSchedule::where('query_payment_id', $payment->id)->exists(),
                409,
                'Payments captured against an installment cannot be voided here.'
            );

            $payment->update([
                'voided_at' => now(),
                'voided_by' => auth()->id(),
                'void_reason' => $data['void_reason'],
            ]);
            QueryHistory::record($query->id, 'payment_voided', 'Payment PAY-'.$payment->id.' voided', $data['void_reason']);
        });

        return $this->backTo($query->id, 'billing');
    }

    public function payment(Request $request, $query_id)
    {
        $query = QueryAccess::find($query_id);
        $data = $request->validate(['amount' => $this->moneyRules(), 'request_key' => 'required|uuid', 'reference' => 'required|string|max:150', 'method' => 'required|in:Bank,Card,Cash,UPI,Other', 'paid_on' => 'required|date_format:Y-m-d|before_or_equal:today']);
        DB::transaction(function () use ($query, $data) {
            $invoice = $query->invoice()->lockForUpdate()->firstOrFail();
            $amount = $this->money($data['amount']);
            $existing = QueryPayment::where('request_key', $data['request_key'])->first();
            if ($existing) {
                if ($existing->query_id != $query->id || $existing->amount_minor != $amount || $existing->reference !== $data['reference'] || $existing->method !== $data['method'] || $existing->paid_on->format('Y-m-d') !== $data['paid_on']) {
                    throw ValidationException::withMessages(['request_key' => 'This payment key has already been used for different details.']);
                }
                return;
            }
            $remaining = $invoice->amount_minor
                - $invoice->payments()->whereNull('voided_at')->sum('amount_minor')
                - $invoice->schedules()->where('status', 'pending')->sum('amount_minor');
            if ($amount <= 0 || $amount > $remaining) { throw ValidationException::withMessages(['amount' => 'Payment must be positive and no greater than the outstanding balance.']); }
            $payment = QueryPayment::create(['query_id' => $query->id, 'query_invoice_id' => $invoice->id,
                'request_key' => $data['request_key'], 'amount_minor' => $amount, 'reference' => $data['reference'],
                'method' => $data['method'], 'paid_on' => $data['paid_on'], 'created_by' => auth()->id()]);
            QueryHistory::record($query->id, 'payment_recorded', 'Payment PAY-'.$payment->id.' recorded');
        });
        return $this->backTo($query->id, 'billing');
    }

    public function supplierBooking(Request $request, $query_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Supplier'), 403);
        $data = $request->validate(['package_day_item_id' => 'required|integer', 'supplier_id' => ['required', Rule::exists('suppliers', 'id')->where('status', 1)],
            'status' => 'required|in:pending,confirmed,cancelled', 'currency' => 'required|in:INR,USD,AED,EUR,GBP,NZD,CAD,AUD',
            'amount' => $this->moneyRules(), 'paid' => $this->moneyRules(), 'reference' => 'nullable|string|max:150', 'remarks' => 'nullable|string|max:5000']);
        DB::transaction(function () use ($query, $data) {
            Query::whereKey($query->id)->lockForUpdate()->firstOrFail();
            $accepted = $query->itineraries()->where('status', 1)->firstOrFail();
            $item = PackageDayItem::selectedForAcceptance($accepted->accepted_hotel_option)->whereHas('package.itinerary', fn ($q) => $q->where('queryId', $query->id)->where('status', 1))
                ->where('type', '!=', 'daydetail')->findOrFail($data['package_day_item_id']);
            $booking = QuerySupplierBooking::where('package_day_item_id', $item->id)->first();
            if ($booking && QueryVoucher::where('query_supplier_booking_id', $booking->id)->exists()) {
                throw ValidationException::withMessages(['status' => 'This booking has an issued voucher and cannot be changed.']);
            }
            $amount = $this->money($data['amount']); $paid = $this->money($data['paid']);
            if ($paid > $amount) { throw ValidationException::withMessages(['paid' => 'Paid amount cannot exceed supplier cost.']); }
            $booking = QuerySupplierBooking::updateOrCreate(['package_day_item_id' => $item->id], [
                'query_id' => $query->id, 'supplier_id' => $data['supplier_id'], 'status' => $data['status'], 'currency' => $data['currency'],
                'amount_minor' => $amount, 'paid_minor' => $paid, 'reference' => $data['reference'] ?? null,
                'remarks' => $data['remarks'] ?? null, 'created_by' => $booking?->created_by ?? auth()->id()]);
            QueryHistory::record($query->id, 'supplier_booking', 'Supplier booking #'.$booking->id.' saved', $data['remarks'] ?? null);
        });
        return $this->backTo($query->id, 'post-sales-supplier');
    }

    public function supplierPayment(Request $request, $query_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canEdit('Supplier'), 403);
        $data = $request->validate(['booking_id' => 'required|integer', 'paid' => $this->moneyRules(), 'remarks' => 'nullable|string|max:5000']);
        DB::transaction(function () use ($query, $data) {
            Query::whereKey($query->id)->lockForUpdate()->firstOrFail();
            $booking = $query->supplierBookings()->lockForUpdate()->findOrFail($data['booking_id']);
            $paid = $this->money($data['paid']);
            if ($paid > $booking->amount_minor) { throw ValidationException::withMessages(['paid' => 'Paid amount cannot exceed supplier cost.']); }
            $booking->update(['paid_minor' => $paid, 'remarks' => $data['remarks'] ?? $booking->remarks]);
            QueryHistory::record($query->id, 'supplier_payment', 'Supplier booking #'.$booking->id.' paid total updated to '.$booking->currency.' '.number_format($paid / 100, 2), $data['remarks'] ?? null);
        });
        return $this->backTo($query->id, 'post-sales-supplier');
    }

    public function voucher(Request $request, $query_id)
    {
        $query = QueryAccess::find($query_id);
        $data = $request->validate(['booking_id' => 'required|integer']);
        DB::transaction(function () use ($query, $data) {
            Query::whereKey($query->id)->lockForUpdate()->firstOrFail();
            $booking = $query->supplierBookings()->with(['supplier', 'item.package.itinerary'])->lockForUpdate()->findOrFail($data['booking_id']);
            if ($booking->status !== 'confirmed' || (int) $booking->item->package->itinerary->status !== 1) {
                throw ValidationException::withMessages(['booking_id' => 'Only a confirmed booking on the accepted proposal can be vouchered.']);
            }
            if (QueryVoucher::where('query_supplier_booking_id', $booking->id)->exists()) { return; }
            $voucher = QueryVoucher::create(['query_id' => $query->id, 'query_supplier_booking_id' => $booking->id, 'created_by' => auth()->id(),
                'snapshot' => ['customer' => $query->name, 'supplier' => $booking->supplier->company_name, 'reference' => $booking->reference,
                    'service' => $booking->item->display_name, 'start_date' => $booking->item->start_date?->format('Y-m-d'),
                    'end_date' => $booking->item->end_date?->format('Y-m-d'), 'adult' => $query->adult, 'child' => $query->child,
                    'infant' => $query->infant, 'remarks' => $booking->remarks]]);
            QueryHistory::record($query->id, 'voucher_created', 'Voucher VCH-'.$voucher->id.' issued');
        });
        return $this->backTo($query->id, 'voucher');
    }

    public function printVoucher($query_id, $voucher_id)
    {
        $query = QueryAccess::find($query_id);
        $voucher = $query->vouchers()->findOrFail($voucher_id);
        return view('voucher.print', compact('query', 'voucher'));
    }

    public function printInvoice($query_id)
    {
        $query = QueryAccess::find($query_id);
        $invoice = $query->invoice()->with('payments')->firstOrFail();
        $invoice->setRelation('payments', $invoice->payments->whereNull('voided_at')->values());
        return view('billing.print', compact('query', 'invoice'));
    }

    public function document(Request $request, $query_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canAdd('Guest'), 403);
        $data = $request->validate(['guest_id' => 'required|integer', 'label' => 'required|string|max:100', 'document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240']);
        $guest = $query->guests()->findOrFail($data['guest_id']);
        $path = $request->file('document')->store('guest-documents/'.$query->id, 'local');
        abort_unless($path, 500, 'Document could not be stored.');
        try {
            DB::transaction(function () use ($query, $guest, $path, $data, $request) {
                QueryGuestDocument::create(['query_id' => $query->id, 'query_guest_id' => $guest->id, 'path' => $path,
                    'label' => $data['label'], 'original_name' => basename($request->file('document')->getClientOriginalName()), 'created_by' => auth()->id()]);
                QueryHistory::record($query->id, 'document_uploaded', 'Guest document uploaded', $data['label']);
            });
        } catch (\Throwable $e) { Storage::disk('local')->delete($path); throw $e; }
        return $this->backTo($query->id, 'guest-documents');
    }

    public function downloadDocument($query_id, $document_id)
    {
        $query = QueryAccess::find($query_id);
        abort_unless(auth()->user()->canView('Guest'), 403);
        $document = QueryGuestDocument::where('query_id', $query->id)->findOrFail($document_id);
        abort_unless(Storage::disk('local')->exists($document->path), 404);
        return Storage::disk('local')->download($document->path, $document->original_name, ['X-Content-Type-Options' => 'nosniff']);
    }
}
