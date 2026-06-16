<style>
    .popup-box {
        max-width: 25%;
    }
</style>
<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form" action="{{ route('room-type.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            {{-- Hotel Info --}}

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label>Hotel <span class="redmtext">*</span></label>
                        <select name="hotel_id"
                            class="form-control reqfield @error('hotel_id') is-invalid @enderror"
                            required>
                            <option value="">Select Hotel</option>

                            @foreach($hotels as $hotel)
                                <option value="{{ $hotel->id }}"
                                    {{ old('hotel_id') == $hotel->id ? 'selected' : '' }}>
                                    {{ $hotel->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('hotel_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label>Name <span class="redmtext">*</span></label>
                        <input type="text" name="name"
                            class="form-control reqfield @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Status</label>
                        <select name="status" class="form-control reqfield @error('status') is-invalid @enderror">
                            <option value="">Select</option>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
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
