<div class="card-body">
    <div style="padding:10px;">
        <div>
            <div>
                <div>
                    <h4 class="mt-0 header-title" style="border-bottom:0px; overflow:hidden; position:relative;">Guests (0)
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
                                {{ $queryGuest??'' }}
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('guest-documents.add-guest') --}}
