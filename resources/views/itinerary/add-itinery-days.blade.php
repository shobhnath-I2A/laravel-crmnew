<td width="35%" align="left" valign="top" t="" style="position:relative; background-color:#f5f7f9;">
    <div style="padding: 15px; position: absolute; z-index: 1; width: 100%; box-sizing: border-box; padding-top: 0px; padding-right: 0px; background-color:#fff; border-bottom:1px solid #ddd;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td colspan="2" style="padding-right:5px;">
                        <input name="searchevent" type="text" id="searchevent"
                            style="width:100%; box-sizing:border-box; padding:10px; border:1px solid #ddd;border-radius: 4px;height: 43px;"
                            placeholder="Search" onkeyup="loadeventlibrary();"></td>
                    <td width="50%">
                        <select name="eventsection" id="eventsection"
                            style="width:100%; box-sizing:border-box; padding:10px; border:1px solid #ddd;border-radius: 4px;height: 43px;"
                            onchange="loadeventlibrary();">
                            <option value="DayItinerary">Day Itinerary</option>
                            <option value="Accommodation">Accommodation</option>
                            <option value="Activity">Activity</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Insurance">Insurance / Visa</option>
                            <option value="Meal">Meal</option>
                            <option value="Flight">Flight</option>
                            <option value="Leisure">Leisure</option>
                            <option value="Cruise">Cruise</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
Destination: {{ $destinationId }}
    <div style="overflow:auto; height:100%;position: absolute; width:100%;">
        <div style="margin-top:70px; padding-left:15px;" id="loadeventlibrary">
            <style>
                .custom_flex_wrapper {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: space-between;
                }
                .custom_flex_wrapper input {
                    width: 48%;
                }
            </style>
            <div class="daydetailsbox">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <div class="eventimgclass" style="width: 50px; height: 50px;">
                                    <img style="width:100%;"
                                        src="data:image/png;base64,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">

                                </div>
                            </td>
                            <td width="90%" style="padding-left:10px;">
                                <div class="eventheading" style="margin-bottom:0px;"> Aquaria KLCC followed by free day
                                    at leisure</div>
                                <div><span style="color:#999999;; ">Aquaria KLCC is a state of the art locat...</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="addeventbtnn" onclick="loadpop('Day 1 Details',this,'600px')"
                                    data-toggle="modal" data-target=".bs-example-modal-center"
                                    popaction="action=editDayDetails2&amp;pid=108998&amp;d=1&amp;date=2025-08-21&amp;dayitid=33">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="daydetailsbox">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <div class="eventimgclass" style="width: 50px; height: 50px;">
                                    <img style="width:100%;"
                                        src="data:image/png;base64,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">
                                </div>
                            </td>
                            <td width="90%" style="padding-left:10px;">
                                <div class="eventheading" style="margin-bottom:0px;">Arrival at Kuala Lumpur
                                    International, KL Evening Tour with Petronas Twin Towers and KL Tower</div>
                                <div><span style="color:#999999;; ">Post arrival at Kuala Lumpur Internation...</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="addeventbtnn" onclick="loadpop('Day 1 Details',this,'600px')"
                                    data-toggle="modal" data-target=".bs-example-modal-center"
                                    popaction="action=editDayDetails2&amp;pid=108998&amp;d=1&amp;date=2025-08-21&amp;dayitid=30">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="daydetailsbox">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <div class="eventimgclass" style="width: 50px; height: 50px;">
                                    <img style="width:100%;"
                                        src="data:image/png;base64,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">
                                </div>
                            </td>
                            <td width="90%" style="padding-left:10px;">
                                <div class="eventheading" style="margin-bottom:0px;">Departure from Kuala Lumpur</div>
                                <div><span style="color:#999999;; ">Today after breakfast, check out from th...</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="addeventbtnn" onclick="loadpop('Day 1 Details',this,'600px')"
                                    data-toggle="modal" data-target=".bs-example-modal-center"
                                    popaction="action=editDayDetails2&amp;pid=108998&amp;d=1&amp;date=2025-08-21&amp;dayitid=34">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="daydetailsbox">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <div class="eventimgclass" style="width: 50px; height: 50px;">
                                    <img style="width:100%;"
                                        src="data:image/png;base64,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">
                                </div>
                            </td>
                            <td width="90%" style="padding-left:10px;">
                                <div class="eventheading" style="margin-bottom:0px;">Full Day Genting Highland Tour
                                    with One Way Cable Car Ride + Enroute Batu Caves Tour..</div>
                                <div><span style="color:#999999;; ">See a quieter side of Kuala Lumpur on th...</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="addeventbtnn" onclick="loadpop('Day 1 Details',this,'600px')"
                                    data-toggle="modal" data-target=".bs-example-modal-center"
                                    popaction="action=editDayDetails2&amp;pid=108998&amp;d=1&amp;date=2025-08-21&amp;dayitid=28">
                                    <i class="fa fa-plus" aria-hidden="true"></i></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="daydetailsbox">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <div class="eventimgclass" style="width: 50px; height: 50px;">
                                    <img style="width:100%;"
                                        src="data:image/png;base64,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">
                                </div>
                            </td>
                            <td width="90%" style="padding-left:10px;">
                                <div class="eventheading" style="margin-bottom:0px;">Kuala Lumpur City Tour + KL Tower
                                </div>
                                <div><span style="color:#999999;; ">After Breakfast, get ready for Kuala Lum...</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="addeventbtnn" onclick="loadpop('Day 1 Details',this,'600px')"
                                    data-toggle="modal" data-target=".bs-example-modal-center"
                                    popaction="action=editDayDetails2&amp;pid=108998&amp;d=1&amp;date=2025-08-21&amp;dayitid=27">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="daydetailsbox">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <div class="eventimgclass" style="width: 50px; height: 50px;">
                                    <img style="width:100%;"
                                        src="data:image/png;base64,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">
                                </div>
                            </td>
                            <td width="90%" style="padding-left:10px;">
                                <div class="eventheading" style="margin-bottom:0px;">Kuala Selangor Fireflies Boat
                                    Cruise Experience from Kuala Lumpur</div>
                                <div><span style="color:#999999;; ">The quiet hamlet of Kampung Kuantan in K...</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="addeventbtnn" onclick="loadpop('Day 1 Details',this,'600px')"
                                    data-toggle="modal" data-target=".bs-example-modal-center"
                                    popaction="action=editDayDetails2&amp;pid=108998&amp;d=1&amp;date=2025-08-21&amp;dayitid=32">
                                    <i class="fa fa-plus" aria-hidden="true"></i></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="daydetailsbox">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <div class="eventimgclass" style="width: 50px; height: 50px;">
                                    <img style="width:100%;"
                                        src="data:image/png;base64,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">
                                </div>
                            </td>
                            <td width="90%" style="padding-left:10px;">
                                <div class="eventheading" style="margin-bottom:0px;">Putrajaya Sightseeing Tour with
                                    Traditional Boat Cruise</div>
                                <div><span style="color:#999999;; ">Putrajaya, also known as the World's Fir...</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="addeventbtnn" onclick="loadpop('Day 1 Details',this,'600px')"
                                    data-toggle="modal" data-target=".bs-example-modal-center"
                                    popaction="action=editDayDetails2&amp;pid=108998&amp;d=1&amp;date=2025-08-21&amp;dayitid=31">
                                    <i class="fa fa-plus" aria-hidden="true"></i></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</td>
