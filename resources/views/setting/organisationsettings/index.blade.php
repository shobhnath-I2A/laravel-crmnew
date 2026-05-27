<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="wrapper" style="margin-top:0px; padding:15px;">
    <form class="custom-validation ajax-form"
        action="{{ route('settings.organisation.save') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Organisation Name <span class="redmtext">*</span></label>

                        <input type="text"
                            name="organisation_name"
                            class="form-control reqfield"
                            value="{{ $organisation['organisation_name'] ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label>Email (Invoicing use)</label>
                        <input type="email"
                            name="invoice_email"
                            class="form-control"
                            value="{{ $organisation['invoice_email'] ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label>Phone (Invoicing use)</label>
                        <input type="text"
                            name="invoice_phone"
                            class="form-control"
                            value="{{ $organisation['invoice_phone'] ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label>GSTN</label>
                        <input type="text"
                            name="gstn"
                            class="form-control"
                            value="{{ $organisation['gstn'] ?? '' }}">
                    </div>
                    <div class="col-md-12">
                        <label>Address</label>
                        <textarea name="address"
                            rows="3"
                            class="form-control">{{ $organisation['address'] ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label>State</label>
                        <input type="text"
                            name="state"
                            class="form-control"
                            value="{{ $organisation['state'] ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label>State Code</label>
                        <input type="text"
                            name="state_code"
                            class="form-control"
                            value="{{ $organisation['state_code'] ?? '' }}">
                    </div>
                </div>
            </div>
            <div class="text-end mt-3">
                <button type="button"
                    class="btn btn-secondary btn-lg"
                    onclick="closePopup();">
                    Cancel
                </button>
                <button type="submit"
                    class="btn btn-primary savingbutton">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
