@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="newboxheading">
                        <div class="newhead">Insert Itinerary<div class="newoptionmenu">
                                <div>
                                    <a href="display.html?ga=query&amp;view=1&amp;id=127873&amp;c=2">
                                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                                            style="margin-bottom:10px;">Back to query</button>
                                    </a>
                                </div>
                                <div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="text" name="keyword" class="form-control"
                                            placeholder="Search by query ID, name, destination" value=""
                                            style="margin-top: 3px;">
                                        <input name="qid" type="hidden" value="127873">
                                        <input name="ga" type="hidden" value="selectitinerary">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
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
                            @foreach ($itineraries as $row)
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
                                       {{ trim( ($row->addedBy?->submit_name ?? '') . ' ' . ($row->addedBy?->name ?? '') . ' ' . ($row->addedBy?->last_name ?? '') ) ?: '-' }}<br>
                                        <small>{{ $row->created_at?->format('d/m/Y') }}</small>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm"
                                            onclick="insertItinerary('{{ route('itineraries.insert.to.query', $row->id) }}', '{{ $queryId }}')">
                                            <i class="fa fa-plus"></i> Select
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                success: function(response) {
                    if (response.status) {
                        window.location.reload();
                    } else {
                        alert(response.message || 'Something went wrong.');
                    }
                },
                error: function(xhr) {
                    alert(xhr.responseJSON?.message || 'Unable to insert itinerary.');
                }
            });
        }
    </script>
@endsection
