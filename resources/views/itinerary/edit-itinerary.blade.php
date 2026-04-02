<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form action="{{ isset($itinerary) ? route('itineraries.update', $itinerary->id) : route('queries.store') }}"
        method="POST" id="itineraryForm" class="custom-validation ajax-form">
        @csrf
        @isset($itinerary)
            @method('PUT')
        @endisset
        <div class="container-fluid">
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Itinerary Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Itinerary Name <span class="redmtext">*</span></label>
                            <input name="name" type="text"
                                class="form-control reqfield @error('name') is-invalid @enderror" required
                                id="name" value="{{ old('name', $itinerary->name ?? '') }}" aria-required="true">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Start Date <span class="redmtext">*</span></label>
                            <input type="text" name="start_date" id="startDate"
                                value="{{ old('start_date', $itinerary->start_date ?? '') }}"
                                class="form-control reqfield" required>
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>End Date <span class="redmtext">*</span></label>
                            <input type="text" name="end_date" id="endDate"
                                value="{{ old('end_date', $itinerary->end_date ?? '') }}" class="form-control reqfield"
                                required>
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Travellers</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Adult</label>
                            <input type="number" name="adult" min="1"
                                value="{{ old('adult', $itinerary->adult ?? 0) }}" class="form-control reqfield"
                                required>
                            @error('adult')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Child</label>
                            <input type="number" name="child" min="0"
                                value="{{ old('child', $itinerary->child ?? 0) }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Destinations <span class="redmtext">*</span></label>

                            <select name="destination_id[]" id="destination" multiple class="form-control reqfield">

                                @foreach ($destinationList as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, old('destination_id', $itinerary->destinations->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('destination_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-md-6">
                           <label>Destinations <span class="redmtext">*</span></label>

                            <select name="destination_id" id="destination" class="form-control reqfield">
                                <option value="">Select Destination</option>

                                @foreach ($destinations as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ old('destination_id', $itinerary->destination_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('destinations')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Notes</strong>
                </div>
                <div class="card-body">
                    <textarea name="notes" rows="2" class="form-control" placeholder="Notes">{{ old('notes', $itinerary->notes ?? '') }}</textarea>
                </div>
            </div>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Website Settings</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Theme</label>
                            <select name="package_theme_id" class="form-control">
                                <option value="4"
                                    {{ old('package_theme_id', $itinerary->package_theme_id ?? '') == 4 ? 'selected' : '' }}>
                                    Adventure</option>
                                <option value="5"
                                    {{ old('package_theme_id', $itinerary->package_theme_id ?? '') == 5 ? 'selected' : '' }}>
                                    Beach Holiday</option>
                                <option value="3"
                                    {{ old('package_theme_id', $itinerary->package_theme_id ?? '') == 3 ? 'selected' : '' }}>
                                    Hill Station</option>
                                <option value="6"
                                    {{ old('package_theme_id', $itinerary->package_theme_id ?? '') == 6 ? 'selected' : '' }}>
                                    Honeymoon</option>
                                <option value="2"
                                    {{ old('package_theme_id', $itinerary->package_theme_id ?? '') == 2 ? 'selected' : '' }}>
                                    Leisure</option>
                                <option value="1"
                                    {{ old('package_theme_id', $itinerary->package_theme_id ?? '') == 1 ? 'selected' : '' }}>
                                    Wildlife</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Show on Website</label>
                            <select name="show_website" class="form-control">
                                <option value="0"
                                    {{ old('show_website', $itinerary->show_website ?? '') == 0 ? 'selected' : '' }}>No
                                </option>
                                <option value="1"
                                    {{ old('show_website', $itinerary->show_website ?? '') == 1 ? 'selected' : '' }}>
                                    Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Per Person Price <span class="redmtext">*</span></label>
                            <input type="text" name="website_cost"
                                value="{{ old('website_cost', $itinerary->website_cost ?? 0) }}"
                                class="form-control reqfield" required>
                            @error('website_cost')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Validity <span class="redmtext">*</span></label>
                            <input type="text" name="website_validity" id="websiteValidity"
                                value="{{ old('website_validity', $itinerary->website_validity) }}"
                                class="form-control reqfield" required>
                            @error('website_validity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Popular</label>
                            <select name="show_in_popular" class="form-control">
                                <option value="0"
                                    {{ old('show_in_popular', $itinerary->show_in_popular ?? '') == 0 ? 'selected' : '' }}>
                                    No</option>
                                <option value="1"
                                    {{ old('show_in_popular', $itinerary->show_in_popular ?? '') == 1 ? 'selected' : '' }}>
                                    Yes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Special</label>
                            <select name="show_in_special" class="form-control">
                                <option value="0"
                                    {{ old('show_in_special', $itinerary->show_in_special ?? '') == 0 ? 'selected' : '' }}>
                                    No</option>
                                <option value="1"
                                    {{ old('show_in_special', $itinerary->show_in_special ?? '') == 1 ? 'selected' : '' }}>
                                    Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>About Package</strong>
                </div>
                <div class="card-body">
                    <textarea name="about_package" rows="3" class="form-control">{{ old('about_package', $itinerary->about_package ?? '') }}</textarea>
                </div>
            </div>
            <div class="text-end mb-3">
                <button type="button"
                    class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray valid"
                    onclick="closeSidebar()">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary savingbutton" id="savingbutton">
                    {{ isset($itinerary) ? 'Update Itinerary' : 'Save I    tinerary' }}
                </button>
            </div>
        </div>
    </form>

</div>
