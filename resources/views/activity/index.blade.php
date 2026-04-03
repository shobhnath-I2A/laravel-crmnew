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
                                    <h4 class="card-title cardtitle">Activities
                                        <form action="{{ route('activities.index') }}" class="newsearchsecform" style="left:54px;" method="get"
                                            enctype="multipart/form-data">
                                            <input type="text" name="keyword" class="form-control newsearchsec"
                                                placeholder="Search by name" value="{{ request('keyword') }}" style="margin-top: 3px;">
                                        </form>
                                        <div class="float-right">
                                            <a href="http://localhost:8081/crmreview/imports/hotel-import.xls"
                                                class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray">Download
                                                Format</a>
                                            <button type="button"
                                                class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray"
                                                onclick="loadpop('Import Hotel Excel',this,'600px')" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                popaction="action=importhotelExcel">Import File</button>
                                            <a href="http://localhost:8081/crmreview/exportHotel.php" target="_blank"
                                                class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray">Export
                                                Data</a>
                                            <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                                                onclick="openSidebar('Add Activity','{{ route('activities.create') }}')"
                                                data-backdrop="static">Add Activity</button>
                                        </div>
                                    </h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th width="32%">Name</th>
                                                    <th width="15%">Destination</th>
                                                    <th width="1%" align="left">
                                                        <div align="center">Price</div>
                                                    </th>
                                                    <th width="1%" align="left">Status</th>
                                                    <th width="15%" align="left">By</th>
                                                    <th width="12%" align="left">Date</th>
                                                    <th width="1%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($activities as $activity)
                                                    <tr>
                                                        <td width="35%" style="cursor:pointer;" onclick="openPopup('Update Price', '{{ route('activities-rates.show', $activity->id) }}')">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                class="addbynewbadges">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2"style="padding-right:10px !important;">
                                                                            <img src="{{ asset('assets/images/profilepic/16942404066793789211693635606.jpg')}}"  width="25" height="25">
                                                                        </td>
                                                                        <td>{{ $activity->name ?? '' }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%">{{ $activity->destination->name ?? '' }}</td>
                                                        <td width="1%" align="left">
                                                            <div align="center">
                                                                <a class="dropdown-item"
                                                                    style="cursor:pointer; font-size:12px; text-decoration:underline;"
                                                                    onclick="openPopup('Update Price', '{{ route('activities-rates.show', $activity->id) }}')"
                                                                    >
                                                                    Update</a>
                                                            </div>
                                                        </td>
                                                        <td width="1%" align="left">
                                                            <span class="badge {{ $activity->status == 1 ? 'badge-success' : 'badge-danger' }}">{{ $activity->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                                                        <td width="15%" align="left">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                class="addbynewbadges">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <div class="listnameicon">i</div>
                                                                        </td>
                                                                        <td>i2a</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="12%" align="left">{{ $activity->created_at }}</td>
                                                        <td width="1%">
                                                            <a class="dropdown-item neweditpan" onclick="openSidebar('Edit Activity', '{{ route('activities.edit', $activity->id ) }}')">
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
                                            Total Records: <strong>{{ $activityCount }}</strong></div>
                                        <div class="d-flex justify-content-end">
                                            {{ $activities->links() }}
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
