<style>
      .popup-box {
        max-width: 30%;
        }
</style>
<div class="modal-content">
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
        <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate="novalidate"
            method="post" enctype="multipart/form-data">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Amount*</label>
                            <input name="amount" type="number" class="form-control" id="name" value="13000"
                                required="" aria-required="true">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Date*</label>
                            <input type="text" class="form-control hasDatepicker" required="" name="startDate"
                                id="startDate" value="21-08-2025" aria-required="true">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Status*</label>
                            <select name="status" id="paymentStatus" class="form-control" onchange="funpaid();">
                                <option value="1">Paid</option>
                                <option value="2" selected="selected">Scheduled</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Remark</label>
                            <textarea name="remark" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <script>
                        function funpaid() {
                            var paymentStatus = $('#paymentStatus').val();
                            if (paymentStatus == 1) {
                                $('.paid').show();
                            } else {
                                $('.paid').hide();
                            }
                            getreceipt();
                        }
                    </script>

                    <div class="col-md-12 paid" style="  display:none;  ">
                        <div class="form-group">
                            <label for="validationCustom02">Payment Type*</label>
                            <select name="transectionType" id="transectionType" class="form-control"
                                onchange="getreceipt();">
                                <option value="Cash" selected="selected">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="NEFT">NEFT</option>
                                <option value="Mobile&nbsp;Payment">Mobile&nbsp;Payment</option>
                                <option value="Payzapp">Payzapp</option>
                                <option value="Razorpay">Razorpay</option>
                                <option value="Paypal">Paypal</option>
                                <option value="Payu">Payu</option>
                                <option value="UPI">UPI</option>
                                <option value="IMPS">IMPS</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        function getreceipt() {
                            var transectionType = encodeURI($('#transectionType').val());
                            if (transectionType == 'Cash') {
                                $('.receiptfield').show();
                                $('.trans').hide();
                            } else {
                                $('.receiptfield').hide();
                                $('.trans').show();
                            }
                        }
                    </script>
                    <div class="col-md-12 receiptfield" style=" display:none;  ">
                        <div class="form-group">
                            <label for="validationCustom02">Receipt</label>
                            <input type="file" class="form-control" name="receiptFile">
                        </div>
                    </div>

                    <div class="col-md-12 paid trans" style=" display:none;  ">
                        <div class="form-group">
                            <label for="validationCustom02">Transection ID</label>
                            <input name="paymentId" type="text" class="form-control" value="" required=""
                                aria-required="true">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary">
            </div>
            <input name="action" type="hidden" id="action" value="addquerypayment">
            <input name="queryId" type="hidden" value="127257">
            <input name="packageId" type="hidden" value="108998">
            <input name="editid" type="hidden" value="100559">
        </form>
        <script>
            $(function() {
                $("#startDate").datepicker({
                    dateFormat: 'dd-mm-yy'
                });
                $("#endDate").datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: 0,
                });
            });
        </script>

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
