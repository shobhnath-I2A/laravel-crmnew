<script>
    tinymce.init({
        selector: ".editorclass",
        plugins: "advlist autolink lists link image charmap preview anchor searchreplace code fullscreen",
        toolbar: "undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image"
    });
</script>
<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation" action="frmaction.html" target="actoinfrm" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <!-- CLIENT INFORMATION -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Client Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-label">Title</label>
                            <select name="submitName" class="form-control">
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Prof.">Prof.</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">First Name <span class="redmtext">*</span></label>
                            <input type="text" class="form-control reqfield" name="firstName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name <span class="redmtext">*</span></label>
                            <input type="text" class="form-control reqfield" name="lastName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email <span class="redmtext">*</span></label>
                            <input type="email" class="form-control reqfield" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email 2</label>
                            <input type="email" class="form-control" name="email2">
                        </div>
                    </div>
                </div>
            </div>
            <!-- MOBILE DETAILS -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Contact Details</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Mobile</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" name="mobileCode" placeholder="+91"
                                    style="max-width:80px;margin-right:8px">
                                <input type="text" class="form-control" name="mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mobile 2</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" name="mobileCode2" placeholder="+91"
                                    style="max-width:80px;margin-right:8px">
                                <input type="text" class="form-control" name="mobile2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADDRESS INFORMATION -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Address Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">City <span class="redmtext">*</span></label>
                              <select name="city" class="form-control reqfield">
                                <option value="">Select Destination</option>
                                @foreach($destinationList as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('destination_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            {{-- <input type="text" class="form-control reqfield"
                                onkeyup="getSearchCIty('pickupCitySearch','pickupCity','searchcitylists');"
                                id="pickupCitySearch" name="pickupCitySearch" autocomplete="off" required>
                            <input name="city" id="pickupCity" type="hidden">
                            <div id="searchcitylists"></div> --}}
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                </div>
            </div>
            <!-- PERSONAL DETAILS -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Personal Details</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <input type="text" class="form-control" name="dob" id="dob">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Marriage Anniversary</label>
                            <input type="text" class="form-control" name="marriageAnniversary"
                                id="marriageAnniversary">
                        </div>
                    </div>
                </div>
            </div>
            <!-- BUTTONS -->
            <div class="text-end mb-3">
                <button type="button" onclick="closeSidebar()" class="btn  btn-secondary btn-lg waves-effect waves-light btn-primary-gray valid" data-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" id="savingbutton" class="btn btn-primary">
                    Save Client
                </button>
            </div>
        </div>
        <input name="action" type="hidden" value="addclient">
        <input name="editId" type="hidden">
    </form>
</div>
<script>
    $(function() {

        $("#dob").datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: new Date(),
            changeMonth: true,
            changeYear: true,
            yearRange: "-90:+0"
        });

        $("#marriageAnniversary").datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: new Date(),
            changeMonth: true,
            changeYear: true,
            yearRange: "-90:+0"
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
