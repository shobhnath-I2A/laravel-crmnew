<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class=" ">
            <div class="col-md-12 col-xl-12">
                <div>
                    <div class="card-body" style="padding:10px;">
                        <h4 class="card-title" style=" margin-top:0px; padding-bottom:5px; ">Package Inclusions /
                            Exclusion Setting
                        </h4>
                        <div style="padding:10px;">
                            <div class=" ">
                                <form class="custom-validation ajax-form"
                                    action="{{ route('settings.package-inclusions.save') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <label>Inclusions Title</label>
                                            <input type="text" name="inclusions_title" class="form-control"
                                                value="{{ old('inclusions_title', $package_inclusions['inclusions_title'] ?? '') }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Inclusions</label>
                                            <textarea name="package_inclusions" rows="5" class="editorclass" id="package_inclusions">{{ old('package_inclusions', $package_inclusions['package_inclusions'] ?? '') }}</textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Important Tips Title</label>
                                            <input type="text" name="important_tips_title" class="form-control"
                                                value="{{ old('important_tips_title', $package_inclusions['important_tips_title'] ?? '') }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Important Tips</label>
                                            <textarea name="package_important_tips" rows="5" class="editorclass" id="package_important_tips">{{ old('package_important_tips', $package_inclusions['package_important_tips'] ?? '') }}</textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Exclusions Title</label>
                                            <input type="text" name="exclusions_title" class="form-control"
                                                value="{{ old('exclusions_title', $package_inclusions['exclusions_title'] ?? '') }}">
                                        </div>

                                        <div class="col-lg-12">
                                            <label>Exclusions</label>
                                            <textarea name="package_exclusions" rows="5" class="editorclass" id="package_exclusions">{{ old('package_exclusions', $package_inclusions['package_exclusions'] ?? '') }}</textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>List of documents for traveling Title</label>
                                            <input type="text" name="travel_information_title" class="form-control"
                                                value="{{ old('travel_information_title', $package_inclusions['travel_information_title'] ?? '') }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <label>List of documents for traveling</label>
                                            <textarea name="package_travel_info" rows="5" class="editorclass" id="package_travel_info">{{ old('package_travel_info', $package_inclusions['package_travel_info'] ?? '') }}</textarea>
                                        </div>
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary savingbutton">
                                                Save
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</td>
