<div class="card-body">
    <div style="padding:10px;">
        <style>
            .table td,
            .table th {
                vertical-align: middle;
            }
        </style>
        <div class="overflowautomobiletable">
            <div class="querydetailinsideheading">Proposals
                <div>
                    <a class="nav-link {{ request('status', 'active') != 3 ? 'active show' : '' }}"
                        href="{{ route('queries.show', [
                            'id' => $query->id,
                            'tab' => 'proposals',
                            'status' => 'active',
                        ]) }}">
                        <span class="d-none d-md-block">All Proposals</span>
                    </a>

                    <a class="nav-link {{ request('status') == 3 ? 'active show' : '' }}"
                        href="{{ route('queries.show', [
                            'id' => $query->id,
                            'tab' => 'proposals',
                            'status' => 3,
                        ]) }}">
                        <span class="d-none d-md-block">Archived Proposals</span>
                    </a>
                </div>
            </div>
            <div class="proposalboxouterbox">
                @forelse($query->itineraries as $itinerary)
                    <div class="itibox">
                        <div class="card">
                            <a href="{{ route('itineraries.show', $itinerary->id) }}">
                                <div class="imgbox">
                                    <img src="https://s3.us-east-2.amazonaws.com/package.images/package_image/1700731548.jpg"
                                        style="width:100%; height:auto; min-height:100%;">
                                    <div class="packname">{{ $itinerary->name ?? '' }}
                                        <div style="color:#fff; font-size:11px; margin-top:2px;">
                                            {{ $query->destination ?? '' }}</div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <table width="100%" border="0" cellpadding="5" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td align="left" valign="top">
                                                <div class="smtext">ID: <strong>
                                                        <div>{{ $itinerary->id ?? '' }}</div>
                                                    </strong></div>
                                                <div class="optionmenu">
                                                    <button type="button" class="optionmenu" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i> </button>
                                                    <div class="dropdown-menu" style="">
                                                        <div class="leg" style="display:none;">CHANGE STATUS</div>

                                                        <a style="display:none;"
                                                            href="display.html?ga=query&amp;view=1&amp;id=127368&amp;c=2&amp;status=1&amp;i=109047"
                                                            class="dropdown-item">Proposal <i class="fa fa-check"
                                                                aria-hidden="true"></i></a>

                                                        <a style="display:none;"
                                                            href="display.html?ga=query&amp;view=1&amp;id=127368&amp;c=2&amp;status=3&amp;i=109047&amp;s="
                                                            class="dropdown-item">Itinerary accepted</a>

                                                        <a style="display:none;"
                                                            href="display.html?ga=query&amp;view=1&amp;id=127368&amp;c=2&amp;status=2&amp;i=109047&amp;s="
                                                            class="dropdown-item">Final</a>
                                                        <!--<hr />-->
                                                        <div class="leg">ACTIONS</div>
                                                        <a class="dropdown-item" target="_blank"
                                                            href="https://api.whatsapp.com/send?text=http://localhost:8081/API/sharepackage/109047/ms-seema-trails-to-malaysia-5n6d-.html&amp;phone=+918892078092"><i
                                                                class="fa fa-whatsapp" aria-hidden="true"></i>
                                                            &nbsp;WhatsApp</a>

                                                        <a class="dropdown-item" style="cursor:pointer;"
                                                            onclick="loadpop('Itinerary setup',this,'600px')"
                                                            data-toggle="modal" data-target=".bs-example-modal-center"
                                                            popaction="action=addtineraries&amp;id=109047&amp;queryid=127368&amp;fromquery=1">Edit
                                                            Itinerary</a>

                                                        <a href="javascript:void(0)"
                                                            onclick="duplicateItinerary({{ $itinerary->id }})"
                                                            class="dropdown-item">
                                                            Duplicate
                                                        </a>

                                                        <a href="javascript:void(0)"
                                                            onclick="archiveItinerary({{ $itinerary->id }})"
                                                            class="dropdown-item">
                                                            Archive
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="60%" align="left" valign="top">
                                                <div class="smtext">Pax: <strong>
                                                        <strong>
                                                            {{ $itinerary->adult ?? '' }} Adult(s) -
                                                            {{ $itinerary->child ?? '' }} Child(s)
                                                        </strong>
                                                    </strong></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                <div class="smtext">From: <strong>
                                                        <div>
                                                            {{ \Carbon\Carbon::parse($itinerary->start_date)->format('d M Y') }}
                                                        </div>
                                                    </strong></div>
                                            </td>
                                            <td width="60%" align="left" valign="top">
                                                <div class="smtext">To: <strong>
                                                        <div>
                                                            {{ \Carbon\Carbon::parse($itinerary->end_date)->format('d M Y') }}
                                                        </div>
                                                    </strong></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                <div class="smtext">By: <strong>Sunil...</strong></div>
                                            </td>
                                            <td width="60%" align="left" valign="top">
                                                <div class="smtext">Created: <strong>04/08/2025</strong></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center" valign="top">
                                                <div
                                                    style="font-size:18px; font-weight:600; border-top:1px solid #ddd; padding-top:10px; color:#000000;">
                                                    Option 1: ₹ 98,679<br>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="left" valign="top">
                                                @if ($itinerary->status == 1)
                                                    <button type="button" class="btn btn-success btn-lg"
                                                        style="width:100%;font-weight:600;" disabled>
                                                        <i class="fa fa-check-circle"></i>
                                                        Accepted
                                                    </button>
                                                @else
                                                    <button id="acceptBtn_{{ $itinerary->id }}" type="button"
                                                        class="btn btn-warning btn-lg"
                                                        onclick="openAcceptModal({{ $itinerary->id }}, '{{ $itinerary->website_cost ?? 0 }}')">
                                                        Mark as Accepted
                                                    </button>
                                                    {{-- <button type="button" class="btn btn-warning btn-lg"
                                                        style="width:100%;"
                                                        onclick="openAcceptModal({{ $itinerary->id }}, '{{ $itinerary->website_cost ?? 0 }}')">
                                                        Mark as Accepted
                                                    </button> --}}
                                                @endif

                                                <button type="button"
                                                    class="btn btn-info btn-lg waves-effect waves-light"
                                                    style="width: 100%; background-color: #3574b3 !important; border-color: #246090 !important; color: #ffffff; font-weight: 600 !important; margin-top: 10px;"
                                                    onclick="loadpop('View Quotation',this,'1000px')"
                                                    data-toggle="modal" data-target=".bs-example-modal-center"
                                                    popaction="action=viewquotation&amp;id=109047">View
                                                    Quotation</button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

                <div class="itibox">
                    <div class="card addnewcard" style="height:509px;">
                        <a href="{{ route('itineraries.create', ['queryId' => $query->id]) }}"
                            class="btn btn-info btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Create
                            itinerary</a>

                        <a href="{{ route('itineraries.index', ['queryId' => $query->id]) }}"
                            class="btn btn-warning btn-lg"
                            style="margin-top:20px; background-color:#005ee2; border:1px solid #005ee2; color:#fff;">
                            Insert itinerary
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="acceptItineraryModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Alert</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>

                        <div class="modal-body text-center">
                            <h4>You are about to confirm an itinerary</h4>
                            <p>This action cannot be undone.</p>

                            <div style="background:#e5ffff;padding:20px;">
                                <label><strong>Select Hotel Option</strong></label>

                                <select id="acceptOption" class="form-control">
                                    <option value="">Select</option>
                                </select>

                                <input type="hidden" id="acceptItineraryId">
                            </div>

                            <button type="button" class="btn btn-success mt-3" onclick="confirmAcceptItinerary()">
                                Confirm Itinerary
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script>
            function duplicateItinerary(id) {
                if (!confirm('Are you sure you want to duplicate this itinerary?')) {
                    return false;
                }

                $.ajax({
                    url: "{{ url('itineraries') }}/" + id + "/duplicate",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#ajaxLoader').hide();
                        $('#toastMessage').html(
                            '<div class="toast-box">' + response.message + '</div>'
                        );
                        setTimeout(function() {
                            $('#toastMessage').fadeOut();
                        }, 3000);
                        closeSidebar();
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    },

                    // success: function(response) {
                    //     if (response.status === true) {
                    //         alert(response.message);
                    //         location.reload();
                    //     } else {
                    //         alert(response.message);
                    //     }
                    // },
                    error: function(xhr) {
                        $('#ajaxLoader').hide();
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                let input = $('[name="' + key + '"]');
                                input.addClass('is-invalid');
                                input.after(
                                    '<div class="validation-error text-danger">' + value[0] +
                                    '</div>'
                                );
                            });
                        }
                    }
                });
            }

            // archive itinerary
            function archiveItinerary(id) {
                if (!confirm('Are you sure you want to archive this itinerary?')) {
                    return;
                }

                $.ajax({
                    url: '/itineraries/' + id + '/archive',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#ajaxLoader').hide();
                        $('#toastMessage').html(
                            '<div class="toast-box">' + response.message + '</div>'
                        );
                        setTimeout(function() {
                            $('#toastMessage').fadeOut();
                        }, 3000);
                        closeSidebar();
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    },
                    // success: function(res) {
                    //     alert(res.message);
                    //     location.reload();
                    // }
                });
            }

            function acceptItinerary(id) {
                if (!confirm('Mark this itinerary as accepted?')) {
                    return;
                }

                $.ajax({
                    url: '/itineraries/' + id + '/accept',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#ajaxLoader').hide();
                        $('#toastMessage').html(
                            '<div class="toast-box">' + response.message + '</div>'
                        );
                        setTimeout(function() {
                            $('#toastMessage').fadeOut();
                        }, 3000);
                        closeSidebar();
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    },
                    // success: function(res) {
                    //     alert(res.message);
                    //     location.reload();
                    // }
                });
            }

            function openAcceptModal(id, amount) {

                $('#acceptItineraryId').val(id);

                $('#acceptOption').html(`
        <option value="">Select</option>
        <option value="1">Option 1 : ₹ ${amount}</option>
    `);

                $('#acceptItineraryModal').modal('show');
            }

            function confirmAcceptItinerary() {

                let id = $('#acceptItineraryId').val();
                let option = $('#acceptOption').val();

                if (!option) {

                    $('#toastMessage').html(
                        '<div class="toast-box toast-error">Please select hotel option.</div>'
                    ).show();

                    setTimeout(function() {
                        $('#toastMessage').fadeOut();
                    }, 3000);

                    return false;
                }

                $('#ajaxLoader').show();

                $.ajax({
                    url: '/itineraries/' + id + '/accept',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        hotel_options: option
                    },

                    success: function(response) {

                        $('#ajaxLoader').hide();

                        // Close modal
                        $('#acceptItineraryModal').modal('hide');

                        // Remove backdrop if it remains
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');

                        // Show toast message
                        $('#toastMessage').html(
                            '<div class="toast-box">' + response.message + '</div>'
                        ).show();

                        setTimeout(function() {
                            $('#toastMessage').fadeOut();
                        }, 3000);

                        // Reload page
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },

                    error: function(xhr) {

                        $('#ajaxLoader').hide();

                        if (xhr.status === 422) {

                            $('.validation-error').remove();
                            $('.is-invalid').removeClass('is-invalid');

                            let errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, value) {

                                let input = $('[name="' + key + '"]');

                                input.addClass('is-invalid');

                                input.after(
                                    '<div class="validation-error text-danger">' +
                                    value[0] +
                                    '</div>'
                                );
                            });

                        } else {

                            alert(
                                xhr.responseJSON?.message ||
                                'Something went wrong'
                            );
                        }
                    }
                });
            }
        </script>
    </div>
</div>
