<div class="card-body">
    <div style="padding:10px;">
        <style>
            .statusbox {
                margin-right: 5px;
                padding: 10px;
                text-align: center;
                background-color: #000000;
                font-size: 13px;
                color: #fff;
                border-radius: 4px;
                text-transform: uppercase;
            }

            .conf {
                width: 100px;
                border: 1px solid #ddd;
                border-radius: 3px;
                padding: 5px;
                text-align: center;
            }
        </style>
        <div class=" ">
            <div class=" ">
                <div style="margin-bottom:10px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#655be6;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                            ₹ 1,050 </div>
                                        Total&nbsp;Amount
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#0cb5b5;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">₹
                                            12,000,000</div>
                                        Received
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#e45555;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">₹
                                            -11,998,950</div>Pending
                                    </div>
                                </td>
                                <td width="16%" align="left" valign="top">
                                    <div class="statusbox"
                                        style="background-color: #ffffff; color: #000000; font-weight: 600;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">₹ 1,050
                                        </div>Gross Profit
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#e69f5b;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                            ₹ 0 </div>
                                        Supplier&nbsp;Amount
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#71b183;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">₹ 0</div>
                                        Supplier&nbsp;Received
                                    </div>
                                </td>
                                <td width="14%" align="left" valign="top">
                                    <div class="statusbox" style="background-color:#ae8393;">
                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">₹ 0</div>
                                        Supplier&nbsp;Pending
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12" style=" padding: 0px; ">
                    <h4 class="mt-0 header-title" style="border-bottom:0px; position:relative;">Payments (1)
                        <a onclick="loadpop('Send Payment Plan To Mail',this,'400px')" data-toggle="modal"
                            data-target=".bs-example-modal-center"
                            popaction="action=sendSelectedPaymentPlanToMail&amp;queryId=127497&amp;packageId=109135"
                            style="position: absolute; font-size: 12px; font-weight: 600; right: 5px; top:2px; background-color: #005ee2; color: #fff; padding: 2px 10px; border-radius: 3px; cursor: pointer;">Send
                            Payment Plan To Mail</a>
                    </h4>
                    <div class="card">
                        <div class="card-body" style="padding:10px !important;">
                            <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                                style=" font-size:12px;">
                                <thead>
                                    <tr>
                                        <th>Payment&nbsp;ID</th>
                                        <th>Trans.&nbsp;ID</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Payment&nbsp;Date</th>
                                        <th>Status</th>
                                        <th align="center">&nbsp;</th>
                                        <th align="center" style="display:none;">&nbsp;</th>
                                        <th align="center">Convenience Fee</th>
                                        <th>Receipt</th>
                                        <th>
                                            <div align="right">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="  background-color: #e4fff9;">
                                        <td align="left" valign="top">100572</td>
                                        <td align="left" valign="top" style="text-transform:uppercase;">324234234
                                        </td>
                                        <td align="left" valign="top"><span class="badge badge-dark">UPI</span></td>
                                        <td align="left" valign="top">₹ 12000000</td>
                                        <td align="left" valign="top">03/03/2026 - 02:49 PM </td>
                                        <td align="left" valign="top"><span class="badge badge-success">Paid</span>
                                        </td>
                                        <td align="center" valign="top">
                                        </td>
                                        <td align="center" valign="top" style="display:none;"> <button type="button"
                                                class="btn btn-info btn-sm waves-effect waves-light"
                                                onclick="loadpop('Send Without Link',this,'400px')" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                popaction="action=sendpaymentWithoutLink&amp;pid=109135&amp;qid=127497&amp;id=100572&amp;amt=12000000&amp;acn=1"
                                                style="margin-bottom:0px; float:right;">Send Payment Details</button>
                                            <br>
                                        </td>
                                        <td align="center" valign="top"></td>
                                        <td align="left" valign="top"></td>
                                        <td align="left" valign="top">
                                            <div style=" width: 100px; float:right;">&nbsp;<button type="button"
                                                    class="btn btn-danger btn-sm waves-effect waves-light"
                                                    onclick="deletebill('100572');"
                                                    style="margin-bottom:0px; float:right; margin-right: 3px;">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style=" ">
                                        <td colspan="3" align="right" valign="top"><strong>Not Scheduled
                                                Amount: </strong></td>
                                        <td align="left" valign="top"><strong>₹ -11998950</strong></td>
                                        <td colspan="7" align="right" valign="top"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <input name="action" type="hidden" id="action" value="sendSelectedPaymentPlanToMail" />
                    <input name="queryId" type="hidden"  value="127497" />
                    <input name="packageId" type="hidden"  value="109135" />   -->
                    <div style="overflow: hidden; width: 100%; margin-top: 10px; display:none;">
                        <table border="0" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td><!--<input name="Save" type="submit" value="Send Payment Plan To Mail"   id="savingbutton" class="btn btn-primary" onclick="this.form.submit(); this.disabled=true; this.value='Saving...';" style="float:left;"  />-->
                                    </td>
                                    <td>&nbsp;&nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <h4 class="mt-0 header-title" style="border-bottom:0px; overflow:hidden;">&nbsp;</h4>
                    <div style="text-align:center; padding:10px;">
                        <div style="margin-bottom:10px;">No Invoice Found</div>
                        <a target="actoinfrm"
                            href="actionpage.php?action=genrateinvoice&amp;queryId=127497&amp;packageId=109135&amp;amount=1050">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Genrate
                                Invoice</button>
                        </a>
                    </div>
                </div>
            </div>
            <div id="saveconfee" style="display:none;"></div>
            <script>
                function confeefun(id) {
                    var conFee = $('#conFee' + id).val();
                    $('#saveconfee').load('actionpage.php?action=saveconfee&id=' + id + '&conFee=' + conFee + '&queryId=127497');
                }

                function deletebill(id) {
                    if (confirm('Are you sure want to delete?')) {
                        $('#saveconfee').load('actionpage.php?action=deletebill&parentId=127497&id=' + id);
                    }
                }
            </script>
        </div>
    </div>
</div>
