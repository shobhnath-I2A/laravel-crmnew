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
                <label for="validationCustom02">Destination </label>
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

        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Transfer Type
                </label>
                <select name="transfer_category" id="transferCategory" class="form-control valid @error('transfer_category') is-invalid @enderror" aria-invalid="false">
                    <option value="Private" {{ old('transfer_category') == 'Private' ? 'selected' : '' }}>Private</option>
                    <option value="SIC" {{ old('transfer_category') == 'SIC' ? 'selected' : '' }}>SIC</option>
                </select>
                @error('transfer_category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6 manual">
            <div class="form-group">
                <label for="validationCustom02">Name
                </label>
                <input name="name" type="text" class="form-control ui-autocomplete-input" id="servicename"
                    value="{{ old('name'), $packageDayItem->name }}"  autocomplete="off" aria-required="true">
            </div>
        </div>

        <div class="col-md-6 master" style="display:none;">
            <div id="loadhoteldata" style="display:none;"></div>
            <div class="form-group">
                <label for="validationCustom02">Name
                </label>
                <select name="name" id="namemaster" class="form-control" onchange="loadhoteldata();">
                    <option value="">Select</option>
                    <option value="1">Airport Drop off</option>
                    <option value="2">Airport Pick Up</option>
                    <option value="5">Private Transfer From Dubai To Abu Dhabi</option>
                    <option value="3">Airport Pick Up</option>
                    <option value="4">Airport Drop off</option>
                    <option value="6">Private Transfer From Bangkok to Pattaya</option>
                    <option value="7">Private Transfer From Phuket to Krabi</option>
                    <option value="8">Airport Pick Up</option>
                    <option value="9">Airport Drop off</option>
                    <option value="10">Private Transfer from Krabi to Phuket</option>
                    <option value="11">Airport Pick up</option>
                    <option value="12">Airport Drop off</option>
                    <option value="13">Dubai Tranfer</option>
                </select>
                <input type="hidden" name="hotelPriceId" id="hotelPriceId" value="0">

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
                <label for="validationCustom02">Description </label>
                <textarea name="description" rows="5" class="editorclass" id="description" aria-hidden="true">{{ $packageDayItem->description ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>

<input name="action" type="hidden" id="action" value="addTransportation">
<input name="editId" type="hidden" id="editId" value="">
<input name="pid" type="hidden" id="editId" value="108998">
<input name="packageDays" type="hidden" id="packageDays" value="1">
<input name="day" type="hidden" id="day" value="2025-08-21">
<input name="photo" type="hidden" value="">
