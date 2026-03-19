<div class="modal fade bs-hotel-modal-center" tabindex="-1" role="dialog" id="hotelModel">
    <div class="modal-dialog modal-dialog-centered" style="width: 1320px; max-width: 1320px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="poptitle">Update Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="popcontent">
                <h4 style="margin-bottom:10px; font-weight:600;">Medhufushi Island Resort</h4>
                <form class="custom-validation ajax-form" action="{{ route('hotels-rates.store') }}" target="actoinfrm" novalidate="novalidate" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <table width="100%" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td width="10%">From Date</td>
                                        <td width="10%">To</td>
                                        <td width="12%">Room&nbsp;Type</td>
                                        <td width="8%">Meal&nbsp;Plan</td>
                                        <td width="10%">Single</td>
                                        <td width="10%">Double</td>
                                        <td width="10%">Triple</td>
                                        <td width="10%">Quad</td>
                                        <td width="10%">CWB</td>
                                        <td width="10%">CNB</td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            <input name="start_date" id="startDate" type="text" class="form-control hasDatepicker" readonly="readonly" value="{{ old('start_date', $rate->start_date ?? '' ) }}">
                                        </td>
                                        <td width="10%">
                                            <input name="end_date" id="endDate" type="text" class="form-control hasDatepicker" readonly="readonly" value="{{ old('end_date',  $rate->end_date ?? '' ) }}">
                                        </td>
                                        <td width="12%">
                                            <select id="room_type" name="room_type" class="select2 form-control" autocomplete="off" style="width:100%;">
                                                <option value="">Select</option>
                                                <option value="2" {{ old('room_type', $rate->room_type ?? '') == 2 ? 'selected' : '' }}>Superior Room</option>
                                                <option value="3" {{ old('room_type', $rate->room_type ?? '') == 3 ? 'selected' : '' }}>Superior Room,1 Double Bed,NonSmoking</option>
                                                <option value="7" {{ old('room_type', $rate->room_type ?? '') == 7 ? 'selected' : '' }}>Akara Deluxe Twin</option>
                                                <option value="15" {{ old('room_type', $rate->room_type ?? '') == 15 ? 'selected' : '' }}>Akara Suite</option>
                                                <option value="24" {{ old('room_type', $rate->room_type ?? '') == 24 ? 'selected' : '' }}>Deluxe</option>
                                                <option value="23" {{ old('room_type', $rate->room_type ?? '') == 23 ? 'selected' : '' }}>Deluxe Room with 1 King Bed</option>
                                                <option value="12" {{ old('room_type', $rate->room_type ?? '') == 12 ? 'selected' : '' }}>DOUBLE SUPERIOR KING BED</option>
                                                <option value="22" {{ old('room_type', $rate->room_type ?? '') == 22 ? 'selected' : '' }}>Imperial Club King Ocean Room</option>
                                                <option value="11" {{ old('room_type', $rate->room_type ?? '') == 11 ? 'selected' : '' }}>PRAROP DELUXE</option>
                                                <option value="6" {{ old('room_type', $rate->room_type ?? '') == 6 ? 'selected' : '' }}>Prarop Deluxe King</option>
                                                <option value="10" {{ old('room_type', $rate->room_type ?? '') == 10 ? 'selected' : '' }}>Prarop Deluxe King Room</option>
                                                <option value="5" {{ old('room_type', $rate->room_type ?? '') == 5 ? 'selected' : '' }}>Prarop Deluxe Twin</option>
                                                <option value="9" {{ old('room_type', $rate->room_type ?? '') == 9 ? 'selected' : '' }}>Prarop King Deluxe,1 King Bed,NonSmoking</option>
                                                <option value="8" {{ old('room_type', $rate->room_type ?? '') == 8 ? 'selected' : '' }}>Prarop Twin Deluxe,2 Twin Beds,NonSmoking</option>
                                                <option value="13" {{ old('room_type', $rate->room_type ?? '') == 13 ? 'selected' : '' }}>Siam Suite Triple</option>
                                                <option value="14" {{ old('room_type', $rate->room_type ?? '') == 14 ? 'selected' : '' }}>Siam Suite Triple Room</option>
                                                <option value="21" {{ old('room_type', $rate->room_type ?? '') == 21 ? 'selected' : '' }}>Standard Apartment</option>
                                                <option value="4" {{ old('room_type', $rate->room_type ?? '') == 4 ? 'selected' : '' }}>Superior Double or Twin Room</option>
                                                <option value="20" {{ old('room_type', $rate->room_type ?? '') == 20 ? 'selected' : '' }}>Standard Apartment</option>
                                                <option value="17" {{ old('room_type', $rate->room_type ?? '') == 17 ? 'selected' : '' }}>Superior King Room with Balcony</option>
                                                <option value="16" {{ old('room_type', $rate->room_type ?? '') == 16 ? 'selected' : '' }}>Superior Twin Balcony</option>
                                                <option value="19" {{ old('room_type', $rate->room_type ?? '') == 19 ? 'selected' : '' }}>Twin Room - Balcony</option>
                                                <option value="18" {{ old('room_type', $rate->room_type ?? '') == 18 ? 'selected' : '' }}>City View Room</option>
                                            </select>

                                        </td>
                                        <td width="8%">
                                            <select id="mealPlan" name="mealPlan"class="select2 form-control" autocomplete="off" style="width:100%;">
                                                <option value="3" {{ old('meal_plan', $rate->meal_type ?? '') == 3 '' ? 'selected' : '' }}>APAI</option>
                                                <option value="1" {{ old('meal_plan', $rate->meal_type ?? '') == 1 '' ? 'selected' : '' }}>CPAI</option>
                                                <option value="2" {{ old('meal_plan', $rate->meal_type ?? '') == 2 '' ? 'selected' : '' }}>MAPAI</option>
                                            </select>
                                        </td>
                                        <td width="10%">
                                            <input name="single" type="text" class="form-control" value="{{ old('single', $rate->single ?? '') }}">
                                        </td>
                                        <td width="10%">
                                            <input name="double" type="text" class="form-control" value="{{ old('double', $rate->double ?? '') }}">
                                        </td>
                                        <td width="10%">
                                            <input name="triple" type="text" class="form-control" value="{{ old('triple', $rate->triple ?? '') }}">
                                        </td>
                                        <td width="10%">
                                            <input name="quad" type="text" class="form-control" value="{{  old('quad', $rate->quad ?? '') }}">
                                        </td>
                                        <td width="10%">
                                            <input name="child_bed" type="text" class="form-control" value="{{ old('child_bed', $rate->quad ?? '') }}">
                                        </td>
                                        <td width="5%">
                                            <input name="extra_adult" type="text" class="form-control" value="{{ old('extra_adult', $rate->extra_adult ?? '') }}">
                                        </td>
                                        <td width="5%">
                                            <input name="Save" type="submit" value="Add" id="savingbutton" class="btn btn-primary">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input name="editid" type="hidden" value="">
                    <input name="hotelId" type="hidden" value="100092">
                    <input name="action" type="hidden" value="addhotelratelist">
                </form>
                <h5 style="margin-bottom:10px; font-weight:600;">Rate List</h5>
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Room Type </th>
                            <th>Meal Plan </th>
                            <th>Single</th>
                            <th>Double</th>
                            <th>Triple</th>
                            <th>Quad</th>
                            <th>CWB</th>
                            <th>CNB</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div style="text-align:center; padding:10px; ">No Rate</div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#hotelModel').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget); // clicked element

    var id = button.data('id');
    var name = button.data('name');
    var destination = button.data('destination');
    var category = button.data('category');
    var image = button.data('image');

    // Set values
    $('#hotel_id').val(id);
    $('#hotel_name').val(name);
    $('#hotel_destination').val(destination);

    // ⭐ Show stars
    let stars = '';
    for(let i = 1; i <= 5; i++){
        if(i <= category){
            stars += '<i class="fa fa-star" style="color:#FF9900;"></i>';
        } else {
            stars += '<i class="fa fa-star-o"></i>';
        }
    }
    $('#hotel_category').html(stars);

    // 🖼️ Show image
    if(image){
        $('#hotel_image').html(`<img src="/storage/${image}" width="80">`);
    } else {
        $('#hotel_image').html('No Image');
    }

});
</script>
