<style>
    .popup-box {
        max-width: 50%;
    }
</style>
<div class="modal-body">
    <h4 style="margin-bottom:10px; font-weight:600;">{{ $transferMasterName??'' }}</h4>
    @if(isset($transferMasterRateList))
    <form class="custom-validation ajax-form" method="POST" action="{{ route('transfer-rate-list.update', $transferMasterRateList->id ?? '') }}">
    @method('PUT')
    @else
        <form class="custom-validation ajax-form" method="POST" action="{{ route('transfer-rate-list.store') }}">
    @endif
    @csrf

        <div class="modal-body">
            <div class="row">
                <table width="100%" border="0" cellpadding="2" cellspacing="0">
                    <tbody>
                        <tr>
                            <td width="10%">From Date</td>
                            <td width="10%">To</td>
                            <td width="12%">Type</td>
                            <td width="10%" class="sic" style="display: table-cell;">Adult</td>
                            <td width="10%" class="sic" style="display: table-cell;">Child</td>
                            <td width="10%" class="pvt" style="display: none;">Vehicle Cost</td>
                            <td width="5%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="10%">
                                <input type="text" name="start_date" id="startDate" value="{{ old('start_date', $transferMasterRateList->start_date ?? '') }}"
                                    class="form-control reqfield" required>
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td width="10%">
                                <input type="text" name="end_date" id="endDate" value="{{ old('end_date', $transferMasterRateList->end_date ?? '') }}"
                                    class="form-control reqfield" required>
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td width="12%">
                                <select id="transfer_type" name="transfer_type" class="select2 reqfield form-control"
                                    autocomplete="off" onchange="checktype();" style="width:100%;">
                                    <option value="1"
                                    {{ old('transfer_type', $transferMasterRateList->transfer_type ?? 1) == 1 ? 'selected' : '' }}>
                                    SIC
                                    </option>

                                    <option value="2"
                                    {{ old('transfer_type', $transferMasterRateList->transfer_type ?? 1) == 2 ? 'selected' : '' }}>
                                    PVT
                                    </option>

                                </select>
                                @error('transfer_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>

                            <td width="10%" class="sic">
                                <input name="adult" type="text" class="form-control " min="0" max="999999999" maxlength="10"
                                    value="{{ old('adult', $transferMasterRateList->adult ?? '') }}">
                            </td>
                            <td width="10%" class="sic">
                                <input name="child" type="text" class="form-control " min="0" max="999999999" maxlength="10"
                                    value="{{ old('child', $transferMasterRateList->child ?? '') }}">
                            </td>
                            <td width="10%" class="pvt"  style="display: none;">
                                <input name="vehicle_cost" type="text" class="form-control " min="0" max="999999999" maxlength="10"
                                    value="{{ old('vehicle_cost', $transferMasterRateList->vehicle_cost ?? '') }}">
                            </td>

                            <td width="5%">
                                <button type="submit" class="btn btn-primary">
                                 {{ isset($transferMasterRateList) ? 'Update' : 'Add' }}
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{ $transferMasterRateList->transfer_id ?? '' }}
        <input type="hidden" name="transfer_id" value="{{ $transferMaster_id ?? ($transferMasterRateList->transfer_id ?? '') }}">
    </form>
    <h5 style="margin-bottom:10px; font-weight:600;">Rate List</h5>
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Type </th>
                <th>Adult </th>
                <th>Child</th>
                <th>Vehicle</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
       <tbody>
    @forelse ($transferMasterRateLists as $rate)
        <tr>
            <td>{{ \Carbon\Carbon::parse($rate->start_date)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($rate->end_date)->format('d/m/Y') }}</td>
            <td>{{ $rate->room_type }}</td>
            <td>{{ $rate->meal_plan }}</td>
            <td>{{ $rate->single }}</td>
            <td>{{ $rate->double }}</td>
            <td>
                <button class="btn btn-primary" onclick="openPopup('Edit Rate', '{{ route('transfer-rate-list.edit', $rate->id) }}')">
                    Edit
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="11" style="text-align:center;">No Rate</td>
        </tr>
    @endforelse
</tbody>
    </table>
</div>
<script>
function checktype(){
var transferType = $('#transfer_type').val();
if(transferType==1){
	$('.sic').show();
	$('.pvt').hide();
}

if(transferType==2){
	$('.sic').hide();
	$('.pvt').show();
}

}
</script>
