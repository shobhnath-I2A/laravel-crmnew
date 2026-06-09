<div class="card-body">
    <div style="padding:10px;">
        <div class="btn-toolbar p-3" role="toolbar" style="background-color: #cfd7df42;">
            <div class="btn-group mr-2 mb-2 mb-sm-0" style="overflow:visible;">
                <button type="button" class="btn btn-primary waves-light waves-effect"
                    onclick="openPopup(
                        'Compose Mail',
                        '{{ route('compose-email.create') }}?query_id={{ $query->id }}&email={{ urlencode($query->email) }}'
                    )">
                    <i class="fa fa-envelope-o"></i> Compose
                </button>
            </div>
            <div class="btn-group mr-2 mb-2 mb-sm-0">
                <button style="background-color: #fff; border: 1px solid #ddd; font-size:12px;" type="button"
                    class="btn btn-light waves-effect"
                    onclick="openPopup('Compose Mail', '{{ route('compose-email.create') }}')"><i
                        class="fa fa-info-circle"></i>
                    {{ $query->emailLogs[0]->to_email ?? '' }}
                </button>
            </div>
        </div>
        <style>
            .mailsent .fa-arrow-circle-left {
                font-size: 18px;
                color: #f47836;
                padding-right: 7px;
                position: absolute;
                top: 17px;
                left: 3px;
            }

            .message-list li {
                border-bottom: 1px solid #e6e6e6;
            }
        </style>
        <ul class="message-list">
            @foreach ($query->emailLogs as $mail)
                <li onclick="">
                    <div class="col-mail col-mail-1">
                        <a popaction="action=showquerymail&amp;id=142848&amp;queryId=127504"
                            onclick="loadpop('Mail',this,'900px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" class="title mailsent"
                            style=" cursor:pointer; left: 0px; padding-left:28px;">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> {{ $mail->to_email ?? '' }}</a>
                    </div>
                    <div class="col-mail col-mail-2">
                        <a class="title mailsent" popaction="action=showquerymail&amp;id=142848&amp;queryId=127504"
                            onclick="loadpop('Mail',this,'900px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" style="cursor:pointer;">
                            <span class="badge-warning badge mr-2"></span>{{ $mail->subject ?? '' }} </a>
                        <div class="date" style="padding-left:10px; font-size:12px;">
                            {{ $mail->created_at ? $mail->created_at->format('d F Y') : '' }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
