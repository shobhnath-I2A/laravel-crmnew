<style>
      .popup-box {
        max-width: 20%;
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
        <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate="novalidate" method="post" enctype="multipart/form-data">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Mail Send To<span class="redmtext">*</span> </label>
                            <input type="text" class="form-control" readonly="" name="name"
                                value="shobhnath.s@i2a.co">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">CC Mails<span class="redmtext">*</span> </label>
                            <input type="text" class="form-control" name="ccmails" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary"
                    onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
            </div>

            <input name="action" type="hidden" id="action" value="sendpaymentlink">
            <input name="qid" type="hidden" id="" value="127257">
            <input name="pid" type="hidden" id="" value="108998">
            <input name="id" type="hidden" id="" value="100561">
            <input name="sendlink" type="hidden" id="" value="1">
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
