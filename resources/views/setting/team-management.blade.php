<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class="newboxheading">
            <div class="newhead">Team - People within your organisation<div class="newoptionmenu">
                    <div> <button id="addteammember" type="button"
                            class="btn btn-secondary btn-lg waves-effect waves-light"
                            onclick="loadpop('Invite team member',this,'600px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" popaction="action=addstaff">Invite team
                            member</button>
                    </div>

                </div>
            </div>
        </div>
        <div class=" ">
            <div class="col-md-12 col-xl-12" style="padding-top:32px;">
                <div class=" ">
                    <div class="card-body">
                        <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate=""
                            method="post" enctype="multipart/form-data">
                            <table class="table table-hover mb-0">

                                <thead>
                                    <tr>
                                        <th width="0%">&nbsp;</th>
                                        <th width="30%">Name</th>
                                        <th width="35%">Email</th>
                                        <th width="25%">Role</th>
                                        <th width="1%">Status</th>
                                        <th class="d-none">
                                            <div align="center"><input type="checkbox" name="checkAll2step" id="checkAll2step" value="1">&nbsp;2&nbsp;Step&nbsp;Verification
                                            </div>
                                        </th>
                                        <th class="d-none"><input type="checkbox" name="checkAllQrcodeon"  id="checkAllQrcodeon" value="1">&nbsp;QR&nbsp;Code On </th>
                                        <th width="1%">&nbsp;</th>
                                        <th width="1%">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td width="0%">
                                            <div class="bulbblue" style="margin-right:0px; margin:auto;">i</div>
                                        </td>
                                        <td width="30%">i2a Technologies</td>
                                        <td width="35%">holidays@trekhops.in</td>
                                        <td width="25%">
                                            Administrator</td>
                                        <td width="1%">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="stipverification[]" class="stip1"
                                                    value="100001" style="width: 19px; height: 22px;">
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                            </div>
                                        </td>
                                        <td width="1%"></td>
                                        <td width="1%"></td>
                                    </tr>

                                    <tr>
                                        <td width="0%">
                                            <div class="bulbblue" style="margin-right:0px; margin:auto;">S</div>
                                        </td>
                                        <td width="30%">Sujeet Kumar</td>
                                        <td width="35%">Sujeet.sk@trekhops.in</td>
                                        <td width="25%">
                                            <strong>Manager</strong> - Inhouse
                                        </td>
                                        <td width="1%">
                                            <span class="badge badge-danger">Inactive</span>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="stipverification[]" class="stip1"
                                                    value="104012" style="width: 19px; height: 22px;" checked="checked">
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="qrcodeon[]" class="stip2" value="104012"
                                                    style="width: 19px; height: 22px;" checked="checked">
                                            </div>
                                        </td>
                                        <td width="1%"><a href="display.html?ga=team&amp;add=1&amp;id=104012"
                                                class="badge badge-info" style="color:#fff !important;">Set Target</a>
                                        </td>
                                        <td width="1%">
                                            <a class="dropdown-item neweditpan"
                                                onclick="loadpop('Edit user details',this,'600px')" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                popaction="action=addstaff&amp;id=104012"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="0%">
                                            <div class="bulbblue" style="margin-right:0px; margin:auto;">S</div>
                                        </td>
                                        <td width="30%">Sachin Kumar</td>
                                        <td width="35%">sachin.sk@trekhops.in</td>
                                        <td width="25%">
                                            <strong>Manager</strong> - Inhouse
                                        </td>
                                        <td width="1%">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="stipverification[]" class="stip1"
                                                    value="104013" style="width: 19px; height: 22px;"
                                                    checked="checked">
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="qrcodeon[]" class="stip2"
                                                    value="104013" style="width: 19px; height: 22px;"
                                                    checked="checked">
                                            </div>
                                        </td>
                                        <td width="1%"><a href="display.html?ga=team&amp;add=1&amp;id=104013"
                                                class="badge badge-info" style="color:#fff !important;">Set Target</a>
                                        </td>
                                        <td width="1%">
                                            <a class="dropdown-item neweditpan"
                                                onclick="loadpop('Edit user details',this,'600px')"
                                                data-toggle="modal" data-target=".bs-example-modal-center"
                                                popaction="action=addstaff&amp;id=104013"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="0%">
                                            <div class="bulbblue" style="margin-right:0px; margin:auto;">N</div>
                                        </td>
                                        <td width="30%">Nishant Kumar</td>
                                        <td width="35%">nishant.nkp@trekhops.in</td>
                                        <td width="25%">
                                            <strong>Sales Executive</strong> - Inhouse
                                        </td>
                                        <td width="1%">
                                            <span class="badge badge-danger">Inactive</span>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="stipverification[]" class="stip1"
                                                    value="104014" style="width: 19px; height: 22px;"
                                                    checked="checked">
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="qrcodeon[]" class="stip2"
                                                    value="104014" style="width: 19px; height: 22px;"
                                                    checked="checked">
                                            </div>
                                        </td>
                                        <td width="1%"><a href="display.html?ga=team&amp;add=1&amp;id=104014"
                                                class="badge badge-info" style="color:#fff !important;">Set Target</a>
                                        </td>
                                        <td width="1%">
                                            <a class="dropdown-item neweditpan"
                                                onclick="loadpop('Edit user details',this,'600px')"
                                                data-toggle="modal" data-target=".bs-example-modal-center"
                                                popaction="action=addstaff&amp;id=104014"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="0%">
                                            <div class="bulbblue" style="margin-right:0px; margin:auto;">S</div>
                                        </td>
                                        <td width="30%">Swapnil Sinha</td>
                                        <td width="35%">Swapnil.ss@trekhops.in</td>
                                        <td width="25%">
                                            <strong>Sales Executive</strong> - Inhouse
                                        </td>
                                        <td width="1%">
                                            <span class="badge badge-danger">Inactive</span>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="stipverification[]" class="stip1"
                                                    value="104015" style="width: 19px; height: 22px;"
                                                    checked="checked">
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="qrcodeon[]" class="stip2"
                                                    value="104015" style="width: 19px; height: 22px;"
                                                    checked="checked">
                                            </div>
                                        </td>
                                        <td width="1%"><a href="display.html?ga=team&amp;add=1&amp;id=104015"
                                                class="badge badge-info" style="color:#fff !important;">Set Target</a>
                                        </td>
                                        <td width="1%">
                                            <a class="dropdown-item neweditpan"
                                                onclick="loadpop('Edit user details',this,'600px')"
                                                data-toggle="modal" data-target=".bs-example-modal-center"
                                                popaction="action=addstaff&amp;id=104015"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="0%">
                                            <div class="bulbblue" style="margin-right:0px; margin:auto;">R</div>
                                        </td>
                                        <td width="30%">Rajat Kumar</td>
                                        <td width="35%">Rajat.rk@trekhops.in</td>
                                        <td width="25%">
                                            <strong>Manager</strong> - Inhouse
                                        </td>
                                        <td width="1%">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="stipverification[]" class="stip1"
                                                    value="104078" style="width: 19px; height: 22px;"
                                                    checked="checked">
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div align="center">
                                                <input type="checkbox" name="qrcodeon[]" class="stip2"
                                                    value="104078" style="width: 19px; height: 22px;"
                                                    checked="checked">
                                            </div>
                                        </td>
                                        <td width="1%"><a href="display.html?ga=team&amp;add=1&amp;id=104078"
                                                class="badge badge-info" style="color:#fff !important;">Set
                                                Target</a></td>
                                        <td width="1%">
                                            <a class="dropdown-item neweditpan"
                                                onclick="loadpop('Edit user details',this,'600px')"
                                                data-toggle="modal" data-target=".bs-example-modal-center"
                                                popaction="action=addstaff&amp;id=104078"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input name="action" type="hidden" id="action" value="stepverificationaction">
                            <div class="modal-footer d-none" style="padding-right:10px;">
                                <input name="Save" type="submit" value="Save Changes" id="savingbutton"
                                    class="btn btn-primary"
                                    onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                $('#addmemberbtndiv #addteammember').remove();
                $('#addmemberbtndiv').html('<div class="upmsg">Your user limit exceeded. Please upgrade your subscription</div>');
            </script>
            <style>
                .upmsg {
                    color: #CC3300;
                    font-weight: 400;
                    font-size: 14px;
                    padding: 5px 10px;
                    border: 1px solid #ffe18f;
                    background-color: #fffdd4;
                }
            </style>
        </div>
    </div>
</td>
