@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="newboxheading">
                        <div class="newhead">Queries
                            <div class="newoptionmenu">
                                <div>
                                    <a onclick="$('.searchquerymain').toggle();">
                                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray" style="margin-bottom:10px;">
                                            <i class="fa fa-filter" aria-hidden="true"></i> Filter
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray hideinmobile" data-toggle="dropdown" aria-expanded="false" style="margin-bottom:10px;">
                                        Options <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" style="position: absolute; transform: translate3d(1222px, 224px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start">
                                        <a class="dropdown-item" style="cursor:pointer;" href="client-Import.xls" target="_blank">Download Excel Format</a>
                                        <a class="dropdown-item" style="cursor:pointer;" onclick="loadpop('Import',this,'400px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=importFBleads">Import Excel</a>
                                        <a class="dropdown-item" style="cursor:pointer;" href="http://localhost:8081/crmreview/exportQuery.php?startDate=&endDate=&statusid=&searchcity=&searchsource=&searchconfirmproposal=&searchusers=&keyword=&keyword=" target="_blank">Export Data</a>
                                    </div>
                                </div>
                                <div>
                                    @if(auth()->user()->canAdd('Query'))
                                        <a onclick="openSidebar('Create Query','{{ route('queries.create') }}')">
                                            <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" style="margin-bottom:10px;">Add Query</button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xl-12" style="margin-left: 5px; margin-top: 35px;">
                            <div class="card" style="min-height:500px; border-radius: 0px; margin-bottom:0px; background-color:transparent;">
                                <div class="card-body" style="padding:0px;">
                                    <div class="hideinmobile searchquerymain" style="margin-bottom: 10px; float: left; width: 100%; border-top: 1px solid #dee2e6; border-bottom: 2px solid #dee2e6; background-color: #f3f3f3; padding: 8px;">
                                        <div class="row" style="margin-right: 0px; margin-left: 0px;">
                                            <div class="col-md-3 col-xl-3 ">
                                                <form action="{{ route('queries.index') }}" method="get" class="querytabsleadsearch">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td>
                                                                <input type="date" class="form-control" id="startDate" name="startDate" placeholder="From" value="{{ request('startDate') }}" style="width:130px;">
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <input type="date" class="form-control" id="endDate" name="endDate" placeholder="To" value="{{ request('endDate') }}" style="width:130px;">
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <input type="text" name="keyword" class="form-control" placeholder="Search by ID, name, email, mobile" value="{{ request('keyword') }}" style="width:250px;">
                                                                <input name="page" type="hidden" value="1" />
                                                                @if(request()->filled('statusId'))
                                                                    <input name="statusId" type="hidden" value="{{ request('statusId') }}" />
                                                                @endif
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <select name="searchcity" class="form-control" style="width:160px;">
                                                                    <option value="">All Destinations</option>
                                                                    @foreach($destinations as $destination)
                                                                        <option value="{{ $destination->id }}" {{ (string) request('searchcity') === (string) $destination->id ? 'selected' : '' }}>{{ $destination->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <select name="searchusers" class="form-control" style="width:130px;">
                                                                    <option value="">All Users</option>
                                                                    @foreach($users as $user)
                                                                        <option value="{{ $user->id }}" {{ (string) request('searchusers') === (string) $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <select name="searchsource" class="form-control" id="searchsource" style="width:140px;">
                                                                    <option value="">All Source</option>
                                                                    @foreach($leadSources as $source)
                                                                        <option value="{{ $source->name }}" {{ request('searchsource') === $source->name ? 'selected' : '' }}>{{ $source->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <button type="submit" class="btn btn-secondary btn-lg waves-effect waves-light"style="padding: 6px 10px;">
                                                                    <i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                            </td>
                                                            <td style="padding-left:5px;">
                                                                <a href="{{ route('queries.index') }}">
                                                                    <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" style="padding: 6px 10px;">All</button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 0px; padding: 10px; padding-right: 20px;" class="querytabslead">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                {{-- All Queries --}}
                                                <td width="5%">
                                                    <a href="{{ route('queries.index', request()->except(['statusId', 'page'])) }}">
                                                        <div class="statusbox {{ !request('statusId') ? 'active-status' : '' }}" style="background-color:#343a40;">
                                                            @if(!request('statusId'))
                                                                <div class="ripple" style="animation-delay:0s"></div>
                                                            @endif
                                                            <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                                                {{ $totalQueries }}
                                                            </div>
                                                            Total
                                                        </div>
                                                    </a>
                                                </td>
                                                @foreach($statuses as $status)
                                                <td width="10%">
                                                    <a href="{{ route('queries.index', array_merge(request()->except(['statusId', 'page']), ['statusId' => $status->id])) }}">
                                                        <div class="statusbox {{ request('statusId') == $status->id ? 'active-status' : '' }}" style="background-color:{{ $status->color }}">
                                                            @if(request('statusId') == $status->id)
                                                                <div class="ripple" style="animation-delay:0s"></div>
                                                            @endif
                                                            <div style="margin-bottom:0;font-size:30px;line-height:38px;">
                                                                {{ $statusCounts[$status->id] ?? 0 }}
                                                            </div>
                                                            {{ $status->name }}
                                                        </div>
                                                    </a>
                                                </td>
                                                @endforeach
                                            </tr>
                                        </table>
                                    </div>
                                    <form action="{{ route('queries.bulk-assign-user') }}" method="post" id="addeditfrm" style="padding:0px 10px 20px;">
                                        @csrf
                                        <div id="bulkassign" style="display:none;padding: 5px 2px; background-color: #f0f0f0; border-bottom: 2px solid #ddd; border-radius: 3px; margin-bottom: 10px;">
                                            <table border="0" cellspacing="0" cellpadding="5">
                                                <tr>
                                                    <td style="font-size:13px;"><input type="checkbox" id="ckbCheckAll" style="width: 16px; height: 16px;" /></td>
                                                    <td style="font-size:13px;">Select All&nbsp;</td>
                                                    <td>
                                                        <select id="assignToPerson" name="user_id" class="form-control" style="padding: 5px; font-size: 12px; height: 30px; line-height: 20px; color: #000; font-weight: 600;" autocomplete="off">
                                                            <option value="">Assign To</option>
                                                            @foreach($users as $user)
                                                                <option value="{{ $user->id }}">{{ Auth::id() == $user->id ? 'Assign to me' : $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="submit" id="savingbutton" class="btn btn-primary" style="float:right;padding: 3px 10px;">
                                                            Save
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <input autocomplete="off" name="bulk_action" type="hidden" id="bulk_action" value="bulkassignquery" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        @forelse($queries as $query)
                                            <div class="querylistbox">
                                                <div class="qtp">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="3%" align="left" valign="top" style="padding-right:10px;">
                                                                    <input type="checkbox" name="query_ids[]" class="checkBoxClass" id="assignqury{{ $query->id }}" value="{{ $query->id }}" onclick="selectedfun();" style="width: 16px; height: 16px;">
                                                                </td>
                                                                <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;">
                                                                        <a href="{{ route('queries.show',$query->id) }}">{{ $query->id}}</a>
                                                                    </div>
                                                                    @if($query->status)
                                                                        <span class="badge"
                                                                            style="background-color: {{ $query->status->color ?? '#6c757d' }};
                                                                                    color:#fff;">
                                                                            {{ $query->status->name }}
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">
                                                                     {{ $query->submitName}}   {{ $query->name }}
                                                                    </div>
                                                                    <div style="font-size:13px; color:#686868;">{{ $query->mobile }}
                                                                    </div>
                                                                </td>
                                                                <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="font-size:13px; color:#686868;">{{ $query->mobile }}
                                                                    </div>
                                                                </td>
                                                                <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="font-size:13px; line-height: 16px;">
                                                                        <span style="color:#686868;">Origin<br />
                                                                        </span><span
                                                                            style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">
                                                                            <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">{{ $query->originCity->name ?? '' }}</span>
                                                                        </span></div>
                                                                    <div style="font-size:13px; line-height: 16px;">
                                                                        <span style="color:#686868;">Destination<br />
                                                                        </span>
                                                                        <span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">
                                                                            <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">{{ $query->destinationCity->name ?? '' }}</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="font-size:12px; line-height: 16px; margin-bottom:3px;">
                                                                        <span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> {{ $query->startDate }}</div>
                                                                    <div style="font-size:12px; line-height: 16px;">
                                                                        <span  style="color:#686868;">Till</span> {{ $query->endDate }}</div>
                                                                </td>
                                                                <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>
                                                                    <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;">
                                                                        <i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;package send
                                                                    </div>
                                                                </td>
                                                                <td width="13%" align="right" valign="middle">
                                                                    <div class="btn-group" role="group" aria-label="Option">
                                                                        @if(auth()->user()->canView('Query'))
                                                                            <a href="{{ route('queries.show',$query->id) }}">
                                                                                <button type="button" class="btn btn-secondary">
                                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                                </button>
                                                                            </a>
                                                                        @endif
                                                                        <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone={{ preg_replace('/[^0-9]/', '', $query->mobile) }}">
                                                                            <button type="button" class="btn btn-secondary">
                                                                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                            </button>
                                                                        </a>
                                                                        <a popaction="action=composemail&queryId=127368" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center">
                                                                            <button type="button" class="btn btn-secondary">
                                                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                                            </button>
                                                                        </a>
                                                                        @if(auth()->user()->canEdit('Query'))
                                                                            <a onclick="openSidebar('Edit Query','{{ route('queries.edit',$query->id) }}')">
                                                                                <button type="button" class="btn btn-secondary">
                                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                                </button>
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="qbt">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="3%" align="center" valign="top" style="padding-right:10px;"> </td>
                                                                <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                                                    <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                                                                </td>
                                                                <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="color:#303030; font-size:12px; margin-bottom:3px;">
                                                                       {{ $query->email }}
                                                                    </div>
                                                                    <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                                                                </td>
                                                                <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="color:#303030; font-size:12px; margin-bottom:3px;">
                                                                        Travellers
                                                                    </div>
                                                                    <div style="font-size:13px; line-height: 16px;">{{ $query->adult}} <span style="color:#686868; font-size:11px;">Adult</span>
                                                                        {{ $query->child }} <span style="color:#686868; font-size:11px;">Clild</span>
                                                                        {{ $query->infant}} <span style="color:#686868; font-size:11px;">Infant</span>
                                                                    </div>
                                                                </td>
                                                                <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                                                    <div style="color:#303030; font-size:12px; margin-bottom:3px;">
                                                                        Assigned to
                                                                    </div>
                                                                    <div style="font-size:12px;">
                                                                        <select id="assignTo{{ $query->id }}" name="assignTo" class="form-control" style="padding:3px;font-size:12px;height:25px;line-height:15px;color:#000;font-weight:600;" onchange="changeAssignTo('{{ $query->id }}', this.value);">
                                                                            @foreach($users as $user)
                                                                                <option value="{{ $user->id }}"
                                                                                    {{ $query->assignTo == $user->id ? 'selected' : '' }}>
                                                                                    {{ Auth::id() == $user->id ? 'Assign to me' : $user->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td align="left" valign="top">
                                                                    <div style="font-size:12px; line-height: 16px; margin-bottom:3px;">
                                                                        <span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span>
                                                                    </div>
                                                                    <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">
                                                                      {{ $query->created_at->format('d/m/Y - h:i A') }}
                                                                    </div>
                                                                </td>
                                                                <td width="13%" align="left" valign="top">
                                                                    <div style="font-size:12px; line-height: 16px; margin-bottom:3px;">
                                                                        <span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span>
                                                                    </div>
                                                                    <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">
                                                                       {{ $query->updated_at->format('d/m/Y - h:i A') }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="viewpackageheader" onclick="$('#pro{{ $query->id ?? '' }}').toggle();">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                    &nbsp;View Proposal ({{ $query->itineraries->count() }})
                                                </div>
                                                <div class="proposallistouter" style="display:none;" id="pro{{ $query->id ?? '' }}">
                                                    @forelse($query->itineraries as $itinerary)
                                                        <a href="{{ route('itineraries.show', $itinerary->id) }}">
                                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                            &nbsp;
                                                            {{ $itinerary->name }}
                                                            {{ $itinerary->total_days ? $itinerary->total_days . ' Days' : '' }}
                                                            @if($itinerary->website_cost)
                                                                (₹ {{ number_format($itinerary->website_cost, 0) }})
                                                            @endif
                                                            &nbsp;
                                                        </a>
                                                    @empty
                                                        <span>No proposal found</span>
                                                    @endforelse
                                                </div>
                                            </div>
                                        @empty
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td colspan="6" class="text-center">No Records Found</td>
                                            </tr>
                                        </table>
                                        @endforelse
                                    </form>
                                   <div class="mt-3 pageingouter">
                                        {{ $queries->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function changeAssignTo(queryId, userId)
            {
                $.ajax({
                    url: "{{ route('queries.assign-user') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        query_id: queryId,
                        user_id: userId
                    },
                    success: function(response) {
                        toastr.success('User assigned successfully');
                    },
                    error: function() {
                        toastr.error('Something went wrong');
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function () {
                var form = document.getElementById('addeditfrm');
                var button = document.getElementById('savingbutton');
                var userSelect = document.getElementById('assignToPerson');
                var bulkPanel = document.getElementById('bulkassign');

                if (!form || !button || !userSelect) return;

                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    var queryIds = Array.prototype.map.call(
                        form.querySelectorAll('.checkBoxClass:checked'),
                        function (checkbox) { return checkbox.value; }
                    );
                    var userId = userSelect.value;

                    if (queryIds.length === 0) {
                        if (window.toastr) window.toastr.error('Please select at least one query');
                        return;
                    }
                    if (!userId) {
                        if (window.toastr) window.toastr.error('Please select a user');
                        return;
                    }

                    var formData = new FormData();
                    formData.append('_token', form.querySelector('input[name="_token"]').value);
                    formData.append('user_id', userId);
                    queryIds.forEach(function (queryId) {
                        formData.append('query_ids[]', queryId);
                    });

                    button.disabled = true;
                    button.textContent = 'Saving...';

                    fetch(form.getAttribute('action'), {
                        method: 'POST',
                        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                        body: formData
                    }).then(function (response) {
                        return response.json().catch(function () {
                            throw new Error('Something went wrong');
                        }).then(function (data) {
                            if (!response.ok) throw new Error(data.message || 'Something went wrong');
                            return data;
                        });
                    }).then(function (data) {
                        if (window.toastr) window.toastr.success(data.message || 'Queries assigned successfully');
                        form.querySelectorAll('.checkBoxClass, #ckbCheckAll').forEach(function (checkbox) {
                            checkbox.checked = false;
                        });
                        if (bulkPanel) bulkPanel.style.display = 'none';
                        userSelect.value = '';
                        window.location.reload();
                    }).catch(function (error) {
                        if (window.toastr) window.toastr.error(error.message);
                    }).finally(function () {
                        button.disabled = false;
                        button.textContent = 'Save';
                    });
                });
            });
        </script>
    </div>
@endsection
