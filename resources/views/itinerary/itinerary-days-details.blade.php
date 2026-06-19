<div id="load_build_day_details">
    <?php
    $mainItem = $packageDayItems['daydetail'][0] ?? null;
    ?>
    <div style="padding: 8px 20px; border-bottom: 1px solid #ecf0f2; font-size: 18px;">
        <strong>Day <?php echo e($day ?? ''); ?> - <?php echo e($date ?? ''); ?> &nbsp;<i class="fa fa-long-arrow-right"
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
                                        @if ($item->source_type == 1)
                                            {{ $item->activity?->name ?? 'N/A' }}
                                        @else
                                            {{ $item->name ?? 'N/A' }}
                                        @endif
                                        <span style="color:#FF9900; padding-left:10px;"></span>
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
                                        @if ($item->source_type == 1)
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
                                            </strong> {{ $item->hotelDetail?->meal_plan ?? '-' }}
                                        </div>
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
                                        </div>{{ $item->name ?? '' }}<span style="color:#FF9900; padding-left:10px;">(
                                            {{ $item->flightDetail->flight_no ?? '' }})</span>
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
                                                                {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}
                                                            </div> {{ $item->flightDetail->from_destination ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td align="center" style="width:100px;">
                                                        <div
                                                            style="text-align:center; font-size:11px; color:#666666;padding-bottom: 4px;">
                                                            {{ $item->flightDetail->flight_duration ?? '' }}
                                                        </div>
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
                                        <div class="eventsectioniconOrder">{{ $item->day_order ?? '' }} </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-credit-card"
                                                aria-hidden="true"></i></div> {{ $item->name ?? '' }}
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
                                        To
                                        {{ \Carbon\Carbon::parse($item->end_time)->format('g:i A') }}
                                    </div>
                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">{{ $item->day_order ?? '' }} </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-cutlery"
                                                aria-hidden="true"></i></div> {{ $item->name ?? '' }}
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
                {{-- ================== Laisure ================== --}}
            @elseif($type === 'leisure')
                <div class="daydetailsbox" style="padding-left: 25px;">
                    <i class="fa fa-pencil" aria-hidden="true"
                        onclick="openPopup('Day {{ $day ?? '' }} Leiserure Form - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
                    </i>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeeventimage2333664&amp;pid=109054"
                                        style="cursor:pointer;"><img id="eventimage2333664"
                                            src="data:image/png;base64,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">
                                        <i class="fa fa-pencil fa-pencil-blk"></i>
                                    </div>
                                    <script>
                                        function changeeventimage2333664(img) {
                                            if (img.indexOf('https://') > -1) {
                                                $('#eventimage2333664').attr('src', img);

                                            } else {
                                                $('#eventimage2333664').attr('src', 'http://localhost:8081/project/I2ACrm/staging/package_image/' + img);
                                            }
                                            $(".close").trigger("click");
                                            $('#ActionDiv').load('actionpage.php?pid=109054&id=2333664&action=seteventcoverphoto&imagename=' + img);
                                        }
                                    </script>
                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">

                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">{{ $item->day_order ?? '' }} </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-umbrella"
                                                aria-hidden="true"></i></div> {{ $item->name ?? '' }} <span
                                            style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div class="eventcontent">{!! $item->description ?? '' !!}</div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- ================== Cruise ================== --}}
            @elseif($type === 'cruise')
                <div class="daydetailsbox" style="padding-left: 25px;">
                    <i class="fa fa-pencil" aria-hidden="true"
                        onclick="openPopup('Day {{ $day ?? '' }} Cruise Form - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"></i>
                    </i>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeeventimage2333665&amp;pid=109054"
                                        style="cursor:pointer;"><img id="eventimage2333665"
                                            src="data:image/png;base64,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">
                                        <i class="fa fa-pencil fa-pencil-blk"></i>
                                    </div>
                                    <script>
                                        function changeeventimage2333665(img) {
                                            if (img.indexOf('https://') > -1) {
                                                $('#eventimage2333665').attr('src', img);

                                            } else {
                                                $('#eventimage2333665').attr('src', 'http://localhost:8081/project/I2ACrm/staging/package_image/' + img);
                                            }
                                            $(".close").trigger("click");
                                            $('#ActionDiv').load('actionpage.php?pid=109054&id=2333665&action=seteventcoverphoto&imagename=' + img);
                                        }
                                    </script>
                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">
                                    <div class="eventheadingtime"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                       {{ \Carbon\Carbon::parse($item->start_time)->format('g:i A') }}
                                        To
                                        {{ \Carbon\Carbon::parse($item->end_time)->format('g:i A') }}
                                    </div>
                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">{{ $item->day_order ?? '' }} </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-ship"
                                                aria-hidden="true"></i></div> {{ $item->name ?? ''}} <span
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
