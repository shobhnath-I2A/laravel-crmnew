@extends('layouts.app')
@section('content')
</div>
<div class="wrapper">
    <div class="container-fluid">
        <div class="main-content">
            <div class="page-content">
                <div class="newboxheading">
                    <div class="newhead">Itineraries<form action="" class="newsearchsecform"
                            style="top: -9px; left: 76px !important;" method="get" enctype="multipart/form-data">
                            <input type="text" name="keyword" class="form-control newsearchsec"
                                placeholder="Search by name" value="" style="margin-top: 3px;">
                            <input name="ga" type="hidden" value="itineraries">
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
                    <div class="col-md-12 col-xl-12" style="padding-left:0px; padding-right:0px;">
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
                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109134">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>shobhnath1321 <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109134 - delhi &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 300.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">1 Days</div>
                                            </td>
                                            <td>₹ 11,220,000,000 </td>
                                            <td width="12%">09-03-2026</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu"
                                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1808px, 87px, 0px);"
                                                        x-placement="bottom-start">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109134">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109134');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109133">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>tcs <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109133 - delhi &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">2 Days</div>
                                            </td>
                                            <td>₹ 110 </td>
                                            <td width="12%">03-03-2026</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109133">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109133');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109131">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>formated functions updated <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109131 - delhi &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">1 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">05-02-2026</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109131">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109131');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109130">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/delhi/96192059217007308161770028177.jpg"
                                                                        width="64" height="46"></td>
                                                                <td>test0126 - Duplicate <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109130 - delhi, mumbai &nbsp;|&nbsp; 1
                                                                        Adult(s) - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">2 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">05-02-2026</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109130">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109130');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109129">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/mumbai/i2a-logo1770639376.png"
                                                                        width="64" height="46"></td>
                                                                <td>test0126 <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109129 - delhi, mumbai &nbsp;|&nbsp; 1
                                                                        Adult(s) - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">2 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">07-01-2026</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109129">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109129');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109118">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>itinar test 2 <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109118 - Mumbai,Dubai &nbsp;|&nbsp; 1
                                                                        Adult(s) - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">6 Days</div>
                                            </td>
                                            <td>₹ 1 </td>
                                            <td width="12%">10-11-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109118">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109118');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109117">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/floating-breakfast1769673417.png"
                                                                        width="64" height="46"></td>
                                                                <td>itinery test 01 <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109117 - delhi,dubai &nbsp;|&nbsp; 1
                                                                        Adult(s) - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">5 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">23-01-2026</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109117">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109117');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109115">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>itinery test 29 <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109115 - delhi &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">3 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">29-10-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109115">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109115');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109112">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/image-111757925141.png"
                                                                        width="64" height="46"></td>
                                                                <td>10itinery <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109112 - delhi &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 200.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">4 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">24-10-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109112">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109112');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109111">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/airlines-low-fare-calendar-4-600x4991756804397.jpg"
                                                                        width="64" height="46"></td>
                                                                <td>09itnery teset <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109111 - delhi &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 2,000.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">4 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">10-10-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109111">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109111');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109110">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>asdf <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109110 - delhi &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">2 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">16-10-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109110">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109110');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109109">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>shobhnath <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109109 - Bali &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 200.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">9 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">13-10-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109109">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109109');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=109088">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/airlines-low-fare-calendar-4-600x4991756804397.jpg"
                                                                        width="64" height="46"></td>
                                                                <td>shobhnath test <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 109088 - delhi &nbsp;|&nbsp; 1 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 200.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">4 Days</div>
                                            </td>
                                            <td>₹ 122 </td>
                                            <td width="12%">07-10-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=109088">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('109088');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=108141">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/airlines-low-fare-calendar-4-600x4991756804397.jpg"
                                                                        width="64" height="46"></td>
                                                                <td>Dubai Package <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 108141 - dubai33 &nbsp;|&nbsp; 2 Adult(s) -
                                                                        0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 10,000.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">6 Days</div>
                                            </td>
                                            <td>₹ 233 </td>
                                            <td width="12%">11-09-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=108141">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('108141');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=103039">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/image-111757925141.png"
                                                                        width="64" height="46"></td>
                                                                <td>Kavita's Trail to Vietnam - Duplicate <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 103039 - Hanoi , Ha Long, Danang, Saigon
                                                                        &nbsp;|&nbsp; 2 Adult(s) - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">10 Days</div>
                                            </td>
                                            <td>₹ 5,188,856 </td>
                                            <td width="12%">08-04-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=103039">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('103039');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102537">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>Sainadh's Trail to Maldives - Duplicate <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102537 - Maldives &nbsp;|&nbsp; 2 Adult(s) -
                                                                        0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">5 Days</div>
                                            </td>
                                            <td>₹ 157,874 </td>
                                            <td width="12%">02-07-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102537">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102537');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102522">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/i2a-logo1769759819.png"
                                                                        width="64" height="46"></td>
                                                                <td>Mr. Sammy's Trail to Vietnam <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102522 - Ho Chi Minh, Danang, Hanoi, Halong
                                                                        &nbsp;|&nbsp; 2 Adult(s) - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">10 Days</div>
                                            </td>
                                            <td>₹ 165,909 </td>
                                            <td width="12%">10-07-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102522">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102522');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102385">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>Harika's Trail to Singapore - Duplicate - Duplicate
                                                                    <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102385 - Singapore &nbsp;|&nbsp; 2 Adult(s)
                                                                        - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">5 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">13-10-2025</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102385">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102385');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102372">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>Prathyusha's Trail to Singapore <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102372 - Singapore &nbsp;|&nbsp; 5 Adult(s)
                                                                        - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">7 Days</div>
                                            </td>
                                            <td>₹ 233,984 </td>
                                            <td width="12%">26-06-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102372">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102372');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102362">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>Mridul's Trail to Singapore <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102362 - Singapore &nbsp;|&nbsp; 2 Adult(s)
                                                                        - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">67 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">25-06-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102362">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102362');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102355">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/singapore1713707883.jpg"
                                                                        width="64" height="46"></td>
                                                                <td>Singapore Activities - Without Transfers - Duplicate
                                                                    <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102355 - Singapore &nbsp;|&nbsp; 5 Adult(s)
                                                                        - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">7 Days</div>
                                            </td>
                                            <td>₹ 184,475 </td>
                                            <td width="12%">25-06-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102355">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102355');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102347">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding-right:10px !important;"><img
                                                                        src="https://s3.us-east-2.amazonaws.com/package.images/package_image/singapore1713707883.jpg"
                                                                        width="64" height="46"></td>
                                                                <td>Singapore Activities - Without Transfers <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102347 - Singapore &nbsp;|&nbsp; 5 Adult(s)
                                                                        - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">7 Days</div>
                                            </td>
                                            <td>₹ 175,485 </td>
                                            <td width="12%">25-06-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102347">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102347');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102344">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>Samrat's trails to singapore and malaysia </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">1 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">24-06-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102344">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102344');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102285">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>Harika's Trail to Singapore - Duplicate <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102285 - Singapore &nbsp;|&nbsp; 2 Adult(s)
                                                                        - 0 Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">5 Days</div>
                                            </td>
                                            <td>₹ 0 </td>
                                            <td width="12%">21-06-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102285">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102285');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="display.html?ga=itineraries&amp;view=1&amp;id=102261">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="addbynewbadges">
                                                        <tbody>
                                                            <tr>
                                                                <td>Nevil's Trail to Goa <div
                                                                        style="color:#999999; font-size:10px; margin-top:2px;">
                                                                        ID: 102261 - Goa &nbsp;|&nbsp; 4 Adult(s) - 0
                                                                        Child(s)</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </td>
                                            <td align="center">₹ 0.00 </td>
                                            <td align="center">
                                                <div align="center">
                                                    <span class="badge badge-danger">No</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div align="center">4 Days</div>
                                            </td>
                                            <td>₹ 118,284 </td>
                                            <td width="12%">20-06-2024</td>
                                            <td width="1%">
                                                <div class="">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">

                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop2('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addtineraries&amp;id=102261">Edit
                                                            Itinerary</a>
                                                        <a href="#" onclick="duplicatePackage('102261');"
                                                            class="dropdown-item">Duplicate</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="mt-3 pageingouter">
                                    <div
                                        style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                        Total Records: <strong>166</strong></div>
                                    <div class="pagingnumbers">
                                        <div class="paginate"><span class="disabled">Previous</span><span
                                                class="current">1</span><a
                                                href="display.html?ga=itineraries&amp;s=&amp;page=2">2</a><a
                                                href="display.html?ga=itineraries&amp;s=&amp;page=3">3</a><a
                                                href="display.html?ga=itineraries&amp;s=&amp;page=4">4</a><a
                                                href="display.html?ga=itineraries&amp;s=&amp;page=5">5</a><a
                                                href="display.html?ga=itineraries&amp;s=&amp;page=6">6</a><a
                                                href="display.html?ga=itineraries&amp;s=&amp;page=7">7</a><a
                                                href="display.html?ga=itineraries&amp;s=&amp;page=2">Next</a></div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <!-- end row -->
            </div>
            <!-- End Page-content -->
        </div>
    </div>
</div>
@endsection
