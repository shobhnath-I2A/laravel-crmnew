
<div class="wrapper" style="margin-top: 0px; padding:15px;">
  <form class="custom-validation ajax-form" action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST">
    @csrf
    @if(isset($client))
        @method('PUT')
    @endif
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
                           <select name="submit_name" class="form-control">
                                <option value="Mr." {{ old('submit_name', $client->submit_name ?? '') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ old('submit_name', $client->submit_name ?? '') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                <option value="Ms." {{ old('submit_name', $client->submit_name ?? '') == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                                <option value="Dr." {{ old('submit_name', $client->submit_name ?? '') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">First Name <span class="redmtext">*</span></label>
                            <input type="text" class="form-control reqfield @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $client->first_name ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name <span class="redmtext">*</span></label>
                            <input type="text" class="form-control reqfield" name="last_name" value="{{ old('last_name', $client->last_name ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email <span class="redmtext">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $client->email ?? '') }}"
                                class="form-control reqfield @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email 2</label>
                            <input type="email" name="email2" value="{{ old('email2', $client->email2 ?? '') }}"
                                class="form-control ">

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
                                <select name="mobile_code" class="form-control reqfield @error('mobile_code') is-invalid @enderror" name="mobile_code" style="max-width:80px;margin-right:8px">
                                    <option value="+91" {{ old('mobile_code', $client->mobile_code ?? '') == '+91' ? 'selected' : '' }}>+91</option>
                                    <option value="+1" {{ old('mobile_code', $client->mobile_code ?? '') == '+1' ? 'selected' : '' }}>+1</option>
                                    <option value="+971" {{ old('mobile_code', $client->mobile_code ?? '') == '+971' ? 'selected' : '' }}>+971</option>
                                </select>
                                {{-- <input type="text" class="form-control reqfield @error('mobile_code') is-invalid @enderror" name="mobile_code" value="{{ old('mobile_code', $client->mobile_code ?? '') }}" placeholder="+91"
                                    style="max-width:80px;margin-right:8px"> --}}
                                <input type="text" name="mobile" id="mobile" value="{{ old('mobile', $client->mobile ?? '') }}"
                                class="form-control reqfield @error('mobile') is-invalid @enderror" maxlength="10">
                                @error('mobile')
                                    <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mobile 2</label>
                            <div class="d-flex">
                                <select name="mobile_code2" class="form-control reqfield @error('mobile_code2') is-invalid @enderror" name="mobile_code2" style="max-width:80px;margin-right:8px">
                                    <option value="+91" {{ old('mobile_code2', $client->mobile_code2 ?? '') == '+91' ? 'selected' : '' }}>+91</option>
                                    <option value="+1" {{ old('mobile_code2', $client->mobile_code2 ?? '') == '+1' ? 'selected' : '' }}>+1</option>
                                    <option value="+971" {{ old('mobile_code2', $client->mobile_code2 ?? '') == '+971' ? 'selected' : '' }}>+971</option>
                                </select>
                                {{-- <input type="text" class="form-control @error('mobile_code2') is-invalid @enderror" name="mobile_code2" value="{{ old('mobile_code2', $client->mobile_code2 ?? '') }}" placeholder="+91"
                                    style="max-width:80px;margin-right:8px"> --}}
                                <input type="text" class="form-control @error('mobile2') is-invalid @enderror" name="mobile2" value="{{ old('mobile2', $client->mobile2 ?? '') }}" maxlength="10">
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
                              <select name="city_id" class="form-control reqfield">
                                <option value="">Select City</option>
                                    @foreach($destinationList as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ old('city_id', $client->city_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $client->address ?? '') }}">
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
                             <input type="text" name="dob" value="{{ old('startDate', $client->dob ?? '') }}" id="dob" class="form-control reqfield"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Marriage Anniversary</label>

                            <input type="text" name="marriage_anniversary" value="{{ old('endDate', $client->marriage_anniversary ?? '') }}" id="marriageAnniversary" class="form-control reqfield"
                                >
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
