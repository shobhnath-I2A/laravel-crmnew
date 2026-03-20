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
    <h4 style="margin-bottom:10px; font-weight:600;">{{ $hotelName }}</h4>
    @if(isset($hotelRate))
    <form class="custom-validation ajax-form" method="POST" action="{{ route('hotels-rates.update', $hotelRate->id) }}">
    @method('PUT')
    @else
        <form class="custom-validation ajax-form" method="POST" action="{{ route('hotels-rates.store') }}">
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
                            <td width="12%">Room&nbsp;Type</td>
                            <td width="8%">Meal&nbsp;Plan</td>
                            <td width="10%">Single</td>
                            <td width="10%">Double</td>
                            <td width="10%">Triple</td>
                            <td width="10%">Quad</td>
                            <td width="10%">CWB</td>
                            <td width="10%">CNB</td>
                            <td width="5%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="10%">
                                <input type="text" name="start_date" id="startDate" value="{{ old('start_date', $hotelRate->start_date ?? '') }}"
                                    class="form-control reqfield" required>
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td width="10%">
                                <input type="text" name="end_date" id="endDate" value="{{ old('end_date', $hotelRate->end_date ?? '') }}"
                                    class="form-control reqfield" required>
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td width="12%">
                                <select id="room_type" name="room_type" class="select2 reqfield form-control"
                                    autocomplete="off" style="width:100%;">
                                    <option value="">Select</option>
                                    <option value="2"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 2 ? 'selected' : '' }}>
                                        Superior Room</option>
                                    <option value="3"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 3 ? 'selected' : '' }}>
                                        Superior Room,1 Double Bed,NonSmoking</option>
                                    <option value="7"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 7 ? 'selected' : '' }}>
                                        Akara Deluxe Twin</option>
                                    <option value="15"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 15 ? 'selected' : '' }}>
                                        Akara Suite</option>
                                    <option value="24"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 24 ? 'selected' : '' }}>
                                        Deluxe</option>
                                    <option value="23"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 23 ? 'selected' : '' }}>
                                        Deluxe Room with 1 King Bed</option>
                                    <option value="12"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 12 ? 'selected' : '' }}>
                                        DOUBLE SUPERIOR KING BED</option>
                                    <option value="22"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 22 ? 'selected' : '' }}>
                                        Imperial Club King Ocean Room</option>
                                    <option value="11"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 11 ? 'selected' : '' }}>
                                        PRAROP DELUXE</option>
                                    <option value="6"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 6 ? 'selected' : '' }}>
                                        Prarop Deluxe King</option>
                                    <option value="10"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 10 ? 'selected' : '' }}>
                                        Prarop Deluxe King Room</option>
                                    <option value="5"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 5 ? 'selected' : '' }}>
                                        Prarop Deluxe Twin</option>
                                    <option value="9"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 9 ? 'selected' : '' }}>
                                        Prarop King Deluxe,1 King Bed,NonSmoking</option>
                                    <option value="8"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 8 ? 'selected' : '' }}>
                                        Prarop Twin Deluxe,2 Twin Beds,NonSmoking</option>
                                    <option value="13"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 13 ? 'selected' : '' }}>
                                        Siam Suite Triple</option>
                                    <option value="14"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 14 ? 'selected' : '' }}>
                                        Siam Suite Triple Room</option>
                                    <option value="21"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 21 ? 'selected' : '' }}>
                                        Standard Apartment</option>
                                    <option value="4"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 4 ? 'selected' : '' }}>
                                        Superior Double or Twin Room</option>
                                    <option value="20"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 20 ? 'selected' : '' }}>
                                        Standard Apartment</option>
                                    <option value="17"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 17 ? 'selected' : '' }}>
                                        Superior King Room with Balcony</option>
                                    <option value="16"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 16 ? 'selected' : '' }}>
                                        Superior Twin Balcony</option>
                                    <option value="19"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 19 ? 'selected' : '' }}>
                                        Twin Room - Balcony</option>
                                    <option value="18"
                                        {{ old('room_type', $hotelRate->room_type ?? '') == 18 ? 'selected' : '' }}>
                                        City View Room</option>
                                </select>
                                @error('room_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td width="8%">
                                <select id="mealPlan" name="meal_plan"class="select2 reqfield form-control"
                                    autocomplete="off" style="width:100%;">
                                    <option value="3"
                                        {{ old('meal_plan', $hotelRate->meal_type ?? '') == 3 ? 'selected' : '' }}>
                                        APAI</option>
                                    <option value="1"
                                        {{ old('meal_plan', $hotelRate->meal_type ?? '') == 1 ? 'selected' : '' }}>
                                        CPAI</option>
                                    <option value="2"
                                        {{ old('meal_plan', $hotelRate->meal_type ?? '') == 2 ? 'selected' : '' }}>
                                        MAPAI</option>
                                </select>
                                @error('meal_plan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td width="10%">
                                <input name="single" type="text" class="form-control" min="0" max="9999999999" maxlength="10"
                                    value="{{ old('single', $hotelRate->single ?? '') }}">
                            </td>
                            <td width="10%">
                                <input name="double" type="text" class="form-control" min="0" max="9999999999" maxlength="10"
                                    value="{{ old('double', $hotelRate->double ?? '') }}">
                            </td>
                            <td width="10%">
                                <input name="triple" type="text" class="form-control" min="0" max="9999999999" maxlength="10"
                                    value="{{ old('triple', $hotelRate->triple ?? '') }}">
                            </td>
                            <td width="10%">
                                <input name="quad" type="text" class="form-control" min="0" max="9999999999" maxlength="10"
                                    value="{{ old('quad', $hotelRate->quad ?? '') }}">
                            </td>
                            <td width="10%">
                                <input name="child_bed" type="text" class="form-control" min="0" max="9999999999" maxlength="10"
                                    value="{{ old('child_bed', $hotelRate->child_bed ?? '') }}">
                            </td>
                            <td width="5%">
                                <input name="extra_adult" type="text" class="form-control" min="0" max="9999999999" maxlength="10"
                                    value="{{ old('extra_adult', $hotelRate->extra_adult ?? '') }}">
                            </td>
                            <td width="5%">
                                <button type="submit" class="btn btn-primary">
                                 {{ isset($hotelRate) ? 'Update' : 'Add' }}
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" name="hotel_id" value="{{ $hotelId ?? ($hotelRate->hotel_id ?? '') }}">
    </form>
    <h5 style="margin-bottom:10px; font-weight:600;">Rate List</h5>
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Room Type </th>
                <th>Meal Plan </th>
                <th>Single</th>
                <th>Double</th>
                <th>Triple</th>
                <th>Quad</th>
                <th>CWB</th>
                <th>CNB</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
       <tbody>
    @forelse ($hotelRates as $rate)
        <tr>
            <td>{{ \Carbon\Carbon::parse($rate->start_date)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($rate->end_date)->format('d/m/Y') }}</td>
            <td>{{ $rate->room_type }}</td>
            <td>{{ $rate->meal_plan }}</td>
            <td>{{ $rate->single }}</td>
            <td>{{ $rate->double }}</td>
            <td>{{ $rate->triple }}</td>
            <td>{{ $rate->quad }}</td>
            <td>{{ $rate->child_bed }}</td>
            <td>{{ $rate->extra_adult }}</td>
            <td>
                <button class="btn btn-primary" onclick="openPopup('Edit Rate', '{{ route('hotels-rates.edit', $rate->id) }}')">
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
