<style>
    .popup-box {
        max-width: 25%;
    }
</style>
<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
        action="{{ isset($currencyExchange) ? route('currency-exchange.update', $currencyExchange->id) : route('currency-exchange.store') }}"
        method="POST" enctype="multipart/form-data">

        @csrf
        @if (isset($currencyExchange))
            @method('PUT')
        @endif
        <div class="container-fluid">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Name <span class="redmtext">*</span></label>
                        <input type="text" name="name"
                            class="form-control reqfield @error('name') is-invalid @enderror"
                            value="{{ old('name', $currencyExchange->name ?? '') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Status</label>
                        <select name="status" class="form-control reqfield @error('status') is-invalid @enderror">
                            <option value="">Select</option>
                            <option value="1" {{ old('status', $currencyExchange->status ?? '') == 1 ? 'selected' : '' }}>
                                Active</option>
                            <option value="0" {{ old('status', $currencyExchange->status ?? '') == 0 ? 'selected' : '' }}>
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
