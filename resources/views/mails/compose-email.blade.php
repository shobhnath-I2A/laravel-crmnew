<div class="modal fade bs-example-modal-center show" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    id="" style="display: block; padding-right: 10px;">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 900px; width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="poptitle">Compose Mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="popcontent">
                <script src="tinymce/tinymce.min.js"></script>
                <script type="text/javascript">
                    tinymce.init({
                        selector: ".editorclass",
                        themes: "modern",
                        plugins: [
                            "advlist autolink lists link image charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                    });
                </script>
                <form class="custom-validation" action="frmaction.html" id="composemailfrm" target="actoinfrm"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    <div style="margin-bottom:20px; color:#000; font-size:13px;"><span
                            style="color:#999999;">From</span> test-holidays@trekhops.in</div>
                    <div class="media mb-4"
                        style="padding-bottom: 10px; border-bottom: 1px solid #dedede; margin-bottom: 30px !important; border-top: 1px solid #dedede; padding-top: 10px; padding-left: 10px; background-color: #f5f5f5;">
                        <img class="d-flex mr-3 rounded-circle avatar-sm" src="images/noimage.png"
                            alt="Generic placeholder image" style="width: 40px;">
                        <div class="media-body">
                            <h5 class="font-size-14" style="margin-bottom: 0px;margin-top: 0px;">rohan </h5>
                            <small class="text-muted" style=" font-size:13px;">ijharaaajsm@gmsil.com</small>
                        </div>
                    </div>
                    <div class="row spdiv">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="validationCustom02">CC</label>
                                <input type="text" class="form-control" name="cc" value=""
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row spdiv">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="validationCustom02">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" value=""
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row spdiv">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="validationCustom02">Mail Body</label>
                                <div id="mceu_15" class="mce-tinymce mce-container mce-panel" hidefocus="1"
                                    tabindex="-1" role="application"
                                    style="visibility: hidden; border-width: 1px; width: 100%;">
                                    <div id="mceu_15-body" class="mce-container-body mce-stack-layout">
                                        <div id="mceu_16"
                                            class="mce-top-part mce-container mce-stack-layout-item mce-first">
                                            <div id="mceu_16-body" class="mce-container-body">
                                                <div id="mceu_17"
                                                    class="mce-container mce-menubar mce-toolbar mce-first"
                                                    role="menubar" style="border-width: 0px 0px 1px;">
                                                    <div id="mceu_17-body" class="mce-container-body mce-flow-layout">
                                                        <div id="mceu_18"
                                                            class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text"
                                                            tabindex="-1" aria-labelledby="mceu_18" role="menuitem"
                                                            aria-haspopup="true"><button id="mceu_18-open"
                                                                role="presentation" type="button" tabindex="-1"><span
                                                                    class="mce-txt">File</span> <i
                                                                    class="mce-caret"></i></button></div>
                                                        <div id="mceu_19"
                                                            class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                            tabindex="-1" aria-labelledby="mceu_19" role="menuitem"
                                                            aria-haspopup="true"><button id="mceu_19-open"
                                                                role="presentation" type="button"
                                                                tabindex="-1"><span class="mce-txt">Edit</span> <i
                                                                    class="mce-caret"></i></button></div>
                                                        <div id="mceu_20"
                                                            class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                            tabindex="-1" aria-labelledby="mceu_20" role="menuitem"
                                                            aria-haspopup="true"><button id="mceu_20-open"
                                                                role="presentation" type="button"
                                                                tabindex="-1"><span class="mce-txt">View</span> <i
                                                                    class="mce-caret"></i></button></div>
                                                        <div id="mceu_21"
                                                            class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                            tabindex="-1" aria-labelledby="mceu_21" role="menuitem"
                                                            aria-haspopup="true"><button id="mceu_21-open"
                                                                role="presentation" type="button"
                                                                tabindex="-1"><span class="mce-txt">Insert</span> <i
                                                                    class="mce-caret"></i></button></div>
                                                        <div id="mceu_22"
                                                            class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                            tabindex="-1" aria-labelledby="mceu_22" role="menuitem"
                                                            aria-haspopup="true"><button id="mceu_22-open"
                                                                role="presentation" type="button"
                                                                tabindex="-1"><span class="mce-txt">Format</span> <i
                                                                    class="mce-caret"></i></button></div>
                                                        <div id="mceu_23"
                                                            class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text"
                                                            tabindex="-1" aria-labelledby="mceu_23" role="menuitem"
                                                            aria-haspopup="true"><button id="mceu_23-open"
                                                                role="presentation" type="button"
                                                                tabindex="-1"><span class="mce-txt">Tools</span> <i
                                                                    class="mce-caret"></i></button></div>
                                                    </div>
                                                </div>
                                                <div id="mceu_24"
                                                    class="mce-toolbar-grp mce-container mce-panel mce-last"
                                                    hidefocus="1" tabindex="-1" role="group">
                                                    <div id="mceu_24-body"
                                                        class="mce-container-body mce-stack-layout">
                                                        <div id="mceu_25"
                                                            class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last"
                                                            role="toolbar">
                                                            <div id="mceu_25-body"
                                                                class="mce-container-body mce-flow-layout">
                                                                <div id="mceu_26"
                                                                    class="mce-container mce-flow-layout-item mce-first mce-btn-group"
                                                                    role="group">
                                                                    <div id="mceu_26-body">
                                                                        <div id="mceu_0"
                                                                            class="mce-widget mce-btn mce-first mce-disabled"
                                                                            tabindex="-1" role="button"
                                                                            aria-label="Undo" aria-disabled="true">
                                                                            <button id="mceu_0-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-undo"></i></button>
                                                                        </div>
                                                                        <div id="mceu_1"
                                                                            class="mce-widget mce-btn mce-last mce-disabled"
                                                                            tabindex="-1" role="button"
                                                                            aria-label="Redo" aria-disabled="true">
                                                                            <button id="mceu_1-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-redo"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="mceu_27"
                                                                    class="mce-container mce-flow-layout-item mce-btn-group"
                                                                    role="group">
                                                                    <div id="mceu_27-body">
                                                                        <div id="mceu_2"
                                                                            class="mce-widget mce-btn mce-menubtn mce-first mce-last mce-btn-has-text"
                                                                            tabindex="-1" aria-labelledby="mceu_2"
                                                                            role="button" aria-haspopup="true">
                                                                            <button id="mceu_2-open"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><span
                                                                                    class="mce-txt">Formats</span> <i
                                                                                    class="mce-caret"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="mceu_28"
                                                                    class="mce-container mce-flow-layout-item mce-btn-group"
                                                                    role="group">
                                                                    <div id="mceu_28-body">
                                                                        <div id="mceu_3"
                                                                            class="mce-widget mce-btn mce-first"
                                                                            tabindex="-1" aria-pressed="false"
                                                                            role="button" aria-label="Bold"><button
                                                                                id="mceu_3-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-bold"></i></button>
                                                                        </div>
                                                                        <div id="mceu_4"
                                                                            class="mce-widget mce-btn mce-last"
                                                                            tabindex="-1" aria-pressed="false"
                                                                            role="button" aria-label="Italic"><button
                                                                                id="mceu_4-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-italic"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="mceu_29"
                                                                    class="mce-container mce-flow-layout-item mce-btn-group"
                                                                    role="group">
                                                                    <div id="mceu_29-body">
                                                                        <div id="mceu_5"
                                                                            class="mce-widget mce-btn mce-first"
                                                                            tabindex="-1" aria-pressed="false"
                                                                            role="button" aria-label="Align left">
                                                                            <button id="mceu_5-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-alignleft"></i></button>
                                                                        </div>
                                                                        <div id="mceu_6" class="mce-widget mce-btn"
                                                                            tabindex="-1" aria-pressed="false"
                                                                            role="button" aria-label="Align center">
                                                                            <button id="mceu_6-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-aligncenter"></i></button>
                                                                        </div>
                                                                        <div id="mceu_7" class="mce-widget mce-btn"
                                                                            tabindex="-1" aria-pressed="false"
                                                                            role="button" aria-label="Align right">
                                                                            <button id="mceu_7-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-alignright"></i></button>
                                                                        </div>
                                                                        <div id="mceu_8"
                                                                            class="mce-widget mce-btn mce-last"
                                                                            tabindex="-1" aria-pressed="false"
                                                                            role="button" aria-label="Justify">
                                                                            <button id="mceu_8-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-alignjustify"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="mceu_30"
                                                                    class="mce-container mce-flow-layout-item mce-btn-group"
                                                                    role="group">
                                                                    <div id="mceu_30-body">
                                                                        <div id="mceu_9"
                                                                            class="mce-widget mce-btn mce-splitbtn mce-menubtn mce-first"
                                                                            role="button" aria-pressed="false"
                                                                            tabindex="-1" aria-label="Bullet list"
                                                                            aria-haspopup="true"><button
                                                                                type="button" hidefocus="1"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-bullist"></i></button><button
                                                                                type="button" class="mce-open"
                                                                                hidefocus="1" tabindex="-1"> <i
                                                                                    class="mce-caret"></i></button>
                                                                        </div>
                                                                        <div id="mceu_10"
                                                                            class="mce-widget mce-btn mce-splitbtn mce-menubtn"
                                                                            role="button" aria-pressed="false"
                                                                            tabindex="-1" aria-label="Numbered list"
                                                                            aria-haspopup="true"><button
                                                                                type="button" hidefocus="1"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-numlist"></i></button><button
                                                                                type="button" class="mce-open"
                                                                                hidefocus="1" tabindex="-1"> <i
                                                                                    class="mce-caret"></i></button>
                                                                        </div>
                                                                        <div id="mceu_11" class="mce-widget mce-btn"
                                                                            tabindex="-1" role="button"
                                                                            aria-label="Decrease indent"><button
                                                                                id="mceu_11-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-outdent"></i></button>
                                                                        </div>
                                                                        <div id="mceu_12"
                                                                            class="mce-widget mce-btn mce-last"
                                                                            tabindex="-1" role="button"
                                                                            aria-label="Increase indent"><button
                                                                                id="mceu_12-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-indent"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="mceu_31"
                                                                    class="mce-container mce-flow-layout-item mce-last mce-btn-group"
                                                                    role="group">
                                                                    <div id="mceu_31-body">
                                                                        <div id="mceu_13"
                                                                            class="mce-widget mce-btn mce-first"
                                                                            tabindex="-1" aria-pressed="false"
                                                                            role="button"
                                                                            aria-label="Insert/edit link"><button
                                                                                id="mceu_13-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-link"></i></button>
                                                                        </div>
                                                                        <div id="mceu_14"
                                                                            class="mce-widget mce-btn mce-last"
                                                                            tabindex="-1" aria-pressed="false"
                                                                            role="button"
                                                                            aria-label="Insert/edit image"><button
                                                                                id="mceu_14-button"
                                                                                role="presentation" type="button"
                                                                                tabindex="-1"><i
                                                                                    class="mce-ico mce-i-image"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="mceu_32"
                                            class="mce-edit-area mce-container mce-panel mce-stack-layout-item"
                                            hidefocus="1" tabindex="-1" role="group"
                                            style="border-width: 1px 0px 0px;"><iframe id="EmailDetails_ifr"
                                                frameborder="0" allowtransparency="true"
                                                title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help"
                                                style="width: 100%; height: 216px; display: block;"></iframe></div>
                                        <div id="mceu_33"
                                            class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last"
                                            hidefocus="1" tabindex="-1" role="group"
                                            style="border-width: 1px 0px 0px;">
                                            <div id="mceu_33-body" class="mce-container-body mce-flow-layout">
                                                <div id="mceu_34" class="mce-path mce-flow-layout-item mce-first">
                                                    <div class="mce-path-item">&nbsp;</div>
                                                </div>
                                                <div id="mceu_35" class="mce-flow-layout-item mce-resizehandle"><i
                                                        class="mce-ico mce-i-resize"></i></div><span id="mceu_36"
                                                    class="mce-branding mce-widget mce-label mce-flow-layout-item mce-last">
                                                    Powered by <a
                                                        href="https://www.tinymce.com/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce"
                                                        rel="noopener" target="_blank" role="presentation"
                                                        tabindex="-1">tinymce</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <textarea name="EmailDetails" rows="10" class="summernote" id="EmailDetails" style="display: none;"
                                    aria-hidden="true">&lt;/div&gt;&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;div dir="ltr"&gt;
                                    &lt;p class="MsoNormal" style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"&gt;&nbsp;&lt;/p&gt;
                                    &lt;p class="MsoNormal" style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"&gt;&lt;strong&gt;Thanks &amp; Regards,&lt;/strong&gt;&lt;/p&gt;
                                    &lt;p class="MsoNormal" style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"&gt;&lt;strong&gt;i2a Technologies&lt;/strong&gt;&lt;/p&gt;
                                    &lt;p class="MsoNormal" style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"&gt;&nbsp;&lt;/p&gt;
                                    &lt;/div&gt;</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row spdiv">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="validationCustom02">Attachment</label>
                                <input name="attachmentfile" type="file" id="file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send Mail </button>
                    </div>

                    <link href="assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css">
                    <script src="tinymce/tinymce.min.js"></script>
                    <script type="text/javascript">
                        tinymce.init({
                            selector: "#EmailDetails",
                            themes: "modern",
                            plugins: [
                                "advlist autolink lists link image charmap print preview anchor",
                                "searchreplace visualblocks code fullscreen"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                        });
                    </script>

                    <input type="hidden" name="action" value="composemail">
                    <input type="hidden" name="queryId" value="127504">
                    <input type="hidden" name="toEmail" value="">
                    <input type="hidden" name="toEmail" value="ijharaaajsm@gmsil.com">
                </form>
                <script>
                    $(document).ready(function() {
                        $('.custom-validation').validate({

                            submitHandler: function(form) {
                                // Form submission logic here, e.g., AJAX call
                                $('.custom-validation #savingbutton').prop('disabled', true).val('Saving...');
                                form.submit();
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
