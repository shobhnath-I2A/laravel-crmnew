<div class="card-body">
    <div style="padding:10px;">
        <div class="btn-toolbar p-3" role="toolbar" style="background-color: #cfd7df42;">
            <div class="btn-group mr-2 mb-2 mb-sm-0" style="overflow:visible;">
                <button type="button"
                    class="btn btn-primary waves-light waves-effect"
                    data-toggle="modal"
                    data-target="#composeMailModal">
                    <i class="fa fa-envelope-o"></i> Compose
                </button>
                {{-- <button type="button" popaction="action=composemail&amp;queryId=127504"
                    onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal"
                    data-target=".bs-example-modal-center" class="btn btn-primary waves-light waves-effect"><i
                        class="fa fa-envelope-o"></i> &nbsp;Compose
                </button> --}}
            </div>
            <div class="btn-group mr-2 mb-2 mb-sm-0">
                <button style="background-color: #fff; border: 1px solid #ddd; font-size:12px;" type="button"
                    class="btn btn-light waves-effect" popaction="action=composemail&amp;queryId=127504"
                    onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal"
                    data-target=".bs-example-modal-center"><i class="fa fa-info-circle"></i>
                    ijharaaajsm@gmsil.com
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
            <li onclick="">
                <div class="col-mail col-mail-1">
                    <a popaction="action=showquerymail&amp;id=142848&amp;queryId=127504" onclick="loadpop('Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center" class="title mailsent" style=" cursor:pointer; left: 0px; padding-left:28px;">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> ijharaaajsm@gmsil.com</a>
                </div>
                <div class="col-mail col-mail-2">
                    <a class="title mailsent" popaction="action=showquerymail&amp;id=142848&amp;queryId=127504" onclick="loadpop('Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center" style="cursor:pointer;">
                        <span class="badge-warning badge mr-2"></span>#027504 Query Created! </a>
                    <div class="date" style="padding-left:10px; font-size:12px;">12 March 2026</div>
                </div>
            </li>
        </ul>
    </div>
</div>
{{-- Mail popup form --}}
<div class="modal fade" id="composeMailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Compose Mail</h5>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>From:test-holidays@trekhops.in</label>
                    </div>
                    <div class="form-group">
                        <label>To</label>
                        <input type="email" class="form-control"
                            value="{{ $query->email ?? '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>CC</label>
                        <input type="text" class="form-control" name="cc">
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject">
                    </div>
                    <div class="form-group">
                        <label>Mail Body</label>
                        <textarea id="editor" name="message" class="form-control" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Attachment</label>
                        <input type="file" name="attachment" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Send Mail
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End mail popup form --}}