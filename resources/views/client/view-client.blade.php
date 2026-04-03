@extends('layouts.app')
@section('content')
</div>
    <div class="wrapper">
        <div class="dashboardleft" style=" background-color:#f9fbfc;border-right: 1px solid #ddd6 !important;">
            <div class="dashboardleftinnter">
                <h4 class="card-title" style=" margin-top:0px; font-size: 18px; font-weight:700;">Client Account</h4>

            </div>
            <div class="listleftmenulink">
                <a href="#clientsec">Client Details</a>
                <a href="#followupsec">Followup's</a>
                <a href="#querysec">Queries</a>
                <a href="#invoicesec">Invoice</a>
                <a href="#paymentsec">Payment History</a>
                <a href="#documentsec">Documents</a>
                <a href="#vendorPayment">Vendor Payment</a>
            </div>
        </div>
        <div class="container-fluid" style="padding-left:300px !important;">
            <div class="main-content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12 col-xl-12" id="displayprofile">
                            <div class="systemcard">

                                <div
                                    style=" background-color:#FFFFFF; padding-bottom:20px; border-bottom:1px solid #ececec; position:relative;">
                                    <div class="float-right">
                                        <a href="{{ route('clients.index') }}"
                                            style="position: absolute; right: 50px; top: 10px;"><button type="button"
                                                class="btn btn-primary btn-lg waves-effect waves-light"
                                                style="margin-bottom:10px;">Back</button></a>
                                    </div>

                                    <a class="dropdown-item neweditpan"
                                        style="cursor:pointer; position:absolute; right:0px; top:10px;z-index: 1;background-color: #c6e5f5;"
                                       onclick="openSidebar('Edit Client','{{ route('clients.edit', $client->id) }}')"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></a>

                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="profileuserbadges" style="line-height: 56px;"> {{ strtoupper(substr($client->first_name ?? '', 0, 1)) }}</div>
                                                </td>
                                                <td width="95%" style=" position:relative;">
                                                    <div style="margin-bottom:0px; font-size:16px; font-weight:700;">
                                                        {{ $client->submit_name ?? '' }} {{ $client->first_name ?? '' }} {{ $client->last_name ?? '' }}
                                                    </div>
                                                    <div style="margin-bottom:0px; font-size:14px; font-weight:400;">Type:
                                                        B2C</div>
                                                    <div style="margin-bottom:0px; font-size:13px; font-weight:400;">
                                                        Created: <strong>{{ \Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</strong></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="clientsec">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px; margin-top:20px;">Client
                                        Information</div>
                                    <table border="0" cellpadding="5" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td style="padding-right:100px;">Mobile</td>
                                                <td>{{ $client->mobile_code?? '' }}{{ $client->mobile ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $client->email ?? '' }}</td>
                                            </tr>
                                            <tr>
                                              <td>Mobile 2</td>
                                                <td>
                                                    @if(!empty($client->mobile2))
                                                        {{ $client->mobile_code2 ?? '' }} {{ $client->mobile2 }}
                                                    @else
                                                        <span class="lightgraytext">Not Provided</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email 2 </td>
                                                <td>
                                                    @if(!empty($client->email2))
                                                        {{ $client->email2 }}
                                                    @else
                                                        <span class="lightgraytext">Not Provided</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td>{{ $client->city->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{ $client->address ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth</td>
                                                <td>{{ \Carbon\Carbon::parse($client->dob)->format('d-m-Y') ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Marriage Anniversary</td>
                                                <td>{{ \Carbon\Carbon::parse($client->marriage_anniversary)->format('d-m-Y') ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="systemcard" id="followupsec">
                                <div style=" background-color: #FFFFFF; padding-bottom: 10px; position: relative; ">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px;">Followup's</div>
                                </div>
                                <table class="table table-hover mb-0" style="border:1px solid #ddd;">
                                    <thead>
                                        <tr>
                                            <th width="5%" align="center">&nbsp;</th>
                                            <th>Query ID </th>
                                            <th>Details</th>
                                            <th>Reminder</th>
                                            <th>Status</th>
                                            <th>Assigned</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div style="padding:20px; text-align:center;">No Followup Found</div>
                            </div>
                            <div class="systemcard" id="querysec">
                                <div style=" background-color: #FFFFFF; padding-bottom: 10px; position: relative; ">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px; position:relative;">
                                        Queries

                                        <a href="#" onclick="createqueryfromclient('125615');"
                                            style="position:absolute; right:0px;"><button type="button"
                                                class="btn btn-secondary btn-lg waves-effect waves-light"
                                                style="margin-bottom: 10px; border-radius:20px; padding: 5px 15px; width: 100%;text-align:left;"><i
                                                    class="fa fa-plus" aria-hidden="true"></i> Add Query</button></a>
                                    </div>
                                </div>

                                <table class="table table-hover mb-0">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Destination</th>
                                            <th>
                                                <div align="left">From</div>
                                            </th>
                                            <th>
                                                <div align="left">To</div>
                                            </th>
                                            <th>Requirement</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div style="padding:20px; text-align:center;">No Query Found</div>
                            </div>
                            <div class="systemcard" id="invoicesec">
                                <div style=" background-color: #FFFFFF; padding-bottom: 10px; position: relative; ">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px;">Invoice</div>
                                </div>
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th width="10%">Amount</th>
                                            <th width="10%">Received</th>
                                            <th width="10%">Pending</th>
                                            <th width="15%">
                                                <div align="left">Date</div>
                                            </th>
                                            <th width="1%">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div style="padding:20px; text-align:center;">No Invoice Found</div>
                            </div>
                            <div class="systemcard" id="paymentsec">
                                <div style=" background-color: #FFFFFF; padding-bottom: 10px; position: relative; ">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px;">Payments</div>
                                </div>
                                <table class="table table-hover mb-0" style="border:1px solid #ddd;">
                                    <thead>
                                        <tr>
                                            <th>Query ID </th>
                                            <th>Payment ID </th>
                                            <th>Transection ID</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div style="padding:20px; text-align:center;">No Payment Found</div>
                            </div>
                            <div class="systemcard" id="documentsec">
                                <div style=" background-color: #FFFFFF; padding-bottom: 10px; position: relative;">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px;">Documents</div>
                                </div>
                                <table class="table table-hover mb-0" style="border:1px solid #ddd;">
                                    <thead>
                                        <tr>
                                            <th>Query ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Date of Birth </th>
                                            <th width="1%">
                                                <div align="right">Action</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div style="padding:20px; text-align:center;">No Document Found</div>
                            </div>

                            <div class="systemcard" id="vendorPayment">
                                <div style=" background-color: #FFFFFF; padding-bottom: 10px; position: relative;">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px;">Vendor Payment</div>
                                </div>
                                <div style="width:100%; overflow:auto;">
                                    <table class="table table-hover mb-0"
                                        style="border:1px solid #ddd; display:1none !important; font-size:12px;"
                                        id="headerTable">

                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Room Type </th>
                                                <th>From&nbsp;Date </th>
                                                <th>To&nbsp;Date </th>
                                                <th>Start&nbsp;Time </th>
                                                <th>End&nbsp;Time </th>
                                                <th>Vehicle</th>
                                                <th>Supplier</th>
                                                <th>Booking Status </th>
                                                <th>Payment Status</th>
                                                <th>Invoice Amount </th>
                                                <th>Cancellation Date </th>
                                                <th>Due Date </th>
                                                <th>Paid Amount </th>
                                                <th>Pending Amount </th>
                                                <th>Additional Profit </th>
                                                <th>GST</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="padding:20px; text-align:center;">No Document Found</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
