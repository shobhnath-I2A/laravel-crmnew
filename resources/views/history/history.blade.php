<div class="card-body">
    <div style="padding:10px;">
        <style>
            .activity img.icon-info,
            .activity i.icon-info {
                color: #9ba7ca;
                background-color: #eef0f6;
            }

            .activity img,
            .activity i {
                width: 36px;
                height: 36px;
                text-align: center;
                line-height: 36px;
                border-radius: 12%;
                position: absolute;
                left: -19px;
                color: #4d79f6;
                background-color: #f3f6f7;
                font-size: 20px;
                margin-top: -10px;
                -webkit-box-shadow: 0px 0px 0px 0.5px #f3f6f7;
                box-shadow: 0px 0px 0px 0.5px #f3f6f7;
                -webkit-transform: rotate(45deg);
                transform: rotate(0deg);
            }

            .activity {
                position: relative;
                border-left: 3px dotted #eff2f9;
                margin: 20px 20px 0 22px;
            }

            .activity .item-info {
                margin-left: 40px;
                margin-bottom: 15px;
            }
        </style>
        <h4 class="mt-0 header-title">History</h4>
        <div class="">
            <div class="card" style="padding:10px;">
                <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                    class="table table-hover mb-0" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th width="1%" align="center" bgcolor="#f5f7f9">&nbsp;</th>
                            <th align="left" bgcolor="#f5f7f9">Type</th>
                            <th align="left" bgcolor="#f5f7f9">Description</th>
                            <th align="left" bgcolor="#f5f7f9">By</th>
                            <th width="25%" align="left" bgcolor="#f5f7f9">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($query))
                            @foreach ($query->history as $history)
                                <tr>
                                    <td width="1%" align="center" valign="top"><i class="fa fa-dot-circle-o"
                                            aria-hidden="true"></i></td>
                                    <td align="left" valign="top">
                                        {{ $history->log_type ? ucwords(str_replace('_', ' ', $history->log_type)) : $history->details }}
                                    </td>
                                    <td align="left" valign="top">
                                        {{ $history->log_type ? ($history->status_comment ?: $history->details) : $history->status_comment }}
                                    </td>
                                    <td align="left" valign="top">
                                        <span style="text-transform:uppercase;">{{ $history->author?->name ?? '' }}</span>
                                    </td>
                                    <td width="25%" align="left" valign="top">
                                        {{ $history->date_added?->format('j F Y h:i A') }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
