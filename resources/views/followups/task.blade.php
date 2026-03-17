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
                <form action="{{ route('query-tasks.store') }}" method="post" enctype="multipart/form-data" id="task-form" class="custom-validation ajax-form">
                    <div class="form-group mb-3">
                        <div style="margin-bottom:2px; font-size:12px;">Type</div>
                        <select name="taskType" class="form-control reqfield" autocomplete="off"
                            style="width:100%; margin-bottom:20px;">
                            <option value="">-- Select Task Type --</option>
                            <option value="Task">Task</option>
                            <option value="Call">Call</option>
                            <option value="Meeting">Meeting</option>
                        </select>
                        @error('taskType')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                                    <td colspan="2">
                                        <input type="text" name="reminderDate" value="{{ old('reminderDate', $query->reminderDate ?? '') }}" id="reminderDate" class="form-control reqfield">
                                         @error('reminderDate')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>

                                    <td style="padding-left:10px;">
                                        <select id="reminderTime" name="reminderTime" autocomplete="off"
                                            class="form-control" style="width:130px;">
                                            @for ($i = 0; $i < 24 * 60; $i += 15)
                                                @php
                                                    $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                                                @endphp
                                                <option value="1970-01-01 {{ $time->format('H:i:s') }}">
                                                    {{ $time->format('h:i A') }}
                                                </option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td style="padding-left:10px;">
                                        <select name="status" class="form-control"
                                            autocomplete="off" style="width:100px;">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group mb-2">
                        <select id="assignTo" name="assignTo" class="form-control" autocomplete="off" onchange="changeAssignTo('');">
                            <option value="0">Assign To</option>
                            <option value="4041">Aaron AK</option>
                        </select>
                    </div>
                    <div class="form-group" style="overflow:hidden;">
                        <div style="margin-top:5px;">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="queryId" id="queryId">
                </form>
            </div>
        </div>
    </div>
</div>
