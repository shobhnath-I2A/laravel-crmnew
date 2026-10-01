<div class="p-3"><h3>Proposals for {{ $query->name }} — Query #{{ $query->id }}</h3>
@forelse($itineraries as $itinerary)<h4>{{ $itinerary->name }}</h4><p>{{ $itinerary->start_date }} to {{ $itinerary->end_date }} · {{ $itinerary->destinations->pluck('name')->join(', ') }}</p>
<table class="table table-bordered"><thead><tr><th>Day</th><th>Service</th><th>Hotel option</th><th>Stored service price</th></tr></thead><tbody>
@foreach($itinerary->packages as $package)@foreach($package->dayItems->where('type', '!=', 'daydetail') as $item)
@if(!$itinerary->accepted_hotel_option || $item->type !== 'accommodation' || !$item->hotelDetail?->hotel_options || $item->hotelDetail->hotel_options == $itinerary->accepted_hotel_option)
<tr><td>{{ $item->day }}</td><td>{{ $item->display_name }}</td><td>{{ $item->hotelDetail?->hotel_options ?? '—' }}</td><td>{{ $item->price ? number_format($item->price->final_price, 2) : 'Not priced' }}</td></tr>@endif
@endforeach@endforeach</tbody></table>
@empty<p>No proposals available.</p>@endforelse<p>Service prices use the existing pricing engine. The agreed invoice total is recorded separately in Billing.</p></div>
