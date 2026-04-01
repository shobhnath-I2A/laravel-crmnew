<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-body">
    <form method="POST" class="custom-validation ajax-form" action="{{ $packageDayItem ? route('package-days-items.update', $packageDayItem->id) : route('package-day-items.store') }}">
        @csrf
        @if($packageDayItem)
            @method('PUT')
        @endif

        <input type="hidden" name="type" value="{{ $packageDayItem->type ?? '' }}">
        <input type="hidden" name="day_id" value="{{ $packageDayItem->day ?? '' }}">
        <input type="hidden" name="itinerary_id" value="{{ $itineraryId ?? '' }}">
        <div class="row">

        {{-- TYPE BASED UI --}}
        @if($packageDayItem->type == 'daydetail')
            @include('package-day-items.popups.day-details')
        @endif
        @if($packageDayItem->type == 'activity')
            @include('package-day-items.popups.activity-fields')
        @endif

        @if($packageDayItem->type == 'accommodation')
            @include('package-day-items.popups.accommodation')
        @endif
        @if($packageDayItem->type == 'flight')
            @include('package-day-items.popups.flight-field')
        @endif
        @if($packageDayItem->type == 'transportation')
            @include('package-day-items.popups.transportation')
        @endif
        @if($packageDayItem->type == 'insurance')
            @include('package-day-items.popups.insurance-visa')
        @endif

        @if($packageDayItem->type == 'transfer')
            @include('package-day-items.popups.transfer-fields')
        @endif

        </div>
        <div class="modal-footer" style=" position:relative;gap: 80%;">
        <button type="button" class="btn btn-danger" onclick="deleteItem({{ $packageDayItem->id }})"> <i class="fa fa-trash"></i> Delete </button>
            <input name="Save" type="submit" value="Save" class="btn btn-success" id="savingbutton" class="btn btn-primary" style="float:right;">
        </div>
    </form>
</div>
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
    let selectedRoom = "{{ old('room_type_id', $packageDayItem->room_type_id ?? '') }}";

    if (!hotelId) return;

    $.get('/load-hotel-data', {
        hotel_id: hotelId
    }, function(res) {
    console.log(res);

            let roomDropdown = $('#hotelRoommaster');
            roomDropdown.empty();

            roomDropdown.append('<option value="">Select Room Type</option>');

            if (res.roomTypes && res.roomTypes.length > 0) {
                console.log("resd dfa==>", res)
                res.roomTypes.forEach(function(room) {

                    roomDropdown.append(
                        `<option value="${room.id}">${room.name}</option>`
                    );
                });
            }

            // Set selected (edit case)
            if (selectedRoom) {
                roomDropdown.val(selectedRoom);
            }

            // Optional: set price
            $('#price').val(res.price);
        });
    }
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
        success: function (res) {
            alert(res.message);

            // 👉 Close modal
            $('.modal').modal('hide');

            // 👉 Reload page OR remove row
            location.reload();
        },
        error: function (err) {
            alert('Delete failed');
        }
    });
}
</script>
