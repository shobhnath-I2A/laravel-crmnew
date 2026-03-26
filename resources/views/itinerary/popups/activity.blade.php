<style>
    .popup-box {
        max-width: 40%;
        margin-top: 5px;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="poptitle">Activity From 21-08-2025</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body" id="popcontent">
        <form class="custom-validation" action="frmaction.html" id="itineraries_validation" target="actoinfrm"
            novalidate="novalidate" method="post" enctype="multipart/form-data">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Day Itinerary order</label>
                            <input name="day_order" class="form-control" type="text" value="1" required=""
                                aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Destination
                            </label>

                            <select name="destinationName" id="destinationName" class="form-control"
                                onchange="loadhotel();" style="pointer-events: none;">
                                <option value="">Select</option>
                                <option value="Langkawi">Langkawi</option>
                                <option value="Kuala Lumpur"> Kuala Lumpur</option>
                            </select>

                            <script>
                                function loadhotel() {
                                    var destinationName = encodeURI($('#destinationName').val());

                                    $('#namemaster').load('loadactivity.php?destinationName=' + destinationName + '&eventobjectid=');
                                }
                            </script>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Type</label>



                            <select name="pricetype" id="pricetype" class="form-control" onchange="changepricetype();">
                                <option value="1">Manual</option>
                                <option value="2">From Master</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-12 manual">
                        <div class="form-group">
                            <label for="validationCustom02">Name
                            </label>
                            <input name="name" type="text" class="form-control ui-autocomplete-input"
                                id="servicename" value="Langkawi City Tour" required="" autocomplete="off"
                                aria-required="true">
                            <script type="text/javascript">
                                $(function() {

                                    // Single Select
                                    $("#servicename").autocomplete({
                                        source: function(request, response) {
                                            // Fetch data
                                            $.ajax({
                                                url: "ajax-city-search.php",
                                                type: 'post',
                                                dataType: "json",
                                                data: {
                                                    search: request.term,
                                                    sectionType: 'Activity'
                                                },
                                                success: function(data) {
                                                    response(data);
                                                }
                                            });
                                        },
                                        select: function(event, ui) {
                                            $('#servicename').val(ui.item.label); // display the selected text
                                            return false;
                                        }
                                    });


                                });
                            </script>
                        </div>
                    </div>


                    <div class="col-md-12 master" style="display:none;">
                        <div class="form-group">
                            <label for="validationCustom02">Name </label>
                            <select name="namemaster" id="namemaster" class="form-control" onchange="loadhoteldata();">
                                <option value="">Select</option>
                            </select>
                            <input type="hidden" name="hotelPriceId" id="hotelPriceId" value="0">
                            <div id="loadsightdata" style="display:none;"></div>
                            <script>
                                function loadhoteldata() {
                                    var namemaster = $('#namemaster').val();

                                    $('#loadsightdata').load('loadsightseeingdata.php?day=2025-08-21&namemaster=' + namemaster);
                                    $.get('loadsightseeingdata.php?day=2025-08-21&namemaster=' + namemaster, function(content) {
                                        // if you have one tinyMCE box on the page:
                                        tinyMCE.activeEditor.setContent(content);
                                    });


                                }

                                function changepricetype() {

                                    var pricetype = $('#pricetype').val();
                                    if (pricetype == 1) {
                                        $('.manual').show();
                                        $('.master').hide();
                                    }

                                    if (pricetype == 2) {
                                        $('.manual').hide();
                                        $('.master').show();
                                    }

                                }
                            </script>
                        </div>
                    </div>



                    <div class="row"
                        style="background: rgb(254, 250, 235); border-color: #f7d038; padding: 10px; width: 100%; margin: auto; border: 1px solid #ffd17e; margin: 10px 10px; border-radius: 4px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="validationCustom02">Date* </label>
                                <input type="text" class="form-control hasDatepicker" required="" name="startDate"
                                    id="startDate" value="21-08-2025" aria-required="true">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="validationCustom02">Start time</label>
                                <select name="checkIn" class="form-control" autocomplete="off">

                                    <option value="2026-03-26 00:00:00">12:00 AM</option>
                                    <option value="2026-03-26 00:15:00">12:15 AM</option>
                                    <option value="2026-03-26 00:30:00">12:30 AM</option>
                                    <option value="2026-03-26 00:45:00">12:45 AM</option>
                                    <option value="2026-03-26 01:00:00">1:00 AM</option>
                                    <option value="2026-03-26 01:15:00">1:15 AM</option>
                                    <option value="2026-03-26 01:30:00">1:30 AM</option>
                                    <option value="2026-03-26 01:45:00">1:45 AM</option>

                                    <option value="2026-03-26 23:15:00">11:15 PM</option>
                                    <option value="2026-03-26 23:30:00">11:30 PM</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="validationCustom02">End time</label>
                                <select name="checkOut" class="form-control" autocomplete="off">

                                    <option value="2026-03-26 00:00:00">12:00 AM</option>
                                    <option value="2026-03-26 00:15:00">12:15 AM</option>
                                    <option value="2026-03-26 00:30:00">12:30 AM</option>
                                    <option value="2026-03-26 00:45:00">12:45 AM</option>
                                    <option value="2026-03-26 01:00:00">1:00 AM</option>
                                    <option value="2026-03-26 01:15:00">1:15 AM</option>
                                    <option value="2026-03-26 01:30:00">1:30 AM</option>

                                    <option value="2026-03-26 22:45:00">10:45 PM</option>
                                    <option value="2026-03-26 23:00:00">11:00 PM</option>
                                    <option value="2026-03-26 23:15:00">11:15 PM</option>
                                    <option value="2026-03-26 23:30:00">11:30 PM</option>

                                </select>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <table border="0" cellpadding="2" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><input type="checkbox" name="showTime" class="stip1"
                                                    value="1" style="width: 19px; height: 22px;"></td>
                                            <td>&nbsp;Show Time </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Description
                            </label>
                            <div id="mceu_15" class="mce-tinymce mce-container mce-panel" hidefocus="1"
                                tabindex="-1" role="application"
                                style="visibility: hidden; border-width: 1px; width: 100%;">
                                <div id="mceu_15-body" class="mce-container-body mce-stack-layout">
                                    <div id="mceu_16"
                                        class="mce-top-part mce-container mce-stack-layout-item mce-first">
                                        <div id="mceu_16-body" class="mce-container-body">
                                            <div id="mceu_17"
                                                class="mce-container mce-menubar mce-toolbar mce-first" role="menubar"
                                                style="border-width: 0px 0px 1px;">
                                                <div id="mceu_17-body" class="mce-container-body mce-flow-layout">
                                                    <div id="mceu_18"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_18" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_18-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">File</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_19"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_19" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_19-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">Edit</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_20"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_20" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_20-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">View</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_21"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_21" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_21-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">Insert</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_22"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_22" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_22-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">Format</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_23"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_23" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_23-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">Tools</span> <i
                                                                class="mce-caret"></i></button></div>
                                                </div>
                                            </div>
                                            <div id="mceu_24"
                                                class="mce-toolbar-grp mce-container mce-panel mce-last"
                                                hidefocus="1" tabindex="-1" role="group">
                                                <div id="mceu_24-body" class="mce-container-body mce-stack-layout">
                                                    <div id="mceu_25"
                                                        class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last"
                                                        role="toolbar">
                                                        <div id="mceu_25-body"
                                                            class="mce-container-body mce-flow-layout">
                                                            <div id="mceu_26"
                                                                class="mce-container mce-flow-layout-item mce-first mce-btn-group"
                                                                role="group">
                                                                <div id="mceu_26-body">
                                                                    <div id="mceu_0"
                                                                        class="mce-widget mce-btn mce-first mce-disabled"
                                                                        tabindex="-1" role="button"
                                                                        aria-label="Undo" aria-disabled="true"><button
                                                                            id="mceu_0-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-undo"></i></button>
                                                                    </div>
                                                                    <div id="mceu_1"
                                                                        class="mce-widget mce-btn mce-last mce-disabled"
                                                                        tabindex="-1" role="button"
                                                                        aria-label="Redo" aria-disabled="true"><button
                                                                            id="mceu_1-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-redo"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_27"
                                                                class="mce-container mce-flow-layout-item mce-btn-group"
                                                                role="group">
                                                                <div id="mceu_27-body">
                                                                    <div id="mceu_2"
                                                                        class="mce-widget mce-btn mce-menubtn mce-first mce-last mce-btn-has-text"
                                                                        tabindex="-1" aria-labelledby="mceu_2"
                                                                        role="button" aria-haspopup="true"><button
                                                                            id="mceu_2-open" role="presentation"
                                                                            type="button" tabindex="-1"><span
                                                                                class="mce-txt">Formats</span> <i
                                                                                class="mce-caret"></i></button></div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_28"
                                                                class="mce-container mce-flow-layout-item mce-btn-group"
                                                                role="group">
                                                                <div id="mceu_28-body">
                                                                    <div id="mceu_3"
                                                                        class="mce-widget mce-btn mce-first"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Bold"><button
                                                                            id="mceu_3-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-bold"></i></button>
                                                                    </div>
                                                                    <div id="mceu_4"
                                                                        class="mce-widget mce-btn mce-last"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Italic"><button
                                                                            id="mceu_4-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-italic"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_29"
                                                                class="mce-container mce-flow-layout-item mce-btn-group"
                                                                role="group">
                                                                <div id="mceu_29-body">
                                                                    <div id="mceu_5"
                                                                        class="mce-widget mce-btn mce-first"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Align left"><button
                                                                            id="mceu_5-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-alignleft"></i></button>
                                                                    </div>
                                                                    <div id="mceu_6" class="mce-widget mce-btn"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Align center">
                                                                        <button id="mceu_6-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-aligncenter"></i></button>
                                                                    </div>
                                                                    <div id="mceu_7" class="mce-widget mce-btn"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Align right">
                                                                        <button id="mceu_7-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-alignright"></i></button>
                                                                    </div>
                                                                    <div id="mceu_8"
                                                                        class="mce-widget mce-btn mce-last"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Justify"><button
                                                                            id="mceu_8-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-alignjustify"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_30"
                                                                class="mce-container mce-flow-layout-item mce-btn-group"
                                                                role="group">
                                                                <div id="mceu_30-body">
                                                                    <div id="mceu_9"
                                                                        class="mce-widget mce-btn mce-splitbtn mce-menubtn mce-first"
                                                                        role="button" aria-pressed="false"
                                                                        tabindex="-1" aria-label="Bullet list"
                                                                        aria-haspopup="true"><button type="button"
                                                                            hidefocus="1" tabindex="-1"><i
                                                                                class="mce-ico mce-i-bullist"></i></button><button
                                                                            type="button" class="mce-open"
                                                                            hidefocus="1" tabindex="-1"> <i
                                                                                class="mce-caret"></i></button></div>
                                                                    <div id="mceu_10"
                                                                        class="mce-widget mce-btn mce-splitbtn mce-menubtn"
                                                                        role="button" aria-pressed="false"
                                                                        tabindex="-1" aria-label="Numbered list"
                                                                        aria-haspopup="true"><button type="button"
                                                                            hidefocus="1" tabindex="-1"><i
                                                                                class="mce-ico mce-i-numlist"></i></button><button
                                                                            type="button" class="mce-open"
                                                                            hidefocus="1" tabindex="-1"> <i
                                                                                class="mce-caret"></i></button></div>
                                                                    <div id="mceu_11" class="mce-widget mce-btn"
                                                                        tabindex="-1" role="button"
                                                                        aria-label="Decrease indent"><button
                                                                            id="mceu_11-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-outdent"></i></button>
                                                                    </div>
                                                                    <div id="mceu_12"
                                                                        class="mce-widget mce-btn mce-last"
                                                                        tabindex="-1" role="button"
                                                                        aria-label="Increase indent"><button
                                                                            id="mceu_12-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-indent"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_31"
                                                                class="mce-container mce-flow-layout-item mce-last mce-btn-group"
                                                                role="group">
                                                                <div id="mceu_31-body">
                                                                    <div id="mceu_13"
                                                                        class="mce-widget mce-btn mce-first"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Insert/edit link">
                                                                        <button id="mceu_13-button"
                                                                            role="presentation" type="button"
                                                                            tabindex="-1"><i
                                                                                class="mce-ico mce-i-link"></i></button>
                                                                    </div>
                                                                    <div id="mceu_14"
                                                                        class="mce-widget mce-btn mce-last"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Insert/edit image">
                                                                        <button id="mceu_14-button"
                                                                            role="presentation" type="button"
                                                                            tabindex="-1"><i
                                                                                class="mce-ico mce-i-image"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="mceu_32"
                                        class="mce-edit-area mce-container mce-panel mce-stack-layout-item"
                                        hidefocus="1" tabindex="-1" role="group"
                                        style="border-width: 1px 0px 0px;"><iframe id="description_ifr"
                                            frameborder="0" allowtransparency="true"
                                            title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help"
                                            style="width: 100%; height: 111px; display: block;"></iframe></div>
                                    <div id="mceu_33"
                                        class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last"
                                        hidefocus="1" tabindex="-1" role="group"
                                        style="border-width: 1px 0px 0px;">
                                        <div id="mceu_33-body" class="mce-container-body mce-flow-layout">
                                            <div id="mceu_34" class="mce-path mce-flow-layout-item mce-first">
                                                <div class="mce-path-item">&nbsp;</div>
                                            </div>
                                            <div id="mceu_35" class="mce-flow-layout-item mce-resizehandle"><i
                                                    class="mce-ico mce-i-resize"></i></div><span id="mceu_36"
                                                class="mce-branding mce-widget mce-label mce-flow-layout-item mce-last">
                                                Powered by <a
                                                    href="https://www.tinymce.com/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce"
                                                    rel="noopener" target="_blank" role="presentation"
                                                    tabindex="-1">tinymce</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <textarea name="description" rows="5" class="editorclass" id="description" style="display: none;"
                                aria-hidden="true"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style=" position:relative;">

                <button type="button" class="btn btn-danger waves-effect waves-light"
                    style="position: absolute; left: 10px;" onclick=" dlt('2368712','108998');"><i
                        class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary"
                    style="float:right;">
            </div>

            <input name="action" type="hidden" id="action" value="addActivity">
            <input name="editId" type="hidden" id="editId" value="2368712">
            <input name="pid" type="hidden" id="editId" value="108998">
            <input name="packageDays" type="hidden" id="packageDays" value="">
        </form>

        <script>
            function dlt(id, pid) {
                if (confirm('Are you sure your want to delete?')) {
                    $('#ActionDiv').load('actionpage.php?did=' + id + '&action=delteevent&pid=' + pid);
                }

            }

            $(function() {

                $('#startDate').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: 0,
                    beforeShow: function() {
                        $(this).datepicker('option', 'maxDate', $('#endDate').val());
                    }
                });
                $('#endDate').datepicker({
                    dateFormat: 'dd-mm-yy',
                    defaultDate: "+1w",
                    beforeShow: function() {
                        $(this).datepicker('option', 'minDate', $('#startDate').val());
                        if ($('#startDate').val() === '') $(this).datepicker('option', 'minDate', 0);
                    }
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                $('.custom-validation').validate({

                    submitHandler: function(form) {
                        // Form submission logic here, e.g., AJAX call
                        $('.custom-validation #savingbutton').prop('disabled', true).val('Saving...');
                        form.submit();
                    }
                });
            });
        </script>
    </div>
</div>
