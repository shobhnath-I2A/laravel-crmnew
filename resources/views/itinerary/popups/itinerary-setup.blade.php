<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-body">
    {{-- {{ $package ?? '' }} --}}
    <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate="novalidate" method="post"
        enctype="multipart/form-data">

        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <div class="form-group">
                        <label for="validationCustom02">Itinerary Name
                        </label>
                        <input name="name" type="text" class="form-control reqfield" required="" id="name"
                            value="shobhnath1321" aria-required="true">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="validationCustom02">Start Date </label>
                        <input type="hidden" class="form-control reqfield" name="startDateOld" value="01-04-2026">
                        <input type="text" class="form-control reqfield hasDatepicker" required=""
                            name="startDate" id="startDate" value="01-04-2026" aria-required="true">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="validationCustom02">End Date </label>
                        <input type="text" class="form-control reqfield hasDatepicker" required="" name="endDate"
                            id="endDate" value="09-04-2026" aria-required="true">
                    </div>
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

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="validationCustom02">Adult</label>
                        <input type="number" min="1" class="form-control reqfield" required="" name="adult"
                            value="1" aria-required="true">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="validationCustom02">Child</label>
                        <input type="number" min="0" class="form-control" name="child" value="0">
                    </div>
                </div>



                <div class="col-md-8">
                    <div class="form-group">
                        <label for="validationCustom02">Destinations</label>
                        <input type="text" class="form-control reqfield" name="destinations" required=""
                            placeholder="Enter comma separated destinations" value="delhi" aria-required="true">
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label for="validationCustom02">Notes</label>
                        <textarea name="notes" rows="2" class="form-control" placeholder="Notes"></textarea>
                    </div>
                </div>




            </div>
        </div>

        <div class="modal-footer">
            <input name="Cancel" type="submit" value="Cancel" data-dismiss="modal" aria-label="Close"
                class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray">
            <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary">
        </div>

        <input name="action" type="hidden" id="action" value="addtineraries">
        <input name="editId" type="hidden" id="editId" value="109145">
        <input name="queryid" type="hidden" id="queryid" value="127779">
    </form>
</div>
