<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class=" ">
            <div class="col-md-12 col-xl-12">
                <div>
                    <div class="card-body" style="padding:10px;">
                        <h4 class="card-title"
                            style="margin-top: 0px !important; padding-left: 10px !important; padding-top: 10px !important; padding-bottom: 5px !IMPORTANT;padding-right: 0px !important;">
                            Organisation Settings
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" onclick="openPopup('Edit organisation settings','{{ route('settings.createorganization') }}')" data-backdrop="static">Edit Setting</button>
                            </div>
                        </h4>
                        <div style="border:1px solid #ddd; margin:10px;">
                            <table width="100%" class="table table-striped" style="    margin-bottom: 0px;">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="20%">Organisation name</td>
                                        <td width="71%">
                                            <div style="font-size:15px; color:#000; "><strong>{{ $organisation['organisation_name'] ?? '' }}</strong>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Email (Invoicing use)</td>
                                        <td>
                                            <div style="font-size:15px; color:#000; ">
                                                <strong>{{ $organisation['invoice_email'] ?? '' }}</strong></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Phone (Invoicing use)</td>
                                        <td>
                                            <div style="font-size:15px; color:#000; "><strong>{{ $organisation['invoice_phone'] ?? '' }}</strong></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Address</td>
                                        <td>
                                            <div style="font-size:15px; color:#000; "><strong>{{ $organisation['address'] ?? '' }}</strong></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">GSTN</td>
                                        <td>
                                            <div style="font-size:15px; color:#000; "><strong>{{ $organisation['gstn'] ?? '' }}</strong></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="20%">State</td>
                                        <td>
                                            <div style="font-size:15px; color:#000; "><strong>{{ $organisation['state'] ?? '' }}</strong></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="20%">State code </td>
                                        <td>
                                            <div style="font-size:15px; color:#000; "><strong>{{ $organisation['state_code'] ??'' }} </strong></div>
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
</td>
