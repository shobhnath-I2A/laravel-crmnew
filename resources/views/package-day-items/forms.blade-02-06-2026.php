@php
    $isEdit = isset($packageDayItem) && $packageDayItem->exists;
    $type = strtolower($packageDayItem->type ?? 'accommodation');
@endphp

<style>
    .popup-box {
        max-width: 40%;
    }
</style>

<div class="modal-body">
    <form method="POST" class="custom-validation ajax-form"
        action="{{ $isEdit ? route('package-days-items.update', $packageDayItem->id) : route('package-days-items.store') }}">

        @csrf

        @if ($isEdit)
            @method('PUT')
        @endif

        <input type="hidden" name="type" value="{{ old('type', $type) }}">
        <input type="hidden" name="day" value="{{ old('day', $packageDayItem->day ?? '') }}">
        <input type="hidden" name="day_id" value="{{ old('day_id', $packageDayItem->day_id ?? ($packageDayItem->day ?? '')) }}">
        <input type="hidden" name="day_order" value="{{ old('day_order', $packageDayItem->day_order ?? 1) }}">
        <input type="hidden" name="itinerary_id" value="{{ old('itinerary_id', $packageDayItem->itinerary_id ?? '') }}">
        <input type="hidden" name="destination_id" value="{{ old('destination_id', $packageDayItem->destination_id ?? '') }}">
        <input type="hidden" name="package_id" value="{{ old('package_id', $packageDayItem->package_id ?? '') }}">
        <div class="row">

            {{-- TYPE BASED UI --}}
            @if ($type == 'dayitinerary' || $type == 'daydetail')
                @include('package-day-items.popups.day-details')
            @endif

            @if ($type == 'activity')
                @include('package-day-items.popups.activity-fields')
            @endif

            @if ($type == 'accommodation')
                @include('package-day-items.popups.accommodation')
            @endif

            @if ($type == 'flight')
                @include('package-day-items.popups.flight-field')
            @endif

            @if ($type == 'transportation')
                @include('package-day-items.popups.transportation')
            @endif

            @if ($type == 'insurance')
                @include('package-day-items.popups.insurance-visa')
            @endif

            @if ($type == 'meal')
                @include('package-day-items.popups.meal-fields')
            @endif

            @if ($type == 'transfer')
                @include('package-day-items.popups.transfer-fields')
            @endif
            @if ($type == 'leisure')
                @include('package-day-items.popups.leisure')
            @endif
            @if ($type == 'cruise')
                @include('package-day-items.popups.cruise')
            @endif

        </div>

        <div class="modal-footer" style="position:relative;gap:80%;">
            @if ($isEdit)
                <button type="button" class="btn btn-danger" onclick="deleteItem({{ $packageDayItem->id }})">
                    <i class="fa fa-trash"></i> Delete
                </button>
            @endif

            <input name="Save" type="submit" value="Save" class="btn btn-success" id="savingbutton"
                style="float:right;">
        </div>
    </form>
</div>
<script>


    $(document).ready(function() {
        changepricetype(); // Initialize the visibility on page load
    });

    function loadhotel() {
        let destinationId = $('#destinationName').val();
        let selectedHotel = "{{ old('hotel_id', $packageDayItem->hotel_id ?? '') }}";

        $('#hotel_id').html('<option value="">Loading...</option>');

        $.get('/load-hotels', {
            destination_id: destinationId
        }, function(html) {
            $('#hotel_id').html(html);

            if (selectedHotel) {
                $('#hotel_id').val(selectedHotel);
                loadhoteldata();
            }
        });
    }
    // function loadhotel() {
    //     let destinationName = $('#destinationName').val();
    //     let selectedHotel = "{{ old('hotel_id', $packageDayItem->hotel_id ?? '') }}"; // saved value
    //     if (!destinationName) {
    //         $('#hotel_id').html('<option value="">Select Hotel</option>');
    //         return;
    //     }
    //     $('#hotel_id').html('<option>Loading...</option>');
    //     $('#hotel_id').load('/load-hotels?destinationName=' + destinationName, function(response, status) {
    //         if (status === "error") {
    //             $('#hotel_id').html('<option>Error loading hotels</option>');
    //         } else {
    //             // Set the selected value after load
    //             if (selectedHotel) {
    //                 $('#hotel_id').val(selectedHotel);
    //             }
    //         }
    //     });
    // }
    // function loadhoteldata() {
    //     let hotelId = $('#hotel_id').val();
    //     let selectedRoom = "{{ old('room_type', $packageDayItem->room_type ?? '') }}";

    //     if (!hotelId) return;

    //     $.get('/load-hotel-data', { hotel_id: hotelId }, function (res) {
    //         let roomDropdown = $('#hotelRoommaster');

    //         roomDropdown.html('<option value="">Select Room Type</option>');

    //         if (res.roomTypes) {
    //             res.roomTypes.forEach(function (room) {
    //                 roomDropdown.append(
    //                     `<option value="${room.name}">${room.name}</option>`
    //                 );
    //             });
    //         }

    //         if (selectedRoom) {
    //             roomDropdown.val(selectedRoom);
    //         }
    //     });
    // }
    // function loadhoteldata() {
    //     let hotelId = $('#hotel_id').val();
    //     let selectedRoom = "{{ old('room_type_id', $packageDayItem->room_type_id ?? '') }}";

    //     if (!hotelId) return;

    //     $.get('/load-hotel-data', {
    //         hotel_id: hotelId
    //     }, function(res) {
    //         console.log(res);

    //         let roomDropdown = $('#hotelRoommaster');
    //         roomDropdown.empty();

    //         roomDropdown.append('<option value="">Select Room Type</option>');

    //         if (res.roomTypes && res.roomTypes.length > 0) {
    //             console.log("resd dfa==>", res)
    //             res.roomTypes.forEach(function(room) {

    //                 roomDropdown.append(
    //                     `<option value="${room.id}">${room.name}</option>`
    //                 );
    //             });
    //         }

    //         // Set selected (edit case)
    //         if (selectedRoom) {
    //             roomDropdown.val(selectedRoom);
    //         }

    //         // Optional: set price
    //         $('#price').val(res.price);
    //     });
    // }
    // function loadhoteldata() {
    //     let hotelId = $('#hotel_id').val();
    //     if (!hotelId) return;
    //     $.get('/load-hotel-data', {
    //         hotel_id: hotelId
    //     }, function(res) {
    //         $('#hotelRoommanual').val(res.room);
    //         $('#price').val(res.price); // if you have price field
    //     });
    // }
    $(document).ready(function() {
        if ($('#destinationName').val()) {
            loadhotel();
        }
    });
    $(document).ready(function() {
        if ($('#hotel_id').val()) {
            loadhoteldata();
        }
    });
</script>
<script>
    function deleteItem(id) {

        if (!confirm('Are you sure you want to delete?')) return;

        $.ajax({
            url: '/package-days-items/' + id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(res) {
                alert(res.message);

                // 👉 Close modal
                $('.modal').modal('hide');

                // 👉 Reload page OR remove row
                location.reload();
            },
            error: function(err) {
                alert('Delete failed');
            }
        });
    }
</script>
<script>


    function loadhotel() {
        let destinationId = $('#destinationName').val();
        let selectedHotel = "{{ old('hotel_id', $packageDayItem->hotel_id ?? '') }}";

        if (!destinationId) {
            $('#hotel_id').html('<option value="">Select Hotel</option>');
            return;
        }

        $('#hotel_id').html('<option value="">Loading...</option>');

        $.ajax({
            url: "{{ route('load.hotels') }}",
            type: "GET",
            data: {
                destination_id: destinationId
            },
            success: function(html) {
                $('#hotel_id').html(html);

                if (selectedHotel) {
                    $('#hotel_id').val(selectedHotel);
                    loadhoteldata();
                }
            },
            error: function() {
                $('#hotel_id').html('<option value="">Hotel loading failed</option>');
            }
        });
    }

    function loadhoteldata() {
        let hotelId = $('#hotel_id').val();
        let selectedRoom = "{{ old('room_type', $packageDayItem->room_type ?? '') }}";

        if (!hotelId) {
            $('#hotelRoommaster').html('<option value="">Select Room Type</option>');
            return;
        }

        $('#hotelRoommaster').html('<option value="">Loading...</option>');

        $.ajax({
            url: "{{ route('load.hotel.data') }}",
            type: "GET",
            data: {
                hotel_id: hotelId
            },
            success: function(res) {
                let html = '<option value="">Select Room Type</option>';

                if (res.roomTypes && res.roomTypes.length > 0) {
                    res.roomTypes.forEach(function(room) {
                        html += `<option value="${room.name}">${room.name}</option>`;
                    });
                }

                $('#hotelRoommaster').html(html);

                if (selectedRoom) {
                    $('#hotelRoommaster').val(selectedRoom);
                }
            },
            error: function() {
                $('#hotelRoommaster').html('<option value="">Room loading failed</option>');
            }
        });
    }

    $(document).ready(function() {
        changepricetype();

        $('#source_type').on('change', changepricetype);
        $('#hotel_id').on('change', loadhoteldata);
    });





    function loadMealPlans() {
        let selectedMealPlan = "{{ old('meal_plan', $packageDayItem->meal_plan ?? '') }}";

        $('#mealPlanmaster').html('<option value="">Loading...</option>');

        $.ajax({
            url: "{{ route('load.meal.plans') }}",
            type: "GET",
            success: function(html) {
                $('#mealPlanmaster').html(html);

                if (selectedMealPlan) {
                    $('#mealPlanmaster').val(selectedMealPlan);
                }
            },
            error: function() {
                $('#mealPlanmaster').html('<option value="">Meal plan loading failed</option>');
            }
        });
    }

    function changepricetype() {
        let hotelType = $('#source_type').val();

        if (hotelType == '0') {
            $('.manual').show();
            $('.master').hide();

            $('#hotel_id').val('');
            $('#hotelRoommaster').html('<option value="">Select Room Type</option>');
            $('#mealPlanmaster').html('<option value="">Select Meal Plan</option>');
        } else {
            $('.manual').hide();
            $('.master').show();

            $('#servicename').val('');
            $('input[name="room_name"]').val('');

            loadhotel();
            loadMealPlans();
        }
    }

    $(document).ready(function() {
        changepricetype();

        $('#source_type').on('change', changepricetype);
    });

    function buildPopupUrl(baseUrl, type) {
    const ctx = window.itineraryContext;

    const params = new URLSearchParams({
        itinerary_id: ctx.itineraryId,
        package_id: ctx.packageId,
        day: ctx.day,
        date: ctx.date,
        destination_id: ctx.destinationId,
        item_type: type
    });

    return baseUrl + '?' + params.toString();
}
</script>
