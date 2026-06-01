@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
       @include('itinerary.partials.top-nav', ['itinerary' => $itinerary])

        <style>
            .wrapper {
                position: relative;
                padding-left: 90px;
            }

            .wbg {
                background-color: #ffffffc7;
                color: #000;
                padding: 30px;
                position: absolute;
                left: 0px;
                top: 0px;
                width: 100%;
            }

            .bbg {
                background-color: #000000c4;
                color: #fff;
                padding: 30px;
                position: absolute;
                left: 0px;
                top: 0px;
                width: 100%;
            }

            .pnameheading {
                font-size: 30px;
                line-height: 41px;
                font-weight: 700;
            }

            .pnamedate {
                font-size: 20px;
                line-height: 29px;
            }

            .coverBanner {
                height: 650px;
                overflow: hidden;
                width: 100%;
            }

            .coverBanner img {
                width: 100%;
                height: auto;
                min-height: 100%;
            }

            .jss2755span {
                font-size: 12px;
                line-height: 15px;
                padding-top: 3px;
                margin-right: 15px;
                padding-bottom: 3px;
                color: #fff;
                background: #525a68;
                border-radius: 5px;
            }

            .actiimgbox {
                width: 100%;
                height: 100%;
                overflow: hidden;
                position: relative;
            }

            .actiimgbox img {
                width: auto;
                height: 400px;
                min-width: 100%;
            }

            .actiimgboxflight {
                width: 100%;
                height: 200px;
                overflow: hidden;
                position: relative;
            }

            .actiimgboxflight img {
                width: 100%;
                height: 100%;
            }

            .container-fluid {
                max-width: 1300px !important;
            }

            .itinerariesbox {
                padding: 10px 30px !important;
            }

            .itinerariesbox span {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
                font-size: 14px !important;
            }

            .itinerariesbox p {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
                font-size: 14px !important;
            }

            .card {
                -webkit-box-shadow: 0 0 1.25rem rgb(108 118 134 / 0%) !important;
                box-shadow: 0 0 1.25rem rgb(108 118 134 / 19%) !important;
            }
        </style>
        <div style="width:100%; padding-left:90px;" class="outeritibox">
            <div style="margin:auto; max-width:100%; position:relative; max-width:1200px;">

                <div class="wbg">
                    <div class="row">
                        <div class="col-md-8 col-xl-8 headerresposive2">
                            <div class="pnameheading">Mr. Nandu Sai trail to Langkawi and Kuala Lumpur for 5N / 6D </div>
                            <div class="pnamedate">21 Aug 2025 to 26 Aug 2025 - ID: 108998</div>

                        </div>

                        <div class="col-md-4 col-xl-4 headerresposive1" style="text-align:right;padding-right: 30px;"> <img
                                src="http://localhost:8081/project/I2ACrm/staging/profilepic/16942404066793789211693635606.jpg"
                                style="height:65px; width:auto;"></div>
                    </div>
                </div>

                <div class="coverBanner">
                    <img  src="http://localhost:8081/project/I2ACrm/staging/package_image/singapore-cover1766575363.jpg">
                </div>

                <div class="col-md-12 col-xl-12" style="font-weight:700;">
                    <div style="padding: 30px;  text-align: center; font-size: 16px;   font-size:35px; color:#000; border-top:1px solid #f3f3f3;">
                        ₹ 25,174
                        <div style="font-size:12px; text-transform:uppercase;  color:#333333;">2 Adult(s) - Total 2 Pax
                            Price</div>
                    </div>
                </div>
                <div class="container-fluid" style="padding-left:0px !important;">
                    <div class="main-content">
                        <div class="page-content">
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="itiday">Day 1 Thu, 21 Aug 2025
                                    </div>
                                    <div class="card">
                                        <div class="card-body" style="padding: 10px !important;">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>

                                                        <td width="94%">
                                                            <h5 style="margin-top:0px;">Aquaria KLCC followed by free day at
                                                                leisure</h5>
                                                            Aquaria KLCC is a state of the art located in the heart of the
                                                            city, beneath the Kuala Lumpur City Centre and a stone's throw
                                                            from the iconic Twin Towers. An amazing showcase of 5,000 land
                                                            bound and aquatic creature exhibits spread over a a sprawling
                                                            60,000sqft<br>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268710"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/3seabalconydouble17060141981766409089.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-car" aria-hidden="true"></i>
                                                        Langkawi Airport to Langkawi Hotel <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>
                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;21 Aug
                                                        2025
                                                    </div>
                                                    <p>f sdfd dfdfd</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268710"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/3seabalconydouble17060141981766409089.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6" style="position:relative;">
                                                <div class="actiimgbox"><img id="eventimage2268711"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/87bd9f5f-8def-4878-9abc-2ceb9fb34e1e17068758971766409152.jpg">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-bed" aria-hidden="true"></i>
                                                        Bella Vista Waterfront Resort <span
                                                            style="color:#FF9900; padding-left:10px;"><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i></span></h5>
                                                    <div
                                                        style="border-top:1px solid #ddd;border-bottom:1px solid #ddd; padding-top:10px; margin-bottom:10px;">
                                                        <table width="100%" border="0" cellpadding="0"
                                                            cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div style="margin-bottom:10px;">
                                                                            <div style="margin-bottom:2px;">Check-in</div>
                                                                            <div
                                                                                style="margin-bottom:5px; font-weight:700;">
                                                                                <i class="fa fa-calendar"
                                                                                    aria-hidden="true"></i> 21 Aug 2025
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div style="margin-bottom:10px;">
                                                                            <div style="margin-bottom:2px;">Check-out</div>
                                                                            <div
                                                                                style="margin-bottom:5px; font-weight:700;">
                                                                                <i class="fa fa-calendar"
                                                                                    aria-hidden="true"></i> 23 Aug 2025
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div style="margin-bottom:20px;"><strong>Room: </strong> 1 Double
                                                        &nbsp;&nbsp;| &nbsp;&nbsp;<strong><i class="fa fa-cutlery"
                                                                aria-hidden="true"></i> Meal: </strong> Bed &amp;
                                                        Breakfast&nbsp;&nbsp;| &nbsp;&nbsp;<strong><i class="fa fa-home"
                                                                aria-hidden="true"></i> Room Type: </strong> Deluxe Room
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268712"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/sidecircle21769086675.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-blind" aria-hidden="true"></i>
                                                        Langkawi City Tour <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>
                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;21 Aug
                                                        2025
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268712"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/sidecircle21769086675.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-3 col-xl-3" style="position:relative;">
                                                <div class="actiimgboxflight"><img id="eventimage2268726"
                                                        style="height:100%;"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/airasia17013280611766408876.jfif">
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-xl-9 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-plane" aria-hidden="true"></i>
                                                        Air Asia, <span
                                                            style="color:#FF9900; padding-left:10px;">(AK-6320)</span>
                                                        <span style="color:#FF9900; padding-left:10px;"></span>
                                                    </h5>
                                                    <div style="margin-bottom:10px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;21 Aug
                                                        2025
                                                    </div>
                                                    <div style="margin-bottom:5px;">

                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center"
                                                                        style="padding-right:20px; font-size:12px;">
                                                                        <div
                                                                            style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                                            12:05 AM</div>Kuala Lumpur (KUL)
                                                                    </td>
                                                                    <td align="center" style="width:100px;">
                                                                        <div
                                                                            style="text-align:center; font-size:11px; color:#666666;padding-bottom: 4px;">
                                                                            1h 05m |Non Stop</div>
                                                                        <div
                                                                            style="font-size:0px; border-top:2px solid #ddd; position:relative;">
                                                                            <i class="fa fa-plane" aria-hidden="true"
                                                                                style="position: absolute; font-size: 18px; transform: rotate(45deg); top: -9px; left: 40%;"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td align="center" style="padding-left:20px;">
                                                                        <div
                                                                            style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                                            12:00 AM</div>Langkawi (LGK)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    Baggage Rules Cabin Check-in
                                                    Adult 7-10 kg 0Kg

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6" style="position:relative;">
                                                <div class="actiimgbox"><img id="eventimage2333419"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/nofee.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-credit-card"
                                                            aria-hidden="true"></i> insurance <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>

                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;21 Aug
                                                        2025
                                                    </div>
                                                    <p>insurance</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6" style="position:relative;">
                                                <div class="actiimgbox"><img id="eventimage2333420"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-cutlery" aria-hidden="true"></i>
                                                        test meal <span style="color:#FF9900; padding-left:10px;"></span>
                                                    </h5>
                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;21 Aug
                                                        2025 &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;
                                                        1:00 PM TO 2:00 PM
                                                    </div>
                                                    <p>testing</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="itiday">Day 2 Fri, 22 Aug 2025
                                    </div>
                                    <div class="card">
                                        <div class="card-body" style="padding: 10px !important;">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="94%">
                                                            <h5 style="margin-top:0px;">Langkawi Island Hopping (Sharing
                                                                boat)</h5>
                                                            Langkawi island hopping is a popular tour that allows visitors
                                                            to explore the stunning islands surrounding Langkawi. It
                                                            typically involves a boat tour that visits several islands,
                                                            often including spots like Pulau Dayang Bunting (Lake of the
                                                            Pregnant Maiden) and Pulau Beras Basah (Wet Rice Island). These
                                                            islands are known for their pristine beaches, crystal-clear
                                                            waters, and opportunities for wildlife viewing, especially
                                                            eagles.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268713"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/lalunaresort17053927151766409173.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-blind" aria-hidden="true"></i>
                                                        Langkawi Island Hopping <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>

                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;22 Aug
                                                        2025
                                                    </div>
                                                    <div class="eventheading"
                                                        style="box-sizing: border-box; font-size: 16px; font-weight: 600; margin-bottom: 6px; color: #333333; font-family: Lato, sans-serif; outline: 0px !important;">
                                                        &nbsp;</div>
                                                    <div class="eventcontent"
                                                        style="box-sizing: border-box; font-size: 12px; color: #666666; line-height: 15px; font-family: Lato, sans-serif; outline: 0px !important;">
                                                        Langkawi island hopping is&nbsp;a popular tour that allows visitors
                                                        to explore the stunning islands surrounding Langkawi.&nbsp;It
                                                        typically involves a boat tour that visits several islands, often
                                                        including spots like Pulau Dayang Bunting (Lake of the Pregnant
                                                        Maiden) and Pulau Beras Basah (Wet Rice Island).&nbsp;These islands
                                                        are known for their pristine beaches, crystal-clear waters, and
                                                        opportunities for wildlife viewing, especially eagles.&nbsp;</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268713"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/lalunaresort17053927151766409173.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268714"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/1672665394ninhbinhtourindovietnam116988459721766409192.jpg">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-blind" aria-hidden="true"></i>
                                                        Langkawi Sharing Boat Trip <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>
                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;22 Aug
                                                        2025
                                                    </div>
                                                    <div class="eventheading"
                                                        style="box-sizing: border-box; font-size: 16px; font-weight: 600; margin-bottom: 6px; color: #333333; font-family: Lato, sans-serif; outline: 0px !important;">
                                                        &nbsp;</div>
                                                    <div class="eventcontent"
                                                        style="box-sizing: border-box; font-size: 12px; color: #666666; line-height: 15px; font-family: Lato, sans-serif; outline: 0px !important;">
                                                        Transfers &amp; Boat trip to Pregnant Maiden Island, Beras Basah
                                                        Island &amp; Singa Besar Island on Seat In Coach Boat)</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268714"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/1672665394ninhbinhtourindovietnam116988459721766409192.jpg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="itiday">Day 3 Sat, 23 Aug 2025
                                    </div>
                                    <div class="card">
                                        <div class="card-body" style="padding: 10px !important;">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>

                                                        <td width="94%">
                                                            <h5 style="margin-top:0px;"> Full Day Genting Highland Tour
                                                                with One Way Cable Car Ride + Enroute Batu Caves Tour</h5>
                                                            See a quieter side of Kuala Lumpur on this day-long tour to Batu
                                                            Caves and the Genting Highlands, a cool 6,000 feet (1,830
                                                            meters) above sea-level. An iconic site, the Batu Caves houses a
                                                            significant Hindu temple and shrine. Take in stunning views of
                                                            the city skyline after climbing the 272-step flight of stairs
                                                            that winds steeply up this rocky limestone outcrop on the
                                                            cityâ€™s edges.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268720"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/batu-cave11708926948.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-blind" aria-hidden="true"></i>
                                                        Genting Highlands Day Trip from Kuala Lumpur with Skyway Cable Car
                                                        Ride with Enroute Batu caves <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>

                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;23 Aug
                                                        2025
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268720"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/batu-cave11708926948.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268721"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/cab217031575261766409254.jpg">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-blind" aria-hidden="true"></i>
                                                        Genting Cable Car Ride <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>





                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;23 Aug
                                                        2025
                                                    </div>









                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268721"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/cab217031575261766409254.jpg">
                                                </div>




                                            </div>








                                        </div>






                                    </div>





                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="itiday">Day 4 Sun, 24 Aug 2025




                                    </div>
                                    <div class="card">
                                        <div class="card-body" style="padding: 10px !important;">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>

                                                        <td width="94%">
                                                            <h5 style="margin-top:0px;"> Departure from Langkawi + Arrival
                                                                in Kuala Lumpur Arrival in Kuala Lumpur + KL Evening City
                                                                Tour</h5>
                                                            Experience the vibrant charm of Kuala Lumpur at night on this
                                                            4-hour evening tour, which is also solo traveler-friendly. Visit
                                                            iconic landmarks such as the Petronas Twin Towers, Independence
                                                            Square, the Old Quarter, and the bustling Chinatown and Central
                                                            Market.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>




                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">







                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268715"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png">
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-car" aria-hidden="true"></i>
                                                        Langkawi Hotel to Langkawi Airport <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>





                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;24 Aug
                                                        2025
                                                    </div>









                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268715"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png">
                                                </div>




                                            </div>








                                        </div>






                                    </div>






                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">







                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268716"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png">
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-car" aria-hidden="true"></i>
                                                        Kuala Lumpur Airport to Kuala Lumpur Hotel <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>





                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;24 Aug
                                                        2025
                                                    </div>









                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268716"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png">
                                                </div>




                                            </div>








                                        </div>






                                    </div>






                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">







                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268717"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/kaanipalm17055795191766409208.png">
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-blind" aria-hidden="true"></i>
                                                        Kuala Lumpur Evening City Tour <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>





                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;24 Aug
                                                        2025
                                                    </div>








                                                    <table
                                                        style="border-collapse: collapse; color: #212529; font-family: Lato, sans-serif; outline: 0px !important;"
                                                        border="0" width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr style="box-sizing: border-box; outline: 0px !important;">
                                                                <td style="box-sizing: border-box; outline: 0px !important;"
                                                                    align="left" valign="top">
                                                                    <div id="load_build_day_details"
                                                                        style="box-sizing: border-box; outline: 0px !important;">
                                                                        <div class="daydetailsbox"
                                                                            style="box-sizing: border-box; outline: 0px !important; padding: 15px 15px 15px 25px; font-size: 13px; margin: 11px; box-shadow: #e2e2e2 0px 0px 13px; border-radius: 5px; position: relative;">
                                                                            &nbsp;</div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268717"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/kaanipalm17055795191766409208.png">
                                                </div>




                                            </div>








                                        </div>






                                    </div>






                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">







                                            <div class="col-md-6 col-xl-6" style="position:relative;">
                                                <div class="actiimgbox"><img id="eventimage2268719"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/padmanabhaswamytemple16974377271766409236.jfif">
                                                </div>




                                            </div>





                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-bed" aria-hidden="true"></i> Seri
                                                        Pacific Hotel Kuala Lumpur <span
                                                            style="color:#FF9900; padding-left:10px;"><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i></span></h5>




                                                    <div
                                                        style="border-top:1px solid #ddd;border-bottom:1px solid #ddd; padding-top:10px; margin-bottom:10px;">
                                                        <table width="100%" border="0" cellpadding="0"
                                                            cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div style="margin-bottom:10px;">
                                                                            <div style="margin-bottom:2px;">Check-in</div>
                                                                            <div
                                                                                style="margin-bottom:5px; font-weight:700;">
                                                                                <i class="fa fa-calendar"
                                                                                    aria-hidden="true"></i> 24 Aug 2025
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div style="margin-bottom:10px;">
                                                                            <div style="margin-bottom:2px;">Check-out</div>
                                                                            <div
                                                                                style="margin-bottom:5px; font-weight:700;">
                                                                                <i class="fa fa-calendar"
                                                                                    aria-hidden="true"></i> 25 Aug 2025
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>


                                                    <div style="margin-bottom:20px;"><strong>Room: </strong> 1 Single
                                                        &nbsp;&nbsp;| &nbsp;&nbsp;<strong><i class="fa fa-cutlery"
                                                                aria-hidden="true"></i> Meal: </strong> Breakfast
                                                        &nbsp;&nbsp;| &nbsp;&nbsp;<strong><i class="fa fa-home"
                                                                aria-hidden="true"></i> Room Type: </strong> Superior King
                                                        Room</div>



                                                    <div style="margin-bottom:20px;"><strong>Room: </strong> 1 Double
                                                        &nbsp;&nbsp;| &nbsp;&nbsp;<strong><i class="fa fa-cutlery"
                                                                aria-hidden="true"></i> Meal: </strong>
                                                        Breakfast&nbsp;&nbsp;| &nbsp;&nbsp;<strong><i class="fa fa-home"
                                                                aria-hidden="true"></i> Room Type: </strong> Superior King
                                                        Room</div>



















                                                </div>
                                            </div>








                                        </div>






                                    </div>






                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">







                                            <div class="col-md-3 col-xl-3" style="position:relative;">
                                                <div class="actiimgboxflight"><img id="eventimage2268725"
                                                        style="height:100%;"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/airasia17013280611766408876.jfif">
                                                </div>




                                            </div>





                                            <div class="col-md-9 col-xl-9 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-plane" aria-hidden="true"></i>
                                                        Air Asia, <span style="color:#FF9900; padding-left:10px;">(
                                                            AK-6307)</span> <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>










                                                    <div style="margin-bottom:10px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;24 Aug
                                                        2025
                                                    </div>
                                                    <div style="margin-bottom:5px;">

                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center"
                                                                        style="padding-right:20px; font-size:12px;">
                                                                        <div
                                                                            style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                                            12:00 AM</div>Langkawi (LGK)
                                                                    </td>
                                                                    <td align="center" style="width:100px;">
                                                                        <div
                                                                            style="text-align:center; font-size:11px; color:#666666;padding-bottom: 4px;">
                                                                            1h 10m |Non Stop</div>
                                                                        <div
                                                                            style="font-size:0px; border-top:2px solid #ddd; position:relative;">
                                                                            <i class="fa fa-plane" aria-hidden="true"
                                                                                style="position: absolute; font-size: 18px; transform: rotate(45deg); top: -9px; left: 40%;"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td align="center" style="padding-left:20px;">
                                                                        <div
                                                                            style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                                            11:59 PM</div>Kuala Lumpur (KUL)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                    </div>



                                                    Baggage Rules Cabin Check-in
                                                    Adult 7-10 kg 0Kg

                                                </div>
                                            </div>








                                        </div>






                                    </div>





                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="itiday">Day 5 Mon, 25 Aug 2025




                                    </div>
                                    <div class="card">
                                        <div class="card-body" style="padding: 10px !important;">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>

                                                        <td width="94%">
                                                            <h5 style="margin-top:0px;">Aquaria KLCC followed by free day
                                                                at leisure</h5>
                                                            Aquaria KLCC is a state of the art located in the heart of the
                                                            city, beneath the Kuala Lumpur City Centre and a stone's throw
                                                            from the iconic Twin Towers. An amazing showcase of 5,000 land
                                                            bound and aquatic creature exhibits spread over a a sprawling
                                                            60,000sqft
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>




                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">







                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268722"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/Aquaria_KLCC1708514330.jpg">
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-blind" aria-hidden="true"></i>
                                                        KLCC Aquaria Tour <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>





                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;25 Aug
                                                        2025
                                                    </div>









                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268722"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/Aquaria_KLCC1708514330.jpg">
                                                </div>




                                            </div>








                                        </div>






                                    </div>





                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="itiday">Day 6 Tue, 26 Aug 2025




                                    </div>
                                    <div class="card">
                                        <div class="card-body" style="padding: 10px !important;">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>

                                                        <td width="94%">
                                                            <h5 style="margin-top:0px;">Departure from Kuala Lumpur (PVT)
                                                            </h5>
                                                            Today after breakfast, check out from the hotel and get
                                                            transferred to the airport to board your return flight to India.
                                                            Tour ends with ever lasting memories.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>




                                    <div class="card" style="overflow: hidden;">
                                        <div class="row">







                                            <div class="col-md-6 col-xl-6 showinmobile ">
                                                <div class="actiimgbox"><img id="eventimage2268723"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png">
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 itinerariesbox">
                                                <div class="card-body" style="padding-top:20px;">
                                                    <h5 style="line-height: 32px; margin-top:0px; margin-bottom: 2px;"><i
                                                            style="" class="fa fa-car" aria-hidden="true"></i>
                                                        Kuala Lumpur Hotel to Airport <span
                                                            style="color:#FF9900; padding-left:10px;"></span></h5>





                                                    <div style="margin-bottom:20px;">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;26 Aug
                                                        2025
                                                    </div>









                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6 hideinmobile">
                                                <div class="actiimgbox"><img id="eventimage2268723"
                                                        src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png">
                                                </div>




                                            </div>








                                        </div>






                                    </div>





                                </div>
                            </div>




                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="itiday" style="text-align:center;">IMPORTANT TIPS




                                    </div>

                                </div>

                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body" style=" min-height:280px; padding:10px;">
                                            <h6 style=" margin-top:0px;">Inclusions &amp; Exclusions</h6>
                                            <div style="height:280px; overflow:auto;">
                                                <p><span style="color: #222222;"><strong>Inclusions:</strong>&nbsp;</span>
                                                </p>
                                                <ul>
                                                    <li><span style="color: #222222;">Room stay on Double sharing
                                                            basis</span></li>
                                                    <li><span style="color: #222222;">Breakfast on all days except Day
                                                            1.</span></li>
                                                    <li><span style="color: #222222;">All Tours and Transfers on S.I.C or
                                                            Private basis as mentioned</span></li>
                                                    <li><span style="color: #222222;">5% GST Included</span></li>
                                                    <li><span style="color: #222222;">5% TCS Included</span></li>
                                                    <li><span style="color: #222222;">Flights Domestic flights&nbsp;
                                                            Included</span></li>
                                                    <li><span style="color: #222222;">Accomodation Included</span></li>
                                                    <li><span style="color: #222222;">Activity Entrance Tickets
                                                            Included.</span></li>
                                                </ul>
                                                <p><span style="color: #222222;"><strong>Exclusions:</strong>&nbsp;</span>
                                                </p>
                                                <ul>
                                                    <li><span style="color: #222222;">Any other services or meals which are
                                                            not mentioned in the above "Includes" section.</span></li>
                                                    <li><span style="color: #222222;">Lunch and Dinner unless
                                                            specified</span></li>
                                                    <li><span style="color: #222222;">Early Check-in/Check-Out (Unless
                                                            Specified)</span></li>
                                                    <li>Island fees directly payable at spot.</li>
                                                    <li>Tourism Tax Directly Payable At Hotel (If Applicable or Mandatory
                                                        From Country)</li>
                                                    <li><span style="color: #222222;">Expense of personal nature such as
                                                            mineral water, laundry, telephones, beverages etc.</span></li>
                                                    <li><span style="color: #222222;">Any tips to the hotel or tour
                                                            organisers orr guide</span></li>
                                                    <li><span style="color: #222222;">Camera Charges if any. (Depends upon
                                                            the Sizes of the Lens)</span></li>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body" style=" min-height:280px; padding:10px;">
                                            <h6 style=" margin-top:0px;">Payment Policy &amp; Our Scope of Services</h6>
                                            <div style="height:280px; overflow:auto;">
                                                <ul>
                                                    <li><strong>Account Name: I2A Technologies Private Limited<br>
                                                            Account Number: 114505002013<br>
                                                            Bank Name: ICICI Bank Ltd<br>
                                                            IFSC Code: ICIC0001145</strong></li>
                                                </ul>

                                                <p><strong><span style="background-color:#ffff00">All payments to be made
                                                            in Current Account only. We do not accept cash collections or
                                                            any other account payments.</span></strong></p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body" style=" min-height:280px; padding:10px;">
                                            <h6 style=" margin-top:0px;">Useful Tips Before Booking</h6>
                                            <div style="height:280px; overflow:auto;">
                                                <ul>
                                                    <li>If your flights involve a combination of different airlines, you may
                                                        have to collect your luggage on arrival at the connecting hub and
                                                        register it again while checking in for the return journey to your
                                                        origin.</li>
                                                    <li>For queries regarding cancellations and refunds, please refer to our
                                                        Cancellation Policy.</li>
                                                    <li>Vehicle as per the current availability</li>
                                                    <li>Disputes, if any, shall be subject to the exclusive jurisdiction of
                                                        the courts in Gurgaon- Haryana</li>
                                                    <li>We reserve the right to issue a full refund in case we believe that
                                                        we are unable to fulfil the services for any technical reasons.</li>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body" style=" min-height:280px; padding:10px;">
                                            <h6 style=" margin-top:0px;">Cancellation Policy &amp; Airline Cancellation
                                                Policy</h6>
                                            <div style="height:280px; overflow:auto;">
                                                <ul style="list-style-type:square">
                                                    <li>Date of booking to 30 days before travel the cancellation charges
                                                        will be 25% of the tour cost</li>
                                                    <li>30 to 15 days before travel - cancellation charges will be 50% of
                                                        the tour cost</li>
                                                    <li>15 to 7 days before travel - cancellation charges will be 75% of the
                                                        tour cost</li>
                                                    <li>0 to 7 days before travel - cancellation charges will be 100% of the
                                                        tour cost. No refund shall be given</li>
                                                    <li>Please Note: Cancellation policy is subject to change. It depends on
                                                        the hotel policy.</li>
                                                    <li>In peak season (example: long weekends, festival season, summer
                                                        vacation etc.) most of the hotels charge 100% cancellation</li>
                                                </ul>

                                                <h3><strong>Airline Cancellation Policy:</strong></h3>

                                                <ul style="list-style-type:square">
                                                    <li>Your flights are non-refundable. In the event of cancellation, you
                                                        will not get any refund for flights.</li>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="itiday" style="text-align:center;">Comments</div>

                                    <div style="padding-bottom:20px;">

                                        <div class="col-md-12 col-xl-12">
                                            <div class="card">
                                                <div class="card-body" style="padding:20px !important;"
                                                    id="loadpackagecommnet">


                                                    <div style="text-align:center; padding:20px 0px;">No Comment Available
                                                    </div>

                                                    <form class="custom-validation"
                                                        action="http://localhost:8081/project/I2ACrm/staging/frmaction.html"
                                                        target="actoinfrm" novalidate="" method="post"
                                                        enctype="multipart/form-data">
                                                        <table width="100%" border="0" cellpadding="0"
                                                            cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <textarea name="comment" id="comment"
                                                                            style="border: 2px solid #ddd; padding: 10px; font-size: 14px; width: 100%; border-radius: 5px;"
                                                                            placeholder="Enter Your Comment"></textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" style="padding-top:10px;"><button
                                                                            type="submit" id="page2"
                                                                            class="btn btn-secondary btn-sm waves-effect"
                                                                            style="float:right; font-size:12px;">Submit
                                                                            Comment</button></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <input name="action" type="hidden" value="loadpackagecommnet">
                                                        <input name="pid" type="hidden" value="8998">
                                                    </form>
                                                </div>


                                                <script>
                                                    function funloadpackagecommnet() {
                                                        $('#loadpackagecommnet').load('http://localhost:8081/project/I2ACrm/staging/loadpackagecommnet.php?id=8998');
                                                    }

                                                    funloadpackagecommnet();
                                                </script>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="row" style="display:none;">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <h5 style="line-height: 32px; margin-top:0px;">Inclusion / Exclusion </h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                    <div style="width:100%; background-color:#343642; color:#fff; overflow:hidden; padding:20px 0px; ">
                        <div class="container-fluid" style="padding-left:0px;">
                            <div class="main-content">
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="card-body">
                                            <div
                                                style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                                <table border="0" cellpadding="0" cellspacing="0"
                                                    style="color:#fff;">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div
                                                                    style="width:50px; height:50px; overflow:hidden; margin-right:10px; border-radius: 100%;">
                                                                    <img src="http://localhost:8081/project/I2ACrm/staging/profilepic/16941896475845246901693584847.jpg"
                                                                        style="width:100%; height:auto; min-height:100%;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    style="font-size:16px; margin-bottom:0px; font-weight:800;">
                                                                    i2a Technologies</div>
                                                                <div style="font-size:14px; margin-bottom:0px;">i2a
                                                                    Technologies</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div
                                                style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    style="color:#fff;">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%" align="left">Email address</td>
                                                            <td width="50%" align="right">holidays@trekhops.in</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>


                                            <!-- <div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#fff;">
                                            <tr>
                                                <td width="50%" align="left">Website
                                            </td>
                                                <td width="50%" align="right"><a style="color:#fff; text-decoration:none;" target="_blank" href="http://www.i2a.co"><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp; www.i2a.co</a></td>
                                            </tr>
                                            </table>

                                            </div> -->

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <div class="card-body">

                                            <div
                                                style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                                <table border="0" cellpadding="0" cellspacing="0"
                                                    style="color:#fff;">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div
                                                                    style="width:50px; height:50px; overflow:hidden; margin-right:10px; border-radius: 100%;">
                                                                </div>
                                                            </td>
                                                            <td> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <!-- <div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#fff;">
                                            <tr>
                                                <td width="50%" align="left">Total price</td>
                                                <td width="50%" align="right">&#8377; 25,174</td>
                                            </tr>
                                            </table>

                                            </div> -->
                                            <!-- <div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#fff;">
                                            <tr>
                                                <td width="50%" align="left"><a style="cursor:pointer;" onclick="loadpop('Terms and Conditions',this,'600px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=showterms&pid=108998">Terms and conditions</a></td>
                                                <td width="50%" align="right">&nbsp; </td>
                                            </tr>
                                            </table>

                                            </div> -->
                                            <div
                                                style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                    style="color:#fff;">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%" align="left">Phone number
                                                            </td>
                                                            <td width="50%" align="right">+91 9871148759</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

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
