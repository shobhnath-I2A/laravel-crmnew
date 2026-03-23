@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper" style="margin-left: 15px;margin-right: 15px;">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title cardtitle">Destinations
                                        <form action="{{ route('destinations.index') }}" class="newsearchsecform" style="left:54px;" method="get"
                                            enctype="multipart/form-data">
                                            <input type="text" name="keyword" class="form-control newsearchsec"
                                                placeholder="Search by name" value="{{ request('keyword') }}" style="margin-top: 3px;">
                                        </form>
                                        <div class="float-right">
                                            <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                                                onclick="openPopup('Add Destinations','{{ route('destinations.create') }}')"
                                                data-backdrop="static">Add Destination</button>
                                        </div>
                                    </h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th width="32%">Name</th>
                                                    <th width="15%">Status</th>
                                                    <th width="1%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($destinations as $destination)
                                                    <tr>
                                                        <td width="35%" style="cursor:pointer;" onclick="openPopup('Update Destinations', '{{ route('destinations.edit', $destination->id ) }}')">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                class="addbynewbadges">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $destination->name ?? '' }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="1%" align="left">
                                                            <span class="badge {{ $destination->status == 1 ? 'badge-success' : 'badge-danger' }}">{{ $destination->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                        </td>
                                                        <td width="1%">
                                                            <a class="dropdown-item neweditpan" onclick="openPopup('Update Destinations', '{{ route('destinations.edit', $destination->id ) }}')">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3 pageingouter">
                                        <div style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                            Total Records: <strong>{{ $destinationCount }}</strong></div>
                                        <div class="d-flex justify-content-end">
                                            {{ $destinations->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
