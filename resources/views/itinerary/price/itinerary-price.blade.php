@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
       @include('itinerary.partials.top-nav', ['itinerary' => $itinerary])


        <style>
            .hoteloption1 {
                background-color: #4FBDFF;
                padding: 2px 8px;
                color: #FFFFFF;
                font-weight: 600;
                display: inline-block;
                font-size: 12px;
                border-radius: 3px;
            }

            .hoteloption2 {
                background-color: #04BF58;
                padding: 2px 8px;
                color: #FFFFFF;
                font-weight: 600;
                display: inline-block;
                font-size: 12px;
                border-radius: 3px;
            }

            .hoteloption3 {
                background-color: #E24B03;
                padding: 2px 8px;
                color: #FFFFFF;
                font-weight: 600;
                display: inline-block;
                font-size: 12px;
                border-radius: 3px;
            }



            .bordertable tr td {
                border: 1px solid #ddd !important;
                background-color: #fff;
                padding: 10px !important;
            }


            .hoteloption1td {
                background-color: #4FBDFF !important;
                color: #FFFFFF !important;
                font-weight: 600;
            }

            .hoteloption2td {
                background-color: #04BF58 !important;
                color: #FFFFFF !important;
                font-weight: 600;
            }

            .hoteloption3td {
                background-color: #E24B03 !important;
                color: #FFFFFF !important;
                font-weight: 600;
            }
        </style>

        <div style="margin-left: 65px; margin-right: 25px; margin-top: 110px !important; padding-bottom: 10px;">
            <div class="main-content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <h4>{{ $itinerary->name ?? '' }} <span style="color: #353535; font-size: 14px; margin-top: 2px; float: right;"> {{ $itinerary->destinations->pluck('name')->implode(', ') }} - Adult: {{ $itinerary->adult ?? '' }} | Child: {{ $itinerary->child ??'' }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="main-content">

                <div class="page-content">
                    <!-- start page title -->
                    <div class=" ">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body" style="padding:10px;">

                                    <form class="custom-validation" action="frmaction.html" id="billingformsave"
                                        target="actoinfrm" novalidate="" method="post" enctype="multipart/form-data">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th width="1%">&nbsp;</th>
                                                    <th width="32%">Item</th>
                                                    <th width="30%">
                                                        <div align="center">Option</div>
                                                    </th>
                                                    <th width="30%">Type</th>
                                                    <th width="10%">
                                                        <div align="right">Net</div>
                                                    </th>
                                                    <th>
                                                        <div align="center">Markup</div>
                                                    </th>
                                                    <th width="5%">
                                                        <div align="right">Gross</div>
                                                    </th>
                                                    <th width="1%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
@forelse($dayWiseItems as $day => $items)

    <tr>
        <td colspan="8" style="background:#f1f5f9;font-weight:700;color:#111;padding:10px;">
            Day {{ $day }}
            @if(!empty($items->first()->item_date))
                - {{ \Carbon\Carbon::parse($items->first()->item_date)->format('d-m-Y') }}
            @endif
        </td>
    </tr>

    @foreach($items as $item)
        <tr>
            <td width="1%">
                <div class="bulbblue" style="background-color:#343642;margin-right:0;">
                    @switch($item->type)
                        @case('transportation')
                            <i class="fa fa-car"></i>
                            @break
                        @case('accommodation')
                            <i class="fa fa-bed"></i>
                            @break
                        @case('activity')
                            <i class="fa fa-male"></i>
                            @break
                        @case('flight')
                            <i class="fa fa-plane"></i>
                            @break
                        @case('meal')
                            <i class="fa fa-cutlery"></i>
                            @break
                        @default
                            <i class="fa fa-list"></i>
                    @endswitch
                </div>
            </td>

           <td style="font-weight:700;">

    @if($item->type == 'accommodation')
        @if($item->hotel_type == 1)
            {{ $item->hotel->name ?? '-' }}
        @else
            {{ $item->name ?? '-' }}
        @endif

    @elseif($item->type == 'activity')
        {{ $item->day_subject ?? $item->name ?? '-' }}

    @elseif($item->type == 'flight')
        {{ $item->flight_no ?? $item->name ?? '-' }}

    @else
        {{ $item->name ?? $item->day_subject ?? '-' }}
    @endif

    <div style="color:#989898;font-size:11px;padding-top:4px;font-weight:800;text-transform:uppercase;">
        @if(!empty($item->check_in_date))
            {{ \Carbon\Carbon::parse($item->check_in_date)->format('d-m-Y') }}
        @endif

        @if($item->show_time == 1)
            -
            {{ !empty($item->check_in_time) ? \Carbon\Carbon::parse($item->check_in_time)->format('g:i A') : '' }}
            to
            {{ !empty($item->check_out_time) ? \Carbon\Carbon::parse($item->check_out_time)->format('g:i A') : '' }}
        @endif
    </div>

</td>

            <td align="center">   @if($item->type == 'accommodation') <span class="hoteloption1">Option {{ $item->hotel_options ?? '-' }} </span>@else - @endif </td>

            <td>
                {{ ucfirst($item->type) }}
                @if(!empty($item->service_type))
                    - {{ $item->service_type }}
                @endif
            </td>

            <td align="right">₹ {{ number_format($item->net_cost ?? 0) }}</td>
            <td align="center">{{ $item->markup ?? 0 }}%</td>
            <td align="right">₹ {{ number_format($item->gross_cost ?? 0) }}</td>

            <td>
                <button type="button" class="optionmenu" data-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                </button>
            </td>
        </tr>
    @endforeach

@empty
    <tr>
        <td colspan="8" class="text-center">No pricing items found</td>
    </tr>
@endforelse
</tbody>

                                            {{-- <tbody>

                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-car" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368710&amp;pid=108998&amp;sectionType=Transportation&amp;transfertype=Private">
                                                        Langkawi Airport to Langkawi Hotel

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            21-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:00 AM to 12:00 AM - <strong>Vehicle: </strong>10</div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Transportation - Private</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 200 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">30%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 260</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368710&amp;pid=108998&amp;sectionType=Transportation&amp;transfertype=Private">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-bed" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368711&amp;pid=108998&amp;sectionType=Accommodation&amp;transfertype=">
                                                        Bella Vista Waterfront Resort <span
                                                            style="color:#FF9900; padding-left:10px;"><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i></span>

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            Deluxe Room - 21-08-2025 To 23-08-2025</div>

                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            <span class="hoteloption1">Option&nbsp;1</span>
                                                        </div>
                                                    </td>
                                                    <td width="30%">Accommodation</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 4602 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 4602</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368711&amp;pid=108998&amp;sectionType=Accommodation&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-blind" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368712&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">
                                                        Langkawi City Tour

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            21-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:00 AM to 12:00 AM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Activity</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 200 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 200</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368712&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-credit-card" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2433419&amp;pid=108998&amp;sectionType=FeesInsurance&amp;transfertype=">
                                                        insurance

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            21-08-2025</div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Fees - Insurance</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2433419&amp;pid=108998&amp;sectionType=FeesInsurance&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-plane" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368726&amp;pid=108998&amp;sectionType=Flight&amp;transfertype=">
                                                        Air Asia,

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            21-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:05 AM to 12:00 AM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Flight</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 200 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 200</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368726&amp;pid=108998&amp;sectionType=Flight&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-cutlery" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2433420&amp;pid=108998&amp;sectionType=Meal&amp;transfertype=">
                                                        test meal

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            21-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            1:00 PM to 2:00 PM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Meal</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2433420&amp;pid=108998&amp;sectionType=Meal&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-blind" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368713&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">
                                                        Langkawi Island Hopping

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            22-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            1:00 PM to 2:00 PM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Activity</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368713&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-blind" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368714&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">
                                                        Langkawi Sharing Boat Trip

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            22-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            1:00 PM to 2:00 PM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Activity</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368714&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>




                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-blind" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368720&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">
                                                        Genting Highlands Day Trip from Kuala Lumpur with Skyway Cable Car
                                                        Ride with Enroute Batu caves

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            23-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:00 AM to 11:59 PM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Activity</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368720&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-blind" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368721&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">
                                                        Genting Cable Car Ride

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            23-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:00 AM to 11:59 PM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Activity</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368721&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>




                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-car" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368715&amp;pid=108998&amp;sectionType=Transportation&amp;transfertype=Private">
                                                        Langkawi Hotel to Langkawi Airport

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            24-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:00 AM to 11:59 PM - <strong>Vehicle: </strong>0</div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Transportation - Private</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368715&amp;pid=108998&amp;sectionType=Transportation&amp;transfertype=Private">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-car" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368716&amp;pid=108998&amp;sectionType=Transportation&amp;transfertype=Private">
                                                        Kuala Lumpur Airport to Kuala Lumpur Hotel

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            24-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:00 AM to 11:59 PM - <strong>Vehicle: </strong>0</div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Transportation - Private</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368716&amp;pid=108998&amp;sectionType=Transportation&amp;transfertype=Private">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-blind" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368717&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">
                                                        Kuala Lumpur Evening City Tour

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            24-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:00 AM to 11:59 PM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Activity</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368717&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-bed" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368719&amp;pid=108998&amp;sectionType=Accommodation&amp;transfertype=">
                                                        Seri Pacific Hotel Kuala Lumpur<span
                                                            style="color:#FF9900; padding-left:10px;"><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i><i
                                                                class="fa fa-star" aria-hidden="true"></i></span>

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            Superior King Room - 24-08-2025 To 25-08-2025</div>

                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            <span class="hoteloption1">Option&nbsp;1</span>
                                                        </div>
                                                    </td>
                                                    <td width="30%">Accommodation</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 12502 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 12502</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368719&amp;pid=108998&amp;sectionType=Accommodation&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-plane" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368725&amp;pid=108998&amp;sectionType=Flight&amp;transfertype=">
                                                        Air Asia,

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            24-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            12:00 AM to 11:59 PM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Flight</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368725&amp;pid=108998&amp;sectionType=Flight&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-blind" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368722&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">
                                                        KLCC Aquaria Tour

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            25-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            1:00 PM to 2:00 PM </div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Activity</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368722&amp;pid=108998&amp;sectionType=Activity&amp;transfertype=">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td width="1%">
                                                        <div class="bulbblue"
                                                            style="background-color:#343642; margin-right:0px;"><i
                                                                class="fa fa-car" aria-hidden="true"></i></div>
                                                    </td>
                                                    <td style=" font-weight: 700; cursor:pointer;"
                                                        onclick="loadpop('Edit Pricing',this,'400px')" data-toggle="modal"
                                                        data-target=".bs-example-modal-center"
                                                        popaction="action=editpricing&amp;id=2368723&amp;pid=108998&amp;sectionType=Transportation&amp;transfertype=Private">
                                                        Kuala Lumpur Hotel to Airport

                                                        <div
                                                            style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                                                            26-08-2025 - <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            1:00 PM to 2:00 PM - <strong>Vehicle: </strong>0</div>


                                                    </td>
                                                    <td width="30%">
                                                        <div align="center">
                                                            -</div>
                                                    </td>
                                                    <td width="30%">Transportation - Private</td>
                                                    <td>
                                                        <div align="right">
                                                            ₹ 0 </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">0%</div>
                                                    </td>
                                                    <td width="5%">
                                                        <div align="right">
                                                            ₹ 0</div>
                                                    </td>
                                                    <td width="1%">
                                                        <div class="">
                                                            <button type="button" class="optionmenu"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i> </button>
                                                            <div class="dropdown-menu" style=""><a
                                                                    class="dropdown-item" style="cursor:pointer;"
                                                                    onclick="loadpop('Edit Pricing',this,'400px')"
                                                                    data-toggle="modal"
                                                                    data-target=".bs-example-modal-center"
                                                                    popaction="action=editpricing&amp;id=2368723&amp;pid=108998&amp;sectionType=Transportation&amp;transfertype=Private">Edit
                                                                    Pricing</a> </div>
                                                        </div>
                                                    </td>
                                                </tr>





                                                <tr
                                                    style=" border-top:2px solid #ededed;border-bottom:2px solid #ededed; font-size:18px; font-weight:700;background-color: #00000008;">
                                                    <td colspan="2" align="left">
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2"><select name="billingType"
                                                                            id="billingType"
                                                                            style=" display:none1;font-size: 14px; padding: 8px; border: 1px solid #b9b9b9; border-radius: 5px; font-weight: 600;"
                                                                            onchange="changebillingtype();">
                                                                            <option value="1" selected="selected">
                                                                                Total price</option>
                                                                            <option value="2">Price per traveller
                                                                            </option>
                                                                        </select></td>
                                                                    <td style="padding-left:10px;"><select name="gstType"
                                                                            id="gstType"
                                                                            style=" font-size: 14px; padding: 8px; border: 1px solid #b9b9b9; border-radius: 5px; font-weight: 600;"
                                                                            onchange="changebillingtype();">
                                                                            <option value="0" selected="selected">GST
                                                                                On Total</option>
                                                                            <option value="1">GST On Markup</option>
                                                                        </select></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>




                                                        <script>
                                                            function changebillingtype() {
                                                                var billingType = $('#billingType').val();
                                                                var gstType = $('#gstType').val();
                                                                $('#ActionDiv').load('actionpage.php?action=updatebillingtype&pid=108998&billingType=' + billingType +
                                                                    '&gstType=' + gstType);
                                                            }
                                                        </script>
                                                    </td>
                                                    <td colspan="3">
                                                        <div align="right"><span
                                                                style="font-size:13px; color:#00000008; display:none;">Without
                                                                Hotel - Total Net <br>
                                                            </span> </div>
                                                    </td>

                                                    <td width="7%"></td>

                                                    <td colspan="2" align="right">
                                                        <div align="right" style="display:none;"><span
                                                                style="font-size:13px; color:#666666;">Without Hotel -
                                                                Total</span><br>₹ 819.8</div>




                                                        <div align="right" style="width:150px;"><span
                                                                style="font-size:13px; color:#000; margin-bottom: 5px; display: block;">Extra
                                                                Markup - <!--?php echo $currency_symbol; ?-->74</span>
                                                        </div>
                                                        <a style="padding: 2px 10px; font-size: 12px; background-color: #059a7f; color: #fff !important; border-radius: 2px; top: -3px; position: relative; cursor:pointer; float:right;"
                                                            onclick="loadpop('Add Extra Markup',this,'400px')"
                                                            data-toggle="modal" data-target=".bs-example-modal-center"
                                                            popaction="action=packageextramarkup&amp;pid=108998"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i> Update</a>
                                                    </td>
                                                </tr>
                                                <tr
                                                    style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                    <td colspan="8" align="left" bgcolor="#F5F5F5">

                                                        <!-- vvvv  -->
                                                        <table width="100%" border="0" cellpadding="15"
                                                            cellspacing="0" class="bordertable"
                                                            style="margin:10px 0px; font-size:12px;">
                                                            <tbody>
                                                                <tr
                                                                    style="background-color:#212529 !important; color:#FFFFFF;">
                                                                    <th align="left"><strong>Service</strong></th>
                                                                    <th align="left"><strong>Price (₹ )</strong></th>
                                                                    <th align="left">Markup</th>
                                                                    <th align="left"><strong>CGST (9%)</strong></th>
                                                                    <th align="left"><strong>SGST (10%)</strong></th>
                                                                    <th align="left"><strong>IGST (0%)</strong></th>
                                                                    <th align="left"><strong>TCS (10%)</strong></th>
                                                                    <th align="left"><strong>Discount</strong></th>
                                                                    <th align="left"><strong>Total</strong></th>
                                                                </tr>
                                                                <tr style="font-size:14px;  display:none; ">
                                                                    <td align="left">Without Hotel Services </td>
                                                                    <td align="left">660
                                                                    </td>
                                                                    <td align="left">2383 </td>
                                                                    <td align="left">
                                                                        274

                                                                    </td>
                                                                    <td align="left">


                                                                        304

                                                                    </td>
                                                                    <td align="left">

                                                                        - </td>
                                                                    <td align="left">
                                                                        <script>
                                                                            $(document).ready(function() {
                                                                                $("#tcsPercent").val("5");
                                                                            });
                                                                        </script>

                                                                        181
                                                                    </td>
                                                                    <td align="left">-</td>
                                                                    <td align="left"><strong>₹ </strong>3802</td>
                                                                </tr>
                                                                <tr style="font-size:14px;">
                                                                    <td align="left" class="hoteloption1td"><span
                                                                            style="color:#FFFFFF; font-size:14px;">Hotel
                                                                            Option 1</span> </td>
                                                                    <td align="left">
                                                                        17764 </td>
                                                                    <td align="left">
                                                                        2383 </td>
                                                                    <td align="left">


                                                                        1813

                                                                    </td>
                                                                    <td align="left">


                                                                        2015

                                                                    </td>
                                                                    <td align="left">

                                                                        - </td>
                                                                    <td align="left">

                                                                        <script>
                                                                            $(document).ready(function() {
                                                                                $("#tcsPercent").val("5");
                                                                            });
                                                                        </script>
                                                                        1199
                                                                    </td>
                                                                    <td align="left">-</td>
                                                                    <td align="left">₹ 25174</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr
                                                    style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                    <td height="30" colspan="6" align="left">
                                                        <table border="0" cellspacing="0" cellpadding="0"
                                                            style="display:none;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-top:0px;"><input
                                                                            name="showcgst" type="checkbox"
                                                                            value="1"></td>
                                                                    <td align="right" style="border-top:0px;">Show</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="5%" align="right">CGST&nbsp;% </td>
                                                    <td width="1%" align="right" style="font-size:18px;"><input
                                                            name="cgst" type="number" min="0"
                                                            class="form-control" id="cgst" value="9"
                                                            style="width:80px;"></td>
                                                </tr>
                                                <tr
                                                    style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                    <td colspan="6" align="left">
                                                        <table border="0" cellspacing="0" cellpadding="0"
                                                            style="display:none;">
                                                            <tbody>
                                                                <tr>

                                                                    <td align="left" style="border-top:0px;"><input
                                                                            name="showsgst" type="checkbox"
                                                                            value="1"></td>
                                                                    <td align="right" style="border-top:0px;">Show</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="5%" align="right">SGST&nbsp;%</td>
                                                    <td width="1%" align="right" style="font-size:18px;"><input
                                                            name="sgst" type="number" min="0"
                                                            class="form-control" id="sgst" value="10"
                                                            style="width:80px;"></td>
                                                </tr>
                                                <tr
                                                    style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                    <td colspan="6" align="left">
                                                        <table border="0" cellspacing="0" cellpadding="0"
                                                            style="display:none;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-top:0px;"><input
                                                                            name="showigst" type="checkbox"
                                                                            value="1"></td>
                                                                    <td align="right" style="border-top:0px;">Show</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="5%" align="right">IGST&nbsp;%</td>
                                                    <td width="1%" align="right" style="font-size:18px;"><input
                                                            name="igst" type="number" min="0"
                                                            class="form-control" id="igst" value="0"
                                                            style="width:80px;"></td>
                                                </tr>
                                                <tr
                                                    style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                    <td colspan="6" align="left">
                                                        <div class="alert alert-danger" style="margin-bottom:15px;">
                                                            TCS percent has changed! Old: 10%, New: 5% Update Billing
                                                        </div>

                                                        <table border="0" cellspacing="0" cellpadding="0"
                                                            style="display:none;">
                                                            <tbody>
                                                                <tr>

                                                                    <td align="left" style="border-top:0px;"><input
                                                                            name="showtcs" type="checkbox"
                                                                            value="1"></td>
                                                                    <td align="right" style="border-top:0px;">Show</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="5%" align="right">TCS&nbsp;%</td>
                                                    <td width="1%" align="right" style="font-size:18px;"><input
                                                            name="tcsPercent" type="number" min="0"
                                                            class="form-control" id="tcsPercent" value="10"
                                                            readonly="" style="width:80px;"></td>
                                                </tr>
                                                <tr
                                                    style=" border-top:1px solid #ededed;border-bottom:2px solid #ededed; font-size:15px; ">
                                                    <td colspan="6" align="left">&nbsp;</td>
                                                    <td width="5%" align="right">
                                                        Discount </td>
                                                    <td width="1%" align="right" style="font-size:18px;"><input
                                                            name="totalDiscount" type="number" min="0"
                                                            class="form-control" id="totalDiscount" value="0"
                                                            style="width:80px;"></td>
                                                </tr>
                                                <tr
                                                    style=" border-top:1px solid #ededed;border-bottom:2px solid #ededed; font-size:15px;background-color: #00000008; display:none; ">
                                                    <td colspan="6" align="right">&nbsp;</td>
                                                    <td width="5%" align="right">Price&nbsp;In:</td>
                                                    <td width="1%" align="right" style="font-size:18px;"><select
                                                            name="convertedCurrency" id="convertedCurrency"
                                                            style=" font-size: 14px; padding: 8px; border: 1px solid #b9b9b9; border-radius: 5px; font-weight: 600; width:100px;"
                                                            onchange="$('#changecussyes').val('1');$('#billingformsave').submit();">

                                                            <option value="USD">USD</option>

                                                            <option value="INR" selected="selected">INR</option>

                                                            <option value="MYR">MYR</option>

                                                            <option value="AED">AED</option>

                                                            <option value="EUR">EUR</option>

                                                            <option value="THB">THB</option>

                                                            <option value="JPY">JPY</option>

                                                            <option value="AUD">AUD</option>

                                                        </select></td>

                                                </tr>
                                                <tr
                                                    style=" border-top:1px solid #ededed;border-bottom:2px solid #ededed; font-size:15px; ">
                                                    <td colspan="6" align="left">&nbsp;</td>
                                                    <td colspan="2" align="right"><input name="ebo"
                                                            type="text" class="form-control" id="ebo"
                                                            value="" placeholder="Early Bird Offer"
                                                            style="text-align:center;"></td>
                                                </tr>
                                            </tbody> --}}
                                        </table>
                                        <div style="text-align:right; margin-top:10px;"><input name="Save"
                                                type="submit" value="Update Billing" id="savingbutton"
                                                class="btn btn-primary" style="padding: 10px 20px;"
                                                onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
                                        </div>
                                        <input name="action" type="hidden" id="action"
                                            value="saveGSTpackagebuilder">
                                        <input name="pid" type="hidden" value="108998">
                                        <input name="changecussyes" id="changecussyes" type="hidden" value="0">
                                        <input name="finalcostperperson" id="finalcostperperson" type="hidden"
                                            value="">
                                    </form>

                                </div>



                                <div class=" ">


                                    <form class="custom-validation" action="frmaction.html" target="actoinfrm"
                                        novalidate="" method="post" enctype="multipart/form-data"
                                        style="display:none;">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="card-title" style=" margin-top:0px;">Deposit information
                                                    </h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" style="margin-left: -8px; margin-top: 10px;">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="validationCustom02">Amount</label>
                                                                <input name="depositAmount" type="number" min="0"
                                                                    class="form-control" id="depositAmount"
                                                                    value="0">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="validationCustom02">Due date</label>
                                                                <input name="depositDueDate" type="text"
                                                                    min="0"
                                                                    class="form-control datecale hasDatepicker"
                                                                    id="depositDueDate" value="30-11--0001">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="validationCustom02"
                                                                    style="width: 100%;">&nbsp;</label>
                                                                <input name="Save" type="submit" value="Save"
                                                                    id="savingbutton" class="btn btn-primary"
                                                                    onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <input name="action" type="hidden" id="action" value="savepageduedate">
                                        <input name="pid" type="hidden" value="108998">
                                    </form>



                                </div>


                            </div>


                        </div>








                    </div><!--end col-->

                    <!-- end row -->

                </div>

                <!-- End Page-content -->


            </div>
        </div>
    </div>
@endsection
