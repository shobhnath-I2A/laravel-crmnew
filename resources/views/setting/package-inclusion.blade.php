<td align="left" valign="top" width="90%">
    <div class="page-content">
        {{-- {{ $inclusions }} --}}
        <!-- start page title -->
        <div class=" ">
            <div class="col-md-12 col-xl-12">
                <div style="min-height:500px;">
                    <div class="card-body">
                        <h4 class="card-title" style=" margin-top:0px; padding-bottom:5px; ">Package Inclusions /
                            Exclusion Setting
                        </h4>
                        <div style="padding:10px;">
                            <div class=" ">
                                <form action="frmaction.html" method="post" enctype="multipart/form-data" name="addeditfrm" target="actoinfrm" id="addeditfrm">
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="validationCustom02">Inclusions Title</label>
                                                <input type="text" class="form-control" id="inclusionsTitle"  name="inclusionsTitle" style="padding: 4px;" value="Inclusions &amp; Exclusions">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="validationCustom02">Inclusions</label>
                                                <textarea name="packageInclusions" rows="5" class="editorclass" id="description" aria-hidden="true"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="validationCustom02">Important Tips Title</label>
                                                <input type="text" class="form-control" id="importantTipsTitle" name="importantTipsTitle" style="padding: 4px;" value="Payment Policy &amp; Our Scope of Services">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                        <div class="form-group">
                                                 <label for="validationCustom02">Important Tips</label>
                                                <textarea name="importantTips" rows="5" class="editorclass" id="description" aria-hidden="true"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label for="validationCustom02">Exclusions Title</label>
                                            <input type="text" class="form-control" id="exclusionsTitle" name="exclusionsTitle" style="padding: 4px;" value="Useful Tips Before Booking">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                 <label for="validationCustom02">Exclusions</label>
                                                <textarea name="packageExclusions" id="description" style="height: 120px; visibility: hidden; display: none;">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="validationCustom02">List of documents for traveling Title</label>
                                                <input type="text" class="form-control" id="travelInformationTitle" name="travelInformationTitle" style="padding: 4px;" value="Cancellation Policy &amp; Airline Cancellation Policy">
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="validationCustom02">List of documents for traveling</label>
                                                <textarea name="travelInformation" rows="5" class="editorclass" id="description" aria-hidden="true"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <div class="form-group mb-0" style="padding: 20px 0px;  border-top: 1px solid #e6e6e6; overflow:hidden; margin-top:20px;">
                                                <button type="submit" id="savingbutton" class="btn btn-primary" onclick="this.form.submit(); this.disabled=true; this.value='Saving...';" style="float:right;">
                                                Save Setting
                                            </button>
                                             <input autocomplete="false" name="action" type="hidden" id="action" value="addInclusions">
                                            </div>

                                            </div>
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
