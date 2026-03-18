
<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form action="{{ route('queries.store') }}" method="POST" id="queryForm" class="custom-validation ajax-form">
        @csrf
        <div class="container-fluid ">
            <!-- CLIENT INFORMATION -->
            <div class="card shadow-sm mb-3 ">
                <div class="card-header bg-light">
                    <strong>Client Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Mobile <span class="redmtext">*</span></label>
                            <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}"
                                class="form-control reqfield @error('mobile') is-invalid @enderror" maxlength="10">
                            @error('mobile')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email <span class="redmtext">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control reqfield @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Title</label>
                            <select name="submitName" class="form-control">
                                <option value="Mr." {{ old('submitName') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ old('submitName') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                <option value="Ms." {{ old('submitName') == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                                <option value="Dr." {{ old('submitName') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                            </select>
                            @error('submitName')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-10">
                            <label class="form-label">Client Name <span class="redmtext">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control reqfield @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
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
                                <input class="form-check-input" type="radio" name="querytype" id="domestic"
                                    value="Domestic" {{ old('querytype', 'Domestic') == 'Domestic' ? 'checked' : '' }}>

                                <label class="form-check-label" for="domestic">
                                    Domestic
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="querytype" id="international"
                                    value="International" {{ old('querytype') == 'International' ? 'checked' : '' }}>

                                <label class="form-check-label" for="international">
                                    International
                                </label>
                            </div>

                            @error('querytype')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Travel Month </label>
                            <input type="text" name="travelMonth" value="{{ old('travelMonth') }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Origin <span class="redmtext">*</span></label>
                            <input type="text" name="origin" value="{{ old('origin') }}" class="form-control reqfield" required>
                            @error('origin')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Destination <span class="redmtext">*</span></label>
                            <input type="text" name="destination" value="{{ old('destination') }}" class="form-control reqfield" required>
                            @error('destination')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">From Date <span class="redmtext">*</span></label>
                            <input type="text" name="startDate" value="{{ old('startDate') }}" id="startDate" class="form-control reqfield"
                                required>
                            @error('startDate') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">To Date <span class="redmtext">*</span></label>
                            <input type="text" name="endDate" value="{{ old('endDate') }}" id="endDate" class="form-control reqfield"
                                required>
                            @error('endDate')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
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
                            <input type="number" name="adult" value="{{ old('adult') }}" class="form-control reqfield" min="1"
                                required>
                            @error('adult')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Child</label>
                            <input type="number" name="child" value="{{ old('child') }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Infant</label>
                            <select name="infant" class="form-control">
                                <option value="0" {{ old('infant') == '0' ? 'selected' : '' }}>0</option>
                                <option value="1" {{ old('infant') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('infant') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('infant') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('infant') == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('infant') == '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('infant') == '6' ? 'selected' : '' }}>6</option>
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
                                <option value="Website" {{ old('leadSource') == 'Website' ? 'selected' : '' }}>Website</option>
                                <option value="Google" {{ old('leadSource') == 'Google' ? 'selected' : '' }}>Google</option>
                                <option value="Facebook" {{ old('leadSource') == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="Referral" {{ old('leadSource') == 'Referral' ? 'selected' : '' }}>Referral</option>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Priority</label>
                            <select name="priorityStatus" class="form-control">
                                <option value="0" {{ old('priorityStatus') == '0' ? 'selected' : '' }}>General</option>
                                <option value="1" {{ old('priorityStatus') == '1' ? 'selected' : '' }}>Hot</option>
                                <option value="2" {{ old('priorityStatus') == '2' ? 'selected' : '' }}>Warm</option>
                                <option value="3" {{ old('priorityStatus') == '3' ? 'selected' : '' }}>Cold</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Assign To</label>
                            <select name="assignTo" class="form-control">
                                <option value="me" {{ old('assignTo') == 'me' ? 'selected' : '' }}>Assign to me</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Service</label>
                            <select id="serviceId" name="serviceId" class="form-control" displayname="country"
                                autocomplete="off">
                                <option value="0" {{ old('serviceId') == '0' ? 'selected' : '' }}>Select Service</option>
                                <option value="5" {{ old('serviceId') == '5' ? 'selected' : '' }}>Activities only</option>
                                <option value="3" {{ old('serviceId') == '3' ? 'selected' : '' }}>Flight only</option>
                                <option value="1" {{ old('serviceId') == '1' ? 'selected' : '' }}>Full package</option>
                                <option value="7" {{ old('serviceId') == '7' ? 'selected' : '' }}>Hotel + Flight</option>
                                <option value="8" {{ old('serviceId') == '8' ? 'selected' : '' }}>Hotel + Transport</option>
                                <option value="2" {{ old('serviceId') == '2' ? 'selected' : '' }}>Hotel only</option>
                                <option value="6" {{ old('serviceId') == '6' ? 'selected' : '' }}>Transport only</option>
                                <option value="4" {{ old('serviceId') == '4' ? 'selected' : '' }}>Visa only</option>
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
                    <textarea name="details" rows="3" class="form-control">{{ old('details') }}</textarea>
                </div>
            </div>
            <!-- FOOTER BUTTONS -->
            <div class="text-end mb-3">
                <button type="button" onclick="closeSidebar()"
                    class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray valid">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Save Query
                </button>
            </div>
        </div>
    </form>
</div>

