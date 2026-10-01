{{-- Task popup from --}}
<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-body">
    <div class="modal-body" id="popcontent">
        <form action="{{ route('query-tasks.store') }}" method="post" enctype="multipart/form-data" id="task-form" class="custom-validation ajax-form">
            @csrf
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
                                <input
                                    type="date"
                                    name="reminderDate"
                                    id="reminderDate"
                                    value="{{ old('reminderDate') }}"
                                    class="form-control"
                                >
                                @error('reminderDate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>

                            <td style="padding-left:10px;">
                               <select id="reminderTime"name="reminderTime"class="form-control"style="width:130px;">
                                    <option value="">Select time</option>

                                    @for ($i = 0; $i < 24 * 60; $i += 15)
                                        @php
                                            $value = sprintf('%02d:%02d', intdiv($i, 60), $i % 60);
                                            $label = \Carbon\Carbon::createFromFormat('!H:i', $value)
                                                ->format('h:i A');
                                        @endphp

                                        <option
                                            value="{{ $value }}"
                                            @selected(old('reminderTime') === $value)
                                        >
                                            {{ $label }}
                                        </option>
                                    @endfor
                                </select>
                            </td>
                            <td style="padding-left:10px;">
                               <select name="setReminder" class="form-control" style="width:100px;">
                                    <option value="1" @selected(old('setReminder', '1') == '1')>
                                        Yes
                                    </option>
                                    <option value="0" @selected(old('setReminder', '1') == '0')>
                                        No
                                    </option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group mb-2">
               <select id="assignTo" name="assignTo" class="form-control">
                    <option value="">Assign to me</option>

                    @foreach ($users as $user)
                        <option
                            value="{{ $user->id }}"
                            @selected(old('assignTo') == $user->id)
                        >
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="overflow:hidden;">
                <div style="margin-top:5px;">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
            <input type="hidden" name="queryId" id="queryId" value="{{ $queryId ?? '' }}">
        </form>
    </div>
</div>
