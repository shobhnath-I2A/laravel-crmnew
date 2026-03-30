{{ $packageDayItem ?? '' }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="validationCustom02">Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}" required="" aria-required="true">
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

        <div class="col-md-12 manual" style="display: none;">
            <div class="form-group">
                <label for="validationCustom02">Name
                </label>
                <input name="hotel_name" type="text" class="form-control ui-autocomplete-input valid"
                    id="servicename" value="{{ old('hotel_name', $packageDayItem->hotel_name ?? '') }}"
                    autocomplete="off" aria-required="true" aria-invalid="false">

            </div>
        </div>

        <div class="col-md-12 master" style="display: block;">
            <div class="form-group">
                <label for="validationCustom02">Name </label>
                <select name="hotel_id" id="hotel_id" class="form-control" onchange="loadhoteldata();">
                    <option value="">Select Hotel</option>
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
                                <td colspan="2"> <input type="hidden" name="show_time" value="0">
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

{{-- <input name="action" type="hidden" id="action" value="addActivity">
<input name="edit_id" type="hidden" id="editId" value="{{ $packageDayItem->id ?? '' }}">
<input name="pid" type="hidden" id="editId" value="108998">
<input name="package_days" type="hidden" id="packageDays" value="{{ $packageDayItem->day ?? '' }}"> --}}
<script>
    function changepricetype() {
        let type = $('#hotel_type').val();

        if (type == '0') {
            $('.manual').show();
            $('.master').hide();
        } else if (type == '1') {
            $('.manual').hide();
            $('.master').show();
        }
    }

    $(document).ready(function() {
        changepricetype(); // Initialize the visibility on page load
    });

    function loadhotel() {
        let destinationName = $('#destinationName').val();
        let selectedHotel = "{{ old('hotel_id', $packageDayItem->hotel_id ?? '') }}"; // saved value
        if (!destinationName) {
            $('#hotel_id').html('<option value="">Select Hotel</option>');
            return;
        }
        $('#hotel_id').html('<option>Loading...</option>');
        $('#hotel_id').load('/load-hotels?destinationName=' + destinationName, function(response, status) {
            if (status === "error") {
                $('#hotel_id').html('<option>Error loading hotels</option>');
            } else {
                // Set the selected value after load
                if (selectedHotel) {
                    $('#hotel_id').val(selectedHotel);
                }
            }
        });
    }

    function loadhoteldata() {
        let hotelId = $('#hotel_id').val();
        if (!hotelId) return;
        $.get('/load-hotel-data', {
            hotel_id: hotelId
        }, function(res) {
            $('#hotelRoommanual').val(res.room);
            $('#price').val(res.price); // if you have price field
        });
    }
    $(document).ready(function() {
        if ($('#destinationName').val()) {
            loadhotel();
        }
    });
</script>
