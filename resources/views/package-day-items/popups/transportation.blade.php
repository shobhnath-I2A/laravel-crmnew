@php
    $sourceType = old('source_type', $packageDayItem->source_type ?? 0);
    $selectedName = old('name', $packageDayItem->name ?? '');
@endphp
{{ $packageDayItem ?? '' }}
<div class="modal-body">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label>Day Itinerary order ddd</label>
                <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Destination</label>
                <select name="destination_id" id="destinationName" class="form-control">
                    @foreach ($destinationList as $id => $name)
                        @if (($packageDayItem->destination_id ?? '') == $id)
                            <option value="{{ $id }}" selected>{{ $name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Type</label>
                <select name="source_type" id="source_type" class="form-control" >
                    <option value="0" {{ $sourceType == 0 ? 'selected' : '' }}>Manual</option>
                    <option value="1" {{ $sourceType == 1 ? 'selected' : '' }}>From Master</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Transfer Type</label>
                <select name="transfer_category" id="transferCategory"
                    class="form-control @error('transfer_category') is-invalid @enderror">
                    <option value="Private"
                        {{ old('transfer_category', $packageDayItem->transfer_category ?? '') == 'Private' ? 'selected' : '' }}>
                        Private</option>
                    <option value="SIC"
                        {{ old('transfer_category', $packageDayItem->transfer_category ?? '') == 'SIC' ? 'selected' : '' }}>
                        SIC</option>
                </select>
                @error('transfer_category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @php
            $selectedTransferId = old('transfer_id', $packageDayItem->transfer_id ?? '');
        @endphp

        {{-- Manual Name --}}
        <div class="col-md-6 manual-box" style="{{ $sourceType == 1 ? 'display:none;' : '' }}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="servicename" class="form-control"
                    value="{{ old('name', $packageDayItem->name ?? '') }}" autocomplete="off" @if($sourceType == 1) disabled @endif>
            </div>
        </div>

        {{-- Master Transfer --}}
       <div class="col-md-6 master-box" style="{{ $sourceType == 1 ? 'display:block;' : 'display:none;' }}">
            <div class="form-group">
                <label>Transfer Master</label>

                <select name="transfer_id" id="namemaster" class="form-control"
                    data-selected="{{ $selectedTransferId }}" @if($sourceType != 1) disabled @endif>

                    <option value="">Select Transfer</option>

                </select>
            </div>
        </div>

        <div class="row"
            style="background:#fefaeb; border:1px solid #ffd17e; padding:10px; width:100%; margin:10px; border-radius:4px;">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Date*</label>
                    <input type="text" class="form-control" name="check_in_date" id="startDate"
                        value="{{ old('check_in_date', !empty($packageDayItem->check_in_date) ? \Carbon\Carbon::parse($packageDayItem->check_in_date)->format('d-m-Y') : '') }}">
                    @error('check_in_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Start time</label>
                    <select name="check_in_time" class="form-control">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                                $timeValue = $time->format('H:i:s');
                                $selectedTime = old(
                                    'check_in_time',
                                    !empty($packageDayItem->check_in_time)
                                        ? \Carbon\Carbon::parse($packageDayItem->check_in_time)->format('H:i:s')
                                        : '',
                                );
                            @endphp
                            <option value="{{ $timeValue }}" {{ $selectedTime == $timeValue ? 'selected' : '' }}>
                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>End time</label>
                    <select name="check_out_time" class="form-control">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                                $timeValue = $time->format('H:i:s');
                                $selectedTime = old(
                                    'check_out_time',
                                    !empty($packageDayItem->check_out_time)
                                        ? \Carbon\Carbon::parse($packageDayItem->check_out_time)->format('H:i:s')
                                        : '',
                                );
                            @endphp
                            <option value="{{ $timeValue }}" {{ $selectedTime == $timeValue ? 'selected' : '' }}>
                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <label>
                    <input type="checkbox" name="show_time" value="1"
                        style="width:19px;height:19px;vertical-align:middle;"
                        {{ old('show_time', $packageDayItem->show_time ?? 0) ? 'checked' : '' }}>
                    Show Time
                </label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="5" class="editorclass" id="description">{{ old('description', $packageDayItem->description ?? '') }}</textarea>
            </div>
        </div>

    </div>
</div>
<script>
    function changepricetype() {
        let sourceType = $('#source_type').val();

        if (sourceType == '1') {
            $('.manual-box').hide();
            $('.master-box').show();

            $('#servicename').prop('disabled', true);
            $('#namemaster').prop('disabled', false);

            loadTransfers();
        } else {
            $('.master-box').hide();
            $('.manual-box').show();

            $('#servicename').prop('disabled', false);
            $('#namemaster').prop('disabled', true);
            $('#namemaster').html('<option value="">Select Transfer</option>');
        }
    }

    function loadTransfers() {
        let sourceType = $('#source_type').val();

        // Important condition
        if (sourceType != '1') {
            return false;
        }

        let selectedTransferId = $('#namemaster').data('selected') || '';

        $.ajax({
            url: "{{ route('transfers.list') }}",
            type: "GET",
            dataType: "json",

            beforeSend: function() {
                $('#namemaster').html('<option value="">Loading...</option>');
            },

            success: function(response) {
                let html = '<option value="">Select Transfer</option>';

                $.each(response, function(index, item) {
                    let selected = String(selectedTransferId) === String(item.id) ? 'selected' : '';

                    html += `
                        <option value="${item.id}" data-details="${item.details || ''}" ${selected}>
                            ${item.name}
                        </option>
                    `;
                });

                $('#namemaster').html(html);

                if (selectedTransferId) {
                    fillTransferDescription();
                }
            },

            error: function(xhr) {
                console.log(xhr.responseText);
                $('#namemaster').html('<option value="">Unable to load</option>');
            }
        });
    }

    function fillTransferDescription() {
        let details = $('#namemaster option:selected').data('details') || '';

        if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.description) {
            CKEDITOR.instances.description.setData(details);
        } else {
            $('#description').val(details);
        }
    }

    $(document).on('change', '#source_type', function() {
        changepricetype();
    });

    $(document).on('change', '#namemaster', function() {
        fillTransferDescription();
    });

    // Ensure UI matches server state immediately
    changepricetype();
</script>
