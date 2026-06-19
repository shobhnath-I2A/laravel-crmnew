<div class="modal-body">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label>Day Itinerary Order</label>
                <input name="day_order" class="form-control" type="text"
                    value="{{ old('day_order', $packageDayItem->day_order ?? '') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Destination</label>
                <select name="destination_id" class="form-control">
                    @foreach ($destinationList as $id => $name)
                        <option value="{{ $id }}"
                            {{ old('destination_id', $packageDayItem->destination_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                    value="{{ old('name', $packageDayItem->name ?? '') }}">
            </div>
        </div>

        <div class="row"
            style="background:#fefaeb;border:1px solid #ffd17e;padding:10px;width:100%;margin:10px;border-radius:4px;">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" class="form-control" name="start_date" id="startDate"
                        value="{{ old('start_date', !empty($packageDayItem->start_date) ? \Carbon\Carbon::parse($packageDayItem->start_date)->format('d-m-Y') : '') }}">
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="5" class="editorclass">{{ old('description', $packageDayItem->description ?? '') }}</textarea>
            </div>
        </div>

    </div>
</div>
