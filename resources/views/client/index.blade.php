@extends('layouts.app')
@section('content')
</div>
<div class="wrapper">
    <div class="newboxheading">
        <div class="newhead">Client
            <form action="{{ route('clients.index') }}" class="newsearchsecform" style="top: -9px; left: 76px !important;" method="get" enctype="multipart/form-data">
                <input type="text" name="keyword" class="form-control newsearchsec" placeholder="Search by name" value="{{ request('keyword') }}" style="margin-top: 3px;" >
            </form>
            <div class="newoptionmenu">
                <div>
                    <a onclick="openSidebar('Create Client','{{ route('clients.create') }}')">
                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" style="margin-bottom:10px;">Create Client</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid newpadding30">
        <div class="main-content">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card" style="min-height:500px;">
                            <div class="card-body" style="padding:0px;">
                                <form action="frmaction.html" method="post" enctype="multipart/form-data"
                                    name="addeditfrm" target="actoinfrm" id="addeditfrm">
                                    <div id="bulkassign"
                                        style="display:none;padding: 11px 2px 5px; background-color: #e4f3ff; border-bottom: 2px solid rgb(221, 221, 221); border-radius: 3px; width: 100%; float: left; display: none;">
                                        <table border="0" cellspacing="0" cellpadding="5">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size:13px;">
                                                        <input type="checkbox" id="ckbCheckAll" style="width: 16px; height: 16px;margin-left: 6px;">
                                                    </td>
                                                    <td style="font-size:13px;">Select All&nbsp;</td>
                                                    <td>
                                                        <select id="assignToPerson" name="assignToPerson"
                                                            class="form-control"
                                                            style="padding: 5px; font-size: 12px; height: 30px; line-height: 20px; color: #000; font-weight: 600;"
                                                            autocomplete="off">
                                                            <option value="0">Select Client Group</option>
                                                        </select></td>
                                                    <td><button type="submit" id="savingbutton" class="btn btn-primary"
                                                            onclick="this.form.submit(); this.value='Saving...';"
                                                            style="float:right;padding: 3px 10px;">
                                                            Save
                                                        </button></td>
                                                    <td><input autocomplete="false" name="action" type="hidden"
                                                            id="action" value="bulkclientaddtogroup"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th width="1%"></th>
                                                <th>Name</th>
                                                <th width="10%">Mobile</th>
                                                <th width="1%">Email</th>
                                                <th width="1%">City</th>
                                                <th width="1%">Status</th>
                                                <th width="12%" align="left">By</th>
                                                <th width="1%">&nbsp;</th>
                                                <th width="1%">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td width="1%">
                                                        <input type="checkbox" name="assignall[]"
                                                            class="checkBoxClass" id="assignqury" value="125645"
                                                            onclick="selectedfun();" style="width: 16px; height: 16px;">
                                                    </td>
                                                    <td><a onclick="openSidebar('Edit Client','{{ route('clients.edit', $client->id) }}')"><strong>
                                                        {{ $client->submit_name ?? '' }}  {{ $client->first_name ?? '' }} {{ $client->last_name ?? '' }}
                                                        </strong></a>
                                                    </td>
                                                    <td width="10%">{{ $client->mobile ?? '' }}</td>
                                                    <td width="1%">{{ $client->email ?? '' }}</td>
                                                    <td width="1%">{{ $client->city->name ?? '' }}</td>
                                                    <td width="1%"><span class="badge badge-success">Active</span></td>
                                                    <td width="12%" align="left">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="addbynewbadges">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div class="listnameicon">i</div>
                                                                    </td>
                                                                    <td>i2a</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="1%"><a class="dropdown-item neweditpan"
                                                            href="{{ route('clients.show', $client->id) }}"
                                                            style="float:left;"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a></td>
                                                    <td width="1%">
                                                        <a class="dropdown-item neweditpan" onclick="openSidebar('Edit Client','{{ route('clients.edit', $client->id) }}')">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                                 <div class="mt-3 pageingouter">
                                    <div style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                        Total Records: <strong>{{ $clientCount }}</strong>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $clients->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
