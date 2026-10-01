<div class="card-body"><h4>Billing</h4>
@if($query->invoice)
@php($invoice = $query->invoice)
@php($received = $invoice->payments->sum('amount_minor'))
<div class="row mb-3"><div class="col">Total: <strong>{{ $invoice->currency }} {{ number_format($invoice->amount_minor / 100, 2) }}</strong></div>
<div class="col">Received: <strong>{{ number_format($received / 100, 2) }}</strong></div><div class="col">Outstanding: <strong>{{ number_format(($invoice->amount_minor - $received) / 100, 2) }}</strong></div></div>
<p>{{ $invoice->description }}</p><a class="btn btn-outline-primary mb-3" target="_blank" rel="noopener" href="{{ route('query-workflow.invoice.print', $query->id) }}">Print invoice / payment statement</a>
<table class="table table-bordered"><thead><tr><th>Receipt</th><th>Date</th><th>Method</th><th>Reference</th><th>Amount ({{ $invoice->currency }})</th></tr></thead><tbody>
@forelse($invoice->payments as $payment)<tr><td>PAY-{{ $payment->id }}</td><td>{{ $payment->paid_on->format('d-m-Y') }}</td><td>{{ $payment->method }}</td><td>{{ $payment->reference }}</td><td>{{ number_format($payment->amount_minor / 100, 2) }}</td></tr>
@empty<tr><td colspan="5">No payments recorded.</td></tr>@endforelse</tbody></table>
@if($received < $invoice->amount_minor)
<h5>Record received payment</h5><form method="post" action="{{ route('query-workflow.payment', $query->id) }}">@csrf
<input type="hidden" name="request_key" value="{{ old('request_key', (string) Illuminate\Support\Str::uuid()) }}">
<div class="row"><label class="col">Amount<input type="number" step="0.01" min="0.01" name="amount" class="form-control" required></label>
<label class="col">Reference<input name="reference" maxlength="150" class="form-control" required></label><label class="col">Date<input type="date" name="paid_on" value="{{ now()->format('Y-m-d') }}" class="form-control" required></label>
<label class="col">Method<select class="form-control" name="method">@foreach(['Bank','Card','Cash','UPI','Other'] as $method)<option>{{ $method }}</option>@endforeach</select></label></div><button class="btn btn-primary">Record payment</button></form>@endif
@else
<p>Create an invoice for the accepted proposal using the agreed final total. Tax is not calculated automatically.</p>
<form method="post" action="{{ route('query-workflow.invoice', $query->id) }}">@csrf
<label>Currency<select name="currency" class="form-control">@foreach(['INR','USD','AED','EUR','GBP','NZD','CAD','AUD'] as $currency)<option>{{ $currency }}</option>@endforeach</select></label>
<label>Agreed total<input type="number" step="0.01" min="0.01" name="amount" class="form-control" required></label>
<label class="d-block">Description / inclusions<textarea name="description" maxlength="5000" class="form-control" required></textarea></label><button class="btn btn-primary">Create invoice</button></form>
@endif</div>
