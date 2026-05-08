<style>
    .popup-box {
        max-width: 25%;
    }
</style>
<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
        action="{{ isset($branchMaster) ? route('branch-master.update', $branchMaster->id) : route('branch-master.store') }}"
        method="POST" enctype="multipart/form-data">

        @csrf
        @if (isset($branchMaster))
            @method('PUT')
        @endif
        <div class="container-fluid">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Name <span class="redmtext">*</span></label>
                        <input type="text" name="name"
                            class="form-control reqfield @error('name') is-invalid @enderror"
                            value="{{ old('name', $branchMaster->name ?? '') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                     <div class="col-md-12">
                        <label>Destination <span class="redmtext">*</span></label>
                        <input type="text" name="destinations"
                            class="form-control reqfield @error('destinations') is-invalid @enderror"
                            value="{{ old('destinations', $branchMaster->destinations ?? '') }}">
                        @error('destinations')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="col-form-label">Active</label>
                        <div>
                            <input name="status" type="checkbox" id="switch3" value="1" switch="bool" {{ old('status', $branchMaster->status ?? 1) == 1 ? 'checked' : '' }} />
                            <label for="switch3" data-on-label="Yes" data-off-label="No" style="margin-top: 6px;"> </label>
                        </div>
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
