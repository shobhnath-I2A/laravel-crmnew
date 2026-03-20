<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form" action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            {{-- Activity Info --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Activity Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        {{-- Activity Name --}}
                        <div class="col-md-12">
                            <label>Activity Name <span class="text-danger">*</span></label>
                            <input type="text" name="name"
                                class="form-control reqfield @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Destination --}}
                        <div class="col-md-12">
                            <label>Destination</label>

                            <input type="text"
                                name="destination_id"
                                class="form-control"
                                id="destination_search"
                                placeholder="Search city..."
                                autocomplete="off">

                            {{-- <input type="hidden" name="destination_id" id="destination_id" value="{{ old('destination_id') }}"> --}}

                            @error('destination_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            {{-- Activity Details --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Activity Details</strong>
                </div>

                <div class="card-body">
                    <textarea name="details" rows="4" class="form-control">{{ old('details') }}</textarea>
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
                            <label>Activity Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control">
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

                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>

        </div>
    </form>
</div>
