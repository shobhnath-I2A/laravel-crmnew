<style>
    .popup-box {
        max-width: 50%;
    }

    .info-alert {
        border: 1px solid #ffe08a;
        background: #fff8d9;
        padding: 12px 15px;
        border-radius: 6px;
        color: #7a5b00;
        font-size: 14px;
        margin-bottom: 20px;
    }
</style>

<div class="wrapper" style="margin-top:0px; padding:15px;">

    <form class="custom-validation ajax-form"
        action="{{ isset($automation) ? route('automation.update', $automation->id) : route('automation.store') }}"
        method="POST" enctype="multipart/form-data">

        @csrf

        @if (isset($automation))
            @method('PUT')
        @endif

        <div class="container-fluid">
            <div class="card-body">
                <div class="info-alert">
                    System will automatically send the selected itinerary mail
                    when the query stage changes within the selected start and end dates.
                </div>
                <div class="row">
                    {{-- Query Stage --}}
                    <div class="col-md-6 mb-3">
                        <label>
                            Query Stage <span class="redmtext">*</span>
                        </label>
                        <select name="query_status" class="form-control reqfield" required>
                            <option value="0" {{ old('query_status', $automation->query_status ?? '') == '0' ? 'selected' : '' }}>Select</option>
                            <option value="1" {{ old('query_status', $automation->query_status ?? '') == '1' ? 'selected' : '' }}>New</option>
                            <option value="2" {{ old('query_status', $automation->query_status ?? '') == '2' ? 'selected' : '' }}>Active</option>
                            <option value="3" {{ old('query_status', $automation->query_status ?? '') == '3' ? 'selected' : '' }}>No Connect
                            </option>
                            <option value="3" {{ old('query_status', $automation->query_status ?? '') == '3' ? 'selected' : '' }}>Hot Lead</option>
                        </select>
                    </div>
                    {{-- Destination --}}
                    <div class="col-md-6 mb-3">
                        <label>
                            Destination <span class="redmtext">*</span>
                        </label>
                        <select name="destination_id" class="form-control reqfield" required>
                            <option value="">Select Destination</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ old('destination_id', $automation->destination_id ?? '') == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Itinerary --}}
                    <div class="col-md-12 mb-3">
                        <label>
                            Itinerary <span class="redmtext">*</span>
                        </label>
                        <select name="package_id" class="form-control reqfield" required>
                            <option value="0">Select Itinerary</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id', $automation->package_id ?? '') == $package->id ? 'selected' : '' }}>
                                    {{ $package->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Start Date --}}
                    <div class="col-md-6 mb-3">
                        <label>
                            Start Date <span class="redmtext">*</span>
                        </label>
                        <input type="date" name="start_date" class="form-control reqfield"
                            value="{{ old('start_date', isset($automation) ? \Carbon\Carbon::parse($automation->start_date)->format('Y-m-d') : '') }}"
                            required>
                    </div>
                    {{-- End Date --}}
                    <div class="col-md-6 mb-3">
                        <label>
                            End Date <span class="redmtext">*</span>
                        </label>
                        <input type="date" name="end_date" class="form-control reqfield"
                            value="{{ old('end_date', isset($automation) ? \Carbon\Carbon::parse($automation->end_date)->format('Y-m-d') : '') }}"
                            required>
                    </div>

                    {{-- Display Message --}}
                    <div class="col-md-12 mb-3">
                        <label>Display Message</label>
                        <textarea name="details" rows="4" class="form-control" placeholder="This message will show on itinerary">{{ old('details', $automation->details ?? '') }}</textarea>
                    </div>
                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label>Status</label>

                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" name="status" value="1"
                                id="statusSwitch" {{ old('status', $automation->status ?? 1) ? 'checked' : '' }}>

                            <label class="form-check-label" for="statusSwitch">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mt-4">
                <button type="button" class="btn btn-secondary btn-lg" onclick="closePopup();">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary savingbutton">
                    {{ isset($automation) ? 'Update' : 'Save' }}
                </button>
            </div>
        </div>
    </form>
</div>
