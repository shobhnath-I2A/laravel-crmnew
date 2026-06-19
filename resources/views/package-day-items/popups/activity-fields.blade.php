{{ $packageDayItem ?? '' }}

<div class="modal-body">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label>Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Destination</label>
                <select name="destination_id" id="destination_id" class="form-control"
                    onchange="loadActivities();" readonly>
                    @foreach ($destinationList as $id => $name)
                        @if ($packageDayItem->destination_id == $id)
                            <option value="{{ $id }}" selected>{{ $name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        @php
            $sourceType = old('source_type', $packageDayItem->source_type ?? 0);
        @endphp

        <div class="col-md-6">
            <div class="form-group">
                <label>Type</label>
                <select name="source_type" id="source_type" class="form-control" onchange="changepricetype();">
                    <option value="0" {{ (int) $sourceType === 0 ? 'selected' : '' }}>Manual</option>
                    <option value="1" {{ (int) $sourceType === 1 ? 'selected' : '' }}>From Master</option>
                </select>
            </div>
        </div>

        {{-- Manual Activity Name --}}
        <div class="col-md-12 manual-box">
            <div class="form-group">
                <label>Activity Name</label>
                <input type="text" name="name" class="form-control"
                    value="{{ old('name', $packageDayItem->name ?? '') }}"
                    placeholder="Activity Name">
            </div>
        </div>

        {{-- Master Activity Dropdown --}}
        <div class="col-md-12 master-box">
            <div class="form-group">
                <label>Activity</label>
                <select name="activity_id" id="activity_id" class="form-control">
                    <option value="">Select Activity</option>
                </select>
            </div>
        </div>

        <div class="row"
            style="background: rgb(254, 250, 235); padding: 10px; width: 100%; margin: 10px; border: 1px solid #ffd17e; border-radius: 4px;">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Date*</label>
                    <input type="text" class="form-control" name="start_date" id="startDate"
                        value="{{ old('start_date', isset($packageDayItem->start_date) ? \Carbon\Carbon::parse($packageDayItem->start_date)->format('d-m-Y') : '') }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Start time</label>
                    <select name="start_time" class="form-control">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i); @endphp
                            <option value="{{ $time->format('H:i:s') }}"
                                {{ old('start_time', $packageDayItem->start_time ?? '') == $time->format('H:i:s') ? 'selected' : '' }}>
                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>End time</label>
                    <select name="end_time" class="form-control">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i); @endphp
                            <option value="{{ $time->format('H:i:s') }}"
                                {{ old('end_time', $packageDayItem->end_time ?? '') == $time->format('H:i:s') ? 'selected' : '' }}>
                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <input type="hidden" name="show_time" value="0">
                <label>
                    <input type="checkbox" name="show_time" value="1"
                        {{ old('show_time', $packageDayItem->show_time ?? 0) ? 'checked' : '' }}>
                    Show Time
                </label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="5" class="editorclass" id="description">{{ $packageDayItem->description ?? '' }}</textarea>
            </div>
        </div>

    </div>
</div>
<script>
    function changepricetype() {
        let sourceType = $('#source_type').val();

        if (sourceType == '1') {
            $('.master-box').show();
            $('.manual-box').hide();

            $('.manual-box input').prop('disabled', true);
            $('#activity_id').prop('disabled', false);

            let selectedActivityId = $('#activity_id').attr('data-selected') || '';
            loadActivities(selectedActivityId);
        } else {
            $('.manual-box').show();
            $('.master-box').hide();

            $('.manual-box input').prop('disabled', false);
            $('#activity_id').prop('disabled', true).val('');
        }
    }

    function loadActivities(selectedActivityId = '') {
        let destinationId = $('#destination_id').val();

        if ($('#source_type').val() != '1') {
            return;
        }

        $('#activity_id').html('<option value="">Loading...</option>');

        if (!destinationId) {
            $('#activity_id').html('<option value="">Select Activity</option>');
            return;
        }

        $.ajax({
            url: '/get-activities-by-destination/' + destinationId,
            type: 'GET',
            dataType: 'json',
            success: function(activities) {
                let options = '<option value="">Select Activity</option>';

                activities.forEach(function(activity) {
                    let selected = String(selectedActivityId) === String(activity.id) ? 'selected' : '';
                    let details = escapeHtml(activity.details ?? activity.description ?? '');

                    options += `
                        <option value="${activity.id}" data-details="${details}" ${selected}>
                            ${activity.name}
                        </option>
                    `;
                });

                $('#activity_id').html(options);

                if (selectedActivityId) {
                    fillActivityDescription();
                }
            },
            error: function(xhr) {
                console.log('Activity load error:', xhr.responseText);
                $('#activity_id').html('<option value="">Unable to load activities</option>');
            }
        });
    }

    function fillActivityDescription() {
        let details = $('#activity_id option:selected').data('details') || '';

        if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.description) {
            CKEDITOR.instances.description.setData(details);
        } else {
            $('#description').val(details);
        }
    }

    function escapeHtml(text) {
        return $('<div>').text(text).html();
    }

    $(document).ready(function() {
        let selectedActivityId = "{{ old('activity_id', $packageDayItem->activity_id ?? '') }}";

        $('#activity_id').attr('data-selected', selectedActivityId);

        changepricetype();

        $('#source_type').off('change').on('change', function() {
            changepricetype();
        });

        $('#activity_id').off('change').on('change', function() {
            fillActivityDescription();
        });
    });
</script>
