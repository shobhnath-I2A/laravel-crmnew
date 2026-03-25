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

                <select name="destinationName" id="destinationName" class="form-control" onchange="loadhotel();"
                    style="pointer-events:none;">
                    <option value="">Select</option>
                    <option value="delhi" selected="selected">delhi</option>
                    <option value="mumbai"> mumbai</option>
                </select>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Type</label>
                <select name="pricetype" id="pricetype" class="form-control" onchange="changepricetype();">
                    <option value="1">Manual</option>
                    <option value="2">From Master</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 manual">
            <div class="form-group">
                <label for="validationCustom02">Hotel Name
                </label>
                <input name="hotelName" type="text" id="hotelName" class="form-control ui-autocomplete-input"
                    value="" required="" autocomplete="off" aria-required="true">
            </div>
        </div>
        <div class="col-md-12 master" style="display:none;">
            <div id="loadhoteldata" style="display:none;"></div>
            <div class="form-group">
                <label for="validationCustom02">Hotel Name
                </label>
                <select name="hotelnamemaster" id="hotelnamemaster" class="form-control" onchange="loadhoteldata();">
                    <option value="1">Movenpick Grand Al Bustan Dubai</option>
                    <option value="2">Atlantis, The Palm</option>
                    <option value="3">THE LEELA HOTEL DEIRA</option>
                    <option value="4">QUEEN ELIZABETH 2 HOTEL BUR DUBAI</option>
                    <option value="5">Avani Ibn Battuta Dubai Hotel</option>
                    <option value="6">LE MARIDIEN FAIRWAY</option>
                    <option value="7">Movenpick Grand Al Bustan</option>
                    <option value="8">Grand Mercure Dubai City</option>
                    <option value="9">Grand Millennium Dubai</option>
                    <option value="10">Radisson Blu Hotel, Dubai Deira</option>
                    <option value="11">Pullman Creek City Centre</option>
                    <option value="12">Burj Al Arab</option>
                    <option value="13">The Ritz-Carlton, Dubai</option>
                    <option value="14">Hotel Riu Dubai</option>
                    <option value="15">City Max</option>
                    <option value="16">Royal Falcon Hotel</option>
                    <option value="17">Ramada Plaza by Wyndham Dubai</option>
                    <option value="18">Crowne Plaza Dubai Marina, an IHG Hotel</option>
                    <option value="19">Ambassador Hotel Bangkok</option>
                    <option value="20">The Ecotel Bangkok Hotel</option>
                    <option value="21">Nakornping Hotel</option>
                    <option value="22">green house 1998</option>
                    <option value="23">The Bangkok Cha Cha Suite</option>
                    <option value="24">the quarter chaophraya by UHG</option>
                    <option value="25">Akara Hotel</option>
                    <option value="26">Pratunam Atrium Hotel</option>
                    <option value="27">Value Hotel Thompson</option>
                    <option value="28">Village Hotel Bugis</option>
                    <option value="29">Hotel Boss</option>
                    <option value="30">Le MÃ©ridien Fairway</option>
                    <option value="31">H Sovereign Bali</option>
                    <option value="32">Kuta Paradiso Hotel</option>
                    <option value="33">Grand Ixora Kuta Resort</option>
                    <option value="34">Ramada Encore Bali Seminyak</option>
                    <option value="35">Ramada by Wyndham Bali Sunset Road Kuta</option>
                    <option value="36">Furama Villas &amp; Spa Ubud Bali</option>
                    <option value="37">Lv8 Resort Hotel</option>
                    <option value="38">Discovery Kartika Plaza</option>
                    <option value="39">Value Hotel Thompson</option>
                    <option value="40">Sun Island Hotel &amp; Spa Legian</option>
                    <option value="41">Hotel Boss</option>
                    <option value="42">V Hotel Lavender</option>
                    <option value="43">Cross Vibe Paasha Atelier Bali</option>
                    <option value="44">Ibis Singapore Albert Street</option>
                    <option value="45">Furama Riverfront</option>
                    <option value="46">Grand Zuri Kuta Bali</option>
                    <option value="47">Mercure Singapore Tyrwhitt</option>
                    <option value="48">Novotel on Kitchener Road</option>
                    <option value="49">Village Hotel Bugis</option>
                    <option value="50">Village Hotel Albert Court</option>
                    <option value="51">Alam Puisi Villa</option>
                    <option value="52">Village Hotel Katong</option>
                    <option value="53">V Hotel Bencoolen</option>
                    <option value="54">Furama City Center</option>
                    <option value="55">Freddies Villas Ubud</option>
                    <option value="56">Kori Maharani Villas</option>
                    <option value="57">Sthala A Tribute Portfolio Hotel Ubud Bali</option>
                    <option value="58">Aishwarya Exclusive Villas</option>
                    <option value="59">The Bali Dream Villa Seminyak</option>
                    <option value="60">Citymax Burdubai</option>
                    <option value="61">Citymax Al Barsha</option>
                    <option value="62">Grand Excelsior Burdubai</option>
                    <option value="63">Grand Excelsior Deira</option>
                    <option value="64">Ramada Plaza by Wyndham Deira</option>
                    <option value="65">Ramada by Wyndham Burdubai</option>
                    <option value="66">Arabian Courtyard</option>
                    <option value="67">Howard Johnson Plaza by Wyndham</option>
                    <option value="68">Al Khoori Atrium Hotel Al Barsha</option>
                    <option value="69">Queen Elizabeth 2</option>
                    <option value="70">Centara Pattaya Hotel</option>
                    <option value="71">Centara Nova Hotel Pattaya</option>
                    <option value="72">Mercure Pattaya Hotel</option>
                    <option value="73">Livotel Hotel Hua Mak Bangkok</option>
                    <option value="74">Ambassador Bangkok Hotel</option>
                    <option value="75">Ramada D''MA Bangkok</option>
                    <option value="76">Ramada by Wyndham Bangkok Sukhumvit 11</option>
                    <option value="77">Amari Phuket</option>
                    <option value="78">Andamantra Resort and Villa Phuket</option>
                    <option value="79">The Ashlee Plaza Patong Hotel &amp; Spa</option>
                    <option value="80">The Ashlee Heights Patong Hotel &amp; Suites</option>
                    <option value="81">Deevana Plaza Krabi Aonang</option>
                    <option value="82">Aonang Cliff View Resort</option>
                    <option value="83">Andakira Hotel</option>
                    <option value="84">Centara Life Phu Pano Krabi</option>
                    <option value="85">Holiday Inn Kandooma Maldives</option>
                    <option value="86">Dhigufaru Island Resort</option>
                    <option value="87">Centara Ras Fushi Resort &amp; Spa Maldives</option>
                    <option value="88">Adaaran Club Rannalhi</option>
                    <option value="89">Adaaran Prestige Vadoo</option>
                    <option value="90">Adaaran Select Hudhuran Fushi - All inclusive</option>
                    <option value="91">Villa Nautica at Paradise Island</option>
                    <option value="92">Medhufushi Island Resort</option>
                </select>
                <input type="hidden" name="hotelPriceId" id="hotelPriceId" value="0">

            </div>
        </div>
        <script>
            function loadhotel() {
                var destinationName = encodeURI($('#destinationName').val());

                $('#hotelnamemaster').load('loadhotel.php?destinationName=' + destinationName + '&eventobjectid=');
            }
        </script>

        <script type="text/javascript">
            $(function() {

                // Single Select
                $("#hotelName").autocomplete({
                    source: function(request, response) {
                        // Fetch data
                        $.ajax({
                            url: "ajax-city-search.php",
                            type: 'post',
                            dataType: "json",
                            data: {
                                search: request.term,
                                sectionType: 'Accommodation'
                            },
                            success: function(data) {
                                response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        $('#hotelName').val(ui.item.label); // display the selected text
                        return false;
                    }
                });


            });
        </script>


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
                <input name="hotelRoom" id="hotelRoommanual" type="text" class="form-control" value=""
                    required="" aria-required="true">

                <script type="text/javascript">
                    $(function() {

                        // Single Select
                        $("#hotelRoom").autocomplete({
                            source: function(request, response) {
                                // Fetch data
                                $.ajax({
                                    url: "ajax-city-search.php",
                                    type: 'post',
                                    dataType: "json",
                                    data: {
                                        search: request.term,
                                        room: 'roomhotel'
                                    },
                                    success: function(data) {
                                        response(data);
                                    }
                                });
                            },
                            select: function(event, ui) {
                                $('#hotelRoom').val(ui.item.label); // display the selected text
                                return false;
                            }
                        });


                    });
                </script>
            </div>
        </div>
        <script>
            function getroomname() {
                $('#hotelRoommanual').val($('#hotelRoommaster').val());
            }
        </script>
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
                <script type="text/javascript">
                    $(function() {

                        // Single Select
                        $("#mealPlan").autocomplete({
                            source: function(request, response) {
                                // Fetch data
                                $.ajax({
                                    url: "ajax-city-search.php",
                                    type: 'post',
                                    dataType: "json",
                                    data: {
                                        search: request.term,
                                        mealPlan: 'mealPlan'
                                    },
                                    success: function(data) {
                                        response(data);
                                    }
                                });
                            },
                            select: function(event, ui) {
                                $('#mealPlan').val(ui.item.label); // display the selected text
                                return false;
                            }
                        });


                    });

                    function changepricetype() {

                        var pricetype = $('#pricetype').val();
                        if (pricetype == 1) {
                            $('.manual').show();
                            $('.master').hide();
                        }

                        if (pricetype == 2) {
                            $('.manual').hide();
                            $('.master').show();
                        }


                        loadhoteldata();

                    }
                </script>
            </div>
        </div>
        <script>
            function getmealname() {
                $('#mealPlan').val($('#mealPlanmaster').val());
            }
        </script>
        <script>
            function loadhoteldata() {

                var hotelnamemaster = $('#hotelnamemaster').val();
                var hotelRoommaster = encodeURI($('#hotelRoommaster').val());
                var mealPlanmaster = encodeURI($('#mealPlanmaster').val());

                $('#loadhoteldata').load('loadhoteldata.php?day=2026-01-07&hotelnamemaster=' + hotelnamemaster +
                    '&hotelRoommaster=' + hotelRoommaster + '&mealPlanmaster=' + mealPlanmaster);
                $.get('loadhoteldata.php?day=2026-01-07&hotelnamemaster=' + hotelnamemaster, function(content) {
                    // if you have one tinyMCE box on the page:
                    tinyMCE.activeEditor.setContent(content);
                });


                $('#hotelCategory').load('loadhotelCategory.php?day=2026-01-07&hotelnamemaster=' + hotelnamemaster);
                $('#hotelRoommaster').load('loadhotelRoomCategory.php?day=2026-01-07&hotelnamemaster=' + hotelnamemaster);
                $('#mealPlanmaster').load('loadhotelMeal.php?day=2026-01-07&hotelnamemaster=' + hotelnamemaster);

            }

            function getprice() {
                var hotelnamemaster = $('#hotelnamemaster').val();
                var hotelRoommaster = encodeURI($('#hotelRoommaster').val());
                var mealPlanmaster = encodeURI($('#mealPlanmaster').val());

                $('#loadhoteldata').load('loadhoteldata.php?day=2026-01-07&hotelnamemaster=' + hotelnamemaster +
                    '&hotelRoommaster=' + hotelRoommaster + '&mealPlanmaster=' + mealPlanmaster);
            }
        </script>


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

