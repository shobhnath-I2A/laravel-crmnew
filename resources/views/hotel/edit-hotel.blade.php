<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
      action="{{ isset($hotel) ? route('hotels.update', $hotel->id) : route('hotels.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    @isset($hotel)
        @method('PUT')
    @endisset
        <div class="container-fluid">
            {{-- Hotel Info --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Hotel Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <label>Hotel Name <span class="redmtext">*</span></label>
                            <input type="text" name="name"
                                class="form-control reqfield @error('name') is-invalid @enderror"
                                value="{{ old('name', $hotel->name ?? '') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Category</label>
                            <select name="category"
                                class="form-control reqfield @error('category') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="2" {{ old('category', $hotel->category ?? '' ) == 2 ? 'selected' : '' }}>2 Star</option>
                                <option value="1" {{ old('category', $hotel->category ?? '' ) == 1 ? 'selected' : '' }}>1 Star</option>
                                <option value="3" {{ old('category', $hotel->category ?? '' ) == 3 ? 'selected' : '' }}>3 Star</option>
                                <option value="4" {{ old('category', $hotel->category ?? '' ) == 4 ? 'selected' : '' }}>4 Star</option>
                                <option value="5" {{ old('category', $hotel->category ?? '' ) == 5 ? 'selected' : '' }}>5 Star</option>
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Destination</label>
                           <select name="destination" class="form-control reqfield @error('destination') is-invalid @enderror">
                                <option value="">Select Destination</option>
                                @foreach($destinationList as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ old('destination', $hotel->destination ?? '') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('destination')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            {{-- Hotel Details --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Hotel Details</strong>
                </div>
                <div class="card-body">
                    <textarea name="details" rows="4" class="form-control">{{ old('details', $hotel->details ?? '' ) }}</textarea>
                </div>
            </div>

            {{-- Contact Info --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Contact Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <label>Contact Person</label>
                            <input type="text" name="contact_person" class="form-control"
                                value="{{ old('contact_person', $hotel->contact_person ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" name="contact_person_email" class="form-control"
                                value="{{ old('contact_person_email', $hotel->contact_person_email ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="text" name="contact_person_phone" class="form-control"
                                value="{{ old('contact_person_phone', $hotel->contact_person_phone ?? '') }}">
                        </div>

                    </div>
                </div>
            </div>

            {{-- Media & Status --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Media & Status</strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <label>Hotel Photo</label>
                            <input type="file" name="image" class="form-control ">
                        </div>

                        <div class="col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control reqfield">
                                <option value="1" {{ old('status', $hotel->status ?? '') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $hotel->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Hotel Link</label>
                            <input type="text" name="hotel_link" class="form-control" value="{{ old('hotel_link', $hotel->hotel_link ?? '') }}">
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
                    Update
                </button>
            </div>

        </div>
    </form>
</div>
