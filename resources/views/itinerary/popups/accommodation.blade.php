<style>
    .popup-box {
        max-width: 40%;
        margin-top: 5px;
    }
</style>
<div class="modal-body">
    <form action="{{ route('itinerary.storeaccomodation') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="validationCustom02">Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text" value="" required=""
                    aria-required="true">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Destination
                </label>

                <select name="destination_id" id="destination" class="form-control">
                    @foreach($destinationList as $dest)
                        <option value="{{ $dest->id }}">
                            {{ $dest->name }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Type</label>
                <select name="price_type" id="price_type" class="form-control">
                    <option value="manual">Manual</option>
                    <option value="master">From Master</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 manual">
            <div class="form-group">
                <label for="validationCustom02">Hotel Name
                </label>
                <input type="text" name="hotel_name" class="form-control">

            </div>
        </div>
        <div class="col-md-12 master" style="display:none;">
            <div id="loadhoteldata" style="display:none;"></div>
            <div class="form-group">
                <label for="validationCustom02">Hotel Name
                </label>
                <select name="hotel_id" id="hotel_master" class="form-control">
                    <option value="">Select Hotel</option>
                </select>
                <input type="hidden" name="hotelPriceId" id="hotelPriceId" value="0">

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Category
                </label>
                <select name="hotelCategory" id="hotelCategory" class="form-control">
                    <option value="1">1 Star</option>
                    <option value="2">2 Star</option>
                    <option value="3">3 Star</option>
                    <option value="4">4 Star</option>
                    <option value="5">5 Star</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 master" style="display:none;">
            <div class="form-group">
                <label for="validationCustom02">Room Name</label>
                <select name="hotelRoommaster" id="hotelRoommaster" class="form-control"
                    onchange="getroomname();getprice();">
                </select>
            </div>
        </div>


        <div class="col-md-6 manual">
            <div class="form-group">
                <label for="validationCustom02">Room Name
                </label>
                <input type="text" name="room_name" class="form-control">
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
                <input name="mealPlan" id="mealPlan" type="text"
                    class="form-control manual ui-autocomplete-input" value="" autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Hotel Option</label>
                <select name="hotelOption" class="form-control">
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
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
                    <input name="singleRoom" type="Number" min="0" class="form-control" value="">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Double
                    </label>
                    <input name="doubleRoom" type="Number" min="0" class="form-control" value="1">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Triple
                    </label>
                    <input name="tripleRoom" type="Number" min="0" class="form-control" value="">
                </div>
            </div>



            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">Quad
                    </label>
                    <input name="quadRoom" type="Number" min="0" class="form-control" value="">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">CWB
                    </label>
                    <input name="cwbRoom" type="Number" min="0" class="form-control" value="">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="validationCustom02">CNB
                    </label>
                    <input name="cnbRoom" type="Number" min="0" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="row"
            style="background: rgb(254, 250, 235); border-color: #f7d038; padding: 10px; width: 100%; margin: auto; border: 1px solid #ffd17e; margin: 10px 10px; border-radius: 4px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-in date* </label>
                    <input type="text" class="form-control hasDatepicker" required="" name="startDate"
                        id="startDate" value="07-01-2026" aria-required="true">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-in time</label>
                    <select id="check_in" name="check_in" autocomplete="off"
                        class="form-control" style="width:130px;">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="1970-01-01 {{ $time->format('H:i:s') }}">
                                {{ $time->format('h:i A') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-out date*</label>
                    <input type="text" class="form-control hasDatepicker" required="" name="end_date"
                        id="endDate" value="07-01-2026" aria-required="true">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="validationCustom02">Check-out time</label>
                    <select id="check_out" name="check_out" autocomplete="off"
                        class="form-control" style="width:130px;">
                        @for ($i = 0; $i < 24 * 60; $i += 15)
                            @php
                                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i);
                            @endphp
                            <option value="1970-01-01 {{ $time->format('H:i:s') }}">
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
                                <td colspan="2"><input type="checkbox" name="showTime" class="stip1"
                                        value="1" style="width: 19px; height: 22px;"></td>
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
                <textarea name="description" id="description" rows="6" class="form-control" required=""></textarea>
            </div>
        </div>
          <button type="submit" class="btn btn-primary savingbutton">
                    Save
                </button>
            </div>
        </form>
</div>

<script>
    $(document).ready(function () {

    // Toggle Manual / Master
    $('#price_type').on('change', function () {
        let type = $(this).val();

        if (type === 'manual') {
            $('.manual-section').show();
            $('.master-section').hide();
        } else {
            $('.manual-section').hide();
            $('.master-section').show();
        }
    });

    // Load Hotels (AJAX)
    $('#destination').on('change', function () {
        let destinationId = $(this).val();
        $.get('/get-hotels/' + destinationId, function (data) {
            $('#hotel_master').html(data);
        });
    });

});
</script>
