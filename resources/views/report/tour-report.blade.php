@extends('layouts.app')
@section('content')
<div class=wrapper>
    <div class=container-fluid>
        <div class=main-content>
            <div class=page-content>
                <div class=newboxheading>
                    <div class=newhead>Tours Report<div class=newoptionmenu>
                            <form action="" enctype=multipart/form-data>
                                <table border=0 cellpadding=0 cellspacing=0>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control hasDatepicker" id=startDate name=startDate
                                                    readonly placeholder=From value=30-08-2026 style=width:130px></td>
                                            <td style=padding-left:5px><input class="form-control hasDatepicker"
                                                    id=endDate name=endDate readonly placeholder=From value=29-10-2026
                                                    style=width:130px></td>
                                            <td style=padding-left:5px><input name=keyword class=form-control
                                                    placeholder="Search by name, email, mobile" style=width:150px>
                                                <input name=page type=hidden><input name=ga type=hidden
                                                    value=travelreport>
                                            </td>
                                            <td style=padding-left:5px><select name=searchcity class=form-control
                                                    style=width:130px>
                                                    <option value="">All Destinations</option>
                                                </select></td>
                                            <td style=padding-left:5px><select name=searchusers class=form-control
                                                    style=width:130px>
                                                    <option value="">All Users</option>
                                                    <option value=4021>Zuhair Abbas </option>
                                                    <option value=4070>Yuvraj Singh</option>
                                                    <option value=4061>Yatin y</option>
                                                    <option value=4053>Yashika Sharma</option>
                                                    <option value=4025>vivek kumar</option>
                                                    <option value=4077>Vinay singh</option>
                                                    <option value=4080>vidur vs</option>
                                                    <option value=4020>Vaasu Arora </option>
                                                    <option value=4018>umesh singh</option>
                                                    <option value=4045>Tannu T</option>
                                                    <option value=4015>Swapnil Sinha</option>
                                                    <option value=4046>Suraj Sahu</option>
                                                    <option value=4050>Sunil S</option>
                                                    <option value=4012>Sujeet Kumar</option>
                                                    <option value=4048>Suchita Massey</option>
                                                    <option value=4022>Shivani Sharma</option>
                                                    <option value=4016>Saurabh Rai</option>
                                                    <option value=4017>Sajad Khan</option>
                                                    <option value=4044>Sachin Singh Maher</option>
                                                    <option value=4013>Sachin Kumar</option>
                                                    <option value=4023>Radha R</option>
                                                    <option value=4030>Prashant Kumar Sharma</option>
                                                    <option value=4043>Prashant Sharma</option>
                                                    <option value=4040>Pintu Kumar</option>
                                                    <option value=4052>Noman Ahmed </option>
                                                    <option value=4014>Nishant Kumar</option>
                                                    <option value=4054>Neha Singh </option>
                                                    <option value=4029>Mohsin Hussain</option>
                                                    <option value=4073>Mohd Arsh Khan</option>
                                                    <option value=4076>MIS i2a</option>
                                                    <option value=4071>Khushi Gupta</option>
                                                    <option value=4051>Kavita Shahi</option>
                                                    <option value=4075>Jennifer Chanu</option>
                                                    <option value=4026>Jake AS</option>
                                                    <option value=1>i2a Technologies</option>
                                                    <option value=4038>Honey hm</option>
                                                    <option value=4027>Harshita Singh</option>
                                                    <option value=4019>Gokul K</option>
                                                    <option value=4049>Ekta Shrestha</option>
                                                    <option value=4028>Daud Khan</option>
                                                    <option value=4024>Ayush Pandey</option>
                                                    <option value=4055>Ayush Gupta</option>
                                                    <option value=4072>Anjana Thakur</option>
                                                    <option value=4047>Anjali A</option>
                                                    <option value=4068>Alok Kumar</option>
                                                    <option value=4057>Akshay Chikara</option>
                                                    <option value=4069>Akash Shrestha</option>
                                                    <option value=4074>Adarsh Ojha</option>
                                                </select></td>
                                            <td style=padding-left:5px><button type=submit
                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                    style="padding:6px 10px"><i class="fa fa-search" aria-hidden=true></i>
                                                    Search</button></td>
                                            <td>&nbsp;</td>
                                            <td>
                                                <a href="display.html?ga=travelreport&amp;cal=1"><button type=button
                                                        class="btn btn-secondary btn-lg waves-effect waves-light"
                                                        style="padding:6px 10px"><i class="fa fa-calendar"
                                                            aria-hidden=true></i> Calendar View</button></a>
                                            </td>
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
                                <div style=margin-bottom:0;padding:10px>
                                    <table width=100% border=0 cellpadding=0 cellspacing=0>
                                        <tbody>
                                            <tr>
                                                <td width=33% align=left valign=top>
                                                    <div class=statusbox style=background-color:#655be6>
                                                        <div style=margin-bottom:0;font-size:30px;line-height:38px>0
                                                        </div>
                                                        Total Tours
                                                    </div>
                                                </td>
                                                <td width=33% align=left valign=top>
                                                    <div class=statusbox style=background-color:#0cb5b5>
                                                        <div style=margin-bottom:0;font-size:30px;line-height:38px>0
                                                        </div>
                                                        Compleated Tours
                                                    </div>
                                                </td>
                                                <td width=33% align=left valign=top>
                                                    <div class=statusbox style=background-color:#e45555;margin-right:0>
                                                        <div style=margin-bottom:0;font-size:30px;line-height:38px>0
                                                        </div>
                                                        Upcoming Tours
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
                                            <th>Package</th>
                                            <th>Client</th>
                                            <th>Status</th>
                                            <th>Assigned</th>
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
