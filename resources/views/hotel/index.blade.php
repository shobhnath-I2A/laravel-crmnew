@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title cardtitle">Hotel
                                        <form action="{{ route('hotels.index') }}" class="newsearchsecform" style="left:54px;" method="get"
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
                                                onclick="openSidebar('Add Hotel','{{ route('hotels.create') }}')"
                                                data-backdrop="static">Add Hotel</button>
                                        </div>
                                    </h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th width="32%">Name</th>
                                                    <th width="10%">Category</th>
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
                                                @foreach ($hotels as $hotel)
                                                    <tr>
                                                        <td width="35%" style="cursor:pointer;"
                                                            data-toggle="modal"
                                                            data-target="#hotelModel"
                                                            data-id="{{ $hotel->id }}"
                                                            data-name="{{ $hotel->name }}"
                                                            data-category="{{ $hotel->category }}"
                                                            data-destination="{{ $hotel->destination }}"
                                                            data-image="{{ $hotel->image }}">

                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                class="addbynewbadges">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2"
                                                                            style="padding-right:10px !important;"><img
                                                                                src="{{ asset('assets/images/profilepic/16942404066793789211693635606.jpg')}}"
                                                                                width="25" height="25"></td>
                                                                        <td>{{ $hotel->name ?? '' }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="10%">
                                                            <div style="color:#FF9900;">
                                                                @for($i = 1; $i <= 5; $i++)
                                                                    @if($i <= floor($hotel->category))
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($i - $hotel->category < 1)
                                                                        <i class="fa fa-star-half-o"></i>
                                                                    @else
                                                                        <i class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </td>
                                                        <td width="15%">{{ $hotel->destination ?? '' }}</td>
                                                        <td width="1%" align="left">
                                                            <div align="center">
                                                                <a class="dropdown-item"
                                                                    style="cursor:pointer; font-size:12px; text-decoration:underline;"
                                                                    data-toggle="modal"
                                                                    data-target="#hotelModel"
                                                                    data-id="{{ $hotel->id }}"
                                                                    data-name="{{ $hotel->name }}"
                                                                    data-category="{{ $hotel->category }}"
                                                                    data-destination="{{ $hotel->destination }}"
                                                                    data-image="{{ $hotel->image }}">
                                                                    Update</a>
                                                            </div>
                                                        </td>
                                                        <td width="1%" align="left"><span
                                                                class="badge badge-success">Active</span></td>
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
                                                        <td width="12%" align="left">{{ $hotel->created_at }}</td>
                                                        <td width="1%">
                                                            <a class="dropdown-item neweditpan" onclick="openSidebar('Edit Hotel', '{{ route('hotels.edit', $hotel->id ) }}')">
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
                                            Total Records: <strong>{{ $hotelCount }}</strong></div>
                                        <div class="d-flex justify-content-end mt-3">
                                            {{ $hotels->links() }}
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
    @include('hotel.price-update')
@endsection
