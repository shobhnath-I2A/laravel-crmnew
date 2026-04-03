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
                                                @foreach ($packageQuery as $pquery)
                                                    <tr>
                                                        <td>{{ $pquery->id ?? '' }}</td>
                                                        <td>{{ $pquery->portal_id ?? '' }}</td>
                                                        <td>Website</td>
                                                        <td>Test</td>
                                                        <td>fb test</td>
                                                        <td>fb.sa@i2a.co</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $pquery->phone_number ?? '' }}</td>
                                                        <td>1</td>
                                                        <td>Test</td>
                                                        <td width="1%">06 Jan 2026</td>
                                                        <td width="1%">
                                                        </td>
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
                                                <tr>
                                                    <td>19697</td>
                                                    <td>trekhops.in</td>
                                                    <td>Website</td>
                                                    <td>Campaign</td>
                                                    <td>Shubham Agrawal</td>
                                                    <td>shobhnath.s@i2a.co</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>+91-2142356326</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">19 Sep 2025</td>
                                                    <td width="1%">
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    onclick="createquerysss(19697)"
                                                                    style="float:right;">Convert</a>
                                                                <a href="javascript:void(0);" class="dropdown-item"
                                                                    onclick="confirmCancel(19697)">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19696</td>
                                                    <td>trekhops.in</td>
                                                    <td>Website</td>
                                                    <td></td>
                                                    <td>Shubham Agrawal</td>
                                                    <td>shubham.sa@i2a.co</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>+355-2142356326</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">19 Sep 2025</td>
                                                    <td width="1%">
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    onclick="createquerysss(19696)"
                                                                    style="float:right;">Convert</a>
                                                                <a href="javascript:void(0);" class="dropdown-item"
                                                                    onclick="confirmCancel(19696)">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19695</td>
                                                    <td>trekhops.in</td>
                                                    <td>Website</td>
                                                    <td></td>
                                                    <td>Shubham Agrawal</td>
                                                    <td>shubham.sa@i2a.co</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>+355-2142356326</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">19 Sep 2025</td>
                                                    <td width="1%">
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    onclick="createquerysss(19695)"
                                                                    style="float:right;">Convert</a>
                                                                <a href="javascript:void(0);" class="dropdown-item"
                                                                    onclick="confirmCancel(19695)">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19694</td>
                                                    <td>trekhops.in</td>
                                                    <td>Website</td>
                                                    <td></td>
                                                    <td>Shubham Agrawal</td>
                                                    <td>shobhnath.s@i2a.co</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>+91-2142356326</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">19 Sep 2025</td>
                                                    <td width="1%">
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    onclick="createquerysss(19694)"
                                                                    style="float:right;">Convert</a>
                                                                <a href="javascript:void(0);" class="dropdown-item"
                                                                    onclick="confirmCancel(19694)">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19061</td>
                                                    <td>trekhops.in</td>
                                                    <td>Facebook</td>
                                                    <td></td>
                                                    <td>Rakesh</td>
                                                    <td>imagerpg@yahoo.com</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>Bhavnagar</td>
                                                    <td>Bangkok</td>
                                                    <td>+919426246310</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">09 Jul 2025</td>
                                                    <td width="1%">
                                                        <span class="badge badge-success">Convert</span>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    href="https://www.trekhops.in/tour-packages/thailand">
                                                                    View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19060</td>
                                                    <td>trekhops.in</td>
                                                    <td>Facebook</td>
                                                    <td></td>
                                                    <td>Mukesh Nayak</td>
                                                    <td>kumarmukesh090988@gmail.com</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>Ranchi</td>
                                                    <td>Bangkok</td>
                                                    <td>+919934346638</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">09 Jul 2025</td>
                                                    <td width="1%">
                                                        <span class="badge badge-success">Convert</span>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    href="https://www.trekhops.in/tour-packages/thailand">
                                                                    View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19059</td>
                                                    <td>trekhops.in</td>
                                                    <td>Facebook</td>
                                                    <td></td>
                                                    <td>Nabajit Kalita</td>
                                                    <td>kalitanabajit83@gmail.com</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>Tezpur</td>
                                                    <td>Bangkok</td>
                                                    <td>+919435381536</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">09 Jul 2025</td>
                                                    <td width="1%">
                                                        <span class="badge badge-success">Convert</span>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    href="https://www.trekhops.in/tour-packages/thailand">
                                                                    View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19058</td>
                                                    <td>trekhops.in</td>
                                                    <td>Facebook</td>
                                                    <td></td>
                                                    <td>Sanam Stell</td>
                                                    <td>sk.fulbabu7551@gmail.com</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>Kolkata</td>
                                                    <td>Bangkok</td>
                                                    <td>+917551047256</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">09 Jul 2025</td>
                                                    <td width="1%">
                                                        <span class="badge badge-success">Convert</span>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    href="https://www.trekhops.in/tour-packages/thailand">
                                                                    View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19056</td>
                                                    <td>trekhops.in</td>
                                                    <td>Facebook</td>
                                                    <td></td>
                                                    <td>sanjay</td>
                                                    <td>sk3jain@gmail.com</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>bijoliya</td>
                                                    <td>Bangkok</td>
                                                    <td>+919079795358</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">09 Jul 2025</td>
                                                    <td width="1%">
                                                        <span class="badge badge-success">Convert</span>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    href="https://www.trekhops.in/tour-packages/thailand">
                                                                    View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19055</td>
                                                    <td>trekhops.in</td>
                                                    <td>Facebook</td>
                                                    <td></td>
                                                    <td>Digambar Ahire</td>
                                                    <td>digambarahire30@gmail.cim</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>Bhusawal</td>
                                                    <td>Bangkok</td>
                                                    <td>+919420113300</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">09 Jul 2025</td>
                                                    <td width="1%">
                                                        <span class="badge badge-success">Convert</span>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    href="https://www.trekhops.in/tour-packages/thailand">
                                                                    View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>

                                                <tr>
                                                    <td>19054</td>
                                                    <td>trekhops.in</td>
                                                    <td>Facebook</td>
                                                    <td></td>
                                                    <td>. BABBAL. NAYAK ...</td>
                                                    <td>babalnayak27@gmail.com</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>Fatehabad</td>
                                                    <td>Bangkok</td>
                                                    <td>+919671268277</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td width="1%">09 Jul 2025</td>
                                                    <td width="1%">
                                                        <span class="badge badge-success">Convert</span>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">

                                                            <div class="dropdown-menu" id="actionsID"
                                                                style="border: 1px solid #fd9595;">
                                                                <div class="leg">ACTIONS</div>
                                                                <a class="dropdown-item" target="_blank"
                                                                    href="https://www.trekhops.in/tour-packages/thailand">
                                                                    View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--<td width="1%">-->
                                                    <!--<a class="dropdown-item neweditpan"   onclick="loadpop2('Edit Client',this,'600px')" data-toggle="modal"  data-target="#myModal2" data-backdrop="static"  popaction="action=addclient&id="><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>-->
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div class="mt-3 pageingouter">
                                        <div style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                            Total Records: <strong>{{ $packageQueryCount }}</strong></div>
                                        <div class="d-flex justify-content-end">
                                            {{ $packageQuery->links() }}
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
