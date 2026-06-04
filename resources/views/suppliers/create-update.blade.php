<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}"
        method="POST" id="supplierForm" class="custom-validation ajax-form">

        @csrf

        @if (isset($supplier))
            @method('PUT')
        @endif @csrf
        <div class="container-fluid ">
            <!-- SUPPLIER INFORMATION -->
            <div class="card shadow-sm mb-3 ">
                <div class="card-header bg-light">
                    <strong> Supplier Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Location <span class="redmtext">*</span></label>
                            <select name="destination_id" class="form-control reqfield">
                                <option value="">Select Destination</option>

                                @foreach ($destinationList as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ old('destination_id', $supplier->destination_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('destination_id')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Company Name <span class="redmtext">*</span></label>
                            <input type="text" name="company_name"
                                value="{{ old('company_name', $supplier->company_name ?? '') }}"
                                class="form-control reqfield @error('company_name') is-invalid @enderror" required>
                            @error('company_name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Mobile <span class="redmtext">*</span></label>
                            <select name="mobile_code" class="form-control">
                                <option value="+91"
                                    {{ old('mobile_code', $supplier->mobile_code ?? '') == '+91' ? 'selected' : '' }}>
                                    +91</option>
                                <option value="+1"
                                    {{ old('mobile_code', $supplier->mobile_code ?? '') == '+1' ? 'selected' : '' }}>+1
                                </option>
                                <option value="+44"
                                    {{ old('mobile_code', $supplier->mobile_code ?? '') == '+44' ? 'selected' : '' }}>
                                    +44</option>
                                <option value="+33"
                                    {{ old('mobile_code', $supplier->mobile_code ?? '') == '+33' ? 'selected' : '' }}>
                                    +33</option>
                            </select>

                            @error('mobile_code')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Mobile <span class="redmtext">*</span></label>
                            <input type="text" name="mobile" id="mobile"
                                value="{{ old('mobile', $supplier->mobile ?? '') }}"
                                class="form-control reqfield @error('mobile') is-invalid @enderror" maxlength="10">
                            @error('mobile')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Email <span class="redmtext">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $supplier->email ?? '') }}"
                                class="form-control reqfield @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Title</label>
                            <select name="submit_name" class="form-control">
                                <option value="Mr."
                                    {{ old('submit_name', $supplier->submit_name ?? '') == 'Mr.' ? 'selected' : '' }}>
                                    Mr.</option>
                                <option value="Mrs."
                                    {{ old('submit_name', $supplier->submit_name ?? '') == 'Mrs.' ? 'selected' : '' }}>
                                    Mrs.</option>
                                <option value="Ms."
                                    {{ old('submit_name', $supplier->submit_name ?? '') == 'Ms.' ? 'selected' : '' }}>
                                    Ms.</option>
                                <option value="Dr."
                                    {{ old('submit_name', $supplier->submit_name ?? '') == 'Dr.' ? 'selected' : '' }}>
                                    Dr.</option>
                            </select>
                            @error('submit_name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">First Name <span class="redmtext">*</span></label>
                            <input type="text" name="first_name"
                                value="{{ old('first_name', $supplier->first_name ?? '') }}"
                                class="form-control reqfield @error('first_name') is-invalid @enderror" required>
                            @error('first_name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Last Name <span class="redmtext">*</span></label>
                            <input type="text" name="last_name"
                                value="{{ old('last_name', $supplier->last_name ?? '') }}"
                                class="form-control reqfield @error('last_name') is-invalid @enderror" required>
                            @error('last_name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- REMARK -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Address</strong>
                </div>
                <div class="card-body">
                    <textarea name="address" rows="3" class="form-control">{{ old('address', $supplier->address ?? '') }}</textarea>
                </div>
            </div>
            <!-- FOOTER BUTTONS -->
            <div class="text-end mb-3">
                <button type="button" onclick="closeSidebar()"
                    class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray valid">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Save Supplier
                </button>
            </div>
        </div>
    </form>
</div>
