@extends('layouts.app')
@section('content')
<div class=wrapper>
    <div class=container-fluid>
        <div class=main-content>
            <div class=page-content>
                <div class=newboxheading>
                    <div class=newhead>Collection Report<div class=newoptionmenu>
                            <form action="" enctype=multipart/form-data>
                                <table border=0 cellpadding=0 cellspacing=0>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control hasDatepicker" id=startDate name=startDate
                                                    readonly placeholder=From value=30-08-2026 style=width:130px></td>
                                            <td style=padding-left:5px><input class="form-control hasDatepicker"
                                                    id=endDate name=endDate readonly placeholder=From value=29-09-2026
                                                    style=width:130px></td>
                                            <td style=padding-left:5px><input name=keyword class=form-control
                                                    placeholder="query, payment, transection id" style=width:150px>
                                                <input name=page type=hidden><input name=ga type=hidden
                                                    value=collectreport>
                                            </td>
                                            <td style=padding-left:5px><select name=transectionType class=form-control
                                                    style=width:130px>
                                                    <option value="">All Type</option>
                                                    <option value=Online>Online</option>
                                                    <option value=Cash>Cash</option>
                                                    <option value=Checks>Checks</option>
                                                    <option value=NEFT>NEFT</option>
                                                    <option value=Mobile&nbsp;Payment>Mobile&nbsp;Payment</option>
                                                </select></td>
                                            <td style=padding-left:5px><select name=status class=form-control
                                                    style=width:130px>
                                                    <option value="">All Status</option>
                                                    <option value=1>Paid</option>
                                                    <option value=2>Scheduled</option>
                                                    <option value=3>Overdue</option>
                                                </select> </td>
                                            <td style=padding-left:5px><button type=submit
                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                    style="padding:6px 10px"><i class="fa fa-search" aria-hidden=true></i>
                                                    Search</button></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-12 col-xl-12" style=padding-top:45px>
                        <div class=card style=min-height:500px;overflow:hidden>
                            <div class=card-body style=padding:0>
                                <div style=padding:10px>
                                    <table width=100% border=0 cellpadding=0 cellspacing=0>
                                        <tbody>
                                            <tr>
                                                <td width=33% align=left valign=top>
                                                    <div class=statusbox style=background-color:#655be6>
                                                        <div style=margin-bottom:0;font-size:30px;line-height:38px>
                                                            ₹ 0
                                                        </div>Total Amount
                                                    </div>
                                                </td>
                                                <td width=33% align=left valign=top>
                                                    <div class=statusbox style=background-color:#0cb5b5>
                                                        <div style=margin-bottom:0;font-size:30px;line-height:38px>₹ 0
                                                        </div>
                                                        Received
                                                    </div>
                                                </td>
                                                <td width=33% align=left valign=top>
                                                    <div class=statusbox style=background-color:#e45555;margin-right:0>
                                                        <div style=margin-bottom:0;font-size:30px;line-height:38px>₹ 0
                                                        </div>Pending
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <table class="table table-hover mb-0" style="border:1px solid #ddd">
                                    <thead>
                                        <tr>
                                            <th>Query ID </th>
                                            <th>Payment ID </th>
                                            <th>Transection ID</th>
                                            <th>Client</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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
