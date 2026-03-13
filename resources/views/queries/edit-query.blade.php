
<form action="" method="POST" id="queryForm">
    @csrf
    <div class="container-fluid">
        <!-- CLIENT INFORMATION -->
        <div class="card shadow-sm mb-3">
            <div class="card-header bg-light">
                <strong>Client Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Mobile <span class="redmtext">*</span></label>
                        <input type="text" name="mobile" id="mobile" class="form-control reqfield" maxlength="10" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="redmtext">*</span></label>
                        <input type="email" name="email" class="form-control reqfield" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Title</label>
                        <select name="submitName" class="form-control">
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                            <option>Dr.</option>
                        </select>
                    </div>
                    <div class="col-md-10">
                        <label class="form-label">Client Name <span class="redmtext">*</span></label>
                        <input type="text" name="name" class="form-control reqfield" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- TRAVEL DETAILS -->

        <div class="card shadow-sm mb-3">
            <div class="card-header bg-light">
                <strong>Travel Details</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        {{-- <label class="form-label">Travel Type</label> --}}

                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                type="radio"
                                name="querytype"
                                id="domestic"
                                value="Domestic"
                                checked>

                            <label class="form-check-label" for="domestic">
                                Domestic
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                type="radio"
                                name="querytype"
                                id="international"
                                value="International">

                            <label class="form-check-label" for="international">
                                International
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Travel Month </label>
                        <input type="text" name="travelMonth" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Origin <span class="redmtext">*</span></label>
                        <input type="text" name="origin" class="form-control reqfield" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Destination <span class="redmtext">*</span></label>
                        <input type="text" name="destination" class="form-control reqfield" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">From Date <span class="redmtext">*</span></label>
                        <input type="date" name="startDate" class="form-control reqfield" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">To Date <span class="redmtext">*</span></label>
                        <input type="date" name="endDate" class="form-control reqfield" required>
                    </div>

                </div>
            </div>
        </div>

        <!-- PASSENGER DETAILS -->

        <div class="card shadow-sm mb-3">
            <div class="card-header bg-light">
                <strong>Passengers</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Adult <span class="redmtext">*</span></label>
                        <input type="number" name="adult" class="form-control reqfield" min="1" required>
                    </div>
                    <div class="col-md-4">
                        <label>Child</label>
                        <input type="number" name="child" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label>Infant</label>
                        <select name="infant" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <!-- SALES DETAILS -->
        <div class="card shadow-sm mb-3">
            <div class="card-header bg-light">
                <strong>Sales Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Lead Source</label>
                        <select name="leadSource" class="form-control">

                            <option>Website</option>
                            <option>Google</option>
                            <option>Facebook</option>
                            <option>Referral</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Priority</label>
                        <select name="priorityStatus" class="form-control">
                            <option value="0">General</option>
                            <option value="1">Hot</option>
                            <option value="2">Warm</option>
                            <option value="3">Cold</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Assign To</label>
                        <select name="assignTo" class="form-control">
                            <option>Assign to me</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Service</label>
                        <select id="serviceId" name="serviceId" class="form-control" displayname="country" autocomplete="off">
                            <option value="0">Select Service</option>
                            <option value="5">Activities only</option>
                            <option value="3">Flight only</option>
                            <option value="1">Full package</option>
                            <option value="7">Hotel + Flight</option>
                            <option value="8">Hotel + Transport</option>
                            <option value="2">Hotel only</option>
                            <option value="6">Transport only</option>
                            <option value="4">Visa only</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- REMARK -->
        <div class="card shadow-sm mb-3">
            <div class="card-header bg-light">
                <strong>Remark</strong>
            </div>
            <div class="card-body">
                <textarea name="details" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <!-- FOOTER BUTTONS -->
        <div class="text-end mb-3">
            <button type="button" onclick="closeSidebar()" class="btn btn-light">
                Cancel
            </button>
            <button type="submit" class="btn btn-primary">
                Save Query
            </button>
        </div>
    </div>
</form>
