<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="validationCustom02">Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text" value="{{ old('day_order', $packageDayItem->day_order ?? '') }}" required=""
                    aria-required="true">
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="validationCustom02">Name
                </label>
                <input name="name" type="text" class="form-control valid" id="name" value="{{ old('name', $packageDayItem->name ?? 'Day at Leisure') }}"
                    required="" aria-required="true" aria-invalid="false">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Destination
                </label>
                <input name="from_destination" type="text" class="form-control valid" value="{{ old('from_destination', $packageDayItem->from_destination ?? '') }}" required="" aria-required="true" aria-invalid="false">

            </div>
        </div>

        <div class="row"
            style="background: rgb(254, 250, 235); border-color: #f7d038; padding: 10px; width: 100%; margin: auto; border: 1px solid #ffd17e; margin: 10px 10px; border-radius: 4px; display:none;">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="validationCustom02">Date* </label>
                    <input type="text" class="form-control" name="check_in_date" id="startDate"
                        value="{{ old('check_in_date', isset($packageDayItem->check_in_date) ? \Carbon\Carbon::parse($packageDayItem->check_in_date)->format('d-m-Y') : '') }}">
                    @if ($errors->has('check_in_date'))
                        <span class="text-danger">{{ $errors->first('check_in_date') }}</span>
                    @endif
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="validationCustom02">Start time</label>
                    <select name="check_in_time" class="form-control" autocomplete="off">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="{{ $time->format('H:i:s') }}"
                                {{ old('checkIn', isset($packageDayItem->check_out_time) ? \Carbon\Carbon::parse($packageDayItem->check_out_time)->format('H:i:s') : '') == $time->format('H:i:s') ? 'selected' : '' }}>

                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="validationCustom02">End time</label>
                    <select name="check_out_time" class="form-control" autocomplete="off">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="{{ $time->format('H:i:s') }}"
                                {{ old('checkIn', isset($packageDayItem->check_out_time) ? \Carbon\Carbon::parse($packageDayItem->check_out_time)->format('H:i:s') : '') == $time->format('H:i:s') ? 'selected' : '' }}>

                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="validationCustom02">Description
                </label>
                <textarea name="description" rows="5" class="editorclass" id="description" aria-hidden="true">{{ old('description', $packageDayItem->description ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>
