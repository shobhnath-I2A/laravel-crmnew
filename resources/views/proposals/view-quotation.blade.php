<style>
    .popup-box {
        max-width: 50%;
        margin-top: 5px;
    }
</style>
<div class="modal-body">
    <div class="modal-body" id="popcontent">
        <div id="shoquotionbox" style="width:100%;">
            <div style="width:800px; margin:auto; font-family:Arial, Helvetica, sans-serif; font-size:13px;">
                @php
                    $organisation = $settings->get('organisation', collect());
                    $defaultSettings = $settings->get('default', collect());
                    $logo = $defaultSettings->get('invoice_logo');
                    $companyName = $organisation->get('organisation_name') ?: config('app.name');
                    $contactPhone = $organisation->get('invoice_phone');
                    $startDate = \Carbon\Carbon::parse($itinerary?->start_date ?? $query?->startDate);
                    $endDate = \Carbon\Carbon::parse($itinerary?->end_date ?? $query?->endDate);
                    $nights = $startDate->diffInDays($endDate);
                    $days = $nights + 1;
                    $destinationNames = $itinerary?->destinations->pluck('name')->filter()->implode(', ');
                    $destinationNames = $destinationNames ?: ($query?->destinationCity?->name ?? $query?->destination ?? '');
                @endphp
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:13px;">
                    <tbody>
                        <tr>
                            <td align="center" style="padding-bottom:5px;">
                                @if ($logo)
                                    <img src="{{ asset('storage/' . $logo) }}" style="height:54px;" alt="{{ $companyName }}">
                                @endif
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom:5px;"><strong>Dear {{ $query?->name ?? $itinerary?->name }},</strong></td>
                        </tr>
                        <tr>
                            <td style="line-height:25px;">
                                This is {{ $companyName }} and I will be working with you to plan your trip to
                                <strong>{{ $destinationNames }}</strong>.<br>
                                Please find below details for your trip @if ($contactPhone), and feel free to call me at {{ $contactPhone }} @endif.
                            </td>
                        </tr>
                        <tr>
                            <td style="line-height:25px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" style="line-height:25px;">
                                <table width="100%" border="1" cellpadding="5" cellspacing="0"
                                    bordercolor="#CCCCCC" style="font-size:13px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="4" bgcolor="#3187E6"
                                                style="color:#FFFFFF; background-color:#000;"><strong>Query Details</strong></td>
                                        </tr>
                                        <tr>
                                            <td width="25%"><strong>QueryId:</strong></td>
                                            <td width="40%">#{{ $query?->id }}</td>
                                            <td width="15%"><strong>Adult(s):</strong></td>
                                            <td width="20%">{{ $itinerary?->adult ?? $query?->adult ?? 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td width="25%"><strong>Nights:</strong></td>
                                            <td width="40%">{{ $nights }} Nights &amp; {{ $days }} Days</td>
                                            <td width="15%"><strong>Child(s):</strong></td>
                                            <td>{{ $itinerary?->child ?? $query?->child ?? 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td width="25%"><strong>Destination Covered:</strong></td>
                                            <td width="40%">{{ $destinationNames }}</td>
                                            <td width="15%"><strong>Start Date:</strong></td>
                                            <td>{{ $startDate->format('D, d M, Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td width="25%"><strong>Query Date:</strong></td>
                                            <td width="40%">{{ $query?->created_at?->format('d-M-Y') ?? '—' }}</td>
                                            <td width="15%"><strong>End Date:</strong></td>
                                            <td>{{ $endDate->format('D, d M, Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" style="line-height:25px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding:10px; font-size:16px; padding-left:0px;">
                                <strong>{{ $itinerary?->name ?? $query?->name }}</strong>
                            </td>
                        </tr>
                        @if ($packageTotal !== null || $itinerary?->website_cost !== null)
                            @php
                                $quotationPrice = $packageTotal ?? $itinerary->website_cost;
                            @endphp
                            <tr>
                                <td align="left" valign="top" style="line-height:25px;">
                                    <div style="line-height:25px; font-size:20px; text-align:center; padding:10px 0px 20px;">
                                        <strong>Total Package Price:
                                            <span style="color:#CC0000;">₹ {{ number_format((float) $quotationPrice, 2) }}</span>
                                        </strong>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td align="left" valign="top" style="line-height:25px;">
                                <table width="100%" border="0" cellpadding="5" cellspacing="0"
                                    bordercolor="#CCCCCC" style="font-size:13px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" bgcolor="#000000"
                                                style="color:#FFFFFF; background-color:#000;"><strong>Itinerary Details</strong></td>
                                        </tr>
                                        @forelse ($dayItems as $day => $items)
                                            @php
                                                $date = $startDate->copy()->addDays((int) $day - 1);
                                                $daySummary = $items->firstWhere('type', 'daydetail');
                                                $destination = $daySummary?->destination ?? $items->first()?->destination;
                                            @endphp
                                            <tr>
                                                <td width="17%" align="left" bgcolor="#E2E2E2">
                                                    <strong>{{ $date->format('d M Y') }}</strong>
                                                </td>
                                                <td width="86%" align="left" bgcolor="#F4F4F4">
                                                    <strong>Day {{ $day }}:</strong>
                                                    {{ $daySummary?->name ?: $destination?->name ?: $destinationNames }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="left" valign="top">
                                                    @if ($daySummary?->description)
                                                        <div style="padding:10px 0px; margin-bottom:10px; border-bottom:1px solid #ddd;">
                                                            {!! nl2br(e(strip_tags($daySummary->description))) !!}
                                                        </div>
                                                    @endif
                                                    @foreach ($items->where('type', '!=', 'daydetail') as $item)
                                                        @php
                                                            $type = strtolower($item->type);
                                                            $title = match ($type) {
                                                                'accommodation' => $item->hotelDetail?->hotel?->name ?: $item->name,
                                                                'activity' => $item->activity?->name ?: $item->name,
                                                                'transportation' => $item->transportationMaster?->name ?: $item->name,
                                                                'flight' => $item->name ?: 'Flight',
                                                                default => $item->name ?: ucfirst($type),
                                                            };
                                                            $description = $item->description
                                                                ?: ($type === 'activity' ? $item->activity?->details : null)
                                                                ?: ($type === 'transportation' ? $item->transportationMaster?->details : null);
                                                        @endphp
                                                        <div style="margin-bottom:20px;">
                                                            <strong>{{ ucfirst($type) }} Included:</strong> {{ $title }}
                                                            @if ($type === 'flight' && $item->flightDetail)
                                                                @if ($item->flightDetail->flight_no)
                                                                    ({{ $item->flightDetail->flight_no }})
                                                                @endif
                                                                @if ($item->flightDetail->from_destination || $item->flightDetail->to_destination)
                                                                    - {{ $item->flightDetail->from_destination }}
                                                                    @if ($item->flightDetail->from_destination && $item->flightDetail->to_destination)
                                                                        to
                                                                    @endif
                                                                    {{ $item->flightDetail->to_destination }}
                                                                @endif
                                                            @endif
                                                            @if ($description)
                                                                <div>{!! strip_tags($description) !!}</div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" align="center" style="padding:15px;">
                                                    Itinerary details are not available.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" style="line-height:25px;">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="text-align:center; margin-top:20px;">
            <a href="#" class="nav-link active show"
                onclick="$('#shoquotionbox').hide();$('#popcontent').load('loadpopup.php?action=shareitinerary&amp;pid={{ $itinerary?->id ?? 0 }}');$('.modal-dialog').css('max-width','700px');"
                style="width:300px; margin:auto; background-color:#000; color:#fff; border-radius:5px; font-size:14px; font-weight:600;">
                Send To Email
            </a>
        </div>
        <a href="#"></a>
        <script>
            $(document).ready(function() {
                $('.custom-validation').validate({
                    submitHandler: function(form) {
                        $('.custom-validation #savingbutton').prop('disabled', true).val('Saving...');
                        form.submit();
                    }
                });
            });
        </script>
    </div>
</div>
