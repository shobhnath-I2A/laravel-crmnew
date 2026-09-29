@extends('layouts.app')
@section('content')
<div class=wrapper>
    <div class=container-fluid>
        <div class=main-content>
            <div class=page-content>
                <div class=newboxheading>
                    <div class=newhead>MIS Report<div class=newoptionmenu>
                            <form action="" enctype=multipart/form-data>
                                <table border=0 cellpadding=0 cellspacing=0>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control hasDatepicker" id=startDate name=startDate
                                                    readonly placeholder=From value=01-09-2026 style=width:130px></td>
                                            <td style=padding-left:5px><input class="form-control hasDatepicker"
                                                    id=endDate name=endDate readonly placeholder=From value=29-09-2026
                                                    style=width:130px></td>
                                            <td style=padding-left:5px><button type=submit
                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                    style="padding:6px 10px"><i class="fa fa-search" aria-hidden=true></i>
                                                    Search</button></td>
                                            <td><button type=button
                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                    style="padding:6px 10px;margin-left:10px" onclick=fnExcelReport()><i
                                                        class="fa fa-download" aria-hidden=true></i> Export
                                                    Report</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type=hidden name=ga value=misreport>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-12 col-xl-12" style=padding-top:32px>
                        <div class=card style=overflow:hidden>
                            <div class=card-body style=padding:0>
                                <div class=table-responsive>
                                    <table class="table table-hover mb-0"
                                        style="border:1px solid #ddd;display:1none!important" id=headerTable>
                                        <thead>
                                            <tr>
                                                <th>Sr. </th>
                                                <th>Booked By </th>
                                                <th>Query Date </th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th> ID </th>
                                                <th>Booking Date </th>
                                                <th>Client </th>
                                                <th>Destination</th>
                                                <th>No. of Pax </th>
                                                <th>Selling Cost </th>
                                                <th>Flight Cost </th>
                                                <th>Hotel Cost </th>
                                                <th>Tour Cost </th>
                                                <th>Visa Cost </th>
                                                <th>Cruise Cost </th>
                                                <th>TCS (%) </th>
                                                <th>Total Cost </th>
                                                <th>Gross Profit </th>
                                                <th>GST</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="text-align:center;padding:40px 0;font-size:14px;color:#999">No Data </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
