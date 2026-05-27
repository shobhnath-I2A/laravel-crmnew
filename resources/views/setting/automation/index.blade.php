<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class="newboxheading">
            <div class="newhead">Automation<div class="newoptionmenu">
                    <div>
                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                            onclick="openPopup('Add Stage','{{ route('automation.create') }}')"
                            data-backdrop="static">Add Stage</button>
                    </div>
                </div>
            </div>
        </div>
        <div class=" ">
            <div class="col-md-12 col-xl-12" style="padding-top:32px;">
                <div>
                    <div class="card-body">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Destination</th>
                                    <th>Package</th>
                                    <th>Stage</th>
                                    <th>Start Date </th>
                                    <th>End Date </th>
                                    <th>Status</th>
                                    <th align="left">By</th>
                                    <th>Update</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($automations as $automation)
                                    <tr>
                                        <td>{{ $automation->destination->name ?? '-' }}</td>
                                        <td>{{ $automation->package->name ?? '-' }}</td>
                                        <td> @if ($automation->query_status == 1)
                                                <span class="badge bg-success">New</span>
                                                @elseif ($automation->status ==2)
                                                <span class="badge bg-success">Active</span>
                                                @elseif ($automation->status ==3)
                                                <span class="badge bg-success">No Connect</span>
                                                @else
                                                <span class="badge bg-danger">Hot Lead</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($automation->start_date)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($automation->end_date)) }}</td>
                                        <td>
                                            @if ($automation->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $automation->user->name ?? '-' }}</td>
                                        <td>{{ $automation->updated_at?->format('d-m-Y') }}</td>
                                        <td>
                                            <a onclick="openPopup('Edit Stage','{{ route('automation.edit', $automation->id) }}')">
                                                <i class="fa fa-pencil"></i>
                                            </a>
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
</td>
