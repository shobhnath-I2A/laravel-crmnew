@extends('layouts.app')
@section('content')
</div>
<!-- Resources -->
<div class="wrapper">
    <div class="container-fluid"
        style="padding-left: 70px !important; padding-right: 25px !important; padding-top: 8px !important;">
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card"
                            style="overflow: hidden; background-image: url(images/grnbx.png); background-repeat: no-repeat; background-position: right top; background-size: auto 100%; position:relative;">
                            <div class="card-body" style="padding: 16px;">
                                <h2 class="morningh2">Good Evening</h2>
                                <div style="font-size:14px; font-weight:600;">i2a Technologies</div>
                                <div
                                    style="position: absolute; right: 10px; top: 20px; text-align: center; line-height: 18px; font-size: 12px; color: #fff; font-weight: 700; text-transform: uppercase; width: 32%;">
                                    <span style="font-size:22px; font-weight:600;">06</span>
                                    <div style="text-align:center;">Fri, March 2026</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="bigbtntab">
                                           <a  href="#" onclick="openSidebar('Add Client','{{ route('clients.create') }}')">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td colspan="2" align="center" bgcolor="#e0f5f1">
                                                           <img  src="{{ asset('assets/images/icons8-circled-user-male-skin-type-7-64.png') }}" width="20" />
                                                        </td>
                                                        <td width="75%"> Client </td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="bigbtntab">
                                            <a onclick="openSidebar('Create Query','{{ route('queries.create') }}')">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td colspan="2" align="center" bgcolor="#e0f5f1">
                                                            <img src="{{ asset('assets/images/icons8-new-copy-80.png') }}" width="20" />
                                                        </td>
                                                        <td width="75%"> Query </td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3" style="display:none;">
                                        <div class="bigbtntab">
                                            <a href="display.html?ga=query">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td colspan="2" align="center" bgcolor="#f5e0ee">
                                                            <img src="{{ asset('assets/images/icons8-open-envelope-80.png') }}"
                                                                width="20" />
                                                        </td>
                                                        <td width="75%">Send Email </td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="bigbtntab">
                                            <a  onclick="openSidebar('Create Itinerary','{{ route('itineraries.create') }}')" >
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td colspan="2" align="center" bgcolor="#ede5fd">
                                                            <img src="{{ asset('assets/images/icons8-open-box-64.png') }}" width="20" />
                                                        </td>
                                                        <td width="75%"> Itinerary </td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <a href="display.html?startDate=06-03-2026&endDate=06-03-2026&keyword=&page=&ga=query&searchcity=&searchusers=&searchsource="
                                style="color:#000;">
                                <div class="card-body">
                                    <div class="cardsmheading">Today's Queries</div>
                                    <div class="cardnumberbig">0 <i class="fa fa-external-link" aria-hidden="true"
                                            style="background-color:#5eaafd33; color:#3892ca;"></i></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <a href="display.html?startDate=01-01-2025&endDate=06-03-2026&keyword=&page=&ga=query&searchcity=&searchusers=&searchsource="
                                style="color:#000;">
                                <div class="card-body">
                                    <div class="cardsmheading">Total Queries</div>
                                    <div class="cardnumberbig">
                                        12008 <i class="fa fa-external-link" aria-hidden="true"
                                            style="background-color:#a0a0a033; color:#6e6e6e;"></i></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <a href="display.html?startDate=01-01-2025&endDate=06-03-2026&keyword=&page=&ga=query&searchcity=&searchusers=&searchsource=&statusid=8"
                                style="color:#000;">
                                <div class="card-body">
                                    <div class="cardsmheading">Proposal Sent</div>
                                    <div class="cardnumberbig">
                                        145 <i class="fa fa-external-link" aria-hidden="true"
                                            tyle="background-color:#cc00a917; color:#cc00a9;"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <a href="display.html?startDate=01-01-2025&endDate=06-03-2026&keyword=&page=&ga=query&searchcity=&searchusers=&searchsource=&statusid=9"
                                style="color:#000;">
                                <div class="card-body">
                                    <div class="cardsmheading">Total Pro. Conf</div>
                                    <div class="cardnumberbig">
                                        108 <i class="fa fa-external-link" aria-hidden="true"
                                            style="background-color:#389aca33; color:#389aca;"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <a href="display.html?startDate=01-01-2025&endDate=06-03-2026&keyword=&page=&ga=query&searchcity=&searchusers=&searchsource=&statusid=5"
                                style="color:#000;">
                                <div class="card-body">
                                    <div class="cardsmheading">Total Confirmed</div>
                                    <div class="cardnumberbig">
                                        152 <i class="fa fa-external-link" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <a href="display.html?startDate=01-01-2025&endDate=06-03-2026&keyword=&page=&ga=query&searchcity=&searchusers=&searchsource=&statusid=7"
                                style="color:#000;">
                                <div class="card-body">
                                    <div class="cardsmheading">Total Lost</div>
                                    <div class="cardnumberbig">
                                        879 <i class="fa fa-external-link" aria-hidden="true"
                                            style="background-color:#f9392f21; color:#f9392f;"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body" style="height: 375px;">
                                <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">This Year Queries</p>
                                <script>
                                    am4core.ready(function() {
                                        // Themes begin
                                        am4core.useTheme(am4themes_animated);
                                        // Themes end
                                        // Create chart instance
                                        var chart = am4core.create("chartdiv", am4charts.XYChart3D);
                                        // Add data
                                        chart.data = [{
                                                "country": "Jan",
                                                "visits": 0
                                            },
                                            {
                                                "country": "Feb",
                                                "visits": 2
                                            },
                                            {
                                                "country": "Mar",
                                                "visits": 1
                                            },
                                            {
                                                "country": "Apr",
                                                "visits": 0
                                            },
                                            {
                                                "country": "May",
                                                "visits": 0
                                            },
                                            {
                                                "country": "Jun",
                                                "visits": 0
                                            },
                                            {
                                                "country": "Jul",
                                                "visits": 0
                                            },
                                            {
                                                "country": "Aug",
                                                "visits": 0
                                            },
                                            {
                                                "country": "Sep",
                                                "visits": 0
                                            },
                                            {
                                                "country": "Oct",
                                                "visits": 0
                                            },
                                            {
                                                "country": "Nov",
                                                "visits": 0
                                            },
                                            {
                                                "country": "Dec",
                                                "visits": 0
                                            },


                                        ];

                                        // Create axes
                                        let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                                        categoryAxis.dataFields.category = "country";
                                        categoryAxis.renderer.labels.template.rotation = 270;
                                        categoryAxis.renderer.labels.template.hideOversized = false;
                                        categoryAxis.renderer.minGridDistance = 20;
                                        categoryAxis.renderer.labels.template.horizontalCenter = "right";
                                        categoryAxis.renderer.labels.template.verticalCenter = "middle";
                                        categoryAxis.tooltip.label.rotation = 270;
                                        categoryAxis.tooltip.label.horizontalCenter = "right";
                                        categoryAxis.tooltip.label.verticalCenter = "middle";

                                        let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                                        // Create series
                                        var series = chart.series.push(new am4charts.ColumnSeries3D());
                                        series.dataFields.valueY = "visits";
                                        series.dataFields.categoryX = "country";
                                        series.name = "Visits";
                                        series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
                                        series.columns.template.fillOpacity = .8;

                                        var columnTemplate = series.columns.template;
                                        columnTemplate.strokeWidth = 2;
                                        columnTemplate.strokeOpacity = 1;
                                        columnTemplate.stroke = am4core.color("#FFFFFF");

                                        columnTemplate.adapter.add("fill", function(fill, target) {
                                            return chart.colors.getIndex(target.dataItem.index);
                                        })

                                        columnTemplate.adapter.add("stroke", function(stroke, target) {
                                            return chart.colors.getIndex(target.dataItem.index);
                                        })

                                        chart.cursor = new am4charts.XYCursor();
                                        chart.cursor.lineX.strokeOpacity = 0;
                                        chart.cursor.lineY.strokeOpacity = 0;

                                    }); // end am4core.ready()
                                </script>
                                <!-- HTML -->
                                <div id="chartdiv"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row" style="margin-left: -5px;">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">Task / Followup's</p>
                                <div style="height:281px; overflow:auto;">
                                    <div class="taskfollowuplist">
                                        <div class="tasklist">
                                            <div class="heading"><a href="display.html?ga=query&view=1&id=127473&c=3"
                                                    target="_blank" style="color:#000000;">
                                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                                    &nbsp;127473 - testing</a></div>
                                            <div class="subline"><span
                                                    style="margin-bottom:5px; font-size:12px; color:#FF0000;"><i
                                                        class="fa fa-clock-o" aria-hidden="true"></i>
                                                    24/09/2025-01:00 PM </span> - shobhnath upaer
                                                <span class="badge badge-danger">Pending</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card" id="showtodayspayment">
                            <div class="card-body">
                                <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">Payment Collection
                                </p>
                                <div style="height:281px; overflow:auto;">
                                    <table class="table table-hover mb-0" style="border:1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th>Query ID </th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=110106" target="_blank"
                                                        style="color: #2b99e7 !important;">#110106</a><br />Nasim
                                                    Akhtar </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    115400</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=125881" target="_blank"
                                                        style="color: #2b99e7 !important;">#125881</a><br />Pranab
                                                </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    85000</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=125881" target="_blank"
                                                        style="color: #2b99e7 !important;">#125881</a><br />Pranab
                                                </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    93200</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=126855" target="_blank"
                                                        style="color: #2b99e7 !important;">#126855</a><br />Saswati
                                                    datta </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    40000</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=126870" target="_blank"
                                                        style="color: #2b99e7 !important;">#126870</a><br />Kohli
                                                </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    15000</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=126794" target="_blank"
                                                        style="color: #2b99e7 !important;">#126794</a><br />Juspreet
                                                    Oberoi </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    28600</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=127257" target="_blank"
                                                        style="color: #2b99e7 !important;">#127257</a><br />Nandu
                                                    Sai </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    30000</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=123636" target="_blank"
                                                        style="color: #2b99e7 !important;">#123636</a><br />JVN
                                                    Venyas </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    24750</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=127257" target="_blank"
                                                        style="color: #2b99e7 !important;">#127257</a><br />Nandu
                                                    Sai </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    13000</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=126855" target="_blank"
                                                        style="color: #2b99e7 !important;">#126855</a><br />Saswati
                                                    datta </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    30000</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=126855" target="_blank"
                                                        style="color: #2b99e7 !important;">#126855</a><br />Saswati
                                                    datta </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    30000</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                            <tr style="font-size:12px;">
                                                <td align="left" valign="top"><a
                                                        href="display.html?ga=query&view=1&id=123636" target="_blank"
                                                        style="color: #2b99e7 !important;">#123636</a><br />JVN
                                                    Venyas </td>
                                                <td align="left" valign="top" style="    font-size: 14px;">
                                                    &#8377;
                                                    24750</td>
                                                <td align="left" valign="top"> <span
                                                        class="badge badge-danger">Overdue</span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card" style="padding:10px;">
                            <div class="watherbox">
                                <div style="padding:21px 0px; text-align:center;">No Data</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card" style="padding:10px;">
                            <div class="watherbox">
                                <div style="padding:21px 0px; text-align:center;">No Data</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card" style="padding:10px;">
                            <div class="watherbox">
                                <div style="padding:21px 0px; text-align:center;">No Data</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card" style="padding:10px;">
                            <div class="watherbox">
                                <div style="padding:21px 0px; text-align:center;">No Data</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body" style="height: height: 365px;;">
                                <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">QUERIES BY STATUS</p>
                                <div id="chartdiv2" style="height:292px;"></div>
                                <script>
                                    am4core.ready(function() {
                                        // Themes begin
                                        am4core.useTheme(am4themes_animated);
                                        // Themes end
                                        var chart = am4core.create("chartdiv2", am4charts.SlicedChart);
                                        chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect
                                        chart.data = [{
                                                "name": "New",
                                                "value": 245
                                            },
                                            {
                                                "name": "Active",
                                                "value": 146
                                            },
                                            {
                                                "name": "No Connect",
                                                "value": 374
                                            },
                                            {
                                                "name": "Hot Lead",
                                                "value": 3
                                            },
                                            {
                                                "name": "Confirmed",
                                                "value": 152
                                            },
                                            {
                                                "name": "Cancelled",
                                                "value": 9903
                                            },
                                            {
                                                "name": "Invalid",
                                                "value": 881
                                            },
                                            {
                                                "name": "Proposal Sent",
                                                "value": 145
                                            },
                                            {
                                                "name": "Follow Up",
                                                "value": 108
                                            },
                                            {
                                                "name": "No Revert",
                                                "value": 51
                                            },

                                        ];

                                        var series = chart.series.push(new am4charts.FunnelSeries());
                                        series.colors.step = 2;
                                        series.dataFields.value = "value";
                                        series.dataFields.category = "name";
                                        series.alignLabels = false;

                                        series.labelsContainer.paddingLeft = 15;
                                        series.labelsContainer.width = 200;

                                        //series.orientation = "horizontal";
                                        //series.bottomRatio = 1;
                                    }); // end am4core.ready()
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">Today Tours (0)</p>
                                <div style="height:251px; overflow:auto;" class="taskfollowuplist">
                                    <div style="padding:20px; text-align:center; font-size:12px;">No Tours Today
                                    </div>
                                </div>
                                <div style=" margin-top:10px;">
                                    <a href="display.html?ga=travelreport"><button type="button"
                                            class="btn btn-primary btn-lg" style=" width:100%;">View All
                                            Tours</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="watherbox">
                                    <div style="font-size:16px; font-weight:600;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Top Destinations
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <a href="display.html?startDate=&endDate=&keyword=&page=&ga=query&searchcity=39825&searchusers=&searchsource="
                                    style="color:#000000;">
                                    <div class="card" style="margin:0px; background-color:#FFE1E1;#FFE1E1;">
                                        <div class="card-body"
                                            style="text-align:center; font-size:16px; padding:7px; font-weight:600;">
                                            Bangkok (2546)
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-2">
                                <a href="display.html?startDate=&endDate=&keyword=&page=&ga=query&searchcity=41391&searchusers=&searchsource="
                                    style="color:#000000;">
                                    <div class="card" style="margin:0px; background-color:#fae4e4;">
                                        <div class="card-body"
                                            style="text-align:center; font-size:16px; padding:7px; font-weight:600;">
                                            Dubai (2444)
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-2">
                                <a href="display.html?startDate=&endDate=&keyword=&page=&ga=query&searchcity=10070&searchusers=&searchsource="
                                    style="color:#000000;">
                                    <div class="card" style="margin:0px; background-color:#f7e7e7;">
                                        <div class="card-body"
                                            style="text-align:center; font-size:16px; padding:7px; font-weight:600;">
                                            Bali (1590)
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-2">
                                <a href="display.html?startDate=&endDate=&keyword=&page=&ga=query&searchcity=37541&searchusers=&searchsource="
                                    style="color:#000000;">
                                    <div class="card" style="margin:0px; background-color:#f7ebeb;">
                                        <div class="card-body"
                                            style="text-align:center; font-size:16px; padding:7px; font-weight:600;">
                                            Singapore (1251)
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-2">
                                <a href="display.html?startDate=&endDate=&keyword=&page=&ga=query&searchcity=48316&searchusers=&searchsource="
                                    style="color:#000000;">
                                    <div class="card" style="margin:0px; background-color:">
                                        <div class="card-body"
                                            style="text-align:center; font-size:16px; padding:7px; font-weight:600;">
                                            Maldives (1015)
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">SALES REPS</p>
                        <div style="height:320px; overflow:auto;">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                style=" font-size:12px;">
                                <tr>
                                    <td align="left" style="padding:5px; border-bottom:1px solid #ddd;">
                                        <strong>Name</strong>
                                    </td>
                                    <td align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">
                                        <strong>Assigned</strong>
                                    </td>
                                    <td align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;"><strong>Confirmed
                                        </strong></td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        1. Anjali A</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">1802</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">17</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        2. Sunil S</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">1587</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">24</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        3. Akash Shrestha</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">1132</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">7</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        4. Khushi Gupta</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">875</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">2</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        5. Suchita Massey</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">801</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">7</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        6. Sachin Kumar</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">694</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">29</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        7. Anjana Thakur</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">666</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">11</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        8. Shivani Sharma</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">567</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">7</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        9. Swapnil Sinha</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">488</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">21</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        10. Yashika Sharma</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">399</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">3</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        11. Gokul K</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">330</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">9</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        12. Kavita Shahi</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">327</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">1</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        13. Adarsh Ojha</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">258</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        14. Ayush Pandey</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">217</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">2</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        15. Prashant Sharma</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">216</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">2</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">TOP LEAD SOURCES</p>
                        <div style="height:320px; overflow:auto;">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                style=" font-size:12px;">
                                <tr>
                                    <td align="left" style="padding:5px; border-bottom:1px solid #ddd;">
                                        <strong>Name</strong>
                                    </td>
                                    <td align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;"><strong>Total Queries
                                        </strong></td>
                                    <td align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;"><strong>Confirmed
                                        </strong></td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        1. Agent</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">7633</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">95</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        2. Facebook</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">3834</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">6</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        3. Advertisment</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">270</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">19</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        4. Website</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">110</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        5. Referral</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">97</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">31</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        6. Instagram</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">31</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        7. WhatsApp</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">6</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        8. Others</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">4</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        9. Google</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">4</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        10. Walk-In</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">3</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">1</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        11. Travel Triangle</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">2</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        12. Chat</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">2</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        13. PPC</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">1</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        14. Online</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">1</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                                <tr>
                                    <td width="72%" align="left"
                                        style="padding:5px; border-bottom:1px solid #ddd;">
                                        15. Hello Travel</td>
                                    <td width="28%" align="center" bgcolor="#F3F3F3"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">1</td>
                                    <td width="28%" align="center" bgcolor="#E8FFF1"
                                        style="padding:5px;  border-bottom:1px solid #ddd;">0</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <!-- sn 04-09-2025 -->
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">Finance Report</p>
                            <!-- en 04-09-2025 Today Report -->
                            <select id="reportType"
                                class="form-control-sm btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray hideinmobile"
                                style="width:auto; display:inline-block;">
                                <option value="day" selected>Today</option>
                                <option value="month">This Month</option>
                            </select>
                        </div>
                        <div id="dayReport">
                            <div id="reportContent">
                                <div
                                    style="padding: 5px; background-color: #d2f1ff; border-radius: 5px; margin-bottom: 4px;">
                                    <table width="100%" border="0" cellpadding="5" cellspacing="0">
                                        <tr>
                                            <td><strong>Today Sales</strong></td>
                                            <td width="40%" align="right" style="font-weight:800;">
                                                &#8377; 0 </td>
                                        </tr>
                                    </table>
                                </div>
                                <div
                                    style="padding: 5px; background-color: #D2FFED; border-radius: 5px; margin-bottom: 4px;">
                                    <table width="100%" border="0" cellpadding="5" cellspacing="0">
                                        <tr>
                                            <td><strong>Today Collections</strong></td>
                                            <td width="40%" align="right" style="font-weight:800;">
                                                &#8377; 0 </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <p class="text-muted font-weight-medium mt-1 mb-2 dashheader">Finance Report </p> -->
                        <div id="monthReport" style="display:none;">
                            <div
                                style="padding: 5px; background-color: #d2f1ff; border-radius: 5px; margin-bottom: 4px;">
                                <table width="100%" border="0" cellpadding="5" cellspacing="0"
                                    bordercolor="#CCCCCC">
                                    <tr>
                                        <td><strong>This Month Sales</strong></td>
                                        <td width="40%" align="right" style="font-weight:800;">
                                            INR10,500
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div
                                style="padding: 5px; background-color:#eee1ff; border-radius: 5px; margin-bottom: 4px;">
                                <table width="100%" border="0" cellpadding="5" cellspacing="0"
                                    bordercolor="#CCCCCC">
                                    <tr>
                                        <td><strong>This&nbsp;Month&nbsp;Expense</strong></td>
                                        <td width="40%" align="right" style="font-weight:800;">
                                            0 </td>
                                    </tr>
                                </table>
                            </div>
                            <div
                                style="padding: 5px; background-color: #D2FFED; border-radius: 5px; margin-bottom: 4px;">
                                <table width="100%" border="0" cellpadding="5" cellspacing="0"
                                    bordercolor="#CCCCCC">
                                    <tr>
                                        <td><strong>This&nbsp;Month&nbsp;Collections</strong></td>
                                        <td width="40%" align="right" style="font-weight:800;">
                                            INR12,000,000
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div style="padding: 5px; background-color:#FFE1E1; border-radius: 5px; margin-bottom: 4px;">
                            <table width="100%" border="0" cellpadding="5" cellspacing="0"
                                bordercolor="#CCCCCC">
                                <tr>
                                    <td><strong>Total&nbsp;Pending&nbsp;Collection</strong></td>
                                    <td width="40%" align="right" style="font-weight:800;">
                                        INR-11,987,850
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="padding: 5px; background-color:#FFEEB3; border-radius: 5px; margin-bottom: 4px;">
                            <table width="100%" border="0" cellpadding="5" cellspacing="0"
                                bordercolor="#CCCCCC">
                                <tr>
                                    <td><strong>Total&nbsp;Supplier&nbsp;Pending </strong></td>
                                    <td width="40%" align="right" style="font-weight:800;">
                                        INR31,367,814
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                            style="    margin-bottom: 5px; margin-top:5px;">
                            <tr>
                                <td colspan="2" style="padding-right:3px;">
                                    <div
                                        style="padding: 15px 0px; text-align: center; border: 1px solid #ddd; border-radius: 5px; margin-top: 8px; background-color: #f9f9f9;">
                                        <div style="font-size:20px; font-weight:700;">
                                            INR10,500
                                        </div>
                                        <div style="font-size:12px; font-weight:600;">2026 Sales</div>
                                    </div>
                                </td>
                                <td width="50%" style="padding-left:3px;">
                                    <div
                                        style="padding: 15px 0px; text-align: center; border: 1px solid #ddd; border-radius: 5px; margin-top: 8px; background-color: #f9f9f9;">
                                        <div style="font-size:20px; font-weight:700;">
                                            INR12,000,000
                                        </div>
                                        <div style="font-size:12px; font-weight:600;">2026 Collections</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <div style="position:fixed; width:100%; height:100%; top:0; left:0; z-index:999; background-color:#00000094; display:none;" id="blackdiv"></div>
</div>
@endsection
