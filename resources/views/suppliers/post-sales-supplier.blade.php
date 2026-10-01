<div class="card-body"><h4>Post-sales supplier bookings</h4><p>Services from the accepted proposal. Amounts are manually recorded supplier costs and cumulative payments.</p>
@forelse($postSaleItems as $type => $items)
@foreach($items->where('type', '!=', 'daydetail') as $item)
@php($booking = $query->supplierBookings->firstWhere('package_day_item_id', $item->id))
<div class="card mb-3"><div class="card-body"><h5>{{ ucfirst($type) }} — {{ $item->display_name }} (Day {{ $item->day }})</h5>
@if($booking && $query->vouchers->contains('query_supplier_booking_id', $booking->id))
<p>{{ $booking->supplier->company_name }} — {{ $booking->status }} — {{ $booking->currency }} {{ number_format($booking->amount_minor / 100, 2) }}. Voucher issued; service details locked.</p>
<form method="post" action="{{ route('query-workflow.supplier-payment', $query->id) }}">@csrf<input type="hidden" name="booking_id" value="{{ $booking->id }}"><label>Cumulative amount paid<input type="number" min="0" step="0.01" class="form-control" name="paid" value="{{ number_format($booking->paid_minor / 100, 2, '.', '') }}" required></label><label>Payment remarks<input class="form-control" name="remarks" maxlength="5000" value="{{ $booking->remarks }}"></label><button class="btn btn-primary">Update supplier payment</button></form>
@else
<form method="post" action="{{ route('query-workflow.supplier-booking', $query->id) }}">@csrf<input type="hidden" name="package_day_item_id" value="{{ $item->id }}">
<div class="row"><label class="col">Supplier<select class="form-control" name="supplier_id" required><option value="">Select supplier</option>@foreach($suppliers as $supplier)<option value="{{ $supplier->id }}" @selected($booking?->supplier_id == $supplier->id)>{{ $supplier->company_name }}</option>@endforeach</select></label>
<label class="col">Status<select class="form-control" name="status">@foreach(['pending','confirmed','cancelled'] as $value)<option @selected($booking?->status == $value)>{{ $value }}</option>@endforeach</select></label>
<label class="col">Reference<input class="form-control" name="reference" maxlength="150" value="{{ $booking?->reference }}"></label></div>
<div class="row"><label class="col">Currency<select name="currency" class="form-control">@foreach(['INR','USD','AED','EUR','GBP','NZD','CAD','AUD'] as $currency)<option @selected($booking?->currency == $currency)>{{ $currency }}</option>@endforeach</select></label>
<label class="col">Supplier cost<input class="form-control" name="amount" type="number" min="0" step="0.01" value="{{ number_format(($booking?->amount_minor ?? 0) / 100, 2, '.', '') }}" required></label>
<label class="col">Paid to supplier<input class="form-control" name="paid" type="number" min="0" step="0.01" value="{{ number_format(($booking?->paid_minor ?? 0) / 100, 2, '.', '') }}" required></label></div>
<label class="d-block">Remarks<textarea class="form-control" name="remarks" maxlength="5000">{{ $booking?->remarks }}</textarea></label><button class="btn btn-primary">Save booking</button></form>
@endif</div></div>
@endforeach
@empty<p>No services on an accepted proposal yet.</p>@endforelse</div>
