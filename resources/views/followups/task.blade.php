{{-- Task popup from --}}
<div class="modal fade bs-task-modal-center" tabindex="-1" role="dialog" id="taskModal">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px; width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="poptitle">Add Followup / Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="popcontent">
                <script src="/tinymce/tinymce.min.js"></script>
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
                <form action="{{ route('query-tasks.store') }}" method="post" enctype="multipart/form-data" id="task-form" class="custom-validation ajax-form">
                    <div class="form-group mb-3">
                        <div style="margin-bottom:2px; font-size:12px;">Type</div>
                        <select name="taskType" class="form-control" autocomplete="off"
                            style="width:100%; margin-bottom:20px;">
                            <option value="Task">Task</option>
                            <option value="Call">Call</option>
                            <option value="Meeting">Meeting</option>
                        </select>
                        <div style="margin-bottom:2px; font-size:12px;">Description</div>
                        <textarea name="details" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td colspan="2" style=" font-size:12px;">Reminder Date </td>
                                    <td style=" font-size:12px;">&nbsp;&nbsp;&nbsp;Time</td>
                                    <td style=" font-size:12px;">&nbsp;&nbsp;&nbsp;Set Reminder </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="text" class="form-control hasDatepicker" id="reminderDate" name="reminderDate" readonly="" value="16-03-2026">
                                    </td>
                                    <script>
                                        $(function() {
                                            $("#reminderDate").datepicker({
                                                dateFormat: 'dd-mm-yy',
                                                minDate: 0
                                            });
                                        });
                                    </script>
                                    <td style="padding-left:10px;"><select id="reminderTime" name="reminderTime"
                                            class="form-control" autocomplete="off" style="width:130px;">
                                            <option value="1970-01-01 00:00:00">12:00 AM</option>;
                                            <option value="1970-01-01 00:15:00">12:15 AM</option>;
                                            <option value="1970-01-01 00:30:00">12:30 AM</option>;                                          
                                        </select>
                                    </td>
                                    <td style="padding-left:10px;"><select name="status" class="form-control"
                                            autocomplete="off" style="width:100px;">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group mb-2">
                        <select id="assignTo" name="assignTo" class="form-control" autocomplete="off"
                            onchange="changeAssignTo('');">
                            <option value="0">Assign To</option>
                            <option value="4041">Aaron AK</option>                          
                        </select>
                    </div>
                    <div class="form-group" style="overflow:hidden;">
                        <div style="margin-top:5px;">
                            {{-- <button type="submit" id="savingbutton"
                                class="btn btn-primary"
                                onclick="this.form.submit(); this.disabled=true; this.value='Saving...';"
                                style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i> Save</button> --}}
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                        </div>
                    </div>
                    <input type="hidden" name="queryId" id="queryId">
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
                <script>
                $('#taskModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); 
                    var queryId = button.data('queryid');
                    $(this).find('#queryId').val(queryId);
                });
                </script>
            </div>
        </div>
    </div>
</div>
{{-- End of task popup form --}}