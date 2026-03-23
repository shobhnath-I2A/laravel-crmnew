@extends('layouts.app')
@section('content')
</div>
<div class="wrapper">
    <div class="container-fluid">
        <div class="main-content">
            <div class="page-content">
                <div class="newboxheading">
                    <div class="newhead">Itineraries
                        <form action="{{ route('itineraries.index') }}" class="newsearchsecform" style="top: -9px; left: 76px !important;" method="get" enctype="multipart/form-data">
                            <input type="text" name="keyword" class="form-control newsearchsec" placeholder="Search by name" value="{{ request('keyword') }}" style="margin-top: 3px;" >
                        </form>
                        <div class="newoptionmenu">
                            <div>
                                <a onclick="openSidebar('Create Itinerary','{{ route('itineraries.create') }}')">
                                    <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" style="margin-bottom:10px;">Create Itinerary</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- start page title -->
                <div style="padding-top: 34px;">
                    <div class="col-md-12 col-xl-12" style="/* padding-left:0px; padding-right:0px; */">
                        <div class=" ">
                            <div class="card-body" style=" background-color:#FFFFFF;">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th align="center">Website&nbsp;Cost </th>
                                            <th align="center">
                                                <div align="center">Website</div>
                                            </th>
                                            <th>
                                                <div align="center">Duration</div>
                                            </th>
                                            <th>Price</th>
                                            <th width="12%">Date</th>
                                            <th width="1%">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itinerary as $iti)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('itineraries.show', $iti->id) }}">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="addbynewbadges">
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $iti->name ??'' }}
                                                                        <div style="color:#999999; font-size:10px; margin-top:2px;">
                                                                            ID:{{ $iti->id }} -  {{ $iti->destinations->pluck('name')->implode(', ') }} &nbsp;|&nbsp; {{ $iti->adult ?? 0 }} Adult(s) - {{ $iti->child ?? 0 }}
                                                                            Child(s)
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </a>
                                                </td>
                                                <td align="center">₹ {{ $iti->website_cost ?? 0 }} </td>
                                                <td align="center">
                                                    <div align="center">
                                                        <span class="badge badge-danger">{{ $iti->show_website ? 'Yes' : 'No' }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div align="center">{{ $iti->total_days ?? '' }} Days</div>
                                                </td>
                                                <td>₹ 11,220 </td>
                                                <td width="12%">{{ $iti->created_at }}</td>
                                                <td width="1%">
                                                    <div class="">
                                                        <button type="button" class="optionmenu" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1808px, 87px, 0px);" x-placement="bottom-start">
                                                            <div class="leg">ACTIONS</div>
                                                            <a class="dropdown-item" style="cursor:pointer;" onclick="openSidebar('Edit Query','{{ route('itineraries.edit',$iti->id) }}')" >Edit
                                                                Itinerary</a>
                                                            <a href="#" onclick="duplicatePackage('109134');" class="dropdown-item">Duplicate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3 pageingouter">
                                    <div style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                        Total Records: <strong>{{ $itineraryCount }}</strong>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $itinerary->links() }}
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
