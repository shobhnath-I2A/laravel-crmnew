<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-body">
    {{ $packageDayItem ?? '' }}
    <form class="custom-validation" action="{{ route('package-days-items.update', $packageDayItem->id) }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="validationCustom02">Subject</label>{{ $packageDayItem->id }}
                        <input name="day_subject" type="text" class="form-control" id="daySubject" value="{{ old('day_subject', $packageDayItem->day_subject ?? '') }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="validationCustom02">Details
                        </label>
                        <textarea name="description" rows="10" class="form-control">{{ old('description', $packageDayItem->description ?? '' ) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="itinerary_id" value="{{ $itineraryId }}">
        <div class="modal-footer" style=" position:relative;">
            <input name="Save" type="submit" value="Save" class="btn btn-primary" style="float:right;">
        </div>
    </form>
</div>
