@extends('layouts.app')
@section('content')
    </div>
    <style>
        .table td,
        .table th {
            vertical-align: top;
        }

        .statusbox {
            margin-right: 5px;
            padding: 10px;
            text-align: center;
            background-color: #000000;
            font-size: 13px;
            color: #fff;
            border-radius: 4px;
            text-transform: uppercase;
        }

        .notes {
            font-size: 12px;
            background-color: #FFFFCC;
            border: 1px solid #FFCC33;
            padding: 0px 5px;
            color: #ff6a00;
            font-weight: 600;
            float: left;
            margin-top: 2px;
            border-radius: 2px;
        }
    </style>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="newboxheading">
                        <div class="newhead">Queries
                            <div class="newoptionmenu">
                                <div>
                                    <a onclick="$('.searchquerymain').toggle();">
                                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray" style="margin-bottom:10px;">
                                            <i class="fa fa-filter" aria-hidden="true"></i> Filter
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray hideinmobile" data-toggle="dropdown" aria-expanded="false" style="margin-bottom:10px;">
                                        Options <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" style="position: absolute; transform: translate3d(1222px, 224px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start">
                                        <a class="dropdown-item" style="cursor:pointer;" href="client-Import.xls" target="_blank">Download Excel Format</a>
                                        <a class="dropdown-item" style="cursor:pointer;" onclick="loadpop('Import',this,'400px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=importFBleads">Import Excel</a>
                                        <a class="dropdown-item" style="cursor:pointer;" href="http://localhost:8081/crmreview/exportQuery.php?startDate=&endDate=&statusid=&searchcity=&searchsource=&searchconfirmproposal=&searchusers=&keyword=&keyword=" target="_blank">Export Data</a>
                                    </div>
                                </div>
                                <div>
                                    <a href="getloadfromdocs.php" target="actoinfrm">
                                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray" style="margin-bottom:10px;" onclick="$('#loadleads').show();">
                                            Load Leads <img src="loadleads.webp" style="width:16px;display:none;" id="loadleads" />
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <a onclick="openSidebar('Create Query','{{ route('queries.create') }}')">
                                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" style="margin-bottom:10px;">Add Query</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xl-12" style="margin-left: 5px; margin-top: 35px;">
                            <div class="card"
                                style="min-height:500px;    border-radius: 0px; margin-bottom:0px; background-color:transparent;">
                                <div class="card-body" style="padding:0px;">

                                    <div class="hideinmobile searchquerymain"
                                        style="  margin-bottom: 10px; float: left; width: 100%; border-top: 1px solid #dee2e6; border-bottom: 2px solid #dee2e6; background-color: #f3f3f3; padding: 8px;">
                                        <div class="row" style="margin-right: 0px; margin-left: 0px;">
                                            <div class="col-md-3 col-xl-3 ">
                                                <form action="" method="get" enctype="multipart/form-data"
                                                    class="querytabsleadsearch ">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td><input type="text" class="form-control" id="startDate"
                                                                    name="startDate" readonly="" placeholder="From"
                                                                    value="" style="width:130px;"></td>
                                                            <td style="padding-left:5px;"><input type="text"
                                                                    class="form-control" id="endDate" name="endDate"
                                                                    readonly="" placeholder="From" value=""
                                                                    style="width:130px;"></td>
                                                            <td style="padding-left:5px;"><input type="text"
                                                                    name="keyword" class="form-control"
                                                                    placeholder="Search by ID, name, email, mobile"
                                                                    value="" style=" width:250px;">
                                                                <input name="page" type="hidden" value="1" /><input
                                                                    name="ga" type="hidden" value="query" />
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <select name="searchcity" class="form-control"
                                                                    style="width:160px;">
                                                                    <option value="">All Destinations</option>
                                                                    <option value="7942">Affligem</option>
                                                                    <option value="33466">Abramut</option>
                                                                    <option value="37541">Singapore</option>
                                                                </select>
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <select name="searchusers" class="form-control"
                                                                    style="width:130px;">
                                                                    <option value="">All Users</option>
                                                                    <option value="4021">Zuhair Abbas </option>
                                                                    <option value="4070">Yuvraj Singh</option>
                                                                    <option value="4061">Yatin y</option>
                                                                    <option value="4053">Yashika Sharma</option>
                                                                    <option value="4074">Adarsh Ojha</option>
                                                                </select>
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <select name="searchsource" class="form-control"
                                                                    id="searchsource" style="width:140px;">
                                                                    <option value="">All Source</option>
                                                                    <option value="1">Walk-In</option>
                                                                    <option value="2">Website</option>
                                                                    <option value="18">WhatsApp</option>
                                                                </select>
                                                            </td>
                                                            <td style="padding-left:5px;"><button type="submit"
                                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                                    style="padding: 6px 10px;"><i class="fa fa-search"
                                                                        aria-hidden="true"></i> Search</button></td>
                                                            <td style="padding-left:5px;"><a
                                                                    href="display.html?ga=query"><button type="button"
                                                                        class="btn btn-secondary btn-lg waves-effect waves-light"
                                                                        style="padding: 6px 10px;">All</button></a></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="margin-bottom: 0px; padding: 10px; padding-right: 20px;"
                                        class="querytabslead">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="6%" align="left" valign="top">
                                                    <a href="{{ route('queries.index') }}">
                                                        <div class="statusbox" style="background-color:#000;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                <div class="ripple" style="animation-delay: 0s"></div>
                                                               {{ $totalQueries }}
                                                            </div>Total
                                                        </div>
                                                    </a>
                                                </td>
                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>1]) }}">
                                                        <div class="statusbox" style="background-color:#655be6;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                {{ $statusCounts[1] ?? 0 }}
                                                            </div>New
                                                        </div>
                                                    </a>
                                                </td>
                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>2]) }}">
                                                        <div class="statusbox" style="background-color:#0cb5b5;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[2] ?? 0 }}</div>Active
                                                        </div>
                                                    </a>
                                                </td>

                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>3]) }}">
                                                        <div class="statusbox" style="background-color:#0f1f3e;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[3] ?? 0 }}</div>No Connect
                                                        </div>
                                                    </a>
                                                </td>
                                                <td width="6%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>11]) }}">
                                                        <div class="statusbox" style="background-color:#0f1f3e;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[11] ?? 0 }}</div>No Revert
                                                        </div>
                                                    </a>
                                                </td>
                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>4]) }}">
                                                        <div class="statusbox" style="background-color:#e45555;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[4] ?? 0 }}</div>Hot Lead
                                                        </div>
                                                    </a>
                                                </td>
                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>9]) }}">
                                                        <div class="statusbox" style="background-color:#FF6600;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[9] ?? 0 }}</div>Follow Up
                                                        </div>
                                                    </a>
                                                </td>
                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>8]) }}">
                                                        <div class="statusbox" style="background-color:#cc00a9;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[8] ?? 0 }}</div>Proposal Sent
                                                        </div>
                                                    </a>
                                                </td>

                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>5]) }}">
                                                        <div class="statusbox" style="background-color:#46cd93;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[5] ?? 0 }}</div>Confirmed
                                                        </div>
                                                    </a>
                                                </td>
                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>6]) }}">
                                                        <div class="statusbox" style="background-color:#6c757d;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[6] ?? 0 }}</div>Cancelled
                                                        </div>
                                                    </a>
                                                </td>

                                                <td width="10%" align="left" valign="top">
                                                    <a
                                                        href="{{ route('queries.index',['statusid'=>7]) }}">
                                                        <div class="statusbox"
                                                            style="background-color:#f9392f; margin-right:0px;">
                                                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                                 {{ $statusCounts[7] ?? 0 }}</div>
                                                            Invalid
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <form action="frmaction.html" method="post" enctype="multipart/form-data" name="addeditfrm" target="actoinfrm" id="addeditfrm" style="padding:0px 10px 20px;">
                                        <div id="bulkassign"
                                            style="display:none;padding: 5px 2px; background-color: #f0f0f0; border-bottom: 2px solid #ddd; border-radius: 3px; margin-bottom: 10px;">
                                            <table border="0" cellspacing="0" cellpadding="5">
                                                <tr>
                                                    <td style="font-size:13px;"><input type="checkbox" id="ckbCheckAll"
                                                            style="width: 16px; height: 16px;" /></td>
                                                    <td style="font-size:13px;">Select All&nbsp;</td>
                                                    <td>
                                                        <select id="assignToPerson" name="assignToPerson"
                                                            class="form-control"
                                                            style="padding: 5px; font-size: 12px; height: 30px; line-height: 20px; color: #000; font-weight: 600;"
                                                            autocomplete="off">
                                                            <option value="0">Assign To</option>
                                                            <option value="4041"> Aaron AK</option>
                                                            <option value="4036"> Abby ak</option>
                                                            <option value="4074">Adarsh Ojha</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="submit" id="savingbutton" class="btn btn-primary"
                                                            onclick="this.form.submit(); this.value='Saving...';"
                                                            style="float:right;padding: 3px 10px;">
                                                            Save
                                                        </button>
                                                    </td>
                                                    <td><input autocomplete="false" name="action" type="hidden"
                                                            id="action" value="bulkassignquery" /></td>
                                                </tr>
                                            </table>
                                        </div>
                                        @forelse($queries as $query)
                                            <div class="querylistbox">
                                                <div class="qtp">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="3%" align="left" valign="top"
                                                                    style="padding-right:10px;"><input type="checkbox"
                                                                        name="assignall[]" class="checkBoxClass"
                                                                        id="assignqury" value="127368"
                                                                        onclick="selectedfun();"
                                                                        style="width: 16px; height: 16px;"> </td>
                                                                <td width="14%" align="left" valign="top"
                                                                    style="padding-right:20px;">
                                                                    <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;">
                                                                        <a href="{{ route('queries.show',$query->id) }}">{{ $query->id}}</a>
                                                                    </div>
                                                                  @if($query->statusId == 1)
                                                                    <span class="badge badge-primary">New Lead</span>

                                                                    @elseif($query->statusId == 2)
                                                                    <span class="badge badge-info">Active</span>

                                                                    @elseif($query->statusId == 3)
                                                                    <span class="badge badge-warning">Follow Up</span>

                                                                    @elseif($query->statusId == 4)
                                                                    <span class="badge badge-blue">Proposal Sent</span>

                                                                    @elseif($query->statusId == 5)
                                                                    <span class="badge badge-secondary">Negotiation</span>

                                                                    @elseif($query->statusId == 6)
                                                                    <span class="badge badge-success">Confirmed</span>

                                                                    @elseif($query->statusId == 7)
                                                                    <span class="badge badge-danger">Cancelled</span>

                                                                    @elseif($query->statusId == 8)
                                                                    <span class="badge badge-dark">On Hold</span>

                                                                    @elseif($query->statusId == 9)
                                                                    <span class="badge badge-success">Completed</span>

                                                                    @elseif($query->statusId == 10)
                                                                    <span class="badge badge-danger">Lost</span>

                                                                    @elseif($query->statusId == 11)
                                                                    <span class="badge badge-dark">Closed</span>

                                                                    @endif
                                                                </td>
                                                                <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">
                                                                     {{ $query->submitName}}   {{ $query->name }}
                                                                    </div>
                                                                    <div style="font-size:13px; color:#686868;">{{ $query->mobile }}
                                                                    </div>
                                                                </td>
                                                                <td width="17%" align="left" valign="top"
                                                                    style="padding-right:20px;">
                                                                    <div style="font-size:13px; color:#686868;">{{ $query->mobile }}
                                                                    </div>
                                                                </td>
                                                                <td width="17%" align="left" valign="top"
                                                                    style="padding-right:20px;">
                                                                    <div style="font-size:13px; line-height: 16px;">
                                                                        <span style="color:#686868;">Origin<br />
                                                                        </span><span
                                                                            style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">
                                                                            <span class="badge badge-boxed  badge-soft-success"
                                                                                style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">{{ $query->origin }}</span>
                                                                        </span></div>
                                                                    <div style="font-size:13px; line-height: 16px;"><span
                                                                            style="color:#686868;">Destination<br />
                                                                        </span><span
                                                                            style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">
                                                                            <span class="badge badge-boxed  badge-soft-success"
                                                                                style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">{{ $query->destination }}</span>
                                                                        </span></div>
                                                                </td>
                                                                <td width="15%" align="left" valign="top"
                                                                    style="padding-right:20px;">
                                                                    <div
                                                                        style="font-size:12px; line-height: 16px; margin-bottom:3px;">
                                                                        <span style="color:#686868;"><i class="fa fa-calendar"
                                                                                aria-hidden="true"></i></span> {{ $query->startDate }}</div>
                                                                    <div style="font-size:12px; line-height: 16px;"><span
                                                                            style="color:#686868;">Till</span> {{ $query->endDate }}</div>
                                                                </td>
                                                                <td align="left" valign="top"
                                                                    style="font-size:13px; line-height: 16px;">No Task</span>

                                                                    <div
                                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;">
                                                                        <i class="fa fa-sticky-note" aria-hidden="true"
                                                                            style=" color:#ffa500;"></i> &nbsp;package send
                                                                    </div>
                                                                </td>
                                                                <td width="13%" align="right" valign="middle">
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Option">
                                                                        <a href="display.html?ga=query&view=1&id=127368"><button
                                                                                type="button" class="btn btn-secondary"><i
                                                                                    class="fa fa-eye"
                                                                                    aria-hidden="true"></i></button></a>
                                                                        <a target="_blank"
                                                                            href="https://api.whatsapp.com/send?text=Hi&phone=+918892078092"><button
                                                                                type="button" class="btn btn-secondary"><i
                                                                                    class="fa fa-whatsapp"
                                                                                    aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127368"
                                                                            onclick="loadpop('Compose Mail',this,'900px')"
                                                                            data-toggle="modal"
                                                                            data-target=".bs-example-modal-center"><button
                                                                                type="button" class="btn btn-secondary"><i
                                                                                    class="fa fa-envelope-o"
                                                                                    aria-hidden="true"></i></button></a>
                                                                        <a onclick="openSidebar('Edit Query','{{ route('queries.edit',$query->id) }}')"><button
                                                                                type="button" class="btn btn-secondary"><i
                                                                                    class="fa fa-pencil"
                                                                                    aria-hidden="true"></i></button></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="qbt">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="3%" align="center" valign="top" style="padding-right:10px;"> </td>
                                                                <td width="14%" align="left" valign="top"
                                                                    style="padding-right:20px;">
                                                                    <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                                                    <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                                                                </td>
                                                                <td width="20%" align="left" valign="top"
                                                                    style="padding-right:20px;">
                                                                    <div style="color:#303030; font-size:12px; margin-bottom:3px;">
                                                                       {{ $query->email }}
                                                                    </div>
                                                                    <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                                                                </td>
                                                                <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="color:#303030; font-size:12px; margin-bottom:3px;">
                                                                        Travellers</div>
                                                                    <div style="font-size:13px; line-height: 16px;">{{ $query->adult}} <span style="color:#686868; font-size:11px;">Adult</span>
                                                                        {{ $query->child }} <span style="color:#686868; font-size:11px;">Clild</span>
                                                                        {{ $query->infant}} <span style="color:#686868; font-size:11px;">Infant</span>
                                                                    </div>
                                                                </td>
                                                                <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="color:#303030; font-size:12px; margin-bottom:3px;">
                                                                        Assigned to
                                                                    </div>
                                                                    <div style="font-size:12px;"><select id="assignTo127368"
                                                                            name="assignTo127368" class="form-control"
                                                                            style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;"
                                                                            autocomplete="off"
                                                                            onchange="changeAssignTo('127368');">
                                                                            <option value="1">Assign to me</option>
                                                                            <option value="4074">Adarsh Ojha</option>
                                                                            <option value="4069">Akash Shrestha</option>
                                                                            <option value="4021">Zuhair Abbas </option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td align="left" valign="top">
                                                                    <div style="font-size:12px; line-height: 16px; margin-bottom:3px;">
                                                                        <span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span>
                                                                    </div>
                                                                    <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">
                                                                      {{ $query->created_at->format('d/m/Y - h:i A') }}
                                                                    </div>
                                                                </td>
                                                                <td width="13%" align="left" valign="top">
                                                                    <div style="font-size:12px; line-height: 16px; margin-bottom:3px;">
                                                                        <span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span>
                                                                    </div>
                                                                    <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">
                                                                       {{ $query->updated_at->format('d/m/Y - h:i A') }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="viewpackageheader" onclick="$('#pro27368').toggle();">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal
                                                    (2)
                                                </div>
                                                <div class="proposallistouter" style="display:none;" id="pro27368">
                                                    <a href="display.html?ga=itineraries&view=1&id=109047">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;{{ $query->submitName}}   {{ $query->name }}
                                                        Trail's To Malaysia 5N/6D (&#8377; 98,679 ) &nbsp; </a>
                                                    <a href="display.html?ga=itineraries&view=1&id=109046">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Mr. Ajay
                                                        Trail's To Malaysia 4N/5D (&#8377; 51,400 ) &nbsp; </a>
                                                </div>
                                            </div>
                                        @empty
                                        <tr>
                                        <td colspan="6" class="text-center">No records found</td>
                                        </tr>
                                        @endforelse
                                    </form>
                                   <div class="mt-3 pageingouter">
                                        {{ $queries->links() }}
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
