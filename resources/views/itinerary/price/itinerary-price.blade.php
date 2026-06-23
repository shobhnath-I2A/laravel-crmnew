@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        @include('itinerary.partials.top-nav', ['itinerary' => $itinerary])

        <div style="margin-left: 65px; margin-right: 25px; margin-top: 110px !important; padding-bottom: 10px;">
            <div class="main-content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <h4>{{ $itinerary->name ?? '' }} <span style="color: #353535; font-size: 14px; margin-top: 2px; float: right;">
                                    {{ $itinerary->destinations->pluck('name')->implode(', ') }} - Adult:
                                    {{ $itinerary->adult ?? '' }} | Child: {{ $itinerary->child ?? '' }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="main-content">
                {{-- {{ $itinerary??'' }} --}}
                <div class="page-content">
                    <!-- start page title -->
                    <div class=" ">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body" style="padding:10px;">
                                    <form class="custom-validation" id="billingformsave" target="actoinfrm" novalidate="" method="post" enctype="multipart/form-data">
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
                                                        <td colspan="8"
                                                            style="background:#f1f5f9;font-weight:700;color:#111;padding:10px;">
                                                            Day {{ $day }}
                                                            @if (!empty($items->first()->item_date))
                                                                -
                                                                {{ \Carbon\Carbon::parse($items->first()->item_date)->format('d-m-Y') }}
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    @foreach ($items as $item)
                                                        <tr>
                                                            <td width="1%">
                                                                <div class="bulbblue"
                                                                    style="background-color:#343642;margin-right:0;">
                                                                    @switch($item->type)
                                                                        @case('transportation')
                                                                            <i class="fa fa-car"></i>
                                                                        @break

                                                                        @case('accommodation')
                                                                            <i class="fa fa-bed"></i>
                                                                        @break

                                                                        @case('activity')
                                                                            <i class="fa fa-picture-o"></i>
                                                                        @break

                                                                        @case('flight')
                                                                            <i class="fa fa-plane"></i>
                                                                        @break

                                                                        @case('meal')
                                                                            <i class="fa fa-cutlery"></i>
                                                                        @break

                                                                        @case('visa')
                                                                            <i class="fa fa-credit-card"></i>
                                                                        @break

                                                                        @case('cruise')
                                                                            <i class="fa fa-ship"></i>
                                                                        @break

                                                                        @case('laisure')
                                                                            <i class="fa fa-umbrella"></i>
                                                                        @break

                                                                        @default
                                                                            <i class="fa fa-list"></i>
                                                                    @endswitch
                                                                </div>
                                                            </td>
                                                            <td style="font-weight:700;"
                                                                onclick="openPopup('Edit Price', '{{ route('pricing.edit', $item->id) }}')">
                                                                @if ($item->type == 'accommodation')
                                                                    @if ($item->source_type == 1)
                                                                        {{ $item->hotels->first()?->name ?? '-' }}
                                                                    @else
                                                                        {{ $item->name ?? '-' }}
                                                                    @endif
                                                                @elseif($item->type == 'activity')
                                                                    {{ $item->day_subject ?? ($item->name ?? '-') }}
                                                                @elseif($item->type == 'flight')
                                                                    {{ $item->flight_no ?? ($item->name ?? '-') }}
                                                                @else
                                                                    {{ $item->name ?? ($item->day_subject ?? '-') }}
                                                                @endif

                                                                <div style="color:#989898;font-size:11px;padding-top:4px;font-weight:800;text-transform:uppercase;">
                                                                    @if (!empty($item->start_date))
                                                                        {{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}
                                                                    @endif

                                                                    @if ($item->show_time == 1)
                                                                        -
                                                                        {{ !empty($item->start_time) ? \Carbon\Carbon::parse($item->start_time)->format('g:i A') : '' }}
                                                                        To
                                                                        {{ !empty($item->end_time) ? \Carbon\Carbon::parse($item->end_time)->format('g:i A') : '' }}
                                                                    @endif
                                                                </div>
                                                                </a>
                                                            </td>
                                                            <td align="center">
                                                                @if ($item->type == 'accommodation')
                                                                    @php
                                                                        $option = '-';
                                                                        if ($item->source_type == 1) {
                                                                            $option = $item->hotels->first()?->pivot?->hotel_options ?? '-';
                                                                        } else {
                                                                            $option = $item->hotelDetail?->hotel_options ?? '-';
                                                                        }
                                                                    @endphp
                                                                    <span class="hoteloption{{ $option }}">
                                                                        Option {{ $option }}
                                                                    </span>
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ ucfirst($item->type) }}
                                                                @if (!empty($item->service_type))
                                                                    - {{ $item->service_type }}
                                                                @endif
                                                            </td>
                                                            <td align="right">₹ {{ number_format($item->price->total_price ?? 0) }} </td>
                                                            <td align="center">{{ $item->price->markup ?? 0 }}%</td>
                                                            <td align="right">₹ {{ number_format($item->price->final_price ?? 0) }}</td>
                                                            <td>
                                                                <button type="button" class="optionmenu" data-toggle="dropdown">
                                                                    <i class="mdi mdi-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu" style="">
                                                                    <a class="dropdown-item" style="cursor:pointer;"
                                                                        <td style="font-weight:700; cursor:pointer;" onclick="openPopup('Edit Price', '{{ route('pricing.edit', $item->id) }}')">
                                                                        Edit Pricing
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    @empty
                                                        <tr>
                                                            <td colspan="8" class="text-center">No pricing items found</td>
                                                        </tr>
                                                    @endforelse
                                                    <tr style=" border-top:2px solid #ededed;border-bottom:2px solid #ededed; font-size:18px; font-weight:700;background-color: #00000008;">
                                                        <td colspan="2" align="left">
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <select name="billingType" id="billingType" style=" display:none1;font-size: 14px; padding: 8px; border: 1px solid #b9b9b9; border-radius: 5px; font-weight: 600;" onchange="changebillingtype();">
                                                                                <option value="1" selected="selected">
                                                                                    Total price</option>
                                                                                <option value="2">Price per traveller
                                                                                </option>
                                                                            </select>
                                                                        </td>
                                                                        <td style="padding-left:10px;"><select name="gstType" id="gstType" style=" font-size: 14px; padding: 8px; border: 1px solid #b9b9b9; border-radius: 5px; font-weight: 600;" onchange="changebillingtype();">
                                                                                <option value="0" selected="selected">GST On Total</option>
                                                                                <option value="1">GST On Markup</option>
                                                                            </select>
                                                                        </td>
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
                                                            <div align="right">
                                                                <span style="font-size:13px; color:#00000008; display:none;">Without
                                                                    Hotel - Total Net <br>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td width="7%"></td>
                                                        <td colspan="2" align="right">
                                                            <div align="right" style="display:none;">
                                                                <span style="font-size:13px; color:#666666;">Without Hotel - Total</span><br>₹ 819.8</div>

                                                            <div align="right" style="width:150px;">
                                                                <span style="font-size:13px; color:#000; margin-bottom: 5px; display: block;">Extra
                                                                    Markup - <!--?php echo $currency_symbol; ?-->74</span>
                                                            </div>
                                                            <a style="padding: 2px 10px; font-size: 12px; background-color: #059a7f; color: #fff !important; border-radius: 2px; top: -3px; position: relative; cursor:pointer; float:right;" onclick="loadpop('Add Extra Markup',this,'400px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=packageextramarkup&amp;pid=108998">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i> Update</a>
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                        <td colspan="8" align="left" bgcolor="#F5F5F5">

                                                            <!-- vvvv  -->
                                                            <table width="100%" border="0" cellpadding="15" cellspacing="0" class="bordertable" style="margin:10px 0px; font-size:12px;">
                                                                <tbody>
                                                                    <tr style="background-color:#212529 !important; color:#FFFFFF;">
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
                                                                        <td align="left">660 </td>
                                                                        <td align="left">2383 </td>
                                                                        <td align="left">
                                                                            274
                                                                        </td>
                                                                        <td align="left">
                                                                            304
                                                                        </td>
                                                                        <td align="left">- </td>
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
                                                                    @foreach($hotelOptionTotals as $option => $hotelAmount)
                                                                        @php
                                                                            $optionGross = $withoutHotelGross + $hotelAmount;

                                                                            $optionCgst = ($optionGross * $cgst) / 100;
                                                                            $optionSgst = ($optionGross * $sgst) / 100;
                                                                            $optionIgst = ($optionGross * $igst) / 100;
                                                                            $optionTcs  = ($optionGross * $tcs) / 100;

                                                                            $optionTotal = $optionGross
                                                                                + $extraMarkup
                                                                                + $optionCgst
                                                                                + $optionSgst
                                                                                + $optionIgst
                                                                                + $optionTcs
                                                                                - $discount;
                                                                        @endphp

                                                                        <tr style="font-size:14px;">
                                                                            <td class="hoteloption{{ $option }}td">
                                                                                Hotel Option {{ $option }}
                                                                            </td>

                                                                            <td>{{ number_format($optionGross, 2) }}</td>
                                                                            <td>{{ number_format($totalMarkup, 2) }}</td>
                                                                            <td>{{ number_format($optionCgst, 2) }}</td>
                                                                            <td>{{ number_format($optionSgst, 2) }}</td>
                                                                            <td>{{ $optionIgst > 0 ? number_format($optionIgst, 2) : '-' }}</td>
                                                                            <td>{{ number_format($optionTcs, 2) }}</td>
                                                                            <td>{{ $discount > 0 ? number_format($discount, 2) : '-' }}</td>
                                                                            <td>₹ {{ number_format($optionTotal, 2) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                        <td height="30" colspan="6" align="left">
                                                        </td>
                                                        <td width="5%" align="right">CGST&nbsp;% </td>
                                                        <td width="1%" align="right" style="font-size:18px;">
                                                            <input name="cgst" type="number" min="0" class="form-control" id="cgst" value="{{ $cgst }}" style="width:80px;">
                                                        </td>
                                                    </tr>
                                                    <tr style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                        <td colspan="6" align="left">
                                                        </td>
                                                        <td width="5%" align="right">SGST&nbsp;%</td>
                                                        <td width="1%" align="right" style="font-size:18px;">
                                                            <input name="sgst" type="number" min="0" class="form-control" id="sgst" value="{{ $sgst }}" style="width:80px;">
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                        <td colspan="6" align="left">
                                                        </td>
                                                        <td width="5%" align="right">IGST&nbsp;%</td>
                                                        <td width="1%" align="right" style="font-size:18px;">
                                                            <input name="igst" type="number" min="0" class="form-control" id="igst" value="{{ $igst }}" style="width:80px;">
                                                        </td>
                                                    </tr>
                                                    <tr style=" border-top:1px solid #ededed;border-bottom:1px solid #ededed; font-size:15px; ">
                                                        <td colspan="6" align="left">
                                                        </td>
                                                        <td width="5%" align="right">TCS&nbsp;%</td>
                                                        <td width="1%" align="right" style="font-size:18px;">
                                                            <input name="tcsPercent" type="number" min="0"class="form-control" id="tcsPercent" value="{{ $tcs }}" readonly="" style="width:80px;">
                                                        </td>
                                                    </tr>
                                                    <tr style=" border-top:1px solid #ededed;border-bottom:2px solid #ededed; font-size:15px; ">
                                                        <td colspan="6" align="left">&nbsp;</td>
                                                        <td width="5%" align="right">
                                                            Discount </td>
                                                        <td width="1%" align="right" style="font-size:18px;">
                                                            <input name="totalDiscount" type="number" min="0" class="form-control" id="totalDiscount" value="{{ $discount }}" style="width:80px;">
                                                        </td>
                                                    </tr>

                                                    <tr
                                                        style=" border-top:1px solid #ededed;border-bottom:2px solid #ededed; font-size:15px; ">
                                                        <td colspan="6" align="left">&nbsp;</td>
                                                        <td colspan="2" align="right">
                                                            <input name="ebo" type="text" class="form-control" id="ebo" value="" placeholder="Early Bird Offer" style="text-align:center;"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="text-align:right; margin-top:10px;">
                                                <input name="Save" type="submit" value="Update Billing" id="savingbutton" class="btn btn-primary" style="padding: 10px 20px;" onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
                                            </div>
                                            <input name="action" type="hidden" id="action" value="saveGSTpackagebuilder">
                                            <input name="pid" type="hidden" value="108998">
                                            <input name="changecussyes" id="changecussyes" type="hidden" value="0">
                                            <input name="finalcostperperson" id="finalcostperperson" type="hidden" value="">
                                        </form>
                                    </div>
                                    <div class=" ">
                                        <form class="custom-validation" action="frmaction.html" target="actoinfrm"  novalidate="" method="post" enctype="multipart/form-data" style="display:none;">
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
                                                                    <input name="depositAmount" type="number" min="0" class="form-control" id="depositAmount" value="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="validationCustom02">Due date</label>
                                                                    <input name="depositDueDate" type="text" min="0"  class="form-control datecale hasDatepicker" id="depositDueDate" value="30-11--0001">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="validationCustom02" style="width: 100%;">&nbsp;</label>
                                                                    <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary" onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
