<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
      action="{{ isset($transferMaster) ? route('transfers.update', $transferMaster->id) : route('transfers.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    @isset($transferMaster)
        @method('PUT')
    @endisset
        <div class="container-fluid">
            {{-- Transfer Info --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Transfer Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        {{-- Transfer Name --}}
                        <div class="col-md-12">
                            <label>Transfer Name <span class="redmtext">*</span></label>
                            <input type="text" name="name"
                                class="form-control reqfield @error('name') is-invalid @enderror"
                                value="{{ old('name', $transferMaster->name ?? '') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Destination --}}
                        <div class="col-md-12">
                            <label>Destination</label>
                             <select name="destination_id" class="form-control reqfield @error('destination') is-invalid @enderror">
                                <option value="">Select Destination</option>
                                @foreach($destinations as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ old('destination_id', $transferMaster->destination_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('destination_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            {{-- Transfer Details --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Transfer Details</strong>
                </div>
                <div class="card-body">
                    <textarea name="details" rows="5"
                        class="form-control">{{ old('details', $transferMaster->details ?? '') }}</textarea>
                </div>
            </div>

            {{-- Media & Status --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Media & Status</strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        {{-- Image --}}
                        <div class="col-md-6">
                            <label>Transfer Photo</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control reqfield">
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="text-end mb-3">
                <button type="button" class="btn btn-secondary btn-lg" onclick="closeSidebar()">
                    Cancel
                </button>

                <button type="submit" class="btn btn-primary savingbutton">
                    Save
                </button>
            </div>

        </div>
    </form>
</div>
