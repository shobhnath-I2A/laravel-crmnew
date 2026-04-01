<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="validationCustom02">Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}" aria-required="true">
            </div>
        </div>
        {{-- {{ $packageDayItem ?? '' }} --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Destination
                </label>
                <select name="destination_id" id="destinationName" class="form-control" onchange="loadhotel();" style="display: block;" readonly>
                     @foreach ($destinations as $id => $name)
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
                @php
                    $hotelType = old('hotel_type');
                    if (!$hotelType) {
                        $hotelType = $packageDayItem->hotel_id ? 1 : 0;
                    }
                @endphp
                <select name="hotel_type" id="hotel_type" class="form-control" onchange="changepricetype();">
                    <option value="0" {{ $hotelType == 0 ? 'selected' : '' }}>Manual</option>
                    <option value="1" {{ $hotelType == 1 ? 'selected' : '' }}>From Master</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 manual">
            <div class="form-group">
                <label for="validationCustom02">Hotel Name
                </label>
                <input name="name" type="text" class="form-control ui-autocomplete-input valid"
                    id="servicename" value="{{ old('name', $packageDayItem->name ?? '') }}"
                    autocomplete="off" aria-required="true" aria-invalid="false">

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
                <input type="hidden" name="hotelPriceId" id="hotelPriceId" value="0">

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
              <select name="room_type_id" id="hotelRoommaster" class="form-control">
                <option value="">Select Room Type</option>
            </select>
            </div>
        </div>

        <div class="col-md-6 manual">
            <div class="form-group">
                <label for="validationCustom02">Room Name
                </label>
                <input type="text" name="name" class="form-control" value="{{ old('room_name', $packageDayItem->room_name ?? '') }}">
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
                <label for="validationCustom02">Meal Plan </label>
                <select name="mealPlanmaster" id="mealPlanmaster" class="form-control"
                    onchange="getmealname();getprice();">
                </select>
            </div>
        </div>

        <div class="col-md-6 manual">
            <div class="form-group">
                <label for="validationCustom02">Meal Plan
                </label>
                <input name="meal_plan" id="mealPlan" type="text" class="form-control manual ui-autocomplete-input" value="{{ old('meal_plan', $packageDayItem->meal_plan ?? '') }}" autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Hotel Option</label>
                <select name="hotel_options" class="form-control">
                    <option value="1" {{ old('hotel_options', $packageDayItem->hotel_options ?? '') == 1 ? 'selected' : '' }}>Option 1</option>
                    <option value="2" {{ old('hotel_options', $packageDayItem->hotel_options ?? '') == 2 ? 'selected' : '' }}>Option 2</option>
                    <option value="3" {{ old('hotel_options', $packageDayItem->hotel_options ?? '') == 3 ? 'selected' : '' }}>Option 3</option>
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
                    <input name="single_room" type="Number" min="0" class="form-control" value="{{ old('single_room', $packageDayItem->single_room ?? '' ) }}">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Double
                    </label>
                    <input name="double_room" type="Number" min="0" class="form-control" value="{{ $packageDayItem->double_room ?? '' }}">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Triple
                    </label>
                    <input name="triple_room" type="Number" min="0" class="form-control" value="{{ old('triple_room', $packageDayItem->triple_room ?? '') }}">
                </div>
            </div>



            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Quad
                    </label>
                    <input name="quad_room" type="Number" min="0" class="form-control" value="{{ old('quad_room', $packageDayItem->quad_room ?? '') }}">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">CWB
                    </label>
                    <input name="cwb_room" type="Number" min="0" class="form-control" value="{{ old('cwb_room', $packageDayItem->cwb_room ?? '') }}">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">CNB
                    </label>
                    <input name="cnb_room" type="Number" min="0" class="form-control" value="{{ $packageDayItem->cnb_room ?? '' }}">
                </div>
            </div>
        </div>
        <div class="row"
            style="background: rgb(254, 250, 235); border-color: #f7d038; padding: 10px; width: 100%; margin: auto; border: 1px solid #ffd17e; margin: 10px 10px; border-radius: 4px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-in date* </label>
                  <input type="text" class="form-control" name="check_in_date" id="startDate"
                        value="{{ old('check_in_date', isset($packageDayItem->check_in_date) ? \Carbon\Carbon::parse($packageDayItem->check_in_date)->format('d-m-Y') : '') }}">
                    @if ($errors->has('check_in_date'))
                        <span class="text-danger">{{ $errors->first('check_in_date') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-in time</label>
                    <select id="check_in" name="check_in" autocomplete="off" class="form-control"
                        style="width:130px;">
                         @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="{{ $time->format('H:i:s') }}"
                                {{ old('checkIn', isset($packageDayItem->check_in_time) ? \Carbon\Carbon::parse($packageDayItem->check_in_time)->format('H:i:s') : '') == $time->format('H:i:s') ? 'selected' : '' }}>

                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-out date*</label>
                    <input type="text" class="form-control" name="check_out_date" id="endDate"
                        value="{{ old('check_out_date', isset($packageDayItem->check_out_date) ? \Carbon\Carbon::parse($packageDayItem->check_out_date)->format('d-m-Y') : '') }}">
                    @if ($errors->has('check_out_date'))
                        <span class="text-danger">{{ $errors->first('check_out_date') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-out time</label>
                    <select id="check_out" name="check_out" autocomplete="off" class="form-control"
                        style="width:130px;">
                         @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="{{ $time->format('H:i:s') }}"
                                {{ old('checkOut', isset($packageDayItem->check_out_time) ? \Carbon\Carbon::parse($packageDayItem->check_out_time)->format('H:i:s') : '') == $time->format('H:i:s') ? 'selected' : '' }}>

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
                <label for="validationCustom02">Description
                </label>
               <textarea name="description" rows="5" class="editorclass" id="description" aria-hidden="true">{{ $packageDayItem->description ?? '' }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
