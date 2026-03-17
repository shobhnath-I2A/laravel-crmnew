<div class="card-body">
    <div style="padding:10px;">
        <style>
            .tasklist {
                border: 0px solid #ddd;
                border-left: 0px solid #ff8a12;
                background-color: #fff;
                border-radius: 4px;
                margin-bottom: 0px;
                margin-top: 0px;
            }

            .tasklist .iconbox {
                width: 42px;
                height: 42px;
                margin-right: 10px;
                background-color: #ebeff3;
                color: #595959;
                text-align: center;
                line-height: 40px;
                font-size: 18px;
                border-radius: 100%;
                border: 1px solid #cfd7df;
            }

            .tasklist .card-body {
                padding: 10px !important;
            }

            .makedone {
                border-left: 5px solid #009900;
            }

            .makedone .iconbox {
                background-color: #009900;
            }

            .makenotedone {
                border: 1px solid #CC3300;
                border-left: 5px solid #CC3300;
            }

            .makenotedone .iconbox {
                background-color: #CC3300;
            }
        </style>
        <div class="row" style=" margin-right:1px;">
            <div class="col-lg-12" style="padding-left:15px;">
                <h4 class="mt-0 header-title" style="margin-bottom:10px;">Followup's / Task
                    <a data-toggle="modal" data-target="#taskModal" data-queryid="{{ $query->id }}"
                        style="position:absolute;font-size:12px;font-weight:600;
                        right:5px;top:5px;background:#005ee2;color:#fff;
                        padding:2px 10px;border-radius:3px;cursor:pointer;">
                        + Add Task
                    </a>
                </h4>
                <div class=" ">
                    <div class="">
                        <div class="tasklist">
                            @foreach($query->tasks as $task)
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" align="left" valign="top">
                                                <div class="iconbox">
                                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>

                                                </div>
                                            </td>
                                            <td width="98%" align="left" valign="top" style="position:relative;">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <i class="fa fa-square-o" aria-hidden="true"
                                                            style="font-size:24px; color:#333333; cursor:pointer; position:absolute; right:10px; top:22px;"
                                                            data-placement="top" data-original-title="Click to complete"
                                                            onclick="loadpop('Alert',this,'600px')" data-toggle="modal"
                                                            data-target=".bs-example-modal-center"
                                                            popaction="action=confirmtask&amp;id=100339&amp;qid=127504"></i>



                                                        <div style="margin-bottom: 5px; font-size: 14px; font-weight: 600;">
                                                            <span style="font-size:11px; color:#333;">i2a
                                                                Technologies</span><i class="fa fa-circle"
                                                                aria-hidden="true"
                                                                style="color: #b2bad066; margin: 0px 10px; font-size:8px;"></i><span
                                                                style="font-size:11px; color:#333; ">Due on: @if($task->reminderDate)
                                                                    {{ \Carbon\Carbon::parse($task->reminderDate)->format('d-m-Y h:i A') }}
                                                                @endif
                                                            </span></div>

                                                        <div style="margin-bottom: 0px; font-size: 13px; font-weight: 600;"> {{ $task->details }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('followups.task')
