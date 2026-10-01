<div class="card-body"><h4>Supplier communication</h4><p>Compose an enquiry for this query. Select a supplier and review the message before sending.</p>
<form method="post" action="{{ route('compose-email.store') }}">@csrf<input type="hidden" name="query_id" value="{{ $query->id }}">
<label class="d-block">Supplier<select name="supplier_id" class="form-control" required><option value="">Select supplier</option>@foreach($suppliers as $supplier)<option value="{{ $supplier->id }}">{{ $supplier->company_name }} — {{ $supplier->email }}</option>@endforeach</select></label>
<label class="d-block">Subject<input name="subject" class="form-control" maxlength="255" value="Travel enquiry — Query #{{ $query->id }} — {{ $query->destinationCity?->name ?? $query->destination }}" required></label>
<label class="d-block">CC (comma separated)<input name="cc" class="form-control"></label>
<label class="d-block">Message<textarea name="message" class="form-control" rows="12" required>Dear Supplier,
Please provide your availability and rates for:
Query #{{ $query->id }}
Destination: {{ $query->destinationCity?->name ?? $query->destination }}
Travel dates: {{ $query->startDate }} to {{ $query->endDate }}
Travellers: {{ $query->adult }} adults, {{ $query->child ?? 0 }} children, {{ $query->infant ?? 0 }} infants.

Thank you.</textarea></label><button class="btn btn-primary">Send supplier enquiry</button></form>
<p class="mt-3">Delivery status and sent messages appear in the Mails tab.</p></div>
