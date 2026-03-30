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
            @include('package-day-items.popups.hotel-fields')
        @endif

        @if($packageDayItem->type == 'transfer')
            @include('package-day-items.popups.transfer-fields')
        @endif

        </div>
        <div class="modal-footer" style=" position:relative;">
        <button type="button" class="btn btn-danger" onclick="deleteItem({{ $packageDayItem->id }})"> <i class="fa fa-trash"></i> Delete </button>
            <input name="Save" type="submit" value="Save" class="btn btn-success" id="savingbutton" class="btn btn-primary" style="float:right;">
        </div>
        <div class="mt-3 text-right">
            <button class="btn btn-success">Save</button>
        </div>

    </form>
</div>

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
