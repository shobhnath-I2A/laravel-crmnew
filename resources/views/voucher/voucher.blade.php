<div class="card-body"><h4>Vouchers</h4>
@forelse($query->vouchers as $voucher)<p><a href="{{ route('query-workflow.voucher.print', [$query->id, $voucher->id]) }}" target="_blank" rel="noopener">Print VCH-{{ $voucher->id }} — {{ $voucher->snapshot['service'] }}</a></p>@empty<p>No vouchers issued.</p>@endforelse
<h5>Issue voucher</h5><form method="post" action="{{ route('query-workflow.voucher', $query->id) }}">@csrf
<label>Confirmed supplier booking<select class="form-control" name="booking_id" required><option value="">Select booking</option>
@foreach($query->supplierBookings->where('status', 'confirmed') as $booking)
@if(!$query->vouchers->contains('query_supplier_booking_id', $booking->id))<option value="{{ $booking->id }}">{{ $booking->supplier->company_name }} — {{ $booking->item->name }}</option>@endif
@endforeach</select></label><button class="btn btn-primary">Issue voucher</button></form></div>
