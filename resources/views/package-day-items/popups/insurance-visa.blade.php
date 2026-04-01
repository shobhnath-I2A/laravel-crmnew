<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="validationCustom02">Day Itinerary order</label>
                <input name="day_order" class="form-control" type="text" value="{{ old('day_order', $packageDayItem->day_order ?? '') }}" required=""
                    aria-required="true">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Destination
                </label>
                <select name="destination_id" id="destinationName" class="form-control" onchange="loadhotel();"
                    style="display: block;" readonly>
                    @foreach ($destinations as $id => $name)
                        @if ($packageDayItem->destination_id == $id)
                            <option value="{{ $id }}" selected>{{ $name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
                <label for="validationCustom02">Name
                </label>
                <input name="name" type="text" class="form-control ui-autocomplete-input valid" id="servicename"
                    value="{{ old('name', $packageDayItem->name ?? '') }}" autocomplete="off" aria-required="true"
                    aria-invalid="false">
            </div>
        </div>
        <div class="row"
            style="background: rgb(254, 250, 235); border-color: #f7d038; padding: 10px; width: 100%; margin: auto; border: 1px solid #ffd17e; margin: 10px 10px; border-radius: 4px;">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="validationCustom02">Date* </label>
                    <input type="text" class="form-control" name="check_in_date" id="startDate"
                        value="{{ old('check_in_date', isset($packageDayItem->check_in_date) ? \Carbon\Carbon::parse($packageDayItem->check_in_date)->format('d-m-Y') : '') }}">
                    @if ($errors->has('check_in_date'))
                        <span class="text-danger">{{ $errors->first('check_in_date') }}</span>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="validationCustom02">Description
                </label>
                <textarea name="description" rows="5" class="editorclass" id="description" aria-hidden="true">{{ $packageDayItem->description ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>

<input name="action" type="hidden" id="action" value="addFeesInsurance">
<input name="editId" type="hidden" id="editId" value="">
<input name="pid" type="hidden" id="editId" value="108998">
<input name="packageDays" type="hidden" id="packageDays" value="1">
