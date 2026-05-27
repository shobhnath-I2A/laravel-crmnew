<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class=" ">
            <div class="col-md-12 col-xl-12">
                <div>
                    <div class="card-body" style="padding:10px;">
                        <h4 class="card-title"
                            style="margin-top: 0px !important; padding-left: 10px !important; padding-top: 10px !important; padding-bottom: 5px !IMPORTANT;padding-right: 0px !important;">
                            Default Settings
                            <div class="float-right">

                            </div>
                        </h4>

                        <form class="custom-validation ajax-form" action="{{ route('settings.default.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Invoice / Itinerary logo </label>
                                            <div class="custom-file">
                                               <input type="file" name="invoice_logo" class="form-control">
                                                @if(!empty($default['invoice_logo']))
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $default['invoice_logo']) }}" height="70">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="validationCustom02">Invoice terms and conditions </label>

                                            <textarea name="invoice_terms"
                                                rows="5"
                                                class="form-control editorclass"
                                                id="invoice_terms">{{ old('invoice_terms', $default['invoice_terms'] ?? '') }}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="validationCustom02">Package terms and conditions </label>

                                            <textarea name="package_terms"
                                                rows="5"
                                                class="form-control editorclass"
                                                id="package_terms">{{ old('package_terms', $default['package_terms'] ?? '') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="validationCustom02">Bank information </label>

                                            <textarea name="bank_information"
                                                rows="5"
                                                class="form-control editorclass"
                                                id="bank_information">{{ old('bank_information', $default['bank_information'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <img src="images/leadgeticon.png" height="100" style="margin:40px 0px;">
                                        <div class="form-group">
                                            <label for="validationCustom02">Google sheet URL for leads fetching
                                            </label>
                                             <input type="text"
                                                name="google_sheet_url"
                                                class="form-control"
                                                value="{{ old('google_sheet_url', $default['google_sheet_url'] ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><img src="payment/Razorpay_logo.svg.png"
                                                    height="30"></td>
                                            <td width="95%" style="font-size: 20px; padding-top: 6px;">
                                                &nbsp;&nbsp;Payment Gateway Setting</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom02">API Key</label>
                                    <input type="text" name="api_key" class="form-control" value="{{ old('api_key', $payment['api_key'] ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom02">API Secret</label>
                                    <input type="text" name="api_secret" class="form-control" value="{{ old('api_secret', $payment['api_secret'] ?? '') }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary savingbutton">
                                    Save
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</td>
