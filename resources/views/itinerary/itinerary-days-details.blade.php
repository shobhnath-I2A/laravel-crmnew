<div id="load_build_day_details">
     <?php
        $mainItem = $packageDayItems['daydetail'][0] ?? null;
    ?>
    <div style="padding: 8px 20px; border-bottom: 1px solid #ecf0f2; font-size: 18px;">
        <strong>Day <?php echo e($day ?? ''); ?> - <?php echo e($date ?? ''); ?> &nbsp;<i class="fa fa-long-arrow-right"
                aria-hidden="true"></i>&nbsp;
        {{  $mainItem ->destination->name?? ''}}
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
                                        @if($item->source_type == 1)
                                            {{ $item->activity?->name ?? 'N/A' }}
                                        @else
                                            {{ $item->name ?? 'N/A' }}
                                        @endif<span style="color:#FF9900; padding-left:10px;"></span>
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
                                        <div class="eventsectionicon"><i style="" class="fa fa-bed" aria-hidden="true"></i></div>
                                        @if($item->source_type == 1)
                                                {{ $item->hotelDetail?->hotel?->name ?? 'N/A' }}
                                            @else
                                                {{ $item->name ?? 'N/A' }}
                                            @endif
                                            <span style="color:#FF9900; padding-left:10px;">
                                                @for ($i = 1; $i <= ($item->hotelDetail?->hotel_options ?? 0); $i++)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                @endfor
                                            </span>

                                            <span class="hoteloption1">
                                                Option {{ $item->hotelDetail?->hotel_options ?? '' }}
                                            </span>

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
                                                                    &nbsp;{{ $item->hotelDetail?->room_type ?? '-' }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="margin-bottom:20px;">
                                        @php
                                            $rooms = [];

                                            if (($item->hotelDetail->single_room ?? 0) > 0) {
                                                $rooms[] = $item->hotelDetail->single_room . ' Single';
                                            }

                                            if (($item->hotelDetail->double_room ?? 0) > 0) {
                                                $rooms[] = $item->hotelDetail->double_room . ' Double';
                                            }

                                            if (($item->hotelDetail->triple_room ?? 0) > 0) {
                                                $rooms[] = $item->hotelDetail->triple_room . ' Triple';
                                            }

                                            if (($item->hotelDetail->quad_room ?? 0) > 0) {
                                                $rooms[] = $item->hotelDetail->quad_room . ' Quad';
                                            }

                                            if (($item->hotelDetail->cwb_room ?? 0) > 0) {
                                                $rooms[] = $item->hotelDetail->cwb_room . ' CWB';
                                            }

                                            if (($item->hotelDetail->cnb_room ?? 0) > 0) {
                                                $rooms[] = $item->hotelDetail->cnb_room . ' CNB';
                                            }
                                        @endphp
                                            <strong>Room:</strong>
                                            {{ implode(', ', $rooms) }}
                                            |
                                            &nbsp;&nbsp;<strong><i class="fa fa-cutlery" aria-hidden="true"></i> Meal:
                                            </strong> {{ $item->hotelDetail?->meal_plan ?? '-' }}</div>
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
                    <i class="fa fa-pencil" onclick="openPopup('Day {{ $day ?? '' }} Flight - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>

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
                                        <div class="eventsectionicon"><i style="" class="fa fa-plane" aria-hidden="true"></i>
                                        </div>{{ $item->name ?? '' }},<span  style="color:#FF9900; padding-left:10px;">( {{ $item->flightDetail->flight_no ?? '' }})</span>
                                        <span style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div style="margin-bottom:10px;">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="font-size:12px;">
                                                        <div style="font-size: 12px; border: 1px solid #ddd; padding: 6px 10px; background-color: #f9f9f9; border-radius: 4px;">
                                                            <div style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                                {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}
                                                            </div> {{ $item->flightDetail->from_destination ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td align="center" style="width:100px;">
                                                        <div style="text-align:center; font-size:11px; color:#666666;padding-bottom: 4px;">
                                                            {{ $item->flightDetail->flight_duration ?? '' }}
                                                        </div>
                                                        <div style="font-size:0px; border-top:2px solid #ddd; position:relative;">
                                                            <i class="fa fa-plane" aria-hidden="true" style="position: absolute; font-size: 18px; transform: rotate(45deg); top: -9px; left: 40%;"></i>
                                                        </div>
                                                    </td>
                                                    <td align="center">
                                                        <div style="font-size: 12px; border: 1px solid #ddd; padding: 6px 10px; background-color: #f9f9f9; border-radius: 4px;">
                                                            <div style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                                {{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}
                                                            </div> {{ $item->flightDetail->to_destination ?? '' }}
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
                    <i class="fa fa-pencil" onclick="openPopup('Day {{ $day ?? '' }} Insurance / Visa - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
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
                                        <div class="eventsectioniconOrder">{{ $item->day_order ?? '' }} </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-credit-card" aria-hidden="true"></i></div> {{ $item->name ?? '' }}
                                        <span style="color:#FF9900; padding-left:10px;"></span>
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
                        onclick="openPopup('Day {{ $day ?? '' }} Meal- {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
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
                                        {{ \Carbon\Carbon::parse($item->start_time)->format('g:i A') }}
                                        to
                                        {{ \Carbon\Carbon::parse($item->end_time)->format('g:i A') }}
                                    </div>
                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">{{ $item->day_order ?? '' }} </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-cutlery" aria-hidden="true"></i></div> {{ $item->name??'' }}
                                        <span style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div class="eventcontent">{!! $item->description ?? '' !!}</div>
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
                    @if ($mainItem && ($item->name || $item->description))
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="94%">
                                        <div class="heading">
                                            {{ $item->name ?? 'No Subject' }}
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
