<option value="">Select Hotel</option>
@foreach($hotels as $hotel)
    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
@endforeach
