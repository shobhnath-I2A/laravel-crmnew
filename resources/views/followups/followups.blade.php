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
                    <a data-toggle="modal"
                        data-target="#taskModal"
                        data-queryid="{{ $query->id }}"
                        style="position:absolute;font-size:12px;font-weight:600;
                        right:5px;top:5px;background:#005ee2;color:#fff;
                        padding:2px 10px;border-radius:3px;cursor:pointer;">
                        + Add Task
                        </a>
                    {{-- <a data-toggle="modal" data-target="#bs-task-modal-center" data-queryid="{{ $query->id }}" 
                        style="position: absolute; font-size: 12px; font-weight: 600; right: 5px; top: 5px; background-color: #005ee2; color: #fff; padding: 1px 10px; border-radius: 3px; cursor:pointer;">+
                        Add Task
                    </a> --}}
                </h4>
                <div class=" ">
                    <div style="text-align:center; color:#999999; width:100%; padding:40px;">No Task</div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('followups.task')