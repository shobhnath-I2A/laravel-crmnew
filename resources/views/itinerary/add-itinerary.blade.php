<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation" action="frmaction.html" target="actoinfrm" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <!-- ITINERARY INFORMATION -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Itinerary Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Itinerary Name <span class="redmtext">*</span></label>
                            <input name="name" type="text" class="form-control reqfield" required id="name"
                                value="" aria-required="true">
                        </div>
                        <div class="col-md-6">
                            <label>Start Date <span class="redmtext">*</span></label>
                            <input type="hidden" name="startDateOld" value="01-01-1970">
                            <input type="text" name="startDate" id="startDate" class="form-control reqfield"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label>End Date <span class="redmtext">*</span></label>
                            <input type="text" name="endDate" id="endDate" class="form-control reqfield" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TRAVELLERS -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Travellers</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Adult</label>
                            <input type="number" name="adult" min="1" value="1"
                                class="form-control reqfield" required>
                        </div>
                        <div class="col-md-3">
                            <label>Child</label>
                            <input type="number" name="child" min="0" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Destinations <span class="redmtext">*</span></label>
                            <input type="text" name="destinations" class="form-control reqfield" required
                                placeholder="Enter comma separated destinations">
                        </div>
                    </div>
                </div>
            </div>
            <!-- NOTES -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Notes</strong>
                </div>
                <div class="card-body">
                    <textarea name="notes" rows="2" class="form-control" placeholder="Notes"></textarea>
                </div>
            </div>
            <!-- WEBSITE SETTINGS -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Website Settings</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Theme</label>
                            <select name="packageThemeId" class="form-control">
                                <option value="4">Adventure</option>
                                <option value="5">Beach Holiday</option>
                                <option value="3">Hill Station</option>
                                <option value="6">Honeymoon</option>
                                <option value="2">Leisure</option>
                                <option value="1">Wildlife</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Show on Website</label>
                            <select name="showwebsite" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Per Person Price <span class="redmtext">*</span></label>
                            <input type="text" name="websiteCost" class="form-control reqfield" required>
                        </div>
                        <div class="col-md-6">
                            <label>Validity <span class="redmtext">*</span></label>
                            <input type="text" name="websiteValidity" id="websiteValidity"
                                class="form-control reqfield" required>
                        </div>
                        <div class="col-md-3">
                            <label>Popular</label>
                            <select name="showinPopular" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Special</label>
                            <select name="showinSpecial" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ABOUT PACKAGE -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>About Package</strong>
                </div>
                <div class="card-body">
                    <textarea name="aboutPackage" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <!-- BUTTONS -->
            <div class="text-end mb-3">
                <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray valid" onclick="closeSidebar()">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary savingbutton" id="savingbutton">
                    Save
                </button>
            </div>
        </div>
        <input type="hidden" name="action" value="addtineraries">
        <input type="hidden" name="editId" id="editId">
        <input type="hidden" name="queryid" id="queryid">
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#startDate").datepicker({
            numberOfMonths: 2,
            dateFormat: 'dd-mm-yy',
            onSelect: function(selected) {
                $("#endDate").datepicker("option", "minDate", selected)
            }
        });
        $("#endDate").datepicker({
            dateFormat: 'dd-mm-yy',
            numberOfMonths: 2,
            onSelect: function(selected) {
                $("#startDate").datepicker("option", "maxDate", selected)
            }
        });
    });
</script>
<script>
    $(function() {
        $("#startDate").datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $("#endDate").datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $("#websiteValidity").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
</script>
{{-- <script>
    $(document).ready(function() {

        $('.custom-validation').validate({

            submitHandler: function(form) {

                $('#savingbutton')
                    .prop('disabled', true)
                    .val('Saving...');

                form.submit();

            }

        });

    });
</script> --}}
