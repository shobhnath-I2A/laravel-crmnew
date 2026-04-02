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

                        <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate=""
                            method="post" enctype="multipart/form-data">

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Invoice / Itinerary logo </label>
                                            <div class="custom-file">
                                                <input name="changeprofilepic" type="file" class="custom-file-input"
                                                    id="customFile">
                                                <input name="oldchangeprofilepic" type="hidden"
                                                    value="16942404066793789211693635606.jpg">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="validationCustom02">Invoice terms and conditions </label>

                                            <textarea name="inclusion" rows="5" class="form-control editorclass" required="" id="description"
                                                style="" aria-hidden="true">&lt;p&gt;Thanks and Regards&lt;/p&gt;</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="validationCustom02">Package terms and conditions </label>

                                            <textarea name="invoiceTerms" rows="5" class="form-control editorclass description" required="" id="description"
                                                aria-hidden="true">&lt;ul style="list-style-type: square;"&gt;
&lt;li&gt;Airline seats and hotel rooms are subject to availability at the time of confirmation.&lt;/li&gt;
&lt;li&gt;In case of unavailability in the listed hotels, arrangements for an alternate accommodation will be made in a hotel of similar standard.&lt;/li&gt;
&lt;li&gt;There will be no refund for unused nights or early check-out (In case of a Medical condition it entirely depends on hotel policy).&lt;/li&gt;
&lt;li&gt;Check-in and check-out times at hotels would be as per hotel policies. Early check-in or late check-out is subject to availability and may be chargeable by the hotel.&lt;/li&gt;
&lt;li&gt;The price does not include expenses of personal nature, such as laundry, telephone calls, room service, alcoholic beverages, mini bar charges, tips, portage, camera fees, etc.&lt;/li&gt;
&lt;li&gt;Trekhops reserves the right to modify the itinerary at any point, due to reasons including but not limited to: Force Majeure events, strikes, fairs, festivals, weather conditions, traffic problems, overbooking of hotels/flights, cancellation / re-routing of flights, closure of / entry restrictions at a place of a visit, etc. While we will do our best to make suitable alternate arrangements, we would not be held liable for any refunds/compensation claims arising out of this.&lt;/li&gt;
&lt;li&gt;In case a flight gets canceled, Trekhops will not be liable to provide any alternate flights within the same cost, the traveler shall bear any additional cost incurred for the same.&lt;/li&gt;
&lt;li&gt;In Case of any Health Issues Trekhops will not be liable to provide any refunds and in case of Medical Emergencies, all the medical expenses will be liable to the customer.&lt;/li&gt;
&lt;/ul&gt;</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="validationCustom02">Bank information </label>

                                            <textarea name="packageImportantTips" rows="5" class="form-control editorclass" required=""
                                                id="description"  aria-hidden="true">&lt;ul&gt;
	&lt;li&gt;&lt;strong&gt;Account Name: I2A Technologies Private Limited&lt;br /&gt;
	Account Number: 114505002013&lt;br /&gt;
	Bank Name: ICICI Bank Ltd&lt;br /&gt;
	IFSC Code: ICIC0001145&lt;/strong&gt;&lt;/li&gt;
&lt;/ul&gt;

&lt;p&gt;&lt;strong&gt;&lt;span style="background-color:#ffff00"&gt;All payments to be made in Current Account only. We do not accept cash collections or any other account payments.&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;
</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <img src="images/leadgeticon.png" height="100" style="margin:40px 0px;">
                                        <div class="form-group">
                                            <label for="validationCustom02">Google sheet URL for leads fetching
                                            </label>
                                            <input name="leadURL" type="text" class="form-control"
                                                value="" required="">
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
                                    <input name="paymentAPIKey" type="text" class="form-control"
                                        id="paymentAPIKey" value="" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom02">API Secret</label>
                                    <input name="paymentAPISecret" type="text" class="form-control"
                                        id="paymentAPISecret" value="" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input name="Save" type="submit" value="Save" id="savingbutton"
                                    class="btn btn-primary"
                                    onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
                            </div>

                            <input name="action" type="hidden" id="action" value="setlogoandinclusion">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</td>
