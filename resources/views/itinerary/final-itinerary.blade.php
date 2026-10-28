@extends(($isPublic ?? false) ? 'layouts.public' : 'layouts.app')

@section('content')
    </div>
    <div class="wrapper">
        @unless ($isPublic ?? false)
            @include('itinerary.partials.top-nav', ['itinerary' => $itinerary])
        @endunless

        @php
            $startDate = \Carbon\Carbon::parse($itinerary->start_date);
            $endDate = \Carbon\Carbon::parse($itinerary->end_date);
            $infantCount = (int) ($itinerary->queryData?->infant ?? 0);
            $travellerCount = (int) $itinerary->adult + (int) $itinerary->child + $infantCount;
            $coverImage = $itinerary->packageTheme?->image;
            $policySections = [
                [
                    'title' => ($packageSettings['inclusions_title'] ?? null) ?: 'Inclusions',
                    'content' => $packageSettings['package_inclusions'] ?? null,
                ],
                [
                    'title' => ($packageSettings['exclusions_title'] ?? null) ?: 'Exclusions',
                    'content' => $packageSettings['package_exclusions'] ?? null,
                ],
                [
                    'title' => ($packageSettings['important_tips_title'] ?? null) ?: 'Important tips',
                    'content' => $packageSettings['package_important_tips'] ?? null,
                ],
                [
                    'title' => ($packageSettings['travel_information_title'] ?? null) ?: 'Travel information',
                    'content' => $packageSettings['package_travel_info'] ?? null,
                ],
            ];
        @endphp

        <style>
            .final-itinerary {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 24px 40px;
            }

            .final-cover {
                min-height: 280px;
                display: flex;
                align-items: flex-end;
                background: linear-gradient(135deg, #164e63, #0f766e);
                background-position: center;
                background-size: cover;
                color: #fff;
                margin: 110px 0 24px;
                border-radius: 8px;
                overflow: hidden;
            }

            @if ($isPublic ?? false)
                .final-cover {
                    margin-top: 24px;
                }
            @endif

            .final-cover-content {
                width: 100%;
                padding: 32px;
                background: linear-gradient(transparent, rgb(0 0 0 / 72%));
            }

            .final-cover h1 {
                font-size: 32px;
                margin: 0 0 8px;
            }

            .final-summary,
            .final-about {
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 0 1.25rem rgb(108 118 134 / 12%);
                margin-bottom: 20px;
                padding: 22px;
            }

            .final-summary {
                display: flex;
                flex-wrap: wrap;
                gap: 24px;
                align-items: center;
            }

            .final-summary-item {
                min-width: 135px;
            }

            .final-summary-label {
                color: #667085;
                display: block;
                font-size: 12px;
                margin-bottom: 4px;
                text-transform: uppercase;
            }

            .final-day {
                margin: 26px 0;
            }

            .final-day-heading {
                border-top: 1px solid #d0d5dd;
                border-bottom: 1px solid #d0d5dd;
                margin-bottom: 16px;
                padding: 10px 2px;
            }

            .final-day-heading h2 {
                font-size: 16px;
                font-weight: 600;
            }

            .final-day-destination {
                color: #667085;
                display: block;
                font-size: 13px;
                margin-top: 3px;
            }

            .final-item {
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                min-height: 150px;
                background: #fff;
                border: 1px solid #e1e5ea;
                border-radius: 7px;
                box-shadow: 0 2px 8px rgb(16 24 40 / 5%);
                margin-bottom: 14px;
                overflow: hidden;
            }

            .final-item-image {
                min-height: 150px;
                background: #f1f5f9;
            }

            .final-item-image img {
                display: block;
                width: 100%;
                height: 100%;
                min-height: 150px;
                object-fit: cover;
            }

            .final-item-image-placeholder {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                min-height: 150px;
                color: #94a3b8;
                font-size: 26px;
            }

            .final-item-content {
                align-self: center;
                padding: 18px;
            }

            .final-item-title {
                font-size: 17px;
                font-weight: 700;
                margin: 0 0 8px;
            }

            .final-item-meta {
                color: #667085;
                font-size: 13px;
                margin-bottom: 8px;
            }

            .final-item-description {
                color: #344054;
                font-size: 14px;
                line-height: 1.5;
            }

            .final-item-summary {
                display: block;
                min-height: 0;
                padding: 14px;
            }

            .final-item-summary .final-item-content {
                padding: 0;
            }

            .final-policy {
                margin: 28px 0;
            }

            .final-policy-heading {
                border-top: 1px solid #d0d5dd;
                border-bottom: 1px solid #d0d5dd;
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 20px;
                padding: 14px 8px;
                text-align: center;
            }

            .final-policy-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
            }

            .final-policy-card {
                background: #fff;
                border: 1px solid #e1e5ea;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgb(16 24 40 / 5%);
                min-height: 210px;
                padding: 14px;
            }

            .final-policy-card h3 {
                font-size: 15px;
                font-weight: 600;
                margin: 0 0 10px;
            }

            .final-policy-content {
                max-height: 235px;
                overflow-y: auto;
                overflow-wrap: anywhere;
            }

            .final-empty {
                color: #667085;
                padding: 28px;
                text-align: center;
            }

            @media (max-width: 640px) {
                .final-itinerary {
                    padding: 0 12px 24px;
                }

                .final-policy-grid {
                    grid-template-columns: 1fr;
                }

                .final-policy-card {
                    min-height: 0;
                }

                .final-cover {
                    min-height: 220px;
                    margin-top: 90px;
                }

                .final-cover-content {
                    padding: 22px;
                }

                .final-cover h1 {
                    font-size: 25px;
                }

                .final-item {
                    grid-template-columns: 1fr;
                }

                .final-item-image,
                .final-item-image img {
                    max-height: 220px;
                }
            }
        </style>

        <main class="final-itinerary">
            <header class="final-cover"
                @if ($coverImage) style="background-image: linear-gradient(0deg, rgb(0 0 0 / 70%), rgb(0 0 0 / 8%)), url('{{ \Illuminate\Support\Str::startsWith($coverImage, ['http://', 'https://']) ? $coverImage : asset($coverImage) }}')" @endif>
                <div class="final-cover-content">
                    <h1>{{ $itinerary->name }}</h1>
                    <div>
                        {{ $startDate->format('d M Y') }} – {{ $endDate->format('d M Y') }}
                        @if ($itinerary->queryData?->name)
                            <span>&nbsp;|&nbsp; {{ $itinerary->queryData->name }}</span>
                        @endif
                    </div>
                </div>
            </header>

            <section class="final-summary" aria-label="Trip summary">
                <div class="final-summary-item">
                    <span class="final-summary-label">Duration</span>
                    <strong>{{ $startDate->diffInDays($endDate) }} nights / {{ $startDate->diffInDays($endDate) + 1 }} days</strong>
                </div>
                <div class="final-summary-item">
                    <span class="final-summary-label">Travelers</span>
                    <strong>
                        {{ $itinerary->adult }} adult{{ (int) $itinerary->adult === 1 ? '' : 's' }}
                        @if ((int) $itinerary->child > 0)
                            , {{ $itinerary->child }} child{{ (int) $itinerary->child === 1 ? '' : 'ren' }}
                        @endif
                        @if ($infantCount > 0)
                            , {{ $infantCount }} infant{{ $infantCount === 1 ? '' : 's' }}
                        @endif
                        ({{ $travellerCount }} total)
                    </strong>
                </div>
                @if (($showPrice ?? true) && $packageTotal !== null)
                    <div class="final-summary-item">
                        <span class="final-summary-label">Total{{ $selectedPriceOption ? ' (Hotel Option ' . $selectedPriceOption . ')' : '' }}</span>
                        <strong>₹ {{ number_format((float) $packageTotal, 2) }}</strong>
                    </div>
                @elseif (($showPrice ?? true) && $itinerary->website_cost !== null)
                    <div class="final-summary-item">
                        <span class="final-summary-label">Package price</span>
                        <strong>₹ {{ number_format((float) $itinerary->website_cost, 2) }}</strong>
                    </div>
                @endif
                @if (($showPrice ?? true) && $itinerary->website_validity)
                    <div class="final-summary-item">
                        <span class="final-summary-label">Price valid until</span>
                        <strong>{{ \Carbon\Carbon::parse($itinerary->website_validity)->format('d M Y') }}</strong>
                    </div>
                @endif
            </section>

            @forelse ($dayItems as $day => $items)
                @php
                    $date = $startDate->copy()->addDays((int) $day - 1);
                    $daySummary = $items->firstWhere('type', 'daydetail');
                    $destination = $daySummary?->destination ?? $items->first()?->destination;
                @endphp
                <section class="final-day">
                    <div class="final-day-heading">
                        <h2 style="margin:0;">Day {{ $day }} · {{ $date->format('D, d M Y') }}</h2>
                        @if ($destination)
                            <span class="final-day-destination">{{ $destination->name }}</span>
                        @endif
                    </div>

                    @if ($daySummary && ($daySummary->name || $daySummary->description))
                        <div class="final-item final-item-summary">
                            <div class="final-item-content">
                                @if ($daySummary->name)
                                    <h3 class="final-item-title">{{ $daySummary->name }}</h3>
                                @endif
                                @if ($daySummary->description)
                                    <div class="final-item-description">{{ strip_tags($daySummary->description) }}</div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @foreach ($items->where('type', '!=', 'daydetail') as $item)
                        @php
                            $type = strtolower($item->type);
                            $detail = $item->hotelDetail;
                            $flight = $item->flightDetail;
                            $title = match ($type) {
                                'accommodation' => $detail?->hotel?->name ?: $item->name,
                                'activity' => $item->activity?->name ?: $item->name,
                                'transportation' => $item->transportationMaster?->name ?: $item->name,
                                'flight' => $item->name ?: 'Flight',
                                default => $item->name ?: ucfirst($type),
                            };
                            $description = $item->description
                                ?: ($type === 'activity' ? $item->activity?->details : null)
                                ?: ($type === 'transportation' ? $item->transportationMaster?->details : null);
                            $image = match ($type) {
                                'accommodation' => $detail?->hotel?->image,
                                'activity' => $item->activity?->image,
                                'transportation' => $item->transportationMaster?->image,
                                default => null,
                            };
                            $imageUrl = $image
                                ? (\Illuminate\Support\Str::startsWith($image, ['http://', 'https://'])
                                    ? $image
                                    : asset($image))
                                : null;
                        @endphp
                        <article class="final-item">
                            <div class="final-item-image">
                                @if ($imageUrl)
                                    <img src="{{ $imageUrl }}" alt="{{ $title }}" loading="lazy">
                                @else
                                    <div class="final-item-image-placeholder" aria-hidden="true">
                                        <i class="fa fa-picture-o"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="final-item-content">
                                <h3 class="final-item-title">
                                    @switch($type)
                                        @case('accommodation') <i class="fa fa-bed" aria-hidden="true"></i> @break
                                        @case('flight') <i class="fa fa-plane" aria-hidden="true"></i> @break
                                        @case('transportation') <i class="fa fa-car" aria-hidden="true"></i> @break
                                        @case('activity') <i class="fa fa-map-marker" aria-hidden="true"></i> @break
                                        @default <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    @endswitch
                                    {{ $title ?: ucfirst($type) }}
                                </h3>

                                @if ($type === 'accommodation' && $detail)
                                    <div class="final-item-meta">
                                        @if ($detail->check_in_date)
                                            Check-in: {{ \Carbon\Carbon::parse($detail->check_in_date)->format('d M Y') }}
                                        @endif
                                        @if ($detail->check_out_date)
                                            &nbsp;|&nbsp; Check-out: {{ \Carbon\Carbon::parse($detail->check_out_date)->format('d M Y') }}
                                        @endif
                                        @if ($detail->room_name || $detail->room_type)
                                            &nbsp;|&nbsp; Room: {{ $detail->room_name ?: $detail->room_type }}
                                        @endif
                                        @if ($detail->meal_plan)
                                            &nbsp;|&nbsp; Meal: {{ $detail->meal_plan }}
                                        @endif
                                    </div>
                                @elseif ($type === 'flight' && $flight)
                                    <div class="final-item-meta">
                                        @if ($flight->flight_no) {{ $flight->flight_no }} @endif
                                        @if ($flight->from_destination || $flight->to_destination)
                                            &nbsp;{{ $flight->from_destination }} → {{ $flight->to_destination }}
                                        @endif
                                        @if ($flight->flight_duration)
                                            &nbsp;|&nbsp; {{ $flight->flight_duration }}
                                        @endif
                                    </div>
                                @elseif ($item->start_time || $item->end_time)
                                    <div class="final-item-meta">
                                        @if ($item->start_time) {{ \Carbon\Carbon::parse($item->start_time)->format('g:i A') }} @endif
                                        @if ($item->start_time && $item->end_time) – @endif
                                        @if ($item->end_time) {{ \Carbon\Carbon::parse($item->end_time)->format('g:i A') }} @endif
                                    </div>
                                @endif

                                @if ($description)
                                    <div class="final-item-description">{!! strip_tags($description) !!}</div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </section>
            @empty
                <section class="final-day final-empty">
                    <p style="margin:0;">No itinerary day details have been added yet.</p>
                </section>
            @endforelse

            @if (collect($policySections)->contains(fn ($section) => filled($section['content'] ?? null)))
                <section class="final-policy">
                    <h2 class="final-policy-heading">IMPORTANT TIPS</h2>

                    <div class="final-policy-grid">
                        @foreach ($policySections as $section)
                            @if (filled($section['content'] ?? null))
                                <article class="final-policy-card">
                                    <h3>{{ $section['title'] }}</h3>

                                    <div class="final-policy-content">
                                        {!! $section['content'] !!}
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </section>
            @endif

            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="itiday" style="text-align:center;">Comments</div>
                    <div style="padding-bottom:20px;">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body" style="padding:20px !important;" id="loadpackagecommnet">
                                    @forelse ($packageComments ?? collect() as $packageComment)
                                        <div style="border-bottom:1px solid #eee; padding:12px 0;">
                                            <div>{{ $packageComment->comment }}</div>
                                            <small style="color:#777;">{{ optional($packageComment->created_at)->format('d M Y, h:i A') }}</small>
                                        </div>
                                    @empty
                                        <div style="text-align:center; padding:20px 0px;">No Comment Available</div>
                                    @endforelse

                                    @if (!($isPublic ?? false) && $package)
                                        <form id="package-comment-form" class="custom-validation" novalidate method="post" action="{{ route('package-comments.store') }}">
                                            @csrf
                                            <input name="packageid" type="hidden" value="{{ $package->id }}">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">
                                                            <textarea name="comment" id="comment" style="border: 2px solid #ddd; padding: 10px; font-size: 14px; width: 100%; border-radius: 5px;" placeholder="Enter Your Comment" required></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="padding-top:10px;"><button type="submit" id="page2" class="btn btn-secondary btn-sm waves-effect" style="float:right; font-size:12px;">Submit Comment</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                        <script>
                                            (function () {
                                                var form = document.getElementById('package-comment-form');
                                                if (!form) return;

                                                form.addEventListener('submit', function (event) {
                                                    event.preventDefault();
                                                    event.stopPropagation();

                                                    var submitButton = form.querySelector('button[type="submit"]');
                                                    submitButton.disabled = true;

                                                    fetch(form.action, {
                                                        method: 'POST',
                                                        headers: {
                                                            'Accept': 'application/json',
                                                            'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value
                                                        },
                                                        body: new FormData(form)
                                                    })
                                                    .then(function (response) {
                                                        if (!response.ok) {
                                                            return response.json().then(function (data) {
                                                                throw new Error(data.message || 'Unable to submit comment.');
                                                            });
                                                        }
                                                        return response.json();
                                                    })
                                                    .then(function (response) {
                                                        var noComment = document.querySelector('#loadpackagecommnet div[style*="text-align:center"]');
                                                        if (noComment) noComment.remove();

                                                        var wrapper = document.createElement('div');
                                                        wrapper.style.cssText = 'border-bottom:1px solid #eee; padding:12px 0;';

                                                        var text = document.createElement('div');
                                                        text.textContent = response.comment.comment;
                                                        wrapper.appendChild(text);

                                                        var date = document.createElement('small');
                                                        date.style.color = '#777';
                                                        date.textContent = response.comment.created_at
                                                            ? new Date(response.comment.created_at).toLocaleString()
                                                            : '';
                                                        wrapper.appendChild(date);

                                                        var commentsContainer = document.getElementById('loadpackagecommnet');
                                                        commentsContainer.insertBefore(wrapper, form);
                                                        form.querySelector('[name="comment"]').value = '';
                                                    })
                                                    .catch(function (error) {
                                                        alert(error.message || 'Unable to submit comment.');
                                                    })
                                                    .finally(function () {
                                                        submitButton.disabled = false;
                                                    });
                                                });
                                            })();
                                        </script>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display:none;">
                    <div class="col-md-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <h5 style="line-height: 32px; margin-top:0px;">Inclusion / Exclusion </h5>
                                <p>Thanks and Regards</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div style="width:100%; background-color:#343642; color:#fff; overflow:hidden; padding:20px 0px; ">
                <div class="container-fluid" style="padding-left:0px;">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="card-body">
                                    <div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="color:#fff;">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <div style="width:50px; height:50px; overflow:hidden; margin-right:10px; border-radius: 100%;">
                                                            @if ($itinerary->addedBy?->profile_image)
                                                                <img src="{{ asset('uploads/profile/' . $itinerary->addedBy->profile_image) }}" style="width:100%; height:auto; min-height:100%;">
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="font-size:16px; margin-bottom:0px; font-weight:800;">{{ $organisationSettings['organisation_name'] ?? ($itinerary->addedBy?->submit_name ?: $itinerary->addedBy?->name) }}</div>
                                                        <div style="font-size:14px; margin-bottom:0px;">{{ trim(($itinerary->addedBy?->name ?? '') . ' ' . ($itinerary->addedBy?->last_name ?? '')) }}</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#fff;">
                                            <tbody>
                                                <tr>
                                                    <td width="50%" align="left">Email address</td>
                                                    <td width="50%" align="right">{{ $organisationSettings['invoice_email'] ?? $itinerary->addedBy?->email }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-6">
                                <div class="card-body">
                                    <div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="color:#fff;">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <div style="width:50px; height:50px; overflow:hidden; margin-right:10px; border-radius: 100%;"> </div>
                                                    </td>
                                                    <td> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #ffffff30;">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#fff;">
                                            <tbody>
                                                <tr>
                                                    <td width="50%" align="left">Phone Number
                                                    </td>
                                                    <td width="50%" align="right">{{ $organisationSettings['invoice_phone'] ?? trim(($itinerary->addedBy?->mobile_code ? '+' . $itinerary->addedBy->mobile_code . ' ' : '') . ($itinerary->addedBy?->mobile ?? '')) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
