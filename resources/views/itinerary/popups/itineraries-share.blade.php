<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-content">
    <div class="modal-body" id="popcontent">
        @php
            $client = $itinerary->queryData;
            $withPriceUrl = $itinerary->public_share_enabled
                ? route('itinerary-share.public', $itinerary->public_share_price_token)
                : '';
            $withoutPriceUrl = $itinerary->public_share_enabled
                ? route('itinerary-share.public', $itinerary->public_share_no_price_token)
                : '';
            $phone = preg_replace('/\D+/', '', (string) ($client?->mobile ?? ''));
            $whatsappLink = static fn ($url) => $url
                ? 'https://api.whatsapp.com/send?' . http_build_query(['text' => $url, 'phone' => $phone])
                : '#';
        @endphp
        <script src="tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: ".editorclass",
                themes: "modern",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        </script>

        <style>
            .intab .nav-link.active {
                background-color: #6c757d;
            }

            .intab .nav-link {
                margin: 0px 15px;
                border: 1px solid #ddd;
            }
        </style>
        <ul class="nav nav-pills nav-bg-custom nav-justified intab" role="tablist" style=" text-transform:uppercase;">
            <li class="nav-item" style="text-transform:uppercase;">
                <a class="nav-link active show" data-toggle="tab" href="#tb1" role="tab"
                    aria-selected="true"><span class="d-none d-md-block">Share privately</span><span
                        class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tb2" role="tab" aria-selected="false"><span
                        class="d-none d-md-block">Share publicly</span><span class="d-block d-md-none"><i
                            class="mdi mdi-account h5"></i></span></a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active p-3" id="tb1" role="tabpanel">
                <p class="font-14 mb-3">Share your itinerary privately via email to specific recipients. Recipients will
                    be prompted to create a login in order to view this itinerary.</p>
                <p class="font-14 mb-0">
                </p>
                <h5 style="margin-bottom:0px;">Clients</h5>
                <span id="clientinfodata">
                    {{ $client ? 'Select client you would like to email this itinerary to.' : 'No client is linked to this itinerary.' }}
                </span>
                <p></p>
                <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate="novalidate"
                    method="post" enctype="multipart/form-data">
                    <div class="row" style="padding: 0px 6px;  ">
                        <div class="col-md-12 col-xl-12">
                            <div class="form-group">
                                <input id="clientkeywordsearch" type="search"
                                    class="form-control" placeholder="Enter name, email, mobile" value=""
                                    disabled="disabled" style="display: none;">
                                <div style="margin-top:20px;" id="loadSearchClients">
                                    <table class="table table-hover mb-0">
                                        <thead></thead>
                                        <tbody>
                                            @if ($client)
                                                <tr>
                                                    <td width="2%">
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="sendcheck[]"
                                                                value="{{ $client->id }}" checked="checked"
                                                                style="width: 19px; height: 22px;">
                                                        </div>
                                                    </td>
                                                    <td>{{ $client->name }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>{{ $client->mobile }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="4">No client is linked to this itinerary.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding: 0px 6px;">
                        <div class="col-md-12 col-xl-12">
                            <div class="form-group" style="  border-bottom: 1px solid #dedcdc;">
                                <input id="ccmails" name="ccmails" class="form-control" value=""
                                    placeholder="CC Mail">

                            </div>
                        </div>
                    </div>
                    <p class="font-14 mb-0">
                    </p>
                    <h5 style="margin-bottom:0px; margin-bottom:10px;">Add a message</h5>
                    <div class="row" style="padding: 0px 6px;">
                        <div class="col-md-12 col-xl-12">
                            <div class="form-group" style="  border-bottom: 1px solid #dedcdc;">
                                <textarea rows="4" class="form-control" name="shareMessage" placeholder="Enter message here"></textarea>
                            </div>
                        </div>
                    </div>
                    <p></p>

                    <div class="modal-footer" style=" position:relative; padding-right:0px;">
                        <input name="Save" type="submit" value="Send" id="savingbuttondd"
                            class="btn btn-success btn-lg waves-effect waves-light"
                            onclick="this.form.submit(); this.disabled=true; this.value='Saving...';"
                            style="float:right;">
                    </div>
                    <input name="action" type="hidden" id="action" value="shareprivateclients">
                    <input name="pid" type="hidden" id="privateShareItineraryId" value="{{ $itinerary->id }}">
                </form>
            </div>
            <div class="tab-pane p-3" id="tb2" role="tabpanel">
                <p class="font-14 mb-3">Activate link to enable the ability to share this itinerary with anyone (no
                    sign-in required).</p>
                <p class="font-14 mb-3">

                </p>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <div class="checkbox">
                                    <form id="sharelinkenable"
                                        action="{{ route('itinerary-share.update', $itinerary->id) }}"
                                        method="post">
                                        @csrf
                                        <input type="checkbox" name="linkSharing" id="linkSharing" value="1"
                                            @checked($itinerary->public_share_enabled)
                                            style="width: 19px; height: 22px;">
                                    </form>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;Turn on link sharing</td>
                        </tr>
                    </tbody>
                </table>
                <p></p>

                <div class="col-md-12 col-xl-12" style="padding:0px;">
                    <a id="withPriceWhatsapp" target="_blank"
                        href="{{ $whatsappLink($withPriceUrl) }}"
                        style="position: absolute; right: 0px; top: -4px;">
                        <button type="button" class="btn btn-light btn-sm"
                            style="background-color:#46cd93; color:#fff;"> <i class="fa fa-whatsapp"
                                aria-hidden="true"></i> WhatsApp</button></a>


                    <div style=" margin-bottom:5px;">With Price (Copy this link)</div>
                    <div class="form-group">
                        <input id="withPriceUrl" class="form-control" readonly="readonly"
                            value="{{ $withPriceUrl }}">
                    </div>
                </div>

                <div class="col-md-12 col-xl-12" style="padding:0px;">
                    <a id="withoutPriceWhatsapp" target="_blank"
                        href="{{ $whatsappLink($withoutPriceUrl) }}"
                        style="position: absolute; right: 0px; top: -4px;">
                        <button type="button" class="btn btn-light btn-sm"
                            style="background-color:#46cd93; color:#fff;"> <i class="fa fa-whatsapp"
                                aria-hidden="true"></i> WhatsApp</button></a>
                    <div style=" margin-bottom:5px; color:#FF0000;">Without Price (Copy this link)</div>
                    <div class="form-group">
                        <input id="withoutPriceUrl" class="form-control" readonly="readonly"
                            value="{{ $withoutPriceUrl }}">


                    </div>

                </div>
            </div>

        </div>
        <script>
            (function() {
                const shareForm = document.getElementById('sharelinkenable');
                if (!shareForm) return;

                const checkbox = document.getElementById('linkSharing');
                checkbox.addEventListener('change', function() {
                    shareForm.requestSubmit();
                });

                shareForm.addEventListener('submit', async function(event) {
                    event.preventDefault();
                    checkbox.disabled = true;

                    try {
                        const response = await fetch(shareForm.action, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ linkSharing: checkbox.checked ? 1 : 0 })
                        });

                        if (!response.ok) {
                            throw new Error('Unable to update public link sharing.');
                        }

                        const links = await response.json();
                        document.getElementById('withPriceUrl').value = links.withPriceUrl;
                        document.getElementById('withoutPriceUrl').value = links.withoutPriceUrl;
                        document.getElementById('withPriceWhatsapp').href = links.withPriceUrl
                            ? 'https://api.whatsapp.com/send?' + new URLSearchParams({
                                text: links.withPriceUrl,
                                phone: (links.phone || '').replace(/\D+/g, '')
                            })
                            : '#';
                        document.getElementById('withoutPriceWhatsapp').href = links.withoutPriceUrl
                            ? 'https://api.whatsapp.com/send?' + new URLSearchParams({
                                text: links.withoutPriceUrl,
                                phone: (links.phone || '').replace(/\D+/g, '')
                            })
                            : '#';
                    } catch (error) {
                        checkbox.checked = !checkbox.checked;
                        window.alert(error.message);
                    } finally {
                        checkbox.disabled = false;
                    }
                });
            })();

            $(document).ready(function() {
                $('.custom-validation').validate({

                    submitHandler: function(form) {
                        // Form submission logic here, e.g., AJAX call
                        $('.custom-validation #savingbutton').prop('disabled', true).val('Saving...');
                        form.submit();
                    }
                });
            });
        </script>
    </div>
</div>
