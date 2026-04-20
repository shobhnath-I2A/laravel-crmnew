<style>
    .popup-box {
        max-width: 25%;
    }
</style>

<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
        action="{{ isset($packageTheme) ? route('package-theme.update', $packageTheme->id) : route('package-theme.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($packageTheme))
            @method('PUT')
        @endif
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    {{-- NAME --}}
                    <div class="col-md-12">
                        <label>Name <span class="redmtext">*</span></label>
                        <input type="text" name="name"
                            class="form-control reqfield @error('name') is-invalid @enderror"
                            value="{{ old('name', $packageTheme->name ?? '') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label>Icon (128 x 128) <span class="redmtext">*</span></label>
                        <input type="file" name="image"
                            class="form-control reqfield @error('image') is-invalid @enderror"
                            value="{{ old('image', $packageTheme->image ?? '') }}">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- STATUS --}}
                    <div class="col-md-6">
                        <label>Status</label>
                        <select name="status" class="form-control reqfield @error('status') is-invalid @enderror">
                            <option value="">Select</option>
                            <option value="1" {{ old('status', $packageTheme->status ?? '') == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ old('status', $packageTheme->status ?? '') == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="text-end mb-3">
                <button type="button" class="btn btn-secondary btn-lg" onclick="closePopup();">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary savingbutton">
                    Save
                </button>
            </div>

        </div>
    </form>
</div>
