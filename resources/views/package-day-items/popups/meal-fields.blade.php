
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Day Itinerary order</label>
               <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}" required="" aria-required="true">

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Name
                </label>
                <input name="name" type="text" class="form-control ui-autocomplete-input valid"
                id="servicename" value="{{ old('name', $packageDayItem->name ?? '') }}"
                autocomplete="off" aria-required="true" aria-invalid="false">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Destination
                </label>
                <select name="destination_id" id="destinationName" class="form-control" onchange="loadhotel();" style="display: block;" readonly>
                    {{-- <option value="">Select</option> --}}
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
                <label for="validationCustom02">Meal Type
                </label>
                <select name="mealCategory" class="form-control valid" aria-invalid="false">
                    <option value="APAI">APAI</option>
                    <option value="MAPAI">MAPAI</option>
                    <option value="CPAI">CPAI</option>

                </select>
            </div>
        </div>


        <div class="row"
            style="background: rgb(254, 250, 235); border-color: #f7d038; padding: 10px; width: 100%; margin: auto; border: 1px solid #ffd17e; margin: 10px 10px; border-radius: 4px;">
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
                            {{ old('checkIn', isset($packageDayItem->check_in_time) ? \Carbon\Carbon::parse($packageDayItem->check_in_time)->format('H:i:s') : '') == $time->format('H:i:s') ? 'selected' : '' }}>

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

            <div class="col-md-12">
                <div class="form-group">
                    <table border="0" cellpadding="2" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="showTime"
                                        class="stip1" value="1"
                                        style="width: 19px; height: 22px;"></td>
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
                <textarea name="description" rows="5" class="editorclass" id="description" aria-hidden="true"
                    style="display: none;"></textarea>
            </div>
        </div>
    </div>
</div>
