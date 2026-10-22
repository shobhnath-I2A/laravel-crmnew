<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $itinerary->name }}</title>
    <style>
        @page { size: A4 portrait; margin: 12mm; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #3f3f46; font-family: DejaVu Sans, sans-serif; font-size: 11px; line-height: 1.55; }
        h1, h2, h3, p { margin-top: 0; }
        h1 { margin-bottom: 6px; color: #6cc072; font-size: 27px; line-height: 1.2; }
        h2 { margin-bottom: 12px; color: #6cc072; font-size: 21px; }
        h3 { margin-bottom: 7px; color: #252525; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; }
        tr { page-break-inside: avoid; }
        .page-break { page-break-before: always; }
        .accent { color: #6cc072; }
        .muted { color: #666; }
        .header { padding: 12px 0 18px; border-bottom: 2px solid #eefaf0; }
        .header-kicker { margin-bottom: 5px; color: #888; font-size: 16px; }
        .trip-title { margin-top: 10px; color: #222; font-size: 17px; font-weight: bold; }
        .badge { display: inline-block; margin: 5px 6px 0 0; padding: 5px 12px; border-radius: 15px; background: #e4e2df; color: #666; font-weight: bold; }
        .summary { margin-top: 18px; padding: 18px; border-radius: 12px; background: #eefaf0; }
        .summary-label { font-size: 15px; font-weight: bold; }
        .summary-total { margin-top: 7px; color: #6cc072; font-size: 22px; font-weight: bold; }
        .summary-note { margin-top: 5px; color: #666; }
        .section-title { margin: 22px 0 10px; padding-bottom: 7px; border-bottom: 1px solid #ccc; color: #6cc072; font-size: 20px; }
        .data-table th { background: #eee; font-weight: bold; text-align: left; }
        .data-table th, .data-table td { padding: 7px; border: 1px solid #ccc; vertical-align: top; }
        .day-head { margin: 18px 0 10px; padding: 9px 10px; background: #eefaf0; color: #222; font-size: 17px; font-weight: bold; }
        .day-head-date { float: right; font-size: 13px; }
        .item { margin-bottom: 12px; padding: 14px; border-bottom: 1px solid #ccc; }
        .item-summary { padding: 12px; border: 1px solid #ddd; border-radius: 5px; }
        .item-image { width: 35%; padding-right: 16px; vertical-align: top; }
        .item-image img { display: block; width: 100%; max-height: 170px; object-fit: cover; }
        .item-image-placeholder { height: 120px; background: #eefaf0; }
        .item-content { width: 65%; vertical-align: top; }
        .item-kind { margin-bottom: 3px; color: #6cc072; font-size: 10px; font-weight: bold; text-transform: uppercase; }
        .item-meta { margin: 6px 0; color: #666; font-size: 10px; }
        .policy-block { margin-bottom: 18px; page-break-inside: avoid; }
        .policy-block h3 { color: #6cc072; font-size: 16px; }
        .policy-content ul { padding-left: 20px; }
        .contact { margin-top: 18px; padding: 22px; border-radius: 10px; background: #eefaf0; }
        .small { font-size: 10px; }
    </style>
</head>
<body>
    @php
        $startDate = \Carbon\Carbon::parse($itinerary->start_date);
        $endDate = \Carbon\Carbon::parse($itinerary->end_date);
        $nightCount = $startDate->diffInDays($endDate);
        $infantCount = (int) ($itinerary->queryData?->infant ?? 0);
        $destinations = $itinerary->destinations->pluck('name')->filter()->implode(', ');
        $clientName = $itinerary->queryData?->name ?: $itinerary->queryData?->submitName;
        $flights = $dayItems->flatten(1)->where('type', 'flight');
        $overviewItems = $dayItems->flatten(1)->where('type', '!=', 'daydetail');
        $price = $packageTotal ?? $itinerary->website_cost;
        $policySections = [
            [
                'title' => $packageSettings['inclusions_title'] ?? 'Inclusions',
                'content' => $packageSettings['package_inclusions'] ?? null,
            ],
            [
                'title' => $packageSettings['exclusions_title'] ?? 'Exclusions',
                'content' => $packageSettings['package_exclusions'] ?? null,
            ],
            [
                'title' => $packageSettings['important_tips_title'] ?? 'Important tips',
                'content' => $packageSettings['package_important_tips'] ?? null,
            ],
            [
                'title' => $packageSettings['travel_information_title'] ?? 'Travel information',
                'content' => $packageSettings['package_travel_info'] ?? null,
            ],
            [
                'title' => 'Payment and package terms',
                'content' => $defaultSettings['bank_information'] ?? $defaultSettings['package_terms'] ?? null,
            ],
        ];
    @endphp

    <section class="header">
        @if ($clientName)
            <div class="header-kicker">{{ $clientName }} <span class="muted">trip to</span></div>
        @endif
        <h1>{{ $destinations ?: $itinerary->name }}</h1>
        <div>
            <span class="badge">{{ $nightCount }}N / {{ $nightCount + 1 }}D</span>
            <span class="badge">{{ $startDate->format('d M Y') }} – {{ $endDate->format('d M Y') }}</span>
            <span class="badge">
                {{ (int) $itinerary->adult }} Adults
                @if ((int) $itinerary->child > 0) · {{ (int) $itinerary->child }} Children @endif
                @if ($infantCount > 0) · {{ $infantCount }} Infants @endif
            </span>
        </div>
        <div class="trip-title">{{ $itinerary->name }}</div>
    </section>

    <section class="summary">
        <div class="summary-label">Total Cost Including Tax</div>
        <div class="summary-note">
            @if ($selectedPriceOption)
                Hotel Option {{ $selectedPriceOption }}
            @endif
            @if ($itinerary->website_validity)
                &nbsp;|&nbsp; Valid until {{ \Carbon\Carbon::parse($itinerary->website_validity)->format('d M Y') }}
            @endif
        </div>
        @if ($price !== null)
            <div class="summary-total">₹ {{ number_format((float) $price, 2) }}</div>
        @endif
        <div class="summary-note">
            For {{ (int) $itinerary->adult }} Adult{{ (int) $itinerary->adult === 1 ? '' : 's' }}
            @if ((int) $itinerary->child > 0)
                and {{ (int) $itinerary->child }} Child{{ (int) $itinerary->child === 1 ? '' : 'ren' }}
            @endif
            @if ($infantCount > 0)
                and {{ $infantCount }} Infant{{ $infantCount === 1 ? '' : 's' }}
            @endif
        </div>
    </section>

    <h2 class="section-title">Itinerary Overview</h2>
    <table class="data-table">
        <thead>
            <tr><th style="width:70%;">Destination / Place</th><th style="width:30%;">Date</th></tr>
        </thead>
        <tbody>
            @forelse ($overviewItems as $item)
                @php
                    $itemName = match ($item->type) {
                        'accommodation' => $item->hotelDetail?->hotel?->name ?: $item->name,
                        'activity' => $item->activity?->name ?: $item->name,
                        'transportation' => $item->transportationMaster?->name ?: $item->name,
                        'flight' => $item->name ?: $item->flightDetail?->flight_no,
                        default => $item->name,
                    };
                    $overviewDate = $startDate->copy()->addDays(max((int) $item->day - 1, 0));
                @endphp
                <tr>
                    <td>{{ $itemName ?: ucfirst($item->type) }}</td>
                    <td>{{ $overviewDate->format('d M Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="2">Itinerary details will be provided soon.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="page-break"></div>
    <h2 class="section-title">Vacation Itinerary</h2>
    <table>
        <tr>
            <td style="width:60%;padding:8px 12px 14px 0;vertical-align:top;">
                <h3>Client Information</h3>
                <table class="data-table">
                    <tr><th style="width:35%;">Name</th><td>{{ $clientName ?: '—' }}</td></tr>
                    <tr><th>Phone Number</th><td>{{ $itinerary->queryData?->mobile ?: '—' }}</td></tr>
                    <tr><th>Start Date</th><td>{{ $startDate->format('d M Y') }}</td></tr>
                    <tr><th>End Date</th><td>{{ $endDate->format('d M Y') }}</td></tr>
                </table>
            </td>
            <td style="width:40%;padding:8px 0 14px 12px;vertical-align:top;">
                <h3>Trip Details</h3>
                <table class="data-table">
                    <tr><th>Duration</th><td>{{ $nightCount }} Nights / {{ $nightCount + 1 }} Days</td></tr>
                    <tr><th>Destinations</th><td>{{ $destinations ?: '—' }}</td></tr>
                    <tr><th>Adults</th><td>{{ (int) $itinerary->adult }}</td></tr>
                    <tr><th>Children</th><td>{{ (int) $itinerary->child }}</td></tr>
                    <tr><th>Infants</th><td>{{ $infantCount }}</td></tr>
                </table>
            </td>
        </tr>
    </table>

    @if ($flights->isNotEmpty())
        <h3 class="section-title">Flight Details</h3>
        <table class="data-table">
            <thead>
                <tr><th>Flight</th><th>Date</th><th>Duration</th><th>Flight No.</th></tr>
            </thead>
            <tbody>
                @foreach ($flights as $flightItem)
                    <tr>
                        <td>{{ $flightItem->flightDetail?->from_destination }}{{ $flightItem->flightDetail?->from_destination && $flightItem->flightDetail?->to_destination ? ' → ' : '' }}{{ $flightItem->flightDetail?->to_destination ?: $flightItem->name }}</td>
                        <td>{{ $startDate->copy()->addDays(max((int) $flightItem->day - 1, 0))->format('d M Y') }}</td>
                        <td>{{ $flightItem->flightDetail?->flight_duration ?: '—' }}</td>
                        <td>{{ $flightItem->flightDetail?->flight_no ?: '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="page-break"></div>
    <h2 class="section-title">Day Wise Details</h2>
    @forelse ($dayItems as $day => $items)
        @php
            $date = $startDate->copy()->addDays((int) $day - 1);
            $daySummary = $items->firstWhere('type', 'daydetail');
            $destination = $daySummary?->destination ?? $items->first()?->destination;
        @endphp
        <div class="day-head">
            Day {{ $day }}
            <span class="day-head-date">{{ $date->format('D, d M Y') }}</span>
            <div class="small muted">{{ $destination?->name }}</div>
        </div>

        @if ($daySummary && ($daySummary->name || $daySummary->description))
            <div class="item item-summary">
                @if ($daySummary->name)<h3>{{ $daySummary->name }}</h3>@endif
                @if ($daySummary->description)<div>{!! nl2br(e(strip_tags($daySummary->description))) !!}</div>@endif
            </div>
        @endif

        @foreach ($items->where('type', '!=', 'daydetail') as $item)
            @php
                $type = strtolower($item->type);
                $hotel = $item->hotelDetail;
                $flight = $item->flightDetail;
                $title = match ($type) {
                    'accommodation' => $hotel?->hotel?->name ?: $item->name,
                    'activity' => $item->activity?->name ?: $item->name,
                    'transportation' => $item->transportationMaster?->name ?: $item->name,
                    'flight' => $item->name ?: 'Flight',
                    default => $item->name ?: ucfirst($type),
                };
                $description = $item->description
                    ?: ($type === 'activity' ? $item->activity?->details : null)
                    ?: ($type === 'transportation' ? $item->transportationMaster?->details : null);
            @endphp
            <div class="item">
                <table>
                    <tr>
                        <td class="item-image">
                            @if ($item->pdf_image)
                                <img src="{{ $item->pdf_image }}" alt="{{ $title }}">
                            @else
                                <div class="item-image-placeholder"></div>
                            @endif
                        </td>
                        <td class="item-content">
                            <div class="item-kind">{{ ucfirst($type) }}</div>
                            <h3>{{ $title ?: ucfirst($type) }}</h3>

                            @if ($type === 'accommodation' && $hotel)
                                <div class="item-meta">
                                    @if ($hotel->check_in_date) Check-in: {{ $hotel->check_in_date }} @endif
                                    @if ($hotel->check_out_date) &nbsp;|&nbsp; Check-out: {{ $hotel->check_out_date }} @endif
                                </div>
                                <div>
                                    @if ($hotel->room_name || $hotel->room_type)
                                        <strong>Room:</strong> {{ $hotel->room_name ?: $hotel->room_type }}
                                    @endif
                                    @if ($hotel->meal_plan)
                                        &nbsp;|&nbsp; <strong>Meal:</strong> {{ $hotel->meal_plan }}
                                    @endif
                                    @if ($hotel->hotel_options)
                                        &nbsp;|&nbsp; <strong>Option:</strong> {{ $hotel->hotel_options }}
                                    @endif
                                </div>
                            @elseif ($type === 'flight' && $flight)
                                <div class="item-meta">
                                    {{ $flight->flight_no }}
                                    @if ($flight->from_destination || $flight->to_destination)
                                        &nbsp;|&nbsp; {{ $flight->from_destination }} → {{ $flight->to_destination }}
                                    @endif
                                    @if ($flight->flight_duration)
                                        &nbsp;|&nbsp; {{ $flight->flight_duration }}
                                    @endif
                                </div>
                            @elseif ($item->start_time || $item->end_time)
                                <div class="item-meta">
                                    @if ($item->start_time) {{ \Carbon\Carbon::parse($item->start_time)->format('g:i A') }} @endif
                                    @if ($item->start_time && $item->end_time) – @endif
                                    @if ($item->end_time) {{ \Carbon\Carbon::parse($item->end_time)->format('g:i A') }} @endif
                                </div>
                            @endif

                            @if ($description)
                                <div>{!! nl2br(e(strip_tags($description))) !!}</div>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    @empty
        <p class="muted">No day-wise itinerary details have been added.</p>
    @endforelse

    @if (collect($policySections)->contains(fn ($section) => filled($section['content'])))
        <div class="page-break"></div>
        <h2 class="section-title">Policy</h2>
        @foreach ($policySections as $section)
            @if (filled($section['content']))
                <div class="policy-block">
                    <h3>{{ $section['title'] }}</h3>
                    <div class="policy-content">{!! $section['content'] !!}</div>
                </div>
            @endif
        @endforeach
    @endif

    @if ($organisationSettings->isNotEmpty())
        <div class="page-break"></div>
        <h2 class="section-title">Get in touch</h2>
        <div class="contact">
            @if ($organisationSettings['organisation_name'] ?? null)
                <h2 style="margin-bottom:8px;">{{ $organisationSettings['organisation_name'] }}</h2>
            @endif
            @if ($organisationSettings['invoice_phone'] ?? null)
                <div><strong>Call:</strong> {{ $organisationSettings['invoice_phone'] }}</div>
            @endif
            @if ($organisationSettings['invoice_email'] ?? null)
                <div><strong>Email:</strong> {{ $organisationSettings['invoice_email'] }}</div>
            @endif
            @if ($organisationSettings['address'] ?? null)
                <div><strong>Address:</strong> {{ $organisationSettings['address'] }}</div>
            @endif
        </div>
    @endif
</body>
</html>
