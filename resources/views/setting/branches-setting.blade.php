<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class="newboxheading">
            <div class="newhead">Branches<div class="newoptionmenu">
                    <div>
                        <button id="addteammember" type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                            onclick="openPopup('Branch Master','{{ route('branch-master.create') }}')"
                            data-backdrop="static">Branch Master</button>
                    </div>
                    <div>
                        <form action="" class=" " style="left:94px;" method="get"
                            enctype="multipart/form-data">
                            <input type="text" name="keyword" class="form-control newsearchsec"
                                placeholder="Search by name" value="" style="margin-top: 3px;">
                            <input name="ga" type="hidden" value="branches">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class=" ">
            <div class="col-md-12 col-xl-12" style="padding-top:32px;">
                <div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Branch</th>
                                    <th>Destinations</th>
                                    <th>Status</th>
                                    <th>By</th>
                                    <th>Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($branches as $branch)
                                    <tr>
                                        <td>{{ $branch->name }}</td>
                                        <td>{{ $branch->destinations }}</td>
                                        <td> <span
                                                class="badge {{ $branch->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $branch->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0"
                                                class="addbynewbadges">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="listnameicon">
                                                                {{ strtoupper(substr(optional($branch->user)->name ?? 'A', 0, 1)) }}
                                                            </div>
                                                        </td>
                                                        <td> {{ optional($branch->user)->name ?? '' }}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </td>
                                        <td>{{ $branch->created_at?->format('d-m-Y') }}</td>
                                        <td width="1%">
                                            <a class="dropdown-item neweditpan"
                                                onclick="openPopup('Branch Master','{{ route('branch-master.edit', $branch->id) }}')"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3 pageingouter">
                            <div
                                style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                Total Records: <strong>{{ $branches->count() }}</strong></div>
                            <div class="pagingnumbers"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</td>
