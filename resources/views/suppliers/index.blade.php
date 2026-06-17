@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">

                <div class="page-content">



                    <!-- start page title -->
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card" style="min-height:500px;">
                                <div class="card-body" style="padding:0px;">
                                    <h4 class="card-title cardtitle">Suppliers<div class="float-right">

                                            <form action="" class="newsearchsecform" style="left:80px;" method="get"
                                                enctype="multipart/form-data">
                                                <input type="text" name="keyword" class="form-control newsearchsec"
                                                    placeholder="Search by name" value="" style="margin-top: 3px;">
                                                <input name="ga" type="hidden" value="suppliers">
                                            </form>

                                            <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                                                onclick="openSidebar('Add Supplier','{{ route('suppliers.create') }}')"
                                                data-backdrop="static">Add Supplier</button>

                                        </div>
                                    </h4>

                                    <table class="table table-hover mb-0">

                                        <thead>
                                            <tr>
                                                <th>Company</th>
                                                <th> Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Location</th>
                                                <th width="15%">By</th>
                                                <th width="12%">Date</th>
                                                <th width="1%">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($suppliers as $supplier)
                                                <tr>


                                                    <td>{{ $supplier->company_name }}</td>
                                                    <td>{{ $supplier->submit_name }} {{ $supplier->first_name }}
                                                        {{ $supplier->last_name }}</td>
                                                    <td>{{ $supplier->email }}</td>
                                                    <td>{{ $supplier->mobile_code }} {{ $supplier->mobile }}</td>
                                                    <td>{{ $supplier->destination?->name ?? '-' }}</td>
                                                    <td width="15%">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="addbynewbadges">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">

                                                                        <div class="listnameicon">{{ strtoupper(substr($supplier->user->name ?? '', 0, 1)) }}</div>
                                                                    </td>
                                                                    <td>{{ $supplier->user->submit_name ?? '' }} {{ $supplier->user->name ?? '' }} {{ $supplier->user->last_name ?? '' }}</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="12%">{{ $supplier->created_at->format('d M Y') }}</td>
                                                    <td width="1%">

                                                        <a class="dropdown-item neweditpan"
                                                            onclick="openSidebar('Edit Supplier','{{ route('suppliers.edit', $supplier->id ?? '') }}')"
                                                            data-toggle="modal" data-target="#myModal2"
                                                            data-backdrop="static"
                                                            popaction="action=addsupplier&amp;id=100360"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>

                                    <div class="mt-3 pageingouter">
                                        <div
                                            style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                            Total Records: <strong>{{ $suppliers->total() }}</strong></div>
                                        <div class="pagingnumbers"></div>

                                    </div>

                                </div>


                            </div>


                        </div>








                    </div><!--end col-->

                    <!-- end row -->

                </div>

                <!-- End Page-content -->


            </div>
        </div>
    </div>
@endsection
