{{ $packageDayItem ?? '' }}

<div class="modal-body">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label>Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}">
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control"
                    value="{{ old('name', $packageDayItem->name ?? '') }}" autocomplete="off">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Flight No.</label>
                <input name="flight_no" type="text" class="form-control"
                    value="{{ old('flight_no', $packageDayItem->flightDetail->flight_no ?? '') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>From Destination</label>
                <input name="from_destination" type="text" class="form-control"
                    value="{{ old('from_destination', $packageDayItem->flightDetail->from_destination ?? '') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>To Destination</label>
                <input name="to_destination" type="text" class="form-control"
                    value="{{ old('to_destination', $packageDayItem->flightDetail->to_destination ?? '') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Flight Duration</label>
                <input name="flight_duration" type="text" class="form-control"
                    value="{{ old('flight_duration', $packageDayItem->flightDetail->flight_duration ?? '') }}">
            </div>
        </div>

        <div class="row"
            style="background:#fefaeb;border:1px solid #ffd17e;padding:10px;width:100%;margin:10px;border-radius:4px;">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Date*</label>
                    <input type="text" class="form-control" name="start_date" id="startDate"
                        value="{{ old('start_date', !empty($packageDayItem->start_date) ? \Carbon\Carbon::parse($packageDayItem->start_date)->format('d-m-Y') : '') }}">
                </div>
            </div>

            @php
                $selectedStartTime = old(
                    'start_time',
                    !empty($packageDayItem->start_time)
                        ? \Carbon\Carbon::parse($packageDayItem->start_time)->format('H:i:s')
                        : ''
                );

                $selectedEndTime = old(
                    'end_time',
                    !empty($packageDayItem->end_time)
                        ? \Carbon\Carbon::parse($packageDayItem->end_time)->format('H:i:s')
                        : ''
                );
            @endphp

            <div class="col-md-4">
                <div class="form-group">
                    <label>Start time</label>
                    <select name="start_time" class="form-control">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                                $timeValue = $time->format('H:i:s');
                            @endphp
                            <option value="{{ $timeValue }}" {{ $selectedStartTime == $timeValue ? 'selected' : '' }}>
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
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                                $timeValue = $time->format('H:i:s');
                            @endphp
                            <option value="{{ $timeValue }}" {{ $selectedEndTime == $timeValue ? 'selected' : '' }}>
                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
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
