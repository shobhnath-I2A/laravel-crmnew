<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class="newboxheading">
            <div class="newhead">Team - People within your organisation<div class="newoptionmenu">
                    <div>
                          <button id="addteammember" type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                            onclick="openPopup('Invite Team Member','{{ route('staff.create') }}')"
                            data-backdrop="static">Invite Team Member</button>
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
                                @forelse($teams as $team)
                                    <tr>
                                        <td width="0%">
                                            <div class="bulbblue" style="margin-right:0px; margin:auto;"> {{ strtoupper(substr(optional($team)->name ?? 'A', 0, 1)) }}</div>
                                        </td>
                                        <td width="30%">{{ $team->name ??'' }}</td>
                                        <td width="35%">{{ $team->email ?? '' }}</td>
                                        <td width="25%">{{ $team->role??'' }}
                                            </td>
                                        <td width="1%">
                                            <span
                                                class="badge {{ $team->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $team->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
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
                                        <td width="1%"><a href="display.html?ga=team&amp;add=1&amp;id=104012"
                                                class="badge badge-info" style="color:#fff !important;">Set Target</a>
                                        </td>
                                        <td width="1%">
                                            <a class="dropdown-item neweditpan"
                                                onclick="openPopup('Invite Team Member','{{ route('staff.edit', $team->id) }}')"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Data</td>
                                    </tr>
                                @endforelse
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
