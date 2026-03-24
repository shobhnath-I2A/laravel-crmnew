 <div class="card-body">
    <div style="padding:10px;">
        <div class="row">
            <div class="col-lg-12" style="padding-left:15px;">
                <h4 class="mt-0 header-title">Client Information</h4>
                <div class="row" style="padding-left:10px;  ">
                    <div class="col-lg-3">
                        <div class="form-group input-group" style="position:relative;">
                            <label for="validationCustom02">Client Name:</label>
                            {{ $query->submitName ?? '' }} {{ $query->name ?? '' }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group" style="position:relative;">
                            <label for="validationCustom02">Mobile: </label>
                            {{ $query->mobile ?? '' }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">Email</label>
                            {{ $query->email ?? '' }}
                        </div>
                    </div>
                    <div class="col-lg-4" style="display:none;">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">Country</label>
                        </div>
                    </div>
                    <div class="col-lg-3" style="display:none;">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">State</label>
                        </div>
                    </div>
                    <div class="col-lg-5" style="display:none;">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">City</label>
                        </div>
                    </div>
                </div>

                <h4 class="mt-3 header-title">Query Information</h4>

                <div class="row" style="padding-left:10px;  ">
                    <div class="col-lg-3" style="display:none;">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">FROM
                                CITY</label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">Origin: </label>
                         {{ $query->originCity->name ?? '' }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">Destination:
                            </label>
                          {{ $query->destinationCity->name ?? '' }}
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02"> Date </label>
                            {{ $query->startDate ? \Carbon\Carbon::parse($query->startDate)->format('d-m-Y') : '' }}
                            To -
                            {{ $query->endDate ? \Carbon\Carbon::parse($query->endDate)->format('d-m-Y') : '' }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">Travel Month
                            </label>
                            {{ $query->travelMonth ?? '' }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">Lead Source
                            </label>
                            {{ $query->leadSource ?? '' }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label
                                for="validationCustom02">Services</label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">Pax</label>
                            <strong> Adult: </strong> {{ $query->adult ?? '' }} -
                            <strong>Child:</strong> {{ $query->child ?? '' }} -
                            <strong>Infant:</strong> {{ $query->infant ?? '' }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group input-group"
                            style="position:relative;">
                            <label for="validationCustom02">Assign
                                To</label>
                            i2a Technologies
                        </div>
                    </div>

                    <div class="col-lg-12" style="display:none;">
                        <table width="100%" border="0"
                            cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td width="41%">
                                        <div class="form-group input-group"
                                            style="position:relative;">
                                            <label
                                                for="validationCustom02">Internal
                                                Note</label>
                                            <div class="form-group"
                                                style="overflow:hidden;">
                                                <textarea name="internalnote" id="internalnote" onkeyup="saveinternalnote();" class="form-control"
                                                    style="width:400px;" placeholder="Note"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="59%">
                                        <div style="margin-top:5px;">
                                            <button type="submit"
                                                id="savingbutton"
                                                class="btn btn-primary"
                                                onclick="location.reload();">Save</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="display:none;" id="internote"></div>
                        <script>
                            function saveinternalnote() {
                                var internalnote = encodeURI($('#internalnote').val());
                                $('#internote').load('actionpage.php?action=saveinternalnote&queryId=127504&internalnote=' + internalnote);

                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12"
                style="padding: 0px 20px; margin-bottom: 0px;">
                <h4 class="mt-3 header-title" style="position:relative;">
                    Notes
                    <a onclick="$('#notefiledmaintop').show();$('#notedetails').focus();" style="position: absolute; font-size: 12px; font-weight: 600; right: 5px; top: 5px; background-color: #005ee2; color: #fff; padding: 1px 10px; border-radius: 3px; cursor:pointer;">+
                        Add Note
                    </a>
                </h4>
                <div class="card" style="margin-bottom:5px;">
                    <div class="col-lg-12" style="padding-left:15px;">
                        <div class="row" style="padding: 10px 5px 0px 0px;">
                            <div class="col-lg-12" id="notefiledmaintop"style="display:none;">
                                <form action="frmaction.html" method="post"enctype="multipart/form-data" name="addeditfrm" target="actoinfrm"
                                    id="addeditfrm">
                                    <div class="form-group" style="overflow:hidden;">
                                        <textarea name="details" id="notedetails" onkeyup="notedetailsfun();" class="form-control"
                                            style="height:80px; border: 5px solid #ddd;" placeholder="Type Note Here">
                                        </textarea>
                                        <div style="margin-top:5px; display:none;" id="noteaddbutton">
                                            <button type="submit" id="savingbutton" class="btn btn-secondary" onclick="this.form.submit();$('#noteaddbutton').hide();"
                                                style="float:right;">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Save Note
                                            </button>
                                        </div>
                                    </div>
                                    <input name="action" type="hidden" value="addnotes">
                                    <input name="queryid" type="hidden" value="127504">
                                </form>
                            </div>
                            <div class="col-lg-12" id="queryNotes"
                                style="max-height:372px; overflow:auto;">
                                <div style="text-align:center; color:#999999; padding-bottom:10px;">
                                    No Notes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function notedetailsfun() {
                var notedetails = $('#notedetails').val();
                if (notedetails != '') {
                    $('#noteaddbutton').show();
                } else {
                    $('#noteaddbutton').hide();
                }
            }
        </script>
        <div class="row" id="nosug">
            <div class="col-lg-12"style="padding: 0px 20px; margin-bottom: 0px;">
                <h4 class="mt-3 header-title" style="position:relative; margin-top:10px !important;">
                    Singapore Package Suggestion </h4>
                <div class="card" style="margin-bottom:5px; padding:10px;">
                    <table class="table table-hover mb-0"style=" font-size:13px;">
                        <thead>
                            <tr>
                                <th width="1%">&nbsp;</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Created</th>
                                <th width="1%">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="1%" valign="middle">
                                    <a href="display.html?ga=itineraries&amp;view=1&amp;id=109035"target="_blank">
                                        <img src="" style="width:64px; height:46px;  ">
                                    </a>
                                </td>
                                <td valign="middle">
                                    <a target="_blank" href="display.html?ga=itineraries&amp;view=1&amp;id=109035" style="color: #000; font-weight: 600;">
                                        Mr. Anup Nayak Trip to
                                        Singapore,Malaysia For 5N/6D
                                        <div style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 109035 - Singapore,Malaysia
                                        </div>
                                    </a>
                                </td>
                                <td valign="middle">₹ 153,750 </td>
                                <td valign="middle">
                                    <div style="margin-bottom:0px; font-weight:600;">
                                        Adarsh
                                    </div>
                                    <div style=" font-weight:600; font-size:11px; color:#999999;">
                                        04/08/2025
                                    </div>
                                </td>
                                <td width="1%" valign="middle">
                                    <a target="actoinfrm" onclick="$('.savingbutton109035').attr('disabled','true');$('.savingbutton109035').text('Inserting...');" href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=109035">
                                        <button type="button" class="btn btn-info btn-lg waves-effect waves-light savingbutton109035" id="savingbutton" style="font-size: 14px; padding: 5px 10px;">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Select
                                        </button>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td width="1%" valign="middle">
                                    <a href="display.html?ga=itineraries&amp;view=1&amp;id=109034" target="_blank">
                                        <img src="" style="width:64px; height:46px;  ">
                                    </a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=109034"
                                        style="color: #000; font-weight: 600;">Mr.
                                        Bibhuti Behera 's Trip to
                                        Singapore,Malaysia For 6N/7D <div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 109034 - Singapore,Malaysia
                                        </div></a></td>
                                <td valign="middle">₹ 133,400 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Adarsh </div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        04/08/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton109034').attr('disabled','true');$('.savingbutton109034').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=109034">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton109034"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>
                            <tr>
                                <td width="1%" valign="middle"><a
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=109019"
                                        target="_blank"><img
                                            src=""
                                            style="width:64px; height:46px;  "></a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=109019"
                                        style="color: #000; font-weight: 600;">Trail's
                                        To Singapore &amp; Bali With Flights
                                        Updated-1<div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 109019 - Singapore, bali
                                        </div></a></td>
                                <td valign="middle">₹ 310,900 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Anjali</div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        02/08/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton109019').attr('disabled','true');$('.savingbutton109019').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=109019">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton109019"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>

                            <tr>
                                <td width="1%" valign="middle"><a
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108984"
                                        target="_blank"><img
                                            src=""
                                            style="width:64px; height:46px;  "></a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108984"
                                        style="color: #000; font-weight: 600;">Trail's
                                        To Singapore &amp; Bali Without
                                        Flights Updated<div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 108984 - Singapore, bali
                                        </div></a></td>
                                <td valign="middle">₹ 249,700 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Anjali</div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        02/08/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton108984').attr('disabled','true');$('.savingbutton108984').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=108984">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton108984"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>

                            <tr>
                                <td width="1%" valign="middle"><a
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108930"
                                        target="_blank"><img
                                            src=""
                                            style="width:64px; height:46px;  "></a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108930"
                                        style="color: #000; font-weight: 600;">Mr.
                                        Jitendra Talwar trail to Singapore
                                        for 5N/6D <div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 108930 - Singapore </div>
                                        </a></td>
                                <td valign="middle">₹ 266,960 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Akash</div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        30/07/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton108930').attr('disabled','true');$('.savingbutton108930').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=108930">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton108930"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>
                            <tr>
                                <td width="1%" valign="middle"><a
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108929"
                                        target="_blank"><img
                                            src=""
                                            style="width:64px; height:46px;  "></a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108929"
                                        style="color: #000; font-weight: 600;">Mr.
                                        RAMESH PERIWAL trail to Singapore
                                        for 6N / 7D <div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 108929 - Singapore </div>
                                        </a></td>
                                <td valign="middle">₹ 435,525 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Akash</div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        30/07/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton108929').attr('disabled','true');$('.savingbutton108929').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=108929">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton108929"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>

                            <tr>
                                <td width="1%" valign="middle"><a
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108928"
                                        target="_blank"><img
                                            src=""
                                            style="width:64px; height:46px;  "></a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108928"
                                        style="color: #000; font-weight: 600;">Mr.
                                        Sivaramaiah 's Trip to
                                        Singapore,Malaysia For 6N/7D <div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 108928 - Singapore </div>
                                        </a></td>
                                <td valign="middle">₹ 316,140 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Akash</div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        30/07/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton108928').attr('disabled','true');$('.savingbutton108928').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=108928">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton108928"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>



                            <tr>
                                <td width="1%" valign="middle"><a
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108912"
                                        target="_blank"><img
                                            src=""
                                            style="width:64px; height:46px;  "></a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108912"
                                        style="color: #000; font-weight: 600;">Mr.
                                        Sivaramaiah 's Trip to
                                        Singapore,Malaysia For 6N/7D <div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 108912 - Singapore </div>
                                        </a></td>
                                <td valign="middle">₹ 316,140 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Sunil</div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        30/07/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton108912').attr('disabled','true');$('.savingbutton108912').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=108912">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton108912"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>



                            <tr>
                                <td width="1%" valign="middle"><a
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108911"
                                        target="_blank"><img
                                            src=""
                                            style="width:64px; height:46px;  "></a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108911"
                                        style="color: #000; font-weight: 600;">Mr.
                                        NAZAR 's Trip to Singapore,Malaysia
                                        For 6N/7D <div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 108911 - Singapore </div>
                                        </a></td>
                                <td valign="middle">₹ 133,400 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Sunil</div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        30/07/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton108911').attr('disabled','true');$('.savingbutton108911').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=108911">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton108911"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>

                            <tr>
                                <td width="1%" valign="middle">
                                    <a
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108908"
                                        target="_blank"><img
                                            src=""
                                            style="width:64px; height:46px;  "></a>
                                </td>
                                <td valign="middle"><a target="_blank"
                                        href="display.html?ga=itineraries&amp;view=1&amp;id=108908"
                                        style="color: #000; font-weight: 600;">Mr.
                                        Sivaramaiah Trail's To Singapore for
                                        4N / 5D <div
                                            style="color:#999999; font-size:11px; margin-top:2px;">
                                            ID: 108908 - Singapore </div>
                                        </a></td>
                                <td valign="middle">₹ 242,880 </td>
                                <td valign="middle">
                                    <div
                                        style="margin-bottom:0px; font-weight:600;">
                                        Sunil</div>
                                    <div
                                        style=" font-weight:600; font-size:11px; color:#999999;">
                                        30/07/2025</div>
                                </td>
                                <td width="1%" valign="middle"><a
                                        target="actoinfrm"
                                        onclick="$('.savingbutton108908').attr('disabled','true');$('.savingbutton108908').text('Inserting...');"
                                        href="actionpage.php?action=insertitinerary&amp;qid=127504&amp;id=108908">
                                        <button type="button"
                                            class="btn btn-info btn-lg waves-effect waves-light savingbutton108908"
                                            id="savingbutton"
                                            style="font-size: 14px; padding: 5px 10px;"><i
                                                class="fa fa-plus"
                                                aria-hidden="true"></i>
                                            Select </button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
