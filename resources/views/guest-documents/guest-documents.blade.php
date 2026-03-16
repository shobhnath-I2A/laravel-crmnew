<div class="card-body">
    <div style="padding:10px;">
        <style>
            .statusbox {
                margin-right: 5px;
                padding: 10px;
                text-align: center;
                background-color: #000000;
                font-size: 13px;
                color: #fff;
                border-radius: 4px;
                text-transform: uppercase;
            }

            .conf {
                width: 100px;
                border: 1px solid #ddd;
                border-radius: 3px;
                padding: 5px;
                text-align: center;
            }
        </style>
        <div>
            <div>
                <div>
                    <h4 class="mt-0 header-title" style="border-bottom:0px; overflow:hidden; position:relative;">Guests
                        (0)
                        <button type="button" onclick="loadpop('Add Guest',this,'700px')" data-toggle="modal"
                            data-target=".bs-example-modal-center"
                            popaction="action=addGuest&amp;queryId=127497&amp;packageId="
                            style="position: absolute; font-size: 12px; font-weight: 600; right: 5px; top:2px; background-color: #005ee2; color: #fff; padding: 2px 10px; border-radius: 3px; border:0px; cursor: pointer;">+Add
                            Guest</button>
                    </h4>
                    <div class="card" style="padding:10px;">
                        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                            style="font-size:14px;" class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th bgcolor="#f5f7f9">First Name</th>
                                    <th bgcolor="#f5f7f9">Last Name</th>
                                    <th bgcolor="#f5f7f9">Gender</th>
                                    <th bgcolor="#f5f7f9">Date of Birth </th>
                                    <th width="1%" bgcolor="#f5f7f9"> </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Guest Popup Form --}}

<div class="modal fade bs-example-modal-center" id="guestModal" tabindex="-1" role="dialog">    id="" style="display: block; padding-right: 10px;">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px; width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="poptitle">Add Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="popcontent">
                <script src="tinymce/tinymce.min.js"></script>
                <script type="text/javascript">
                    tinymce.init({
                        selector: ".editorclass",
                        themes: "modern",
                        plugins: [
                            "advlist autolink lists link image charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                    });
                </script>
                <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate="novalidate"
                    method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" required="" name="firstName"
                                        value="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom02">Last Name<span class="redmtext">*</span> </label>
                                    <input type="text" class="form-control" required="" name="lastName"
                                        value="" aria-required="true">
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
                                    <input type="text" class="form-control hasDatepicker" required=""
                                        name="startDate" id="startDate" value="16-03-2026" aria-required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input name="Save" type="submit" value="Save" id="savingbutton"
                            class="btn btn-primary"
                            onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
                    </div>
                    <input name="action" type="hidden" id="action" value="addGuest">
                    <input name="queryId" type="hidden" id="" value="127497">
                    <input name="editId" type="hidden" id="" value="">
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
    </div>
</div>
