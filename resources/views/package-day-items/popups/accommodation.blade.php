<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="validationCustom02">Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}" aria-required="true">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Destination
                </label>
                <select name="destination_id" id="destinationName" class="form-control" onchange="loadhotel();" style="display: block;" readonly>
                     @foreach ($destinationList as $id => $name)
                        @if ($packageDayItem->destination_id == $id)
                            <option value="{{ $id }}" selected>{{ $name }}</option>
                        @endif
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Type</label>
                <select name="source_type" id="source_type" class="form-control" onchange="changepricetype();">
                    <option value="0" {{ $sourceType == 0 ? 'selected' : '' }}>Manual</option>
                    <option value="1" {{ $sourceType == 1 ? 'selected' : '' }}>From Master</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 manual">
            <div class="form-group">
                <label for="validationCustom02">Hotel Name
                </label>
               <input name="name" type="text" class="form-control" id="servicename" value="{{ old('name', $packageDayItem->name ?? '') }}">

            </div>
        </div>
        <div class="col-md-12 master" style="display:none;">
            <div id="loadhoteldata" style="display:none;"></div>
            <div class="form-group">
                <label for="validationCustom02">Hotel Name
                </label>
                <select name="hotel_id" id="hotel_id" class="form-control" onchange="loadhoteldata();">
                    <option value="">Select Hotel</option>
                </select>

                <input type="hidden" id="selected_hotel_id" value="{{ $selectedHotelId }}">
                <input type="hidden" id="selected_room_type" value="{{ $selectedRoomType }}">
                <input type="hidden" id="selected_meal_plan" value="{{ $selectedMealPlan }}">

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Category
                </label>
                <select name="hotel_category" id="hotelCategory" class="form-control">
                    <option value="1" {{ old('hotel_category', $packageDayItem->hotel_category ?? '') == 1 ? 'selected' : '' }}>1 Star</option>
                    <option value="2" {{ old('hotel_category', $packageDayItem->hotel_category ?? '') == 2 ? 'selected' : '' }} >2 Star</option>
                    <option value="3"{{ old('hotel_category', $packageDayItem->hotel_category ?? '') == 3 ? 'selected' : '' }}>3 Star</option>
                    <option value="4"{{ old('hotel_category', $packageDayItem->hotel_category ?? '') == 4 ? 'selected' : '' }}>4 Star</option>
                    <option value="5"{{ old('hotel_category', $packageDayItem->hotel_category ?? '') == 5 ? 'selected' : '' }}>5 Star</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 master" style="display:none;">
            <div class="form-group">
                <label for="validationCustom02">Room Name</label>
                <select name="room_type" id="hotelRoommaster" class="form-control">
                    <option value="">Select Room Type</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 manual">
            <div class="form-group">
                <label for="validationCustom02">Room Name
                </label>
                <input type="text" name="room_name" class="form-control" value="{{ $selectedRoomName }}">
            </div>
        </div>
        <div class="col-md-6 master-section d-none">
            <div class="form-group">
                <label>Room</label>
                <select name="room_id" id="room_master" class="form-control"></select>
            </div>
        </div>
        <div class="col-md-6 master" style="display:none;">
            <div class="form-group">
                <label>Meal Plan</label>
                <select name="meal_plan" id="mealPlanmaster" class="form-control">
                    <option value="">Select Meal Plan</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 manual">
            <div class="form-group">
                <label>Meal Plan</label>
                <input name="meal_plan" id="mealPlanManual" type="text" class="form-control" value="{{ $selectedMealPlan }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Hotel Option</label>
                <select name="hotel_options" class="form-control">
                    <option value="1" {{ $selectedHotelOption == 1 ? 'selected' : '' }}>Option 1</option>
                    <option value="2" {{ $selectedHotelOption == 2 ? 'selected' : '' }}>Option 2</option>
                    <option value="3" {{ $selectedHotelOption == 3 ? 'selected' : '' }}>Option 3</option>
                </select>
            </div>
        </div>

        <div class="row"
            style="background:#f7f7f7;  padding: 10px; width: 100%; margin: auto; border: 1px solid #cccccc; margin: 10px 10px; border-radius: 4px;">
            <div style="margin-bottom:10px; width:100%;    padding-left: 10px;"><strong>Enter Number of Rooms</strong>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Single
                    </label>
                    <input name="single_room" type="Number" min="0" class="form-control" value="{{ old('single_room', $hotelDetail->single_room ?? 0) }}">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Double
                    </label>
                    <input name="double_room" type="Number" min="0" class="form-control" value="{{ old('double_room', $hotelDetail->double_room ?? 0) }}">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Triple
                    </label>
                    <input name="triple_room" type="Number" min="0" class="form-control" value="{{ old('double_room', $hotelDetail->double_room ?? 0) }}">
                </div>
            </div>



            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Quad
                    </label>
                    <input name="quad_room" type="Number" min="0" class="form-control" value="{{ old('quad_room', $hotelDetail->quad_room ?? 0) }}">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">CWB
                    </label>
                    <input name="cwb_room" type="Number" min="0" class="form-control" value="{{ old('cwb_room', $hotelDetail->cwb_room ?? 0) }}">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">CNB
                    </label>
                    <input name="cnb_room" type="Number" min="0" class="form-control" value="{{ old('cnb_room', $hotelDetail->cnb_room ?? 0) }}">
                </div>
            </div>
        </div>
        <div class="row"
            style="background: rgb(254, 250, 235); border-color: #f7d038; padding: 10px; width: 100%; margin: auto; border: 1px solid #ffd17e; margin: 10px 10px; border-radius: 4px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-in date* </label>
                  <input type="text" class="form-control" name="start_date" id="startDate"
                        value="{{ old('start_date', isset($packageDayItem->start_date) ? \Carbon\Carbon::parse($packageDayItem->start_date)->format('d-m-Y') : '') }}">
                    @if ($errors->has('start_date'))
                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-in time</label>
                    <select id="start_time" name="start_time" autocomplete="off" class="form-control"
                        style="width:130px;">
                         @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="{{ $time->format('H:i:s') }}"
                                {{ old('start_time', isset($packageDayItem->start_time) ? \Carbon\Carbon::parse($packageDayItem->start_time)->format('H:i:s') : '') == $time->format('H:i:s') ? 'selected' : '' }}>

                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-out date*</label>
                    <input type="text" class="form-control" name="end_date" id="endDate"
                        value="{{ old('end_date', isset($packageDayItem->end_date) ? \Carbon\Carbon::parse($packageDayItem->end_date)->format('d-m-Y') : '') }}">
                    @if ($errors->has('end_date'))
                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-out time</label>
                    <select id="end_time" name="end_time" autocomplete="off" class="form-control"
                        style="width:130px;">
                         @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="{{ $time->format('H:i:s') }}"
                                {{ old('checkOut', isset($packageDayItem->end_time) ? \Carbon\Carbon::parse($packageDayItem->end_time)->format('H:i:s') : '') == $time->format('H:i:s') ? 'selected' : '' }}>

                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <table border="0" cellpadding="2" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <input type="checkbox" name="show_time" class="stip1" value="1"
                                        style="width: 19px; height: 22px;"
                                        {{ old('show_time', $packageDayItem->show_time ?? 0) ? 'checked' : '' }}>
                                    </td>
                                <td>&nbsp;Show Time </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="validationCustom02">Description</label>
               <textarea name="description" rows="5" class="editorclass" id="description" aria-hidden="true">{{ $packageDayItem->description ?? '' }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
