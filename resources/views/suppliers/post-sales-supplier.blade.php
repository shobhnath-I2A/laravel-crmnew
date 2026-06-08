@forelse($postSaleItems as $type => $items)
{{ $type }}
<div class="card mb-3">
    <div class="card-body p-2">

        <h4 class="mt-0 header-title mb-2">
            @if($type == 'accommodation')
                <i class="fa fa-bed"></i>
            @elseif($type == 'activity')
                <i class="fa fa-blind"></i>
            @elseif($type == 'transportation')
                <i class="fa fa-car"></i>
            @elseif($type == 'flight')
                <i class="fa fa-plane"></i>
            @elseif($type == 'meal')
                <i class="fa fa-cutlery"></i>
            @else
                <i class="fa fa-credit-card"></i>
            @endif

            {{ $type == 'FeesInsurance' ? 'Fees - Insurance' : $type }}
        </h4>

        @foreach($items as $item)

            @php
                $amount = $item->supplier_amount ?? $item->amount ?? 0;
                $paid = $item->paid_amount ?? 0;
                $pending = $amount - $paid;

                $bookingStatus = [
                    0 => ['Mail Sent', '#e77350'],
                    1 => ['Pending Confirmation', '#e3445a'],
                    2 => ['Confirmed', '#01c875'],
                    3 => ['Not Confirmed', '#a55cd9'],
                    4 => ['Rates Negotiation', '#323232'],
                ][$item->booking_status_id ?? 0];

                $paymentStatus = [
                    0 => ['Payment Pending', '#e77350'],
                    1 => ['Amount Paid', '#01c875'],
                ][$item->payment_status ?? 0];
            @endphp

            <div class="suppeventlist" style="position:relative; padding:10px; border:1px solid #ddd; margin-bottom:10px; border-radius:5px;">

                <button class="btn btn-primary btn-sm"
                        style="position:absolute; right:10px; top:16px;">
                    <i class="fa fa-pencil"></i> Update Payment
                </button>

                <button class="btn btn-info btn-sm"
                        style="position:absolute; right:145px; top:16px;">
                    Remark (0)
                </button>

                <strong>{{ $item->title ?? $item->name }}</strong>

                @if($type == 'Accommodation')
                    <span style="color:#FF9900; padding-left:10px;">
                        {{ $item->hotel_category ?? '' }}
                    </span>

                    <div style="color:#989898; font-size:11px; padding-top:4px; font-weight:800; text-transform:uppercase;">
                        {{ $item->room_type ?? '' }}
                        -
                        {{ optional($item->start_date)->format('d-m-Y') }}
                        To
                        {{ optional($item->end_date)->format('d-m-Y') }}
                    </div>
                @else
                    <div style="color:#989898; font-size:11px; padding-top:4px; font-weight:800; text-transform:uppercase;">
                        {{ optional($item->start_date)->format('d-m-Y') }}

                        @if($type != 'FeesInsurance')
                            -
                            <i class="fa fa-clock-o"></i>
                            {{ $item->start_time ?? '' }}
                            to
                            {{ $item->end_time ?? '' }}
                        @endif

                        @if($item->transfer_category == 'Private')
                            - <strong>Vehicle:</strong> {{ $item->vehicle }}
                        @endif
                    </div>
                @endif

                <div style="margin-top:5px;">
                    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" style="font-size:12px;">
                        <tr>
                            <td><strong>Supplier</strong></td>
                            <td><strong>Status</strong></td>
                            <td><strong>Payment</strong></td>
                            <td align="center"><strong>Amount</strong></td>
                            <td align="center"><strong>Cancellation</strong></td>
                            <td align="center"><strong>Due Date</strong></td>
                            <td align="center"><strong>Paid Amount</strong></td>
                            <td align="center"><strong>Pending</strong></td>
                        </tr>

                        <tr>
                            <td>
                                {{ $item->supplier->company_name ?? 'No Supplier Selected' }}

                                @if(($item->booking_status_id ?? 0) == 2)
                                    <div style="font-size:12px; color:#666;">
                                        <strong>CN: {{ $item->confirmation_no }}</strong>
                                    </div>
                                @endif
                            </td>

                            <td>
                                <div style="border-radius:3px; text-align:center; padding:3px; font-size:12px; color:#fff; background-color:{{ $bookingStatus[1] }};">
                                    {{ $bookingStatus[0] }}
                                </div>
                            </td>

                            <td>
                                <div style="border-radius:3px; text-align:center; padding:3px; font-size:12px; color:#fff; background-color:{{ $paymentStatus[1] }};">
                                    {{ $paymentStatus[0] }}
                                </div>
                            </td>

                            <td align="center">{{ $amount }}</td>

                            <td align="center">
                                {{ $item->supplier_cancellation_date ?? '' }}
                            </td>

                            <td align="center">
                                {{ $item->due_date ?? '' }}
                            </td>

                            <td align="center">{{ $paid }}</td>

                            <td align="center">{{ $pending }}</td>
                        </tr>
                    </table>
                </div>

            </div>

        @endforeach

    </div>
</div>

@empty
    <div class="alert alert-info">No post sales supplier data found.</div>
@endforelse
<div class="card" style="margin-bottom:10px; margin-left:10px; margin-right:10px; margin-top:10px;">
    <div class="card-body" style="padding:10px;">
        <h4 class="mt-0 header-title" style="margin-bottom:10px;"><i class="fa fa-bed" aria-hidden="true"></i>
            &nbsp;Accommodation</h4>
        <div class="suppeventlist" style="position:relative;">
            <a onclick="loadpop('Post Sales Supplier',this,'700px')" data-toggle="modal"
                data-target=".bs-example-modal-center"
                popaction="action=addpostsalessupplier&amp;queryId=127497&amp;id=2433357"
                style="position: absolute; font-size: 12px; font-weight: 600; right: 10px; top: 16px; background-color: #005ee2; color: #fff; padding: 5px 10px; border-radius: 3px; cursor: pointer;"><i
                    class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Update Payment</a>
            <a onclick="loadpop('Remark',this,'700px')" data-toggle="modal" data-target=".bs-example-modal-center"
                popaction="action=addSupplierRemark&amp;queryId=127497&amp;id=2433357"
                style="position: absolute; font-size: 12px; font-weight: 600; right: 140px; top: 16px; background-color: #39b7c1; color: #fff; padding: 5px 10px; border-radius: 3px; cursor: pointer;"><i
                    class="fa fa-message" aria-hidden="true"></i> Remark (0)</a>
            <strong>tesffs</strong> <span style="color:#FF9900; padding-left:10px;"><i class="fa fa-star"
                    aria-hidden="true"></i></span>

            <div
                style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                Room test - 01-04-2026 To 01-04-2026</div>

            <div style="margin-top:5px;">
                <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                    style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td><strong>Supplier</strong></td>
                            <td><strong>Status</strong></td>
                            <td><strong>Payment</strong></td>
                            <td>
                                <div align="center"><strong>Amount</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Cancellation</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Due Date</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Paid Amount </strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Pending</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td>No Supplier Selected </td>
                            <td>
                                <div
                                    style="border-radius: 3px; text-align: center; padding:3px;font-size: 12px;  padding-right: 0px; padding-left: 4px; color:#fff; background-color:#e77350;">
                                    Mail Sent</div>
                            </td>
                            <td>
                                <div
                                    style="border-radius: 3px; text-align: center; padding:3px; font-size: 12px;  padding-right: 0px; padding-left: 4px; color:#fff; background-color:#e77350;">
                                    Payment Pending</div>
                            </td>
                            <td>
                                <div align="center">0</div>
                            </td>
                            <td>
                                <div align="center" style="color:#FF0000;"></div>
                            </td>
                            <td>
                                <div align="center" style="color:#FF0000;"></div>
                            </td>
                            <td>
                                <div align="center">0</div>
                            </td>
                            <td>
                                <div align="center">0</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card" style="margin-bottom:10px; margin-left:10px; margin-right:10px; margin-top:10px;">
    <div class="card-body" style="padding:10px;">
        <h4 class="mt-0 header-title" style="margin-bottom:10px;"><i class="fa fa-blind" aria-hidden="true"></i>
            &nbsp;Activity</h4>
        <div class="suppeventlist" style="position:relative;">
            <a onclick="loadpop('Post Sales Supplier',this,'700px')" data-toggle="modal"
                data-target=".bs-example-modal-center"
                popaction="action=addpostsalessupplier&amp;queryId=127497&amp;id=2433355"
                style="position: absolute; font-size: 12px; font-weight: 600; right: 10px; top: 16px; background-color: #005ee2; color: #fff; padding: 5px 10px; border-radius: 3px; cursor: pointer;"><i
                    class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Update Payment</a>
            <a onclick="loadpop('Remark',this,'700px')" data-toggle="modal" data-target=".bs-example-modal-center"
                popaction="action=addSupplierRemark&amp;queryId=127497&amp;id=2433355"
                style="position: absolute; font-size: 12px; font-weight: 600; right: 140px; top: 16px; background-color: #39b7c1; color: #fff; padding: 5px 10px; border-radius: 3px; cursor: pointer;"><i
                    class="fa fa-message" aria-hidden="true"></i> Remark (0)</a>
            <strong>tesfd</strong>
            <div
                style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                01-04-2026 - <i class="fa fa-clock-o" aria-hidden="true"></i> 1:00 PM to 2:00 PM </div>

            <div style="margin-top:5px;">
                <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                    style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td><strong>Supplier</strong></td>
                            <td><strong>Status</strong></td>
                            <td><strong>Payment</strong></td>
                            <td>
                                <div align="center"><strong>Amount</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Cancellation</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Due Date</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Paid Amount </strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Pending</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td>No Supplier Selected </td>
                            <td>
                                <div
                                    style="border-radius: 3px; text-align: center; padding:3px;font-size: 12px;  padding-right: 0px; padding-left: 4px; color:#fff; background-color:#e77350;">
                                    Mail Sent</div>
                            </td>
                            <td>
                                <div
                                    style="border-radius: 3px; text-align: center; padding:3px; font-size: 12px;  padding-right: 0px; padding-left: 4px; color:#fff; background-color:#e77350;">
                                    Payment Pending</div>
                            </td>
                            <td>
                                <div align="center">1000</div>
                            </td>
                            <td>
                                <div align="center" style="color:#FF0000;"></div>
                            </td>
                            <td>
                                <div align="center" style="color:#FF0000;"></div>
                            </td>
                            <td>
                                <div align="center">0</div>
                            </td>
                            <td>
                                <div align="center">1000</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card" style="margin-bottom:10px; margin-left:10px; margin-right:10px; margin-top:10px;">
    <div class="card-body" style="padding:10px;">
        <h4 class="mt-0 header-title" style="margin-bottom:10px;"><i class="fa fa-plane" aria-hidden="true"></i>
            &nbsp;Flight</h4>
        <div class="suppeventlist" style="position:relative;">
            <a onclick="loadpop('Post Sales Supplier',this,'700px')" data-toggle="modal"
                data-target=".bs-example-modal-center"
                popaction="action=addpostsalessupplier&amp;queryId=127497&amp;id=2433356"
                style="position: absolute; font-size: 12px; font-weight: 600; right: 10px; top: 16px; background-color: #005ee2; color: #fff; padding: 5px 10px; border-radius: 3px; cursor: pointer;"><i
                    class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Update Payment</a>
            <a onclick="loadpop('Remark',this,'700px')" data-toggle="modal" data-target=".bs-example-modal-center"
                popaction="action=addSupplierRemark&amp;queryId=127497&amp;id=2433356"
                style="position: absolute; font-size: 12px; font-weight: 600; right: 140px; top: 16px; background-color: #39b7c1; color: #fff; padding: 5px 10px; border-radius: 3px; cursor: pointer;"><i
                    class="fa fa-message" aria-hidden="true"></i> Remark (0)</a>
            <strong>232</strong>
            <div
                style="color: #989898; font-size: 11px; padding-top: 4px; font-weight: 800; text-transform: uppercase;">
                01-04-2026 - <i class="fa fa-clock-o" aria-hidden="true"></i> 1:00 PM to 2:00 PM </div>

            <div style="margin-top:5px;">
                <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                    style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td><strong>Supplier</strong></td>
                            <td><strong>Status</strong></td>
                            <td><strong>Payment</strong></td>
                            <td>
                                <div align="center"><strong>Amount</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Cancellation</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Due Date</strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Paid Amount </strong></div>
                            </td>
                            <td>
                                <div align="center"><strong>Pending</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td>No Supplier Selected </td>
                            <td>
                                <div
                                    style="border-radius: 3px; text-align: center; padding:3px;font-size: 12px;  padding-right: 0px; padding-left: 4px; color:#fff; background-color:#e77350;">
                                    Mail Sent</div>
                            </td>
                            <td>
                                <div
                                    style="border-radius: 3px; text-align: center; padding:3px; font-size: 12px;  padding-right: 0px; padding-left: 4px; color:#fff; background-color:#e77350;">
                                    Payment Pending</div>
                            </td>
                            <td>
                                <div align="center">0</div>
                            </td>
                            <td>
                                <div align="center" style="color:#FF0000;"></div>
                            </td>
                            <td>
                                <div align="center" style="color:#FF0000;"></div>
                            </td>
                            <td>
                                <div align="center">0</div>
                            </td>
                            <td>
                                <div align="center">0</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function saveexpcontent(id) {
        var paidAmount = Number($('#paidAmount' + id).val());
        var supplierAmount = Number($('#supplierAmount' + id).val());
        var restpending = Number(supplierAmount - paidAmount);
        $('#pendingAmount' + id).val(restpending);
        var supplierId = encodeURI($('#supplierId' + id).val());
        var dueDate = encodeURI($('#dueDate' + id).val());
        var suppliercancellationdate = encodeURI($('#suppliercancellationdate' + id).val());
        var bookingStatusId = encodeURI($('#bookingStatusId' + id).val());
        var confirmationNo = encodeURI($('#confirmationNo' + id).val());
        if (bookingStatusId == 2) {
            $('#confirmationNo' + id).show();
        } else {
            $('#confirmationNo' + id).hide();
        }
        var pendingAmount = encodeURI($('#pendingAmount' + id).val());
        var status = encodeURI($('#status' + id).val());
        $('#ActionDiv').load('actionpage.php?action=savesuppliercosting&id=' + id + '&supplierAmount=' +
            supplierAmount + '&supplierId=' + supplierId + '&dueDate=' + dueDate + '&paidAmount=' + paidAmount +
            '&bookingStatusId=' + bookingStatusId + '&pendingAmount=' + pendingAmount +
            '&suppliercancellationdate=' + suppliercancellationdate + '&status=' + status + '&confirmationNo=' +
            confirmationNo);
    }
</script>
