<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-body">
    <form method="POST" class="custom-validation" action="{{ $packageDayItem ? route('package-days-items.update', $packageDayItem->id) : route('package-day-items.store') }}">
        @csrf
        @if($packageDayItem)
            @method('PUT')
        @endif

        <input type="hidden" name="type" value="{{ $type ?? '' }}">
        <input type="hidden" name="day_id" value="{{ $dayId ?? '' }}">
        <input type="hidden" name="itinerary_id" value="{{ $itineraryId ?? '' }}">

        <div class="row">

            {{-- COMMON FIELD --}}
            {{-- <div class="col-md-12">
                <label>Title</label>
                <input type="text" name="title" class="form-control"
                    value="{{ $packageDayItem->title ?? '' }}">
            </div> --}}

            {{-- 🔥 TYPE BASED UI --}}
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

            {{-- DESCRIPTION --}}
            {{-- <div class="col-md-12 mt-3">
                <label>Description</label>
                <textarea name="description" class="form-control editor">
                    {{ $packageDayItem->description ?? '' }}
                </textarea>
            </div> --}}

        </div>
        <div class="mt-3 text-right">
            <button class="btn btn-success">Save</button>
        </div>

    </form>
</div>
