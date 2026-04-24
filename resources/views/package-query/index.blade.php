@extends('layouts.app')
@section('content')
</div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="newboxheading">
                        <div class="newhead">Leads
                            <div class="newoptionmenu">
                                <div>
                                    <a onclick="$('.searchquerymain').toggle();"><button type="button"
                                            class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray"
                                            style="margin-bottom:10px;">
                                            <i class="fa fa-filter" aria-hidden="true"></i> Filter</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xl-12" style="margin-left: 5px; margin-top: 35px;">
                            <div class="card" style="min-height:500px;">
                                <div class="card-body" style="padding:0px;">

                                    <div class="hideinmobile"
                                        style="  margin-bottom: 10px; float: left; width: 100%; border-top: 1px solid #dee2e6; border-bottom: 2px solid #dee2e6; background-color: #f3f3f3; padding: 8px;">
                                        <div class="row" style="margin-right: 0px; margin-left: 0px;">
                                            <div class="col-md-3 col-xl-3 ">
                                                <form action="" method="get" enctype="multipart/form-data"
                                                    class="querytabsleadsearch" novalidate="novalidate">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="vertical-align: top;"><input type="text"
                                                                        class="form-control hasDatepicker" id="startDate"
                                                                        name="startDate" readonly="" placeholder="From"
                                                                        value=""
                                                                        style="width: 130px;vertical-align: top;"></td>
                                                                <td style="padding-left: 5px; vertical-align: top;"><input
                                                                        type="text" class="form-control hasDatepicker"
                                                                        id="end_date" name="endDate" readonly=""
                                                                        placeholder="To" value=""
                                                                        style="width: 130px;"></td>
                                                                <td style="padding-left: 5px;vertical-align: top;">
                                                                    <input type="text" name="keyword"
                                                                        class="form-control"
                                                                        placeholder="Search by email, mobile" value=""
                                                                        style="width: 250px;">
                                                                    <input name="page" type="hidden"
                                                                        value=""><input name="ga" type="hidden"
                                                                        value="package_query">
                                                                </td>
                                                                <td style="padding-left: 5px;">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary btn-lg waves-effect waves-light"
                                                                        style="padding: 6px 10px;"><i class="fa fa-search"
                                                                            aria-hidden="true"></i> Search</button>
                                                                </td>
                                                                <td style="padding-left: 5px;">
                                                                    <a href="display.html?ga=package_query"><button
                                                                            type="button"
                                                                            class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray"
                                                                            style="padding: 6px 10px;">Reset
                                                                            Filter</button></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="frmaction.html" method="post" enctype="multipart/form-data"
                                        name="addeditfrm" target="actoinfrm" id="addeditfrm">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th width="5%">Enquiry No</th>
                                                    <th width="5%">Portal</th>
                                                    <th width="5%">Source</th>
                                                    <th width="5%">Campaign</th>
                                                    <th width="5%">Name</th>
                                                    <th width="5%">Email</th>
                                                    <th width="1%">Price</th>
                                                    <th width="1%">Rating</th>
                                                    <th width="5%">From City</th>
                                                    <th width="5%">To City</th>
                                                    <th width="5%">Phone Number</th>
                                                    <th width="5%">No Pax</th>
                                                    <th width="5%">Travel Month</th>
                                                    <th width="5%">Date</th>
                                                    <th width="1%">Status</th>
                                                    <th width="1">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($leadQuery as $lead)
                                                    <tr>
                                                        <td>{{ $lead->id ?? '' }}</td>
                                                        <td>{{ $lead->portal_id ?? '' }}</td>
                                                        <td>{{ $lead->source ?? '' }}</td>
                                                        <td>{{ $lead->campaign??'' }}</td>
                                                        <td>{{ $lead->full_name ?? '' }}</td>
                                                        <td>{{ $lead->email ?? '' }}</td>
                                                        <td>{{ $lead->budget ?? 0 }}</td>
                                                        <td>0</td>
                                                        <td>{{ $lead->from_city ?? '' }}</td>
                                                        <td>{{ $lead->to_city ?? '' }}</td>
                                                        <td>{{ $lead->phone_code??'' }}{{ $lead->phone ?? '' }}</td>
                                                        <td>{{ $lead->total_pax??'' }}</td>
                                                        <td width="1%">{{ $lead->travel_month??'' }}</td>
                                                        <td width="1%">{{ $lead->created_at ?? '' }} </td>
                                                        <td width="1%">{{ $lead->status ?? '' }}</td>
                                                        <td width="1%">
                                                            <div class="">

                                                                <div class="dropdown-menu" id="actionsID"
                                                                    style="border: 1px solid #fd9595;">
                                                                    <div class="leg">ACTIONS</div>
                                                                    <a class="dropdown-item" target="_blank"
                                                                        onclick="createquerysss(19701)"
                                                                        style="float:right;">Convert</a>
                                                                    <a href="javascript:void(0);" class="dropdown-item"
                                                                        onclick="confirmCancel(19701)">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                       </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                    <div class="mt-3 pageingouter">
                                        <div style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                            Total Records: <strong>{{ $leadQueryCount }}</strong></div>
                                        <div class="d-flex justify-content-end">
                                            {{ $leadQuery->links() }}
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
