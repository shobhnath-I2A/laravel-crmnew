<div class="card-body">
    <div style="padding:10px;">
        {{-- <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script> --}}
        {{-- <script type="text/javascript">
            tinymce.init({
                selector: "#EmailDetails",
                themes: "modern",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        </script> --}}
        <style>
            .tasklist {
                border: 1px solid #ddd;
                margin-bottom: 10px;
                padding: 10px;
                border: 3px;
                border: 1px solid #ddd;
                border-left: 5px solid #ff8a12;
                background-color: #f9f9f9;
                border-radius: 4px;
            }

            .tasklist .iconbox {
                width: 50px;
                height: 50px;
                margin-right: 10px;
                background-color: #ff8a12;
                color: #fff;
                text-align: center;
                line-height: 50px;
                font-size: 18px;
                border-radius: 100%;
            }

            .makedone {
                border-left: 5px solid #009900;
            }

            .makedone .iconbox {
                background-color: #009900;
            }

            .makenotedone {
                border: 1px solid #CC3300;
                border-left: 5px solid #CC3300;
            }

            .makenotedone .iconbox {
                background-color: #CC3300;
            }


            .table th:first-child {
                border: 0px !important;
            }
        </style>
        <form action="frmaction.html" method="post" enctype="multipart/form-data" name="addeditfrm" target="actoinfrm"
            id="addeditfrm">
            <div class="row">
                <div class="col-lg-8" style="padding-left:15px;">
                    <h4 class="mt-0 header-title">Supplier Communication</h4>
                    <div class="row" style="padding-left: 5px;">
                        <div class="col-lg-12">
                            <div style="margin-bottom:2px; font-size:12px;">Subject</div>
                            <input name="subject" type="text" class="form-control"
                                style="width:100%; margin-bottom:20px;"
                                value="Travel Enquiry for Singapore from i2a Technologies (Query Id- 127504)"
                                autocomplete="off">

                            <div style="margin-bottom:2px; font-size:12px;">CC Email</div>
                            <input name="ccmail" type="text" class="form-control" autocomplete="off"
                                style="width:100%; margin-bottom:20px;">
                            <div id="mceu_15" class="mce-tinymce mce-container mce-panel" hidefocus="1"
                                tabindex="-1" role="application"
                                style="visibility: hidden; border-width: 1px; width: 100%;">
                                <div id="mceu_15-body" class="mce-container-body mce-stack-layout">
                                    <div id="mceu_16"
                                        class="mce-top-part mce-container mce-stack-layout-item mce-first">
                                        <div id="mceu_16-body" class="mce-container-body">
                                            <div id="mceu_17" class="mce-container mce-menubar mce-toolbar mce-first"
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
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">Edit</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_20"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_20" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_20-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">View</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_21"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_21" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_21-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">Insert</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_22"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_22" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_22-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">Format</span> <i
                                                                class="mce-caret"></i></button></div>
                                                    <div id="mceu_23"
                                                        class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text"
                                                        tabindex="-1" aria-labelledby="mceu_23" role="menuitem"
                                                        aria-haspopup="true"><button id="mceu_23-open"
                                                            role="presentation" type="button" tabindex="-1"><span
                                                                class="mce-txt">Tools</span> <i
                                                                class="mce-caret"></i></button></div>
                                                </div>
                                            </div>
                                            <div id="mceu_24"
                                                class="mce-toolbar-grp mce-container mce-panel mce-last"
                                                hidefocus="1" tabindex="-1" role="group">
                                                <div id="mceu_24-body" class="mce-container-body mce-stack-layout">
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
                                                                        <button id="mceu_0-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-undo"></i></button>
                                                                    </div>
                                                                    <div id="mceu_1"
                                                                        class="mce-widget mce-btn mce-last mce-disabled"
                                                                        tabindex="-1" role="button"
                                                                        aria-label="Redo" aria-disabled="true">
                                                                        <button id="mceu_1-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
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
                                                                        <button id="mceu_2-open" role="presentation"
                                                                            type="button" tabindex="-1"><span
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
                                                                        <button id="mceu_5-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-alignleft"></i></button>
                                                                    </div>
                                                                    <div id="mceu_6" class="mce-widget mce-btn"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Align center">
                                                                        <button id="mceu_6-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-aligncenter"></i></button>
                                                                    </div>
                                                                    <div id="mceu_7" class="mce-widget mce-btn"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Align right">
                                                                        <button id="mceu_7-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-alignright"></i></button>
                                                                    </div>
                                                                    <div id="mceu_8"
                                                                        class="mce-widget mce-btn mce-last"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Justify">
                                                                        <button id="mceu_8-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
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
                                                                        aria-haspopup="true"><button type="button"
                                                                            hidefocus="1" tabindex="-1"><i
                                                                                class="mce-ico mce-i-bullist"></i></button><button
                                                                            type="button" class="mce-open"
                                                                            hidefocus="1" tabindex="-1"> <i
                                                                                class="mce-caret"></i></button>
                                                                    </div>
                                                                    <div id="mceu_10"
                                                                        class="mce-widget mce-btn mce-splitbtn mce-menubtn"
                                                                        role="button" aria-pressed="false"
                                                                        tabindex="-1" aria-label="Numbered list"
                                                                        aria-haspopup="true"><button type="button"
                                                                            hidefocus="1" tabindex="-1"><i
                                                                                class="mce-ico mce-i-numlist"></i></button><button
                                                                            type="button" class="mce-open"
                                                                            hidefocus="1" tabindex="-1"> <i
                                                                                class="mce-caret"></i></button>
                                                                    </div>
                                                                    <div id="mceu_11" class="mce-widget mce-btn"
                                                                        tabindex="-1" role="button"
                                                                        aria-label="Decrease indent"><button
                                                                            id="mceu_11-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
                                                                                class="mce-ico mce-i-outdent"></i></button>
                                                                    </div>
                                                                    <div id="mceu_12"
                                                                        class="mce-widget mce-btn mce-last"
                                                                        tabindex="-1" role="button"
                                                                        aria-label="Increase indent"><button
                                                                            id="mceu_12-button" role="presentation"
                                                                            type="button" tabindex="-1"><i
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
                                                                        role="button" aria-label="Insert/edit link">
                                                                        <button id="mceu_13-button"
                                                                            role="presentation" type="button"
                                                                            tabindex="-1"><i
                                                                                class="mce-ico mce-i-link"></i></button>
                                                                    </div>
                                                                    <div id="mceu_14"
                                                                        class="mce-widget mce-btn mce-last"
                                                                        tabindex="-1" aria-pressed="false"
                                                                        role="button" aria-label="Insert/edit image">
                                                                        <button id="mceu_14-button"
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
                                            style="width: 100%; height: 329px; display: block;"></iframe></div>
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
                            <textarea class="form-control" id="EmailDetails" name="EmailDetails" rows="15" placeholder=""
                                aria-hidden="true" style="display: none;"> Dear Sir,&lt;br&gt;Kindly provide the best rates for below enquiry for Singapore at the earliest&lt;br&gt;&lt;br&gt;&lt;table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"&gt;
                                &lt;tr&gt;
                                &lt;td colspan="6" bgcolor="#F8F8F8"&gt;&lt;strong&gt;Enquiry Detail&lt;/strong&gt;&lt;/td&gt;
                                &lt;/tr&gt;
                                &lt;tr&gt;
                                &lt;td&gt;&lt;strong&gt;Customer Name &lt;/strong&gt;&lt;/td&gt;
                                &lt;td&gt;Mr. rohan &lt;/td&gt;
                                &lt;td&gt;&lt;strong&gt;Enquiry ID &lt;/strong&gt;&lt;/td&gt;
                                &lt;td&gt;127504&lt;/td&gt;
                                &lt;td&gt;&lt;strong&gt;Enquiry For &lt;/strong&gt;&lt;/td&gt;
                                &lt;td&gt;&lt;/td&gt;
                                &lt;/tr&gt;

                                &lt;tr&gt;
                                &lt;td&gt;&lt;strong&gt;Check-In&lt;/strong&gt;&lt;/td&gt;
                                &lt;td&gt;01-01-1970&lt;/td&gt;
                                &lt;td&gt;&lt;strong&gt;Check-Out &lt;/strong&gt;&lt;/td&gt;
                                &lt;td&gt;01-01-1970&lt;/td&gt;
                                &lt;td&gt;&lt;strong&gt;Nights&lt;/strong&gt;&lt;/td&gt;
                                &lt;td&gt;0&lt;/td&gt;
                                &lt;/tr&gt;
                                &lt;tr&gt;
                                &lt;td&gt;&lt;strong&gt;Destination&lt;/strong&gt;&lt;/td&gt;
                                &lt;td&gt;Singapore&lt;/td&gt;
                                &lt;td&gt;&lt;strong&gt;Total Pax&lt;/strong&gt;&lt;/td&gt;
                                &lt;td colspan="3"&gt;11 Adult - 0 Child - 0 Infant &lt;strong&gt; &lt;/strong&gt;&lt;/td&gt;
                                &lt;/tr&gt;
                                &lt;tr&gt;
                                &lt;td&gt;&lt;strong&gt;Remarks&lt;/strong&gt;&lt;/td&gt;
                                &lt;td colspan="5"&gt;&nbsp;&lt;/td&gt;
                                &lt;/tr&gt;
                                &lt;/table&gt;
                                &lt;div style=" pointer-events: none;"&gt;
                                &lt;div style="margin-top:20px; font-size:15px; padding:10px; margin-bottom:20px; font-weight:700; background-color:#F2F2F2;"&gt;Hotel&lt;/div&gt;


                                &lt;div style="margin-top:20px; font-size:15px; padding:10px; margin-bottom:20px; font-weight:700; background-color:#F2F2F2;"&gt;Transfers / Activity&lt;/div&gt;

                                &lt;table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" style=" margin-bottom:10px;"&gt;
                                &lt;tr&gt;
                                &lt;td width="33%" bgcolor="#F8F8F8"&gt;&lt;strong&gt;Name  &lt;/strong&gt;&lt;/td&gt;
                                &lt;td width="33%" bgcolor="#F8F8F8"&gt;&lt;strong&gt;Date&lt;/strong&gt;&lt;/td&gt;
                                &lt;td width="33%" bgcolor="#F8F8F8"&gt;&lt;strong&gt;Type&lt;/strong&gt;&lt;/td&gt;
                                &lt;/tr&gt;

                                &lt;tr&gt;
                                &lt;td width="33%"&gt;&lt;strong&gt;Day 1&lt;/strong&gt;&lt;/td&gt;
                                &lt;td width="33%"&gt;10-10-2025&lt;/td&gt;
                                &lt;td width="33%"&gt;itinerary &lt;/td&gt;
                                &lt;/tr&gt;

                                &lt;tr&gt;
                                &lt;td width="33%"&gt;&lt;strong&gt;Day 2&lt;/strong&gt;&lt;/td&gt;
                                &lt;td width="33%"&gt;11-10-2025&lt;/td&gt;
                                &lt;td width="33%"&gt;itinerary &lt;/td&gt;
                                &lt;/tr&gt;

                                &lt;tr&gt;
                                &lt;td width="33%"&gt;&lt;strong&gt;Day 3&lt;/strong&gt;&lt;/td&gt;
                                &lt;td width="33%"&gt;12-10-2025&lt;/td&gt;
                                &lt;td width="33%"&gt;itinerary &lt;/td&gt;
                                &lt;/tr&gt;

                                &lt;tr&gt;
                                &lt;td width="33%"&gt;&lt;strong&gt;Day 1&lt;/strong&gt;&lt;/td&gt;
                                &lt;td width="33%"&gt;10-10-2025&lt;/td&gt;
                                &lt;td width="33%"&gt;itinerary &lt;/td&gt;
                                &lt;/tr&gt;
                                &lt;/table&gt;
                                &lt;/div&gt;
                                &lt;div dir="ltr"&gt;
                                &lt;p class="MsoNormal" style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"&gt;&nbsp;&lt;/p&gt;
                                &lt;p class="MsoNormal" style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"&gt;&lt;strong&gt;Thanks &amp; Regards,&lt;/strong&gt;&lt;/p&gt;
                                &lt;p class="MsoNormal" style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"&gt;&lt;strong&gt;i2a Technologies&lt;/strong&gt;&lt;/p&gt;
                                &lt;p class="MsoNormal" style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"&gt;&nbsp;&lt;/p&gt;
                                &lt;/div&gt;
                            </textarea>
                            <input type="hidden" name="action" value="sendtosupplier">
                            <input type="hidden" name="queryid" value="127504">
                        </div>
                        <div class="form-group"
                            style="overflow:hidden; padding-right:10px; margin-right:0px; margin-top:10px; width:100%;">

                            <div style="margin-top:5px;"><button type="submit" id="savingbutton"
                                    class="btn btn-primary"
                                    onclick="this.form.submit(); this.disabled=true; this.value='Sending...';"
                                    style="float:right;"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;
                                    Send Mail To Selected Suppliers</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="padding-left:15px;">
                    <h4 class="mt-0 header-title" style="margin-bottom:0px;"><i class="fa fa-check-square-o"
                            aria-hidden="true"></i> Select Supplier</h4>
                    <div class="row" style="padding: 5px; padding-top: 15px;">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <div class="suplistingouter" style="height:600px; overflow:auto;">
                                    <div class="card">
                                        <div class="card-body">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" align="left" valign="top"
                                                            style="padding-right:10px;">
                                                            <div class="checkbox"><input type="checkbox"
                                                                    name="sendcheck[]" value="100108"
                                                                    style="width: 19px; height: 22px;"></div>
                                                        </td>
                                                        <td width="99%" align="left" valign="top">
                                                            <div style="margin-bottom:2px; font-weight:800;">
                                                                Damitha Trips</div>
                                                            Mr. Damitha Trips<i class="fa fa-circle"
                                                                aria-hidden="true"
                                                                style="color: #b2bad066; margin: 0px 10px; font-size:8px;"></i>damithatrips@gmail.com
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" align="left" valign="top"
                                                            style="padding-right:10px;">
                                                            <div class="checkbox"><input type="checkbox"
                                                                    name="sendcheck[]" value="100109"
                                                                    style="width: 19px; height: 22px;"></div>
                                                        </td>
                                                        <td width="99%" align="left" valign="top">
                                                            <div style="margin-bottom:2px; font-weight:800;">Namoh
                                                                DMC</div>
                                                            Mr. Pradeep Verma<i class="fa fa-circle"
                                                                aria-hidden="true"
                                                                style="color: #b2bad066; margin: 0px 10px; font-size:8px;"></i>pradeep@namhodmc.com
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" align="left" valign="top"
                                                            style="padding-right:10px;">
                                                            <div class="checkbox"><input type="checkbox"
                                                                    name="sendcheck[]" value="100112"
                                                                    style="width: 19px; height: 22px;"></div>
                                                        </td>
                                                        <td width="99%" align="left" valign="top">
                                                            <div style="margin-bottom:2px; font-weight:800;">Rayna
                                                                Group Pvt Ltd</div>
                                                            Ms. Jyotika Dwivedi<i class="fa fa-circle"
                                                                aria-hidden="true"
                                                                style="color: #b2bad066; margin: 0px 10px; font-size:8px;"></i>jyotika@raynab2b.com
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" align="left" valign="top"
                                                            style="padding-right:10px;">
                                                            <div class="checkbox"><input type="checkbox"
                                                                    name="sendcheck[]" value="100194"
                                                                    style="width: 19px; height: 22px;"></div>
                                                        </td>
                                                        <td width="99%" align="left" valign="top">
                                                            <div style="margin-bottom:2px; font-weight:800;">
                                                                Travclan</div>
                                                            Ms. Sanya Dhall<i class="fa fa-circle" aria-hidden="true"
                                                                style="color: #b2bad066; margin: 0px 10px; font-size:8px;"></i>sanya.dhall@travclan.com
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" align="left" valign="top"
                                                            style="padding-right:10px;">
                                                            <div class="checkbox"><input type="checkbox"
                                                                    name="sendcheck[]" value="100360"
                                                                    style="width: 19px; height: 22px;"></div>
                                                        </td>
                                                        <td width="99%" align="left" valign="top">
                                                            <div style="margin-bottom:2px; font-weight:800;">Travel
                                                                Boutique</div>
                                                            Mr. Vishal Thakur<i class="fa fa-circle"
                                                                aria-hidden="true"
                                                                style="color: #b2bad066; margin: 0px 10px; font-size:8px;"></i>vishal.thakur@tbo.com
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" align="left" valign="top"
                                                            style="padding-right:10px;">
                                                            <div class="checkbox"><input type="checkbox"
                                                                    name="sendcheck[]" value="100111"
                                                                    style="width: 19px; height: 22px;"></div>
                                                        </td>
                                                        <td width="99%" align="left" valign="top">
                                                            <div style="margin-bottom:2px; font-weight:800;">
                                                                Travelbullz</div>
                                                            Mr. K.D Singh<i class="fa fa-circle" aria-hidden="true"
                                                                style="color: #b2bad066; margin: 0px 10px; font-size:8px;"></i>online@travelbullz.com
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" align="left" valign="top"
                                                            style="padding-right:10px;">
                                                            <div class="checkbox"><input type="checkbox"
                                                                    name="sendcheck[]" value="100110"
                                                                    style="width: 19px; height: 22px;"></div>
                                                        </td>
                                                        <td width="99%" align="left" valign="top">
                                                            <div style="margin-bottom:2px; font-weight:800;">U
                                                                &amp; I Holidays</div>
                                                            Ms. Shalini Mishra<i class="fa fa-circle"
                                                                aria-hidden="true"
                                                                style="color: #b2bad066; margin: 0px 10px; font-size:8px;"></i>ops2@uandiholidays.com
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
