<div class="card-body">
    <div style="padding:10px;">
        @if (session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger" role="alert">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <style>
            .statusbox {
                margin-right: 5px;
                padding: 10px;
                text-align: center;
                background-color: #000000;
                font-size: 13px;
                color: #fff;
                border-radius: 4px;
                text-transform: uppercase;
            }

            .conf {
                width: 100px;
                border: 1px solid #ddd;
                border-radius: 3px;
                padding: 5px;
                text-align: center;
            }
        </style>
        @php
            $invoice = $query->invoice;
            $allPayments = $invoice?->payments ?? collect();
            $paymentSchedules = $paymentSchedules ?? collect();
            $scheduledPaymentIds = $paymentSchedules->pluck('query_payment_id')->filter();
            $payments = $allPayments->reject(fn ($payment) => $scheduledPaymentIds->contains($payment->id))->values();
            $totalMinor = $invoice?->amount_minor ?? (int) round((float) ($billingPrice ?? 0) * 100);
            $receivedMinor = (int) $allPayments->whereNull('voided_at')->sum('amount_minor');
            $pendingMinor = $totalMinor - $receivedMinor;
            $scheduledMinor = (int) $paymentSchedules->where('status', 'pending')->sum('amount_minor');
            $notScheduledMinor = $pendingMinor - $scheduledMinor;
            $currency = $invoice->currency ?? ($billingCurrency ?? 'INR');
            $currencyLabel = fn ($code) => $code === 'INR' ? '₹' : $code;
            $formatMoney = fn ($minor) => number_format($minor / 100, $minor % 100 === 0 ? 0 : 2);
            $supplierSummary = collect($supplierTotals ?? [])
                ->map(fn ($totals, $code) => $currencyLabel($code) . ' ' . $formatMoney($totals['amount']))
                ->implode(' / ');
            $supplierReceivedSummary = collect($supplierTotals ?? [])
                ->map(fn ($totals, $code) => $currencyLabel($code) . ' ' . $formatMoney($totals['paid']))
                ->implode(' / ');
            $supplierPendingSummary = collect($supplierTotals ?? [])
                ->map(fn ($totals, $code) => $currencyLabel($code) . ' ' . $formatMoney(max($totals['amount'] - $totals['paid'], 0)))
                ->implode(' / ');
            $supplierAmountInInvoiceCurrency = $supplierTotals[$currency]['amount'] ?? 0;
            $grossProfitMinor = $totalMinor - $supplierAmountInInvoiceCurrency;
            $paymentRowCount = $payments->count() + $paymentSchedules->count();
        @endphp

        <div class=" ">
            <div class=" ">
                <div style="margin-bottom:10px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#655be6;">
                                        <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                            {{ $currencyLabel($currency) }} {{ $formatMoney($totalMinor) }}
                                        </div>
                                        Total&nbsp;Amount
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#0cb5b5;">
                                        <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                            {{ $currencyLabel($currency) }} {{ $formatMoney($receivedMinor) }}
                                        </div>
                                        Received
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#e45555;">
                                        <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                            {{ $currencyLabel($currency) }} {{ $formatMoney($pendingMinor) }}
                                        </div>
                                        Pending
                                    </div>
                                </td>
                                <td width="16%" align="left" valign="top">
                                    <div class="statusbox"
                                        style="background-color:#ffffff;color:#000000;font-weight:600;">
                                        <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                            {{ $currencyLabel($currency) }} {{ $formatMoney($grossProfitMinor) }}
                                        </div>
                                        Gross Profit
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#e69f5b;">
                                        <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                            {{ $supplierSummary ?: $currencyLabel($currency) . ' 0' }}
                                        </div>
                                        Supplier&nbsp;Amount
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#71b183;">
                                        <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                            {{ $supplierReceivedSummary ?: $currencyLabel($currency) . ' 0' }}
                                        </div>
                                        Supplier&nbsp;Received
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#ae8393;">
                                        <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                            {{ $supplierPendingSummary ?: $currencyLabel($currency) . ' 0' }}
                                        </div>
                                        Supplier&nbsp;Pending
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12" style="padding:0;">
                    <h4 class="mt-0 header-title" style="border-bottom:0;position:relative;">
                        Payments ({{ $paymentRowCount }})
                        @if ($invoice && auth()->user()?->canEdit('Query'))
                            <form method="POST" action="{{ route('query-workflow.payment-plan.email', ['query_id' => $query->id]) }}"
                                style="display:inline;">
                                @csrf
                                <button type="submit"
                                    style="position:absolute;font-size:12px;font-weight:600;right:5px;top:2px;background-color:#005ee2;color:#fff;padding:2px 10px;border:0;border-radius:3px;cursor:pointer;">
                                    Send Payment Plan To Mail
                                </button>
                            </form>
                        @endif
                    </h4>
                    @if (session('payment_link'))
                        <div class="alert alert-warning">
                            Email delivery failed. Copy the generated payment link:
                            <a href="{{ session('payment_link') }}">{{ session('payment_link') }}</a>
                        </div>
                    @endif
                    @if ($invoice)
                        <div style="margin-bottom:10px;">
                            <strong>Invoice INV-{{ $invoice->id }}:</strong> {{ $invoice->description }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body" style="padding:10px !important;">
                            <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                                style="font-size:12px;">
                                <thead>
                                    <tr>
                                        <th>Payment&nbsp;ID</th>
                                        <th>Trans.&nbsp;ID</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Payment&nbsp;Date</th>
                                        <th>Status</th>
                                        <th align="center">&nbsp;</th>
                                        <th align="center" style="display:none;">&nbsp;</th>
                                        <th align="center">Convenience Fee</th>
                                        <th>Receipt</th>
                                        <th><div align="right">Action</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr style="{{ $payment->voided_at ? '' : 'background-color:#e4fff9;' }}">
                                            <td align="left" valign="top">PAY-{{ $payment->id }}</td>
                                            <td align="left" valign="top" style="text-transform:uppercase;">{{ $payment->reference }}</td>
                                            <td align="left" valign="top"><span class="badge badge-dark">{{ $payment->method }}</span></td>
                                            <td align="left" valign="top">{{ $currencyLabel($currency) }} {{ $formatMoney($payment->amount_minor) }}</td>
                                            <td align="left" valign="top">{{ $payment->paid_on->format('d/m/Y - h:i A') }}</td>
                                            <td align="left" valign="top">
                                                @if ($payment->voided_at)
                                                    <span class="badge badge-danger" title="{{ $payment->void_reason }}">Voided</span>
                                                @else
                                                    <span class="badge badge-success">Paid</span>
                                                @endif
                                            </td>
                                            <td align="center" valign="top"></td>
                                            <td align="center" valign="top" style="display:none;">
                                            </td>
                                            <td align="center" valign="top">-</td>
                                            <td align="left" valign="top">
                                                <a href="{{ route('query-workflow.invoice.print', ['query_id' => $query->id]) }}" target="_blank">Invoice</a>
                                            </td>
                                            <td align="left" valign="top">
                                                @if (!$payment->voided_at && auth()->user()?->canEdit('Query'))
                                                    <form method="POST" action="{{ route('query-workflow.payment.void', ['query_id' => $query->id, 'payment_id' => $payment->id]) }}"
                                                        onsubmit="const reason = window.prompt('Reason for voiding this payment?'); if (!reason) return false; this.elements.void_reason.value = reason; return true;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="void_reason">
                                                        <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    @foreach ($paymentSchedules as $schedule)
                                        @php
                                            $isPaid = $schedule->status === 'paid';
                                            $isOverdue = !$isPaid && $schedule->due_on->isPast() && !$schedule->due_on->isToday();
                                        @endphp
                                        <tr>
                                            <td align="left" valign="top">{{ $isPaid ? 'PAY-' . $schedule->payment?->id : '-' }}</td>
                                            <td align="left" valign="top" style="text-transform:uppercase;">{{ $schedule->payment?->reference ?? '-' }}</td>
                                            <td align="left" valign="top">
                                                @if ($schedule->payment)
                                                    <span class="badge badge-dark">{{ $schedule->payment->method }}</span>
                                                @endif
                                            </td>
                                            <td align="left" valign="top">{{ $currencyLabel($currency) }} {{ $formatMoney($schedule->amount_minor) }}</td>
                                            <td align="left" valign="top">
                                                {{ $isPaid ? $schedule->payment?->paid_on->format('d/m/Y - h:i A') : $schedule->due_on->format('d/m/Y') }}
                                            </td>
                                            <td align="left" valign="top">
                                                @if ($isPaid)
                                                    <span class="badge badge-success">Paid</span>
                                                @elseif ($isOverdue)
                                                    <span class="badge badge-danger">Overdue</span>
                                                @else
                                                    <span class="badge badge-secondary">Scheduled</span>
                                                @endif
                                            </td>
                                            <td align="center" valign="top">
                                                @if (!$isPaid && in_array($schedule->id, $paymentGatewayScheduleIds ?? [], true) && auth()->user()?->canEdit('Query'))
                                                    <form method="POST" action="{{ route('query-workflow.payment-schedule.link', ['query_id' => $query->id, 'schedule_id' => $schedule->id]) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm waves-effect waves-light" style="width:100%;">Send Link</button>
                                                    </form>
                                                @elseif (!$isPaid && auth()->user()?->canEdit('Query'))
                                                    <span title="Configure Razorpay API credentials to send a payment link">Gateway unavailable</span>
                                                @endif
                                            </td>
                                            <td align="center" valign="top" style="display:none;">
                                                @if (!$isPaid && auth()->user()?->canEdit('Query'))
                                                    <form method="POST" action="{{ route('query-workflow.payment-schedule.details', ['query_id' => $query->id, 'schedule_id' => $schedule->id]) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Send Payment Details</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td align="center" valign="top">
                                                @if (!$isPaid && auth()->user()?->canEdit('Query'))
                                                    <form method="POST" action="{{ route('query-workflow.payment-schedule.update', ['query_id' => $query->id, 'schedule_id' => $schedule->id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="amount" value="{{ number_format($schedule->amount_minor / 100, 2, '.', '') }}">
                                                        <input type="hidden" name="due_on" value="{{ $schedule->due_on->format('Y-m-d') }}">
                                                        <input type="number" min="0" step="0.01" name="convenience_fee" id="conFee{{ $schedule->id }}" class="conf" placeholder="Convenience Fee" value="{{ number_format($schedule->convenience_fee_minor / 100, 2, '.', '') }}" aria-label="Convenience fee" onchange="this.form.requestSubmit()">
                                                        <button type="submit" style="display:none;">Save fee</button>
                                                    </form>
                                                @else
                                                    {{ $currencyLabel($currency) }} {{ $formatMoney($schedule->convenience_fee_minor) }}
                                                @endif
                                            </td>
                                            <td align="left" valign="top">
                                                @if ($schedule->payment)
                                                    {{ $schedule->payment->reference }}
                                                @endif
                                            </td>
                                            <td align="left" valign="top">
                                                @if (!$isPaid && auth()->user()?->canEdit('Query'))
                                                        <div style="width:150px;float:right;text-align:right;">
                                                            @if ($schedule->razorpay_order_id)
                                                                <span class="badge badge-info">Link Sent</span>
                                                            @else
                                                            <details style="display:inline-block;text-align:left;">
                                                            <summary class="btn btn-info btn-sm waves-effect waves-light">Edit</summary>
                                                            <form method="POST" action="{{ route('query-workflow.payment-schedule.update', ['query_id' => $query->id, 'schedule_id' => $schedule->id]) }}"
                                                                style="position:absolute;z-index:2;background:#fff;border:1px solid #ddd;padding:12px;right:20px;width:250px;">
                                                                @csrf
                                                                @method('PUT')
                                                                <label>Amount ({{ $currency }})</label>
                                                                <input class="form-control mb-2" type="number" name="amount" min="0.01" step="0.01" value="{{ number_format($schedule->amount_minor / 100, 2, '.', '') }}" required>
                                                                <label>Due date</label>
                                                                <input class="form-control mb-2" type="date" name="due_on" value="{{ $schedule->due_on->format('Y-m-d') }}" required>
                                                                <label>Convenience fee ({{ $currency }})</label>
                                                                <input class="form-control mb-2" type="number" name="convenience_fee" min="0" step="0.01" value="{{ number_format($schedule->convenience_fee_minor / 100, 2, '.', '') }}" required>
                                                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                                            </form>
                                                        </details>
                                                        <form method="POST" action="{{ route('query-workflow.payment-schedule.delete', ['query_id' => $query->id, 'schedule_id' => $schedule->id]) }}" style="display:inline;" onsubmit="return confirm('Delete this scheduled payment?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if (!$invoice)
                                        <tr><td colspan="11" align="center" valign="top">No invoice payments are scheduled.</td></tr>
                                    @elseif ($paymentRowCount === 0)
                                        <tr><td colspan="11" align="center" valign="top">No payments or installments are recorded.</td></tr>
                                    @endif
                                    <tr>
                                        <td colspan="3" align="right" valign="top"><strong>Not Scheduled Amount:</strong></td>
                                        <td align="left" valign="top"><strong>{{ $currencyLabel($currency) }} {{ $formatMoney($notScheduledMinor) }}</strong></td>
                                        <td colspan="7" align="right" valign="top"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if ($invoice && auth()->user()?->canEdit('Query'))
                        <div class="card">
                            <div class="card-body" style="padding:10px !important;">
                                <details>
                                    <summary class="btn btn-primary btn-sm">Schedule Payment</summary>
                                    <form method="POST" action="{{ route('query-workflow.payment-schedule.create', ['query_id' => $query->id]) }}" class="form-row mt-3">
                                        @csrf
                                        <div class="form-group col-md-3">
                                            <label>Amount ({{ $currency }})</label>
                                            <input class="form-control" type="number" name="amount" min="0.01" step="0.01" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Due date</label>
                                            <input class="form-control" type="date" name="due_on" min="{{ now()->toDateString() }}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Convenience fee ({{ $currency }})</label>
                                            <input class="form-control" type="number" name="convenience_fee" min="0" step="0.01" value="0.00" required>
                                        </div>
                                        <div class="form-group col-md-3 align-self-end">
                                            <button class="btn btn-primary" type="submit">Add Installment</button>
                                        </div>
                                    </form>
                                </details>
                            </div>
                        </div>
                    @endif

                    @if ($invoice && ($pendingMinor - $scheduledMinor) > 0 && auth()->user()?->canEdit('Query'))
                        <div class="card">
                            <div class="card-body" style="padding:10px !important;">
                                <h5>Record Payment</h5>
                                <form method="POST" action="{{ route('query-workflow.payment', ['query_id' => $query->id]) }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="payment-amount">Amount ({{ $currency }})</label>
                                            <input id="payment-amount" class="form-control" type="number" name="amount" min="0.01" max="{{ number_format(($pendingMinor - $scheduledMinor) / 100, 2, '.', '') }}" step="0.01" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="payment-reference">Reference</label>
                                            <input id="payment-reference" class="form-control" type="text" name="reference" maxlength="150" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="payment-method">Method</label>
                                            <select id="payment-method" class="form-control" name="method" required>
                                                <option value="Bank">Bank</option><option value="Card">Card</option><option value="Cash">Cash</option><option value="UPI">UPI</option><option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="payment-date">Payment Date</label>
                                            <input id="payment-date" class="form-control" type="date" name="paid_on" value="{{ now()->toDateString() }}" max="{{ now()->toDateString() }}" required>
                                        </div>
                                        <input type="hidden" name="request_key" value="{{ \Illuminate\Support\Str::uuid() }}">
                                        <div class="form-group col-md-2 align-self-end">
                                            <button type="submit" class="btn btn-primary">Record Payment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

                <div>
                    <h4 class="mt-0 header-title" style="border-bottom:0;overflow:hidden;">&nbsp;</h4>
                    @if ($invoice)
                        <div class="card">
                            <div class="card-body" style="padding:10px !important;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="5%" align="center">
                                                <i class="fa fa-file-text" aria-hidden="true" style="font-size:40px;color:#0066cc;"></i>
                                            </td>
                                            <td colspan="2" align="left" style="padding-left:10px;">
                                                <div style="color:#666;margin-bottom:0;">Invoice - {{ $invoice->created_at->format('d M Y') }}</div>
                                                <div style="color:#000;font-size:20px;">INV/{{ $invoice->id }}</div>
                                            </td>
                                            <td align="right">
                                                <a target="_blank" href="{{ route('query-workflow.invoice.print', ['query_id' => $query->id]) }}" class="btn btn-primary waves-effect waves-light">View Invoice</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @elseif (!empty($billingPrice) && $billingPrice > 0)
                        <div style="padding:10px;">
                            <form method="POST" action="{{ route('query-workflow.invoice', ['query_id' => $query->id]) }}">
                                @csrf
                                <div class="form-row align-items-end">
                                    <div class="form-group col-md-3">
                                        <label for="invoice-amount">Invoice Amount ({{ $currencyLabel($billingCurrency) }})</label>
                                        <input id="invoice-amount" class="form-control" type="number" name="amount" min="0.01" step="0.01" value="{{ number_format((float) $billingPrice, 2, '.', '') }}" required>
                                    </div>
                                    <input type="hidden" name="currency" value="{{ $billingCurrency }}">
                                    <input type="hidden" name="description" value="Invoice for query #{{ $query->id }}">
                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Generate Invoice</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div style="text-align:center;padding:10px;">
                            <div style="margin-bottom:10px;">Accept a proposal to create an invoice.</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
