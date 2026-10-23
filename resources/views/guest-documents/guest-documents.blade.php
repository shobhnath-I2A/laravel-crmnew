<div class="card-body">
    <div style="padding:10px;">
        <div>
            <div>
                <div>
                    <h4 class="mt-0 header-title" style="border-bottom:0px; overflow:hidden; position:relative;">Guests
                        ({{ $query->guests->count() }})
                        <a onclick="openPopup('Add Guest',
                        '{{ route('query-guests.index') }}?query_id={{ $query->id }}')"
                            style="position:absolute;font-size:12px;font-weight:600;
                        right:5px;top:5px;background:#005ee2;color:#fff;
                        padding:2px 10px;border-radius:3px;cursor:pointer;">
                            + Add Guest
                        </a>
                    </h4>
                    <div class="card" style="padding:10px;">
                        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC"
                            style="font-size:14px;" class="table table-hover mb-0">

                            <thead>
                                <tr>
                                    <th bgcolor="#f5f7f9">First Name</th>
                                    <th bgcolor="#f5f7f9">Last Name</th>
                                    <th bgcolor="#f5f7f9">Gender</th>
                                    <th bgcolor="#f5f7f9">Date of Birth </th>
                                    <th width="1%" bgcolor="#f5f7f9"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($query->guests as $guest)
                                    <tr>
                                        <td align="left" valign="middle">
                                            {{ trim(($guest->title ? $guest->title . ' ' : '') . $guest->first_name) }}
                                        </td>
                                        <td align="left" valign="middle">{{ $guest->last_name }}</td>
                                        <td align="left" valign="middle">
                                            <span style="text-transform:uppercase;">{{ $guest->gender }}</span>
                                        </td>
                                        <td align="left" valign="middle">
                                            {{ $guest->dob ? \Carbon\Carbon::parse($guest->dob)->format('d-m-Y') : '' }}
                                        </td>
                                        <td width="1%" align="left" valign="middle">
                                            <div align="right" style="width:140px;">
                                                <button type="button" class="btn btn-info btn-sm waves-effect waves-light"
                                                    onclick="loadpop('Upload Documents',this,'600px')" data-toggle="modal"
                                                    data-target=".bs-example-modal-center"
                                                    popaction="action=addGuestDocuments&amp;queryId={{ $query->id }}&amp;id={{ $guest->id }}"
                                                    style="margin-bottom:0px; margin-bottom: 0px; margin: 0px 5px;">Document</button>

                                                <button type="button" class="btn btn-info btn-sm waves-effect waves-light"
                                                    onclick="openPopup('Edit Guest', '{{ route('query-guests.index', ['query_id' => $query->id, 'guest_id' => $guest->id]) }}')"
                                                    style="margin-bottom:0px; margin-bottom: 0px; margin: 0px 5px;">Edit</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('guest-documents.add-guest') --}}
