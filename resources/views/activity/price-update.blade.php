<style>
    .crm-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .popup-box {
        position: relative;
        max-width: 90%;
        background: #fff;
        margin: 8% auto;
        border-radius: 5px;
        overflow: hidden;
    }

    .popup-box {
        transform: scale(0.9);
        transition: 0.3s ease;
    }

    .crm-popup.show .popup-box {
        transform: scale(1);
    }
</style>
<div class="modal-body">
    <h4 style="margin-bottom:10px; font-weight:600;">{{ $activityName }}</h4>
    @if(isset($activityRate))
    <form class="custom-validation ajax-form" method="POST" action="{{ route('activities-rates.update', $activityRate->id) }}">
    @method('PUT')
    @else
        <form class="custom-validation ajax-form" method="POST" action="{{ route('activities-rates.store') }}">
    @endif
    @csrf
    {{-- <form class="custom-validation ajax-form" action="{{ route('hotels-rates.store') }}" method="post"
        enctype="multipart/form-data"> --}}
        <div class="modal-body">
            <div class="row">
                <table width="100%" border="0" cellpadding="2" cellspacing="0">
                    <tbody>
                        <tr>
                            <td width="10%">From Date</td>
                            <td width="10%">To</td>
                            <td width="12%">Adult</td>
                            <td width="8%">Child</td>
                            <td width="5%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="10%">
                                <input type="text" name="start_date" id="startDate" value="{{ old('start_date', $activityRate->start_date ?? '') }}"
                                    class="form-control reqfield" required>
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td width="10%">
                                <input type="text" name="end_date" id="endDate" value="{{ old('end_date', $activityRate->end_date ?? '') }}"
                                    class="form-control reqfield" required>
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>


                            <td width="10%">
                                <input name="adult" type="text" class="form-control" min="0" max="9999999999" maxlength="10"
                                    value="{{ old('adult', $activityRate->adult ?? '') }}">
                            </td>
                            <td width="10%">
                                <input name="child" type="text" class="form-control" min="0" max="9999999999" maxlength="10"
                                    value="{{ old('child', $activityRate->child ?? '') }}">
                            </td>

                            <td width="5%">
                                <button type="submit" class="btn btn-primary">
                                 {{ isset($activityRate) ? 'Update' : 'Add' }}
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" name="activity_id" value="{{ $activityId ?? ($activityRate->activity_id ?? '') }}">
    </form>
    <h5 style="margin-bottom:10px; font-weight:600;">Rate List</h5>
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Adult</th>
                <th>Child</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
       <tbody>
    @forelse ($activityRates as $rate)
        <tr>
            <td>{{ \Carbon\Carbon::parse($rate->start_date)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($rate->end_date)->format('d/m/Y') }}</td>

            <td>{{ $rate->adult }}</td>
            <td>{{ $rate->child }}</td>
            <td>
                <button class="btn btn-primary" onclick="openPopup('Edit Rate', '{{ route('activities-rates.edit', $rate->id) }}')">
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
