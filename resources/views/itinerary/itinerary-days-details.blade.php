<div id="load_build_day_details">
    @php
        $mainItem = $packageDayItems['daydetail'][0] ?? null;
    @endphp
    <div style="padding: 8px 20px; border-bottom: 1px solid #ecf0f2; font-size: 18px;">
        <strong>Day {{ $day ?? '' }} - {{ $date ?? '' }} &nbsp;<i class="fa fa-long-arrow-right"
                aria-hidden="true"></i>&nbsp;
            {{ $mainItem->destination->name ?? '' }}
        </strong>
    </div>
    @forelse($packageDayItems as $type => $items)
        @foreach ($items as $item)
            {{-- {{ $item ??'' }} --}}
            {{-- ================== ACTIVITY ================== --}}
            @if ($type === 'activity')
                <div class="daydetailsbox">
                    <i class="fa fa-pencil"
                        onclick="openPopup('Day {{ $day ?? '' }} Activity - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeeventimage2268713&amp;pid=108998&amp;destinations=langkawi"
                                        style="cursor:pointer;"><img id="eventimage2268713"
                                            src="https://s3.us-east-2.amazonaws.com/package.images/package_image/lalunaresort17053927151766409173.png">

                                        <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                            onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                            data-target=".bs-example-modal-center"
                                            popaction="action=medialibrary&amp;afunctin=changeeventimage2268713&amp;pid=108998&amp;destinations=langkawi"></i>
                                    </div>

                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">
                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">{{ $item->day_order ?? '' }} </div>
                                        <div class="eventsectionicon"> <i style="" class="fa fa-picture-o"
                                                aria-hidden="true"></i></div>
                                        {{ $item->hotel_type == 1 ? $item->hotel->name ?? 'N/A' : $item->hotel_name ?? 'N/A' }}<span
                                            style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div class="eventcontent">{!! $item->description ?? '' !!}</div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- ================== HOTEL ================== --}}
            @elseif($type === 'accommodation')
                <div class="daydetailsbox">
                    <i class="fa fa-pencil"
                        onclick="openPopup('Day {{ $day ?? '' }} Accommodation - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeeventimage2268711&amp;pid=108998&amp;destinations=kuala-lumpur"
                                        style="cursor:pointer;"><img id="eventimage2268711"
                                            src="https://s3.us-east-2.amazonaws.com/package.images/package_image/87bd9f5f-8def-4878-9abc-2ceb9fb34e1e17068758971766409152.jpg">

                                        <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                            onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                            data-target=".bs-example-modal-center"
                                            popaction="action=medialibrary&amp;afunctin=changeeventimage2268711&amp;pid=108998&amp;destinations=kuala-lumpur"></i>
                                    </div>
                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">

                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">1 </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-bed"
                                                aria-hidden="true"></i></div>
                                        {{ $item->hotel_type == 1 ? $item->hotel->name ?? 'N/A' : $item->hotel_name ?? 'N/A' }}
                                        <span style="color:#FF9900; padding-left:10px;"><i class="fa fa-star"
                                                aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i
                                                class="fa fa-star" aria-hidden="true"></i></span> <span
                                            class="hoteloption1">Option 1</span>
                                    </div>

                                    <div style="margin-bottom:10px;">
                                        <div
                                            style="border-top:1px solid #ddd;border-bottom:1px solid #ddd; padding-top:10px; margin-bottom:10px;">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div style="margin-bottom:10px;">
                                                                <div style="margin-bottom:2px;">Check-in</div>
                                                                <div style="margin-bottom:5px; font-weight:700;"><i
                                                                        class="fa fa-calendar" aria-hidden="true"></i>
                                                                    &nbsp;{{ \Carbon\Carbon::parse($item->check_in_date)->format('d M Y') }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div style="margin-bottom:10px;">
                                                                <div style="margin-bottom:2px; padding-left:20px;">
                                                                    Check-out</div>
                                                                <div
                                                                    style="margin-bottom:5px;padding-left:20px; font-weight:700;">
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                    &nbsp;{{ \Carbon\Carbon::parse($item->check_out_date)->format('d M Y') }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div style="margin-bottom:10px;">
                                                                <div style="margin-bottom:2px; padding-left:20px;">Room
                                                                    Type</div>
                                                                <div
                                                                    style="margin-bottom:5px;padding-left:20px; font-weight:700;">
                                                                    <i class="fa fa-home" aria-hidden="true"></i>
                                                                    &nbsp;Deluxe Room
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="margin-bottom:20px;"><strong>Room: </strong> 1 Double &nbsp;&nbsp;|
                                            &nbsp;&nbsp;<strong><i class="fa fa-cutlery" aria-hidden="true"></i> Meal:
                                            </strong> Bed &amp; Breakfast</div>
                                    </div>
                                    <div class="eventcontent"></div>

                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                {{-- ================== flight DETAIL ================== --}}
            @elseif($type === 'flight')
                <div class="daydetailsbox">
                    <i class="fa fa-pencil"
                        onclick="openPopup('Day {{ $day ?? '' }} Flight - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>

                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeeventimage2268726&amp;pid=108998&amp;destinations=kuala-lumpur"
                                        style="cursor:pointer;"><img id="eventimage2268726"
                                            src="https://s3.us-east-2.amazonaws.com/package.images/package_image/airasia17013280611766408876.jfif">

                                        <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                            onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                            data-target=".bs-example-modal-center"
                                            popaction="action=medialibrary&amp;afunctin=changeeventimage2268726&amp;pid=108998&amp;destinations=kuala-lumpur"></i>
                                    </div>
                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">

                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">{{ $item->day_order ?? '' }} </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-plane"
                                                aria-hidden="true"></i>
                                        </div>{{ $item->name ?? '' }},<span
                                            style="color:#FF9900; padding-left:10px;">({{ $item->flight_no ?? '' }})</span>
                                        <span style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div style="margin-bottom:10px;">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="font-size:12px;">
                                                        <div
                                                            style="font-size: 12px; border: 1px solid #ddd; padding: 6px 10px; background-color: #f9f9f9; border-radius: 4px;">
                                                            <div
                                                                style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                                {{ \Carbon\Carbon::parse($item->check_in_time)->format('h:i A') }}
                                                            </div>{{ $item->from_destination ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td align="center" style="width:100px;">
                                                        <div
                                                            style="text-align:center; font-size:11px; color:#666666;padding-bottom: 4px;">
                                                            {{ $item->flight_duration ?? '' }}</div>
                                                        <div
                                                            style="font-size:0px; border-top:2px solid #ddd; position:relative;">
                                                            <i class="fa fa-plane" aria-hidden="true"
                                                                style="position: absolute; font-size: 18px; transform: rotate(45deg); top: -9px; left: 40%;"></i>
                                                        </div>
                                                    </td>
                                                    <td align="center">
                                                        <div
                                                            style="font-size: 12px; border: 1px solid #ddd; padding: 6px 10px; background-color: #f9f9f9; border-radius: 4px;">
                                                            <div
                                                                style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                                {{ \Carbon\Carbon::parse($item->check_out_time)->format('h:i A') }}
                                                            </div>{{ $item->to_destination ?? '' }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="eventcontent">
                                        {{ trim(preg_replace('/\s+/', '', html_entity_decode(strip_tags($item->description ?? '')))) }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- Insurance --}}
            @elseif($type === 'insurance')
                <div class="daydetailsbox">
                    <i class="fa fa-pencil"
                        onclick="openPopup('Day {{ $day ?? '' }} Insurance / Visa - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeeventimage2333419&amp;pid=108998&amp;destinations=kuala-lumpur"
                                        style="cursor:pointer;">
                                        <img id="eventimage2333419"src="{{ asset('assets/images/dummy-image.png') }}">

                                        <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                            onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                            data-target=".bs-example-modal-center"
                                            popaction="action=medialibrary&amp;afunctin=changeeventimage2333419&amp;pid=108998&amp;destinations=kuala-lumpur"></i>
                                    </div>

                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">
                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">5 </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-credit-card"
                                                aria-hidden="true"></i></div> {{ $item->name ?? '' }} <span
                                            style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div class="eventcontent">{!! $item->description ?? '' !!}</div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- Meal --}}
            @elseif($type === 'meal')
                <div class="daydetailsbox">
                    <i class="fa fa-pencil"
                        onclick="openPopup('Day {{ $day ?? '' }} Insurance / Visa - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeeventimage2333420&amp;pid=108998&amp;destinations=kuala-lumpur"
                                        style="cursor:pointer;"><img id="eventimage2333420"
                                            src="{{ asset('assets/images/dummy-image.png') }}">

                                        <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                            onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                            data-target=".bs-example-modal-center"
                                            popaction="action=medialibrary&amp;afunctin=changeeventimage2333420&amp;pid=108998&amp;destinations=kuala-lumpur"></i>

                                    </div>
                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">
                                    <div class="eventheadingtime"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        1:00 PM TO 2:00 PM</div>
                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">5 </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-cutlery"
                                                aria-hidden="true"></i></div> test meal <span
                                            style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div class="eventcontent">testing</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- Transportation --}}
            @elseif($type === 'transportation')
                <div class="daydetailsbox">
                    <i class="fa fa-pencil"
                        onclick="openPopup('Day {{ $day ?? '' }} Transportation - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeeventimage2268710&amp;pid=108998&amp;destinations=kuala-lumpur"
                                        style="cursor:pointer;"><img id="eventimage2268710"
                                            src="{{ asset('assets/images/dummy-image.png') }}">

                                        <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                            onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                            data-target=".bs-example-modal-center"
                                            popaction="action=medialibrary&amp;afunctin=changeeventimage2268710&amp;pid=108998&amp;destinations=kuala-lumpur"></i>

                                    </div>
                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">
                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">1 </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-car"
                                                aria-hidden="true"></i></div> {{ $item->name ?? '' }} <span
                                            style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div class="eventcontent">{!! $item->description ?? '' !!}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- ================== DAY DETAIL ================== --}}
            @elseif($type === 'daydetail')
                <div class="daydetailsbox">
                    @if ($mainItem && ($item->day_subject || $item->description))
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="94%">
                                        <div class="heading">
                                            {{ $item->day_subject ?? 'No Subject' }}
                                        </div>
                                        {{ $item->description ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <div class="daywisedetailsdefault" style="cursor:pointer;"
                            onclick="openPopup('Day {{ $day ?? '' }} Details {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')">
                            <em>Enter Day Wise Details</em>
                        </div>
                    @endif
                    <i class="fa fa-pencil" aria-hidden="true"
                        onclick="openPopup('Day {{ $day ?? '' }} Details {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')">
                    </i>
                </div>
                {{-- ================== DEFAULT ================== --}}
            @else
                <i class="fa fa-pencil" aria-hidden="true"
                    onclick="openPopup('Day {{ $day ?? '' }} Details ', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')">
                </i>
            @endif
        @endforeach

    @empty

        <div class="daywisedetailsdefault">
            <em>No data added for this day</em>
        </div>

    @endforelse

</div>
