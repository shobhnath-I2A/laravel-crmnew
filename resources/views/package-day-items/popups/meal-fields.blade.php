{{ $packageDayItem ?? '' }}
<div class="modal-body">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label>Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control"
                    value="{{ old('name', $packageDayItem->name ?? '') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Destination</label>
                <select name="destination_id" id="destinationName" class="form-control" readonly>
                    @foreach ($destinationList as $id => $name)
                        @if (($packageDayItem->destination_id ?? '') == $id)
                            <option value="{{ $id }}" selected>{{ $name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        @php
            $selectedMealCategory = old('mealCategory', $packageDayItem->mealCategory ?? '');
        @endphp

        <div class="col-md-6">
            <div class="form-group">
                <label>Meal Type</label>
                <select name="mealCategory" class="form-control">
                    <option value="APAI" {{ $selectedMealCategory == 'APAI' ? 'selected' : '' }}>APAI</option>
                    <option value="MAPAI" {{ $selectedMealCategory == 'MAPAI' ? 'selected' : '' }}>MAPAI</option>
                    <option value="CPAI" {{ $selectedMealCategory == 'CPAI' ? 'selected' : '' }}>CPAI</option>
                </select>
            </div>
        </div>

        <div class="row"
            style="background:#fefaeb;border:1px solid #ffd17e;padding:10px;width:100%;margin:10px;border-radius:4px;">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Date*</label>
                    <input type="text" class="form-control" name="start_date" id="startDate"
                        value="{{ old('start_date', !empty($packageDayItem->start_date) ? \Carbon\Carbon::parse($packageDayItem->start_date)->format('d-m-Y') : '') }}">

                    @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
