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

                <select name="destinationName" id="destinationName" class="form-control" onchange="loadhotel();"
                    style="pointer-events: none;">
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
                <select name="pricetype" id="pricetype" class="form-control valid" onchange="changepricetype();"
                    aria-invalid="false">
                    <option value="1">Manual</option>
                    <option value="2">From Master</option>
                </select>

            </div>
        </div>

        <div class="col-md-12 manual" style="display: none;">
            <div class="form-group">
                <label for="validationCustom02">Name
                </label>
                <input name="name" type="text" class="form-control ui-autocomplete-input valid" id="servicename"
                    value="Langkawi City Tour" required="" autocomplete="off" aria-required="true"
                    aria-invalid="false">

            </div>
        </div>

        <div class="col-md-12 master" style="display: block;">
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

                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="1970-01-01 {{ $time->format('H:i:s') }}">
                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor

                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="validationCustom02">End time</label>
                    <select name="checkOut" class="form-control" autocomplete="off">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="1970-01-01 {{ $time->format('H:i:s') }}">
                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <table border="0" cellpadding="2" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="showTime" class="stip1" value="1"
                                        style="width: 19px; height: 22px;"></td>
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
                <textarea name="description" rows="5" class="editorclass" id="description" aria-hidden="true"></textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer" style=" position:relative;">
    <button type="button" class="btn btn-danger waves-effect waves-light" style="position: absolute; left: 10px;"
        onclick=" dlt('2368712','108998');"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary"
        style="float:right;">
</div>
<input name="action" type="hidden" id="action" value="addActivity">
<input name="editId" type="hidden" id="editId" value="2368712">
<input name="pid" type="hidden" id="editId" value="108998">
<input name="packageDays" type="hidden" id="packageDays" value="">

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
