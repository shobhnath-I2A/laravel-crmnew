<div class="card-body">
    <div style="padding:10px;">
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
            $invoice = $query->invoice ?? null;
            $payments = $invoice?->payments ?? collect();
            $totalMinor = $invoice?->amount_minor ?? (int) round((float) ($billingPrice ?? 0) * 100);
            $receivedMinor = $payments->sum('amount_minor');
            $pendingMinor = max($totalMinor - $receivedMinor, 0);
            $currency = $invoice->currency ?? ($billingCurrency ?? 'INR');
            $currencyLabel = fn ($code) => $code === 'INR' ? '₹' : $code;
            $supplierSummary = collect($supplierTotals ?? [])
                ->map(fn ($totals, $code) => $currencyLabel($code) . ' ' . number_format($totals['amount'] / 100, 2))
                ->implode(' / ');
            $supplierReceivedSummary = collect($supplierTotals ?? [])
                ->map(fn ($totals, $code) => $currencyLabel($code) . ' ' . number_format($totals['paid'] / 100, 2))
                ->implode(' / ');
            $supplierPendingSummary = collect($supplierTotals ?? [])
                ->map(fn ($totals, $code) => $currencyLabel($code) . ' ' . number_format(max($totals['amount'] - $totals['paid'], 0) / 100, 2))
                ->implode(' / ');
            $supplierAmountInInvoiceCurrency = ($supplierTotals[$currency]['amount'] ?? 0);
            $grossProfitMinor = $totalMinor - $supplierAmountInInvoiceCurrency;
        @endphp
        <div class=" ">
            <div class=" ">
                <div style="margin-bottom:10px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#655be6;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                            {{ $currencyLabel($currency) }} {{ number_format($totalMinor / 100, 2) }}
                                        </div>
                                        Total&nbsp;Amount
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#0cb5b5;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                            {{ $currencyLabel($currency) }} {{ number_format($receivedMinor / 100, 2) }}
                                        </div>
                                        Received
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#e45555;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                            {{ $currencyLabel($currency) }} {{ number_format($pendingMinor / 100, 2) }}
                                        </div>
                                        Pending
                                    </div>
                                </td>
                                <td width="16%" align="left" valign="top">
                                    <div class="statusbox"
                                        style="background-color: #ffffff; color: #000000; font-weight: 600;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                            {{ $currencyLabel($currency) }} {{ number_format($grossProfitMinor / 100, 2) }}
                                        </div>
                                        Gross Profit
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#e69f5b;">
                                        <div style="margin-bottom: 0px; font-size: 20px; line-height: 38px;">
                                            {{ $supplierSummary ?: $currencyLabel($currency) . ' 0.00' }}
                                        </div>
                                        Supplier&nbsp;Amount
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#71b183;">
                                        <div style="margin-bottom: 0px; font-size: 20px; line-height: 38px;">
                                            {{ $supplierReceivedSummary ?: $currencyLabel($currency) . ' 0.00' }}
                                        </div>
                                        Supplier&nbsp;Received
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#ae8393;">
                                        <div style="margin-bottom: 0px; font-size: 20px; line-height: 38px;">
                                            {{ $supplierPendingSummary ?: $currencyLabel($currency) . ' 0.00' }}
                                        </div>
                                        Supplier&nbsp;Pending
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12" style=" padding: 0px; ">
                    <h4 class="mt-0 header-title" style="border-bottom:0px; position:relative;">
                        Payments ({{ $payments->count() }})
                        @if ($invoice)
                            <a href="{{ route('query-workflow.invoice.print', ['query_id' => $query->id]) }}"
                                target="_blank"
                                style="position: absolute; font-size: 12px; font-weight: 600; right: 5px; top:2px; background-color: #005ee2; color: #fff; padding: 2px 10px; border-radius: 3px;">
                                Print Invoice
                            </a>
                        @endif
                    </h4>
                    @if ($invoice)
                        <div style="margin-bottom:10px;">
                            <strong>Invoice INV-{{ $invoice->id }}:</strong> {{ $invoice->description }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body" style="padding:10px !important;">
                            <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                                style=" font-size:12px;">
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
                                        <th>
                                            <div align="right">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                        <tr style="background-color:#e4fff9;">
                                            <td align="left" valign="top">PAY-{{ $payment->id }}</td>
                                            <td align="left" valign="top" style="text-transform:uppercase;">
                                                {{ $payment->reference }}
                                            </td>
                                            <td align="left" valign="top">
                                                <span class="badge badge-dark">{{ $payment->method }}</span>
                                            </td>
                                            <td align="left" valign="top">
                                                {{ $currencyLabel($currency) }} {{ number_format($payment->amount_minor / 100, 2) }}
                                            </td>
                                            <td align="left" valign="top">{{ $payment->paid_on->format('d/m/Y') }}</td>
                                            <td align="left" valign="top">
                                                <span class="badge badge-success">Paid</span>
                                            </td>
                                            <td align="center" valign="top"></td>
                                            <td align="center" valign="top" style="display:none;"></td>
                                            <td align="center" valign="top">-</td>
                                            <td align="left" valign="top">
                                                @if ($invoice)
                                                    <a href="{{ route('query-workflow.invoice.print', ['query_id' => $query->id]) }}"
                                                        target="_blank">Invoice</a>
                                                @endif
                                            </td>
                                            <td align="left" valign="top"></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" align="center" valign="top">No payments recorded.</td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="3" align="right" valign="top">
                                            <strong>Outstanding Amount:</strong>
                                        </td>
                                        <td align="left" valign="top">
                                            <strong>{{ $currencyLabel($currency) }} {{ number_format($pendingMinor / 100, 2) }}</strong>
                                        </td>
                                        <td colspan="7" align="right" valign="top"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if ($invoice && $pendingMinor > 0 && auth()->user()?->canEdit('Query'))
                        <div class="card">
                            <div class="card-body" style="padding:10px !important;">
                                <h5>Record Payment</h5>
                                <form method="POST"
                                    action="{{ route('query-workflow.payment', ['query_id' => $query->id]) }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="payment-amount">Amount ({{ $currency }})</label>
                                            <input id="payment-amount" class="form-control" type="number" name="amount"
                                                min="0.01" max="{{ number_format($pendingMinor / 100, 2, '.', '') }}"
                                                step="0.01" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="payment-reference">Reference</label>
                                            <input id="payment-reference" class="form-control" type="text"
                                                name="reference" maxlength="150" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="payment-method">Method</label>
                                            <select id="payment-method" class="form-control" name="method" required>
                                                <option value="Bank">Bank</option>
                                                <option value="Card">Card</option>
                                                <option value="Cash">Cash</option>
                                                <option value="UPI">UPI</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="payment-date">Payment Date</label>
                                            <input id="payment-date" class="form-control" type="date" name="paid_on"
                                                value="{{ now()->toDateString() }}" max="{{ now()->toDateString() }}"
                                                required>
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
                    @if ($invoice)
                        <h4 class="mt-0 header-title" style="border-bottom:0px; overflow:hidden;">Invoice</h4>
                        <div style="text-align:center; padding:10px;">
                            <a target="_blank"
                                href="{{ route('query-workflow.invoice.print', ['query_id' => $query->id]) }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light">Print Invoice</button>
                            </a>
                        </div>
                    @elseif (!empty($billingPrice) && $billingPrice > 0)
                        <h4 class="mt-0 header-title" style="border-bottom:0px; overflow:hidden;">Invoice</h4>
                        <div style="padding:10px;">
                            <form method="POST"
                                action="{{ route('query-workflow.invoice', ['query_id' => $query->id]) }}">
                                @csrf
                                <div class="form-row align-items-end">
                                    @if (auth()->user()?->canEdit('Query'))
                                        <div class="form-group col-md-3">
                                            <label for="invoice-amount">Invoice Amount ({{ $currencyLabel($billingCurrency) }})</label>
                                            <input id="invoice-amount" class="form-control" type="number" name="amount"
                                                min="0.01" step="0.01"
                                                value="{{ number_format((float) $billingPrice, 2, '.', '') }}" required>
                                        </div>
                                        <input type="hidden" name="currency" value="{{ $billingCurrency }}">
                                        <input type="hidden" name="description"
                                            value="Invoice for query #{{ $query->id }}">
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Generate Invoice
                                            </button>
                                        </div>
                                    @else
                                        <p>Accept a proposal to create an invoice.</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    @else
                        <h4 class="mt-0 header-title" style="border-bottom:0px; overflow:hidden;">Invoice</h4>
                        <div style="text-align:center; padding:10px;">
                            <div style="margin-bottom:10px;">Accept a proposal to create an invoice.</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
