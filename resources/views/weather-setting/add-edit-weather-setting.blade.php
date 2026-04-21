<style>
    .popup-box {
        max-width: 25%;
    }
</style>

<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
        action="{{ isset($weatherSetting) ? route('weather-setting.update', $weatherSetting->id) : route('weather-setting.store') }}"
        method="POST" enctype="multipart/form-data">

        @csrf
        @if (isset($weatherSetting))
            @method('PUT')
        @endif

        <div class="container-fluid">
            <div class="card-body">

                <div class="row">

                    {{-- NAME --}}
                    <div class="col-md-12">
                        <label>City (Block 1)<span class="redmtext">*</span></label>
                        <input type="text" name="city_name1"
                            class="form-control reqfield @error('city_name1') is-invalid @enderror"
                            value="{{ old('city_name1', $weatherSetting->city_name1 ?? '') }}">
                        @error('city_name1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label>City (Block 2)<span class="redmtext">*</span></label>
                        <input type="text" name="city_name2"
                            class="form-control reqfield @error('city_name2') is-invalid @enderror"
                            value="{{ old('city_name2', $weatherSetting->city_name2 ?? '') }}">
                        @error('city_name2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label>City (Block 3)<span class="redmtext">*</span></label>
                        <input type="text" name="city_name3"
                            class="form-control reqfield @error('city_name3') is-invalid @enderror"
                            value="{{ old('city_name3', $weatherSetting->city_name3 ?? '') }}">
                        @error('city_name3')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label>City (Block 4)<span class="redmtext">*</span></label>
                        <input type="text" name="city_name4"
                            class="form-control reqfield @error('city_name4') is-invalid @enderror"
                            value="{{ old('city_name4', $weatherSetting->city_name4 ?? '') }}">
                        @error('city_name4')
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
