<?php
namespace App\Http\Controllers;

use App\Models\{Query, QueryInvoice, QueryPayment, QuerySupplierBooking, QueryVoucher, QueryGuestDocument, PackageDayItem, Supplier, Itinerary};
use App\Services\{QueryAccess, QueryHistory};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Storage};
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
            $remaining = $invoice->amount_minor - $invoice->payments()->sum('amount_minor');
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
