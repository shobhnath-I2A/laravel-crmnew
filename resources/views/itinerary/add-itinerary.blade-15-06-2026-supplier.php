<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
          action="{{ route('suppliers.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="container-fluid">

            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Supplier Information</strong>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 position-relative">
                            <label>City <span class="redmtext">*</span></label>

                            <input type="text"
                                   class="form-control reqfield"
                                   id="citySearch"
                                   value="{{ old('city_name') }}"
                                   autocomplete="off"
                                   placeholder="Type city slowly">

                            <input type="hidden"
                                   name="city_id"
                                   id="cityId"
                                   value="{{ old('city_id') }}">

                            <div id="cityList"
                                 class="list-group position-absolute w-100"
                                 style="z-index:99999; display:none;"></div>

                            @error('city_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Company Name <span class="redmtext">*</span></label>
                            <input type="text"
                                   name="company"
                                   class="form-control reqfield @error('company') is-invalid @enderror"
                                   value="{{ old('company') }}"
                                   required>
                            @error('company')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Contact Person</strong>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-2">
                            <label>Title</label>
                            <select name="submit_name" class="form-control">
                                <option value="Mr." {{ old('submit_name') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ old('submit_name') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                <option value="Ms." {{ old('submit_name') == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                                <option value="Dr." {{ old('submit_name') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                                <option value="Prof." {{ old('submit_name') == 'Prof.' ? 'selected' : '' }}>Prof.</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>First Name <span class="redmtext">*</span></label>
                            <input type="text"
                                   name="first_name"
                                   class="form-control reqfield @error('first_name') is-invalid @enderror"
                                   value="{{ old('first_name') }}"
                                   required>
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text"
                                   name="last_name"
                                   class="form-control"
                                   value="{{ old('last_name') }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2 mt-3">
                            <label>Mobile Code</label>
                            <input type="text"
                                   name="mobile_code"
                                   class="form-control"
                                   value="{{ old('mobile_code', '+91') }}"
                                   placeholder="+91">
                        </div>

                        <div class="col-md-4 mt-3">
                            <label>Mobile</label>
                            <input type="text"
                                   name="mobile"
                                   class="form-control"
                                   value="{{ old('mobile') }}">
                        </div>

                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Address</strong>
                </div>

                <div class="card-body">
                    <textarea name="address"
                              rows="2"
                              class="form-control"
                              placeholder="Address">{{ old('address') }}</textarea>
                </div>
            </div>

            <div class="text-end mb-3">
                <button type="button"
                        class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray valid"
                        onclick="closeSidebar()">
                    Cancel
                </button>

                <button type="submit"
                        class="btn btn-primary savingbutton"
                        id="savingbutton">
                    Save
                </button>
            </div>

        </div>
    </form>
</div>
