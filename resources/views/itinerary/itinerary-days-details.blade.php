<style>
    .eventimgclass .fa-pencil-blk {
        position: absolute;
        right: 4px !IMPORTANT;
        top: 54px !important;
        font-size: 12px;
        color: #45bbff;
        border: 1px solid #45bbff;
        border-radius: 30px;
        padding: 6px 7px;
        cursor: pointer;
        z-index: 999;
        background-color: #000 !IMPORTANT;
        color: #fff !important;
        border: 0px !important;
    }

    .daydetailsbox {
        padding: 15px;
        font-size: 13px;
        margin: 11px;
        box-shadow: 0px 0px 13px #e2e2e2;
        border-radius: 5px;
        position: relative;
    }

    .daydetailsbox .heading {
        font-size: 15px;
        margin-bottom: 5px;
        font-weight: 800;
    }

    .daydetailsbox .daywisedetailsdefault {
        font-size: 14px;
        color: #999999;
    }

    .daydetailsbox .fa-pencil {
        position: absolute;
        right: 10px;
        top: 10px;
        font-size: 12px;
        color: #45bbff;
        border: 1px solid #45bbff;
        border-radius: 30px;
        padding: 6px 7px;
        cursor: pointer;
        z-index: 1;
    }

    .daydetailsbox .fa-pencil:hover {
        background-color: #45bbff;
        color: #FFFFFF;
        border: 1px solid #45bbff;
    }

    .eventimgclass {
        width: 85px;
        height: 80px;
        overflow: hidden;
        border-radius: 5px;
        position: relative;
    }

    .eventimgclass img {
        width: 100%;
        height: auto;
        height: 100%;
    }

    .eventheading {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 6px;
        color: #333333;
    }

    .eventheadingtime {
        color: #627e8c;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 5px;
        position: relative;
        position: relative;
    }

    .eventcontent {
        font-size: 12px;
        color: #666666;
        line-height: 15px;
    }

    .eventsectionicon {
        position: absolute;
        left: -5px;
        top: -6px;
        background-color: #627e8c;
        color: #fff;
        width: 25px;
        height: 25px;
        text-align: center;
        border-radius: 20px;
        font-size: 12px;
        line-height: 23px;
        border: 1px solid #fff;
    }

    .eventsectioniconOrder {
        position: absolute;
        left: 50%;
        top: -12px;
        background-color: #c7d1c7a1;
        color: #71717a;
        width: 25px;
        height: 25px;
        text-align: center;
        border-radius: 20px;
        font-size: 12px;
        line-height: 23px;
        border: 1px solid #fff;
    }

    .hoteloption1 {
        background-color: #4FBDFF;
        padding: 2px 8px;
        color: #FFFFFF;
        font-weight: 600;
        display: inline-block;
        font-size: 12px;
        border-radius: 3px;
        margin-left: 5px;
    }

    .hoteloption2 {
        background-color: #04BF58;
        padding: 2px 8px;
        color: #FFFFFF;
        font-weight: 600;
        display: inline-block;
        font-size: 12px;
        border-radius: 3px;
        margin-left: 5px;
    }

    .hoteloption3 {
        background-color: #E24B03;
        padding: 2px 8px;
        color: #FFFFFF;
        font-weight: 600;
        display: inline-block;
        font-size: 12px;
        border-radius: 3px;
        margin-left: 5px;
    }

    .summaryRow {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f9f9f9;
        padding: 12px;
    }

    .airline {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .airline img {
        width: 50px;
    }

    .route {
        font-size: 14px;
        text-align: center;
    }

    .toggleDetails {
        cursor: pointer;
        color: #007bff;
        font-weight: bold;
    }

    .flightDetails {
        display: none;
        background: #fff;
        padding: 10px;
    }

    .detailTitle {
        font-size: 14px;
        font-weight: bold;
        margin: 10px 0;
        color: #23ae73;
    }

    .segmentRow {
        display: flex;
        gap: 12px;
        padding: 10px;
        border-top: 1px solid #eee;
        align-items: center;
    }

    .segmentRow img {
        width: 45px;
    }

    .segmentInfo small {
        color: #666;
        font-size: 12px;
    }

    .custom_flight_details .toggleDetails {
        padding: 5px 10px;
        background-color: #eaedef;
        border-radius: 5px;
        margin-left: 10px;
    }

    .custom_flight_details .toggleDetails svg {
        margin-left: 5px;
    }

    .flight_detail_flex {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        border-top: 1px solid #ddd;
        margin-top: 7px;
    }

    .flight_detail_flex .segmentRow {
        border-top: none;
    }

    .flight_detail_flex .layoverTime {
        padding: 2px 10px;
        background-color: #23ae73;
        color: #fff;
        border-radius: 30px;
        margin: 0px 10px;
    }

    .flight_detail_flex .segmentRow img {
        border-radius: 5px;
    }

    .duration_flight_info {
        font-weight: 500;
        color: #000;
    }

    .flight_detail_flex .segmentRow svg {
        vertical-align: sub
    }
</style>
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
            {{-- ================== ACTIVITY ================== --}}
            @if ($type === 'activity')
                <div class="daydetailsbox">
                    <i class="fa fa-pencil"
                        onclick="openPopup('Day {{ $day ?? '' }} Activity - {{ $date ?? '' }}', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')"
                        ></i>
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
                                    <script>
                                        function changeeventimage2268713(img) {
                                            if (img.indexOf('https://') > -1) {
                                                $('#eventimage2268713').attr('src', img);

                                            } else {
                                                $('#eventimage2268713').attr('src', 'http://localhost:8081/API/package_image/' + img);
                                            }

                                            $(".close").trigger("click");
                                            $('#ActionDiv').load('actionpage.php?pid=108998&id=2268713&action=seteventcoverphoto&imagename=' + img);
                                        }
                                    </script>
                                </td>
                                <td width="99%" align="left" valign="top" style="padding-left:10px;">
                                    <div class="eventheading">
                                        <div class="eventsectioniconOrder">2 </div>
                                        <div class="eventsectionicon"><i style="" class="fa fa-picture-o"
                                                aria-hidden="true"></i></div> Langkawi
                                        Island Hopping <span style="color:#FF9900; padding-left:10px;"></span>
                                    </div>
                                    <div class="eventcontent">&nbsp;
                                        Langkawi island hopping is&nbsp;a popular tour that allows visitors to explore
                                        the stunning islands
                                        surrounding Langkawi.&nbsp;It typically involves a boat tour that visits several
                                        islands, often including
                                        spots like Pulau Dayang Bunting (Lake of the Pregnant Maiden) and Pulau Beras
                                        Basah (Wet Rice
                                        Island).&nbsp;These islands are known for their pristine beaches, crystal-clear
                                        waters, and opportunities
                                        for wildlife viewing, especially eagles.&nbsp;</div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- ================== HOTEL ================== --}}
            @elseif($type === 'hotel')
                <div class="daydetailsbox">
                    <div class="hotel-box">
                        <b>Hotel:</b> {{ $item->hotel_name ?? 'No Hotel' }}

                        <div>Room: {{ $item->room_type ?? '-' }}</div>
                        <div>Meal: {{ $item->meal_plan ?? '-' }}</div>
                    </div>
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
                    {{-- ================== DEFAULT ================== --}}
                @else
                    <i class="fa fa-pencil" aria-hidden="true"
                        onclick="openPopup('Day {{ $day ?? '' }} Details ', '{{ route('package-days-items.edit', ['package_days_item' => $item->id ?? 0, 'itinerary_id' => $itineryId ?? 0]) }}')">
                    </i>
            @endif
</div>
@endforeach

@empty

<div class="daywisedetailsdefault">
    <em>No data added for this day</em>
</div>

@endforelse

</div>
