{{-- Guest Popup Form --}}
<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-body">
    <div class="modal-body" id="popcontent">
        <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate="novalidate" method="post"
            enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="validationCustom02">&nbsp;&nbsp; </label>
                            <select name="submitName" class="form-control">
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Prof.">Prof.</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="validationCustom02">First Name<span class="redmtext">*</span> </label>
                            <input type="text" class="form-control" required="" name="firstName" value=""
                                aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Last Name<span class="redmtext">*</span> </label>
                            <input type="text" class="form-control" required="" name="lastName" value=""
                                aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Gender<span class="redmtext">*</span> </label>
                            <select name="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Date of Birth* </label>
                            <input type="text" class="form-control hasDatepicker" required="" name="startDate"
                                id="startDate" value="16-03-2026" aria-required="true">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary"
                    onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
            </div>
            <input name="queryId" type="hidden" id="" value="{{ $queryId??'' }}">
        </form>
        <script>
            $(function() {
                $("#startDate").datepicker({
                    dateFormat: 'dd-mm-yy',
                    maxDate: new Date(),
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-90:+00"
                });
            });
        </script>
    </div>
</div>
