@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        <div class="row"
            style="background-color: #06304c; margin-bottom: 38px; z-index: 99; position: fixed; left: 30px; width: 100%; margin: 0px; top: 46px; border-top: 1px solid #ffffff61;">
            <div class="container-fluid topnavigation" style=" position: relative;">
                <ul class="nav nav-tabs" style="border:0px;">
                    <li class="nav-item">
                        @if (isset($itinerary) && $itinerary->queryId > 0)
                            <a class="nav-link {{ $tab == 'proposals' ? 'active' : '' }}"
                                href="{{ route('queries.show', ['id' => $itinerary->queryId, 'tab' => 'proposals']) }}">
                                <i class="fa fa-arrow-left"></i> &nbsp;QUERY
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('itineraries.index') }}">
                                <i class="fa fa-arrow-left"></i> &nbsp;ITINERARIES
                            </a>
                        @endif
                    </li>
                    <li class="nav-item"><a class="nav-link"
                            href="display.html?ga=itineraries&amp;view=1&amp;id=109135">BUILD</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="display.html?ga=itineraries&amp;view=1&amp;id=109135&amp;b=2">PRICING</a></li>

                    <li class="nav-item"><a class="nav-link"
                            href="display.html?ga=itineraries&amp;view=1&amp;id=109135&amp;b=4">FINAL</a></li>

                    <!-- <li class="nav-item" style="position:absolute; right:120px;"><a  class="nav-link" href="http://localhost:8081/API/tcpdf/pdf/download-package.php?pageurl=http://localhost:8081/API/downloadpackagepdf.php?id=109135" ><i class="fa fa-file-text" aria-hidden="true"></i> &nbsp;Exportddd</a></li> -->

                    <li class="nav-item" style="position:absolute; right:247px;"><a href="#" class="nav-link"
                            onclick="loadpop('View Quotation',this,'1000px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" popaction="action=viewquotation&amp;id=109135"><i
                                class="fa fa-file-text" aria-hidden="true"></i> &nbsp;Quotation</a></li>
                    <li class="nav-item" style="position:absolute; right:120px;"><a href="#" class="nav-link"
                            onclick="loadpop('Export Itinerary',this,'500px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" popaction="action=exportitinerary&amp;pid=109135"><i
                                class="fa fa-file-text" aria-hidden="true"></i> &nbsp;Export</a></li>
                    <li class="nav-item" style="position:absolute; right:0px;"><a class="nav-link" href="#"
                            onclick="loadpop('Share',this,'700px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" popaction="action=shareitinerary&amp;pid=109135"><i
                                class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Share</a></li>

                </ul>
            </div>
        </div>
        <div style="padding:10px;">
            <div class="card" style="padding:10px; margin-top:40px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="min-height:600px;">
                    <tbody>
                        <tr>
                            <td colspan="2" align="left" valign="top" style="border:1px solid #ecf0f2;">
                                <div style="height:150px; overflow:hidden; position:relative;" class="coverBanner">
                                    <img src="" style="width:100%; height:auto; min-height:100%;">
                                    <div
                                        style="background-color: #000000ba; color: #fff; padding: 10px 20px; font-size: 25px; position: absolute; left: 0px; bottom: 0px; width: 100%; font-weight: 600;">
                                        {{ $itinerary->name }}
                                        <a onclick="openSidebar('Edit Itinerary','{{ route('itineraries.edit', $itinerary->id) }}')"
                                            style="font-size:18px; cursor:pointer;">&nbsp;&nbsp;<i class="fa fa-pencil"
                                                aria-hidden="true"></i>
                                        </a>

                                    </div>
                                    <a style="font-size: 13px; background-color: #00000082; color: #fff; cursor: pointer; position: absolute; right: 10px; top: 10px; padding: 5px 10px;border-radius: 4px;"
                                        onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                        data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeCoverPhoto&amp;pid=109135&amp;destinations=delhi"><i
                                            class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;Change Cover Photo
                                    </a>
                                </div>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="25%" colspan="2" align="left" valign="top"
                                                style="border-right:1px solid #ecf0f2;">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay())
                                                    <div class="itidaytab"
                                                        onclick="load_build_day_details('{{ $i }}','{{ $date->format('Y-m-d') }}');">
                                                        {{-- <div class="itidaytab {{ $i == 1 ? 'activedaytab' : '' }}" id="dayid{{ $i }}"  onclick="load_build_day_details('{{ $i }}','{{ $date->format('Y-m-d') }}');"> --}}
                                                        <strong><span>{{ $i }}</span>
                                                            {{ $date->format('d M - D') }}</strong>
                                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                        <select id="destinationName{{ $i }}"
                                                            class="form-control"
                                                            onchange="load_build_day_details('{{ $i }}','{{ $date->format('Y-m-d') }}');">
                                                            @foreach ($itinerary->destinations as $destination)
                                                                <option value="{{ $destination->id }}"
                                                                    {{ isset($dayItems[$i]) && $dayItems[$i]->destination_id == $destination->id ? 'selected' : '' }}>
                                                                    {{ $destination->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="reorder-controls">
                                                            <button class="btn-move-up" data-day-order="1"
                                                                disabled="">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </button>
                                                            <button class="btn-move-down" data-day-order="1">
                                                                <i class="fa fa-chevron-down"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @php $i++; @endphp
                                                @endfor
                                                <div class="itidaytab" id="dayid100000"
                                                    onclick="load_build_day_details('100000','2026-05-04');">
                                                    <strong><i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp;
                                                        Package Terms</strong>
                                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                </div>
                                            </td>
                                            <td align="left" valign="top">
                                                {{-- show left itinery day wise --}}
                                                <div id="load_build_day_details">
                                                    {{-- @include('itinerary.itinerary-days-details') --}}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width="35%" align="left" valign="top" t="" style="position:relative; background-color:#f5f7f9;">
                                <div style="padding: 15px; position: absolute; z-index: 1; width: 100%; box-sizing: border-box; padding-top: 0px; padding-right: 0px; background-color:#fff; border-bottom:1px solid #ddd;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="padding-right:5px;"><input name="searchevent"
                                                        type="text" id="searchevent"
                                                        style="width:100%; box-sizing:border-box; padding:10px; border:1px solid #ddd;border-radius: 4px;height: 43px;"
                                                        placeholder="Search" onkeyup="loadeventlibrary();"></td>
                                                <td width="50%">

                                                    <select name="eventsection" id="eventsection"
                                                        style="width:100%; box-sizing:border-box; padding:10px; border:1px solid #ddd;border-radius: 4px;height: 43px;"
                                                        onchange="loadeventlibrary();">
                                                        <option value="DayItinerary">Day Itinerary dddd eeee</option>
                                                        <option value="Accommodation">Accommodation</option>
                                                        <option value="Activity">Activity</option>
                                                        <option value="Transportation">Transportation</option>
                                                        <option value="Insurance">Insurance / Visa</option>
                                                        <option value="Meal">Meal</option>
                                                        <option value="Flight">Flight</option>
                                                        <option value="Leisure">Leisure</option>
                                                        <option value="Cruise">Cruise</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="overflow:auto; height:100%;position: absolute; width:100%;">
                                    <div style="margin-top:70px; padding-left:15px;" id="loadeventlibrary">
                                        <style>
                                            .custom_flex_wrapper {
                                                display: flex;
                                                flex-wrap: wrap;
                                                align-items: center;
                                                justify-content: space-between;
                                            }

                                            .custom_flex_wrapper input {
                                                width: 48%;
                                            }
                                        </style>

                                        <div id="manualAddButtonContainer">

    <input type="button"
        id="manualAddButton"
        style="padding: 10px; color: #fff; background-color: #23ae73; outline: 0px; height: 46px; width: 100%; box-sizing: border-box; margin: 15px 0px; margin-top: 0px; border-radius: 4px; border: 0px; font-size: 16px; cursor:pointer;"
        value="+ Add Accommodation Manually"
        onclick="openPopup('Add Accommodation', '{{ route('itinerary.day.accomodation') }}')">

</div>

                                        <div
                                            style="margin-bottom: 15px; color: #000000; font-size: 12px; font-weight: 600;">
                                            Suggested Accommodation in dddd<span
                                                style="font-weight:600; color:#0066CC;">delhi</span></div>
                                        <div class="daydetailsbox">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="eventimgclass" style="width: 50px; height: 50px;">
                                                                <img style="height:100%;"
                                                                    src="http://localhost:8081/API/package_image/Medhufushi_Island_Resort1718449880.jpg">
                                                            </div>
                                                        </td>
                                                        <td width="90%" style="padding-left:10px;">
                                                            <div class="eventheading">Medhufushi Island Resort</div>
                                                            <div><span style="color:#FF9900; "><i class="fa fa-star"
                                                                        aria-hidden="true"></i><i class="fa fa-star"
                                                                        aria-hidden="true"></i><i class="fa fa-star"
                                                                        aria-hidden="true"></i><i class="fa fa-star"
                                                                        aria-hidden="true"></i></span></div>
                                                        </td>
                                                        <td width="10%">
                                                            <div class="addeventbtnn"
                                                                onclick="loadpop('Accommodation in day 1',this,'600px')"
                                                                data-toggle="modal" data-target=".bs-example-modal-center"
                                                                popaction="action=addAccommodation&amp;pid=109130&amp;d=2026-01-07&amp;packageDays=1&amp;loaddestinationidload=delhi&amp;auto=1&amp;eventobjectid=92&amp;photo=Medhufushi_Island_Resort1718449880.jpg">
                                                                <i class="fa fa-plus" aria-hidden="true"></i></div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </td>
                            {{-- @include('itinerary.add-itinery-days') --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <script>
            function load_build_day_details(day, date) {
                let destination_id = $('#destinationName' + day).val();
                $('#load_build_day_details').load(
                    `/itinerary/day-details?day=${day}&date=${date}&destination_id=${destination_id}&itinerary_id={{ $itinerary->id }}`
                );
            }
            document.addEventListener("DOMContentLoaded", function() {

                document.querySelectorAll('.itidaytab').forEach(tab => {

                    tab.addEventListener('click', function() {

                        let day = this.dataset.day;
                        let date = this.dataset.date;

                        loadDayDetails(day, date);

                        document.querySelectorAll('.itidaytab').forEach(t => t.classList.remove(
                            'activedaytab'));
                        this.classList.add('activedaytab');
                    });

                });

            });

            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector('.itidaytab')?.click();
            });
        </script>
        <script>

function updateManualAddButton() {

    let type = document.getElementById('eventsection').value;

    let button = document.getElementById('manualAddButton');

    let popupTitle = '';
    let popupRoute = '';
    let buttonText = '';

    switch(type) {

        case 'Accommodation':
            popupTitle = 'Add Accommodation';
            popupRoute = "{{ route('package-days-items.create') }}";
            buttonText = '+ Add Accommodation Manually';
        break;

        case 'Activity':
            popupTitle = 'Add Activity';
            popupRoute = "{{ route('itinerary.day.accomodation') }}";
            buttonText = '+ Add Activity Manually';
        break;

        case 'Transportation':
            popupTitle = 'Add Transportation';
            popupRoute = "{{ route('itinerary.day.accomodation') }}";
            buttonText = '+ Add Transportation Manually';
        break;

        case 'Insurance':
            popupTitle = 'Add Insurance';
            popupRoute = "{{ route('itinerary.day.accomodation') }}";
            buttonText = '+ Add Insurance Manually';
        break;

        case 'Meal':
            popupTitle = 'Add Meal';
            popupRoute = "{{ route('itinerary.day.accomodation') }}";
            buttonText = '+ Add Meal Manually';
        break;

        case 'Flight':
            popupTitle = 'Add Flight';
            popupRoute = "{{ route('itinerary.day.accomodation') }}";
            buttonText = '+ Add Flight Manually';
        break;

        default:
            popupTitle = 'Add Item';
            popupRoute = '#';
            buttonText = '+ Add Item';
    }

    button.value = buttonText;

    button.setAttribute(
        'onclick',
        `openPopup('${popupTitle}', '${popupRoute}')`
    );
}

document.addEventListener("DOMContentLoaded", function () {

    updateManualAddButton();

    document.getElementById('eventsection')
        .addEventListener('change', updateManualAddButton);

});

</script>
    </div>
@endsection
