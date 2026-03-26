
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

