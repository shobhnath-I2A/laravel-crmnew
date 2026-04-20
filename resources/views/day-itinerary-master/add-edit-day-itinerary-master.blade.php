<style>
    .popup-box {
        max-width: 25%;
    }
</style>

<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
        action="{{ isset($dayItinerary) ? route('day-itinerary-master.update', $dayItinerary->id) : route('day-itinerary-master.store') }}"
        method="POST" enctype="multipart/form-data">

        @csrf
        @if (isset($dayItinerary))
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
                            value="{{ old('name', $dayItinerary->name ?? '') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DESTINATION --}}
                    <div class="col-md-6">
                       <label>Destination</label>
                              <select name="destination" class="form-control reqfield">
                                <option value="">Select Destination</option>
                                @foreach($destinationList as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('destination')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-6">
                        <label>Status</label>
                        <select name="status" class="form-control reqfield @error('status') is-invalid @enderror">
                            <option value="">Select</option>
                            <option value="1" {{ old('status', $dayItinerary->status ?? '') == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ old('status', $dayItinerary->status ?? '') == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DETAILS --}}
                    <div class="col-md-12">
                        <label>Details</label>
                        <textarea name="details" rows="4"
                            class="form-control @error('details') is-invalid @enderror">{{ old('details', $dayItinerary->details ?? '') }}</textarea>
                        @error('details')
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
