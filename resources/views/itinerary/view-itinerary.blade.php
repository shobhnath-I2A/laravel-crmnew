@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        @include('itinerary.partials.top-nav', ['itinerary' => $itinerary])
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
                                                    <div class="itidaytab {{ $i == 1 ? 'activedaytab' : '' }}"
                                                        id="dayid{{ $i }}"
                                                        data-day="{{ $i }}"
                                                        data-date="{{ $date->format('Y-m-d') }}"
                                                        onclick="load_build_day_details('{{ $i }}','{{ $date->format('Y-m-d') }}')">
                                                        {{-- <div class="itidaytab {{ $i == 1 ? 'activedaytab' : '' }}" id="dayid{{ $i }}"  onclick="load_build_day_details('{{ $i }}','{{ $date->format('Y-m-d') }}');"> --}}
                                                        <strong><span>{{ $i }}</span>
                                                            {{ $date->format('d M - D') }}</strong>
                                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                        @php
                                                            $selectedDestinationId =
                                                                $dayItems[$i]->destination_id
                                                                ?? $itinerary->destinations->first()?->id;
                                                        @endphp

                                                        <select id="destinationName{{ $i }}"
                                                            class="form-control"
                                                            onclick="event.stopPropagation();"
                                                            onchange="event.stopPropagation(); load_build_day_details('{{ $i }}','{{ $date->format('Y-m-d') }}');">

                                                            @foreach ($itinerary->destinations as $destination)
                                                                <option value="{{ $destination->id }}"
                                                                    {{ $selectedDestinationId == $destination->id ? 'selected' : '' }}>
                                                                    {{ $destination->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        <div class="reorder-controls">
                                                            <button class="btn-move-up" data-day-order="1" disabled="">
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
                                                    onclick="$('.itidaytab').removeClass('activedaytab'); $(this).addClass('activedaytab');">
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
                            <td width="35%" align="left" valign="top" t=""
                                style="position:relative; background-color:#f5f7f9;">
                                <div
                                    style="padding: 15px; position: absolute; z-index: 1; width: 100%; box-sizing: border-box; padding-top: 0px; padding-right: 0px; background-color:#fff; border-bottom:1px solid #ddd;">
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

                                            <input type="button" id="manualAddButton"
                                                style="padding:10px;color:#fff;background-color:#23ae73;height:46px;width:100%;box-sizing:border-box;margin:15px 0 0;border-radius:4px;border:0;font-size:16px;cursor:pointer;"
                                                value="+ Add Accommodation Manually">

                                        </div>

                                        <div style="margin-bottom:15px;color:#000;font-size:12px;font-weight:600;">
                                            Suggested Accommodation in
                                            <span id="suggestedDestinationName" style="font-weight:600;color:#0066CC;">
                                                {{ $itinerary->destinations->first()->name ?? '' }}
                                            </span>
                                        </div>

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
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </div>

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
            window.itineraryContext = {
                itineraryId: {{ (int) $itinerary->id }},
                packageId: {{ (int) $package->id }},
                day: null,
                date: null,
                destinationId: null,
                destinationName: null
            };

            const manualRoutes = {
                DayItinerary: {
                    title: 'Add Day Itinerary',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Day Itinerary Manually'
                },
                Accommodation: {
                    title: 'Add Accommodation',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Accommodation Manually'
                },
                Activity: {
                    title: 'Add Activity',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Activity Manually'
                },
                Transportation: {
                    title: 'Add Transportation',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Transportation Manually'
                },
                Insurance: {
                    title: 'Add Insurance',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Insurance Manually'
                },
                Meal: {
                    title: 'Add Meal',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Meal Manually'
                },
                Flight: {
                    title: 'Add Flight',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Flight Manually'
                },
                Leisure: {
                    title: 'Add Leisure',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Leisure Manually'
                },
                Cruise: {
                    title: 'Add Cruise',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Cruise Manually'
                }
            };

            function load_build_day_details(day, date) {
                const destinationSelect = document.getElementById('destinationName' + day);

                if (!destinationSelect) {
                    console.log('Destination select not found: destinationName' + day);
                    return;
                }

                const destinationId = destinationSelect.value;
                const destinationName = destinationSelect.options[destinationSelect.selectedIndex].text.trim();

                window.itineraryContext.day = day;
                window.itineraryContext.date = date;
                window.itineraryContext.destinationId = destinationId;
                window.itineraryContext.destinationName = destinationName;

                $('.itidaytab').removeClass('activedaytab');
                $('#dayid' + day).addClass('activedaytab');

                $('#suggestedDestinationName').text(destinationName);

                const url = "{{ url('/itinerary/day-details') }}" +
                    "?itinerary_id=" + encodeURIComponent(window.itineraryContext.itineraryId) +
                    "&package_id=" + encodeURIComponent(window.itineraryContext.packageId) +
                    "&day=" + encodeURIComponent(day) +
                    "&date=" + encodeURIComponent(date) +
                    "&destination_id=" + encodeURIComponent(destinationId);

                console.log('Loading day details:', url);

                $('#load_build_day_details').html('<div style="padding:20px;">Loading...</div>');
                $('#load_build_day_details').load(url);

                updateManualAddButton();
            }

            function buildPopupUrl(baseUrl, type) {
                const ctx = window.itineraryContext;

                const params = new URLSearchParams({
                    itinerary_id: ctx.itineraryId || '',
                    package_id: ctx.packageId || '',
                    day: ctx.day || '',
                    date: ctx.date || '',
                    destination_id: ctx.destinationId || '',
                    item_type: type || ''
                });

                return baseUrl + '?' + params.toString();
            }

            function updateManualAddButton() {
                const type = $('#eventsection').val() || 'Accommodation';

                const config = manualRoutes[type] || {
                    title: 'Add Item',
                    route: "{{ route('package-days-items.create') }}",
                    text: '+ Add Item'
                };

                $('#manualAddButton')
                    .val(config.text)
                    .off('click')
                    .on('click', function() {
                        const popupUrl = buildPopupUrl(config.route, type);
                        openPopup(config.title, popupUrl);
                    });
            }

            function loadeventlibrary() {
                updateManualAddButton();
            }

            $(document).ready(function () {
                $('#eventsection').off('change').on('change', loadeventlibrary);

                const firstDay = $('.itidaytab').first();
                const firstDate = firstDay.data('date');

                if (firstDate) {
                    load_build_day_details(1, firstDate);
                }
            });
        </script>

    </div>
@endsection
