@extends('layouts.app')
@section('content')
</div>
<div class="wrapper" style="padding:15px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Created</th>
                <th width="120">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($itineraries as $row)
                <tr>
                    <td>
                        <strong>{{ $row->name }}</strong><br>
                        <small>
                            ID: {{ $row->id }} -
                            {{ $row->destinations->pluck('name')->implode(', ') }}
                        </small>
                    </td>

                    <td>₹ {{ number_format($row->website_cost ?? 0) }}</td>

                    <td>
                        {{ $row->addedBy->name ?? '-' }}<br>
                        <small>{{ $row->created_at?->format('d/m/Y') }}</small>
                    </td>

                    <td>
                        <button type="button"
                            class="btn btn-info btn-sm"
                            onclick="insertItinerary('{{ route('itineraries.insert.to.query', $row->id) }}', '{{ $queryId }}')">
                            <i class="fa fa-plus"></i> Select
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function insertItinerary(url, queryId) {
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            queryId: queryId
        },
        success: function (response) {
            if (response.status) {
                window.location.reload();
            } else {
                alert(response.message || 'Something went wrong.');
            }
        },
        error: function (xhr) {
            alert(xhr.responseJSON?.message || 'Unable to insert itinerary.');
        }
    });
}
</script>
@endsection
