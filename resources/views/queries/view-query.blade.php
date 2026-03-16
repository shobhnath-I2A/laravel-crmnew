@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="newboxheading">
                        <div class="newhead">Query ID: {{ $query->id }}
                            <div class="newoptionmenu">
                                <div>
                                    <a onclick="openSidebar('Edit Query','{{ route('queries.edit', $query->id) }}')">
                                        <button type="button"
                                            class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray"
                                            style="margin-bottom:10px;">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit</button>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('queries.show',['id'=>$query->id,'tab'=>'followups']) }}">
                                        <button type="button"
                                            class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray"
                                            style="margin-bottom:10px;">
                                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                            &nbsp;Task</button>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('queries.show',['id'=>$query->id,'tab'=>'mails']) }}">
                                        <button type="button"
                                            class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray"
                                            style="margin-bottom:10px;">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp;Email</button>
                                    </a>                                 
                                </div>
                                <div>
                                    <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&amp;phone=+918882355788">
                                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray" style="margin-bottom:10px;">
                                            <i class="fa fa-whatsapp" aria-hidden="true" style="color:#009900;"></i>
                                            &nbsp;Whatsapp
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .breadcrumb {
                            list-style: none;
                            overflow: hidden;
                            font: 18px Helvetica, Arial, Sans-Serif;
                            margin: 0px;
                            padding: 0;
                            margin-bottom: 0px;
                            margin-left: 0px;
                        }

                        .breadcrumb li {
                            float: left;
                        }

                        .breadcrumb li a {
                            color: white;
                            text-decoration: none;
                            padding: 10px 0 10px 55px;
                            background: brown;
                            background: hsla(34, 85%, 35%, 1);
                            position: relative;
                            display: block;
                            float: left;
                            background-color: #cfd7df;
                            color: #000;
                            font-size: 13px;
                        }

                        .breadcrumb li a:after {
                            content: " ";
                            display: block;
                            width: 0;
                            height: 0;
                            border-top: 50px solid transparent;
                            border-bottom: 50px solid transparent;
                            border-left: 30px solid #cfd7df;
                            position: absolute;
                            top: 50%;
                            margin-top: -50px;
                            left: 100%;
                            z-index: 2;
                        }

                        .breadcrumb li a:before {
                            content: " ";
                            display: block;
                            width: 0;
                            height: 0;
                            border-top: 50px solid transparent;
                            /* Go big on the size, and let overflow hide */
                            border-bottom: 50px solid transparent;
                            border-left: 30px solid white;
                            position: absolute;
                            top: 50%;
                            margin-top: -50px;
                            margin-left: 1px;
                            left: 100%;
                            z-index: 1;
                        }

                        .breadcrumb li:first-child a {
                            padding-left: 10px;
                        }


                        .breadcrumb li a:hover {
                            background: #cecece !important;
                        }

                        .breadcrumb li a:hover:after {
                            border-left-color: #cecece !important;
                        }


                        .steps {
                            margin: 40px;
                            padding: 0;
                            overflow: hidden;
                        }

                        .steps a {
                            color: white;
                            text-decoration: none;
                        }

                        .steps em {
                            display: block;
                            font-size: 1.1em;
                            font-weight: bold;
                        }

                        .steps li {
                            float: left;
                            margin-left: 0;
                            width: 150px;
                            /* 100 / number of steps */
                            height: 70px;
                            /* total height */
                            list-style-type: none;
                            padding: 5px 5px 5px 30px;
                            /* padding around text, last should include arrow width */
                            border-right: 3px solid white;
                            /* width: gap between arrows, color: background of document */
                            position: relative;
                        }

                        /* remove extra padding on the first object since it doesn't have an arrow to the left */
                        .steps li:first-child {
                            padding-left: 5px;
                        }

                        /* white arrow to the left to "erase" background (starting from the 2nd object) */
                        .steps li:nth-child(n+2)::before {
                            position: absolute;
                            top: 0;
                            left: 0;
                            display: block;
                            border-left: 25px solid white;
                            /* width: arrow width, color: background of document */
                            border-top: 40px solid transparent;
                            /* width: half height */
                            border-bottom: 40px solid transparent;
                            /* width: half height */
                            width: 0;
                            height: 0;
                            content: " ";
                        }

                        /* colored arrow to the right */
                        .steps li::after {
                            z-index: 1;
                            /* need to bring this above the next item */
                            position: absolute;
                            top: 0;
                            right: -25px;
                            /* arrow width (negated) */
                            display: block;
                            border-left: 25px solid #7c8437;
                            /* width: arrow width */
                            border-top: 40px solid transparent;
                            /* width: half height */
                            border-bottom: 40px solid transparent;
                            /* width: half height */
                            width: 0;
                            height: 0;
                            content: " ";
                        }

                        /* Setup colors (both the background and the arrow) */

                        /* Completed */
                        .steps li {
                            background-color: #7C8437;
                        }

                        .steps li::after {
                            border-left-color: #7c8437;
                        }

                        /* Current */
                        .steps li.current {
                            background-color: #C36615;
                        }

                        .steps li.current::after {
                            border-left-color: #C36615;
                        }

                        /* Following */
                        .steps li.current~li {
                            background-color: #EBEBEB;
                        }

                        .steps li.current~li::after {
                            border-left-color: #EBEBEB;
                        }

                        /* Hover for completed and current */
                        .steps li:hover {
                            background: #cecece !important;
                        }

                        .steps li:hover::after {
                            border-left-color: #696
                        }



                        .arrows {
                            white-space: nowrap;
                        }

                        .arrows li {
                            display: inline-block;
                            line-height: 26px;
                            margin: 0 9px 0 -10px;
                            padding: 0 20px;
                            position: relative;
                        }

                        .arrows li::before,
                        .arrows li::after {
                            border-right: 1px solid #666666;
                            content: '';
                            display: block;
                            height: 50%;
                            position: absolute;
                            left: 0;
                            right: 0;
                            top: 0;
                            z-index: -1;
                            transform: skewX(45deg);
                        }

                        .arrows li::after {
                            bottom: 0;
                            top: auto;
                            transform: skewX(-45deg);
                        }

                        .arrows li:last-of-type::before,
                        .arrows li:last-of-type::after {
                            display: none;
                        }

                        .arrows li a {
                            font: bold 24px Sans-Serif;
                            letter-spacing: -1px;
                            text-decoration: none;
                        }

                        .arrows li:nth-of-type(1) a {
                            color: hsl(0, 0%, 70%);
                        }

                        .arrows li:nth-of-type(2) a {
                            color: hsl(0, 0%, 65%);
                        }

                        .arrows li:nth-of-type(3) a {
                            color: hsl(0, 0%, 50%);
                        }

                        .arrows li:nth-of-type(4) a {
                            color: hsl(0, 0%, 45%);
                        }


                        .stclass1 a {
                            background-color: #655be6 !important;
                            color: #fff !important;
                        }

                        .stclass1 a::after {
                            border-left: 30px solid #655be6 !important;
                        }

                        .stclass2 a {
                            background-color: #0cb5b5 !important;
                            color: #fff !important;
                        }

                        .stclass2 a::after {
                            border-left: 30px solid #0cb5b5 !important;
                        }

                        .stclass3 a {
                            background-color: #0f1f3e !important;
                            color: #fff !important;
                        }

                        .stclass3 a::after {
                            border-left: 30px solid #0f1f3e !important;
                        }

                        .stclass4 a {
                            background-color: #e45555 !important;
                            color: #fff !important;
                        }

                        .stclass4 a::after {
                            border-left: 30px solid #e45555 !important;
                        }

                        .stclass5 a {
                            background-color: #46cd93 !important;
                            color: #fff !important;
                        }

                        .stclass5 a::after {
                            border-left: 30px solid #46cd93 !important;
                        }

                        .stclass6 a {
                            background-color: #6c757d !important;
                            color: #fff !important;
                        }

                        .stclass6 a::after {
                            border-left: 30px solid #6c757d !important;
                        }

                        .stclass7 a {
                            background-color: #f9392f !important;
                            color: #fff !important;
                        }

                        .stclass7 a::after {
                            border-left: 30px solid #f9392f !important;
                        }

                        .stclass8 a {
                            background-color: #cc00a9 !important;
                            color: #fff !important;
                        }

                        .stclass8 a::after {
                            border-left: 30px solid #cc00a9 !important;
                        }

                        .stclass9 a {
                            background-color: #FF6600 !important;
                            color: #fff !important;
                        }

                        .stclass9 a::after {
                            border-left: 30px solid #FF6600 !important;
                        }

                        .header-title {
                            padding: 6px 10px;
                            background-color: #f7f7f7;
                            border-radius: 4px;
                        }

                        .querydetailinsideheading {
                            font-size: 18px;
                            margin-bottom: 10px;
                            font-weight: 600;
                            color: #000;
                            position: relative;
                        }

                        .querydetailinsideheading div {
                            position: absolute;
                            right: 0px;
                            top: 0px;
                        }

                        .querydetailinsideheading div a {
                            font-size: 12px;
                            background-color: #e6ebf2;
                            color: #030303;
                            padding: 4px 10px !important;
                            border-radius: 6px;
                            float: left;
                            margin-left: 5px;
                        }

                        .querydetailinsideheading div .active {
                            background-color: #303834;
                            color: #fff;
                        }

                        .nav-tabs .nav-item {
                            margin-bottom: 0px;
                            width: 100%;
                        }

                        .proposalboxouterbox .itibox {
                            float: left;
                            width: 31.5%;
                            float: left;
                            margin-right: 10px;
                        }

                        .proposalboxouterbox .itibox .imgbox {
                            height: 200px;
                            overflow: hidden;
                            border-radius: 5px;
                            position: relative;
                        }

                        .proposalboxouterbox .itibox .card {
                            padding: 5px !important;
                        }

                        .proposalboxouterbox .itibox .imgbox img {
                            width: 100% !important;
                            min-height: 100% !important;
                            height: auto !important;
                        }

                        .proposalboxouterbox .itibox .imgbox .packname {
                            transition: 0.3s ease-in-out;
                            background-color: #07385d;
                            font-size: 15px;
                            color: #fff;
                            font-weight: 600;
                            position: absolute;
                            left: 0px;
                            bottom: 0px;
                            width: 100%;
                            padding: 10px 25px;
                            border-radius: 0px;
                        }

                        .proposalboxouterbox .itibox .smtext {
                            font-size: 12px;
                            color: #333;
                        }

                        .proposalboxouterbox .itibox .card-body {
                            padding: 10px !important;
                        }

                        .proposalboxouterbox .itibox .optionmenu {
                            position: absolute;
                            top: 5px;
                            right: 5px;
                            background-color: #fff;
                            width: 30px;
                            text-align: center;
                            padding-right: 0px;
                            border-radius: 2px;
                        }

                        .proposalboxouterbox .itibox .addnewcard {
                            height: 481px;
                            background-color: #cfd7df42;
                            border: 3px dashed #cfd7df;
                            box-shadow: 0px 0px 0px #fff !important;
                            text-align: center;
                            padding-top: 50% !important;
                            padding-left: 20px !important;
                            padding-right: 20px !important;
                        }

                        .proposalboxouterbox .itibox .btn-warning {
                            margin: 0px !important;
                            width: 100% !important;
                        }

                        .proposalboxouterbox .itibox .imgbox .packname .direction_arrow {
                            position: absolute;
                            right: 20px;
                            top: 50%;
                            transform: translateY(-50%);
                        }

                        .proposalboxouterbox .itibox .imgbox .packname:hover {
                            background-color: #1699dd
                        }
                    </style>
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card"
                                style="min-height: 500px; margin-left: 17px; margin-right: 17px; margin-top: 47px; overflow:hidden;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" align="left" valign="top"
                                                style="background-color:#f5f7f9; border-bottom: 1px solid #cfd7df; padding:10px;">
                                                <div style="font-size:11px; margin-bottom:10px;">
                                                    <strong>Created:</strong>
                                                    {{ $query->created_at->format('d/m/Y - h:i A') }} &nbsp; | &nbsp;
                                                    <strong>Last Updated:
                                                        {{ $query->updated_at->format('d/m/Y - h:i A') }}</strong>
                                                </div>
                                                <div class="querystatustabmain" style="overflow:hidden;">

                                                    <ul class="breadcrumb">
                                                        <li class="stclass1">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=1">New</a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=2">Active</a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=3">No
                                                                Connect</a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=4">Hot
                                                                Lead</a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=8">Proposal
                                                                Sent</a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=9">Follow
                                                                Up</a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=11">No
                                                                Revert</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#"
                                                                onclick="alert('You can not mark as confirmed manually.');">Confirmed</a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=6">Cancelled</a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="display.html?ga=query&amp;view=1&amp;id=127504&amp;sts=7">Invalid</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="18%" style="background-color:#f5f7f9; border-right: 1px solid #cfd7df;">
                                                <div class="inquerytabsmain">
                                                    <div class="row" style="margin-right: 0px; margin-left: 0px;">
                                                        <ul class="nav nav-tabs nav-tabs-custom"
                                                            style="border-bottom:0px solid #dee2e6;">
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='details' ? 'active' : '' }}"href="{{ route('queries.show',['id'=>$query->id,'tab'=>'details']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                                                        &nbsp;Query Details</span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-home-variant h5"></i></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='proposals' ? 'active' : '' }}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'proposals']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                                        &nbsp;Proposals
                                                                    </span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-account h5"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='mails' ? 'active' : '' }}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'mails']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-envelope-o"
                                                                            aria-hidden="true"></i> &nbsp;Mails
                                                                    </span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-settings h5"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='followups' ? 'active' : '' }}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'followups']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                                        &nbsp;Followup's
                                                                    </span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-email h5"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='suppliers-communication' ? 'active' : '' }}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'suppliers-communication']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-users" aria-hidden="true"></i> &nbsp;Suppliers Communication
                                                                    </span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-settings h5"></i></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='post-sales-supplier' ? 'active' : '' }}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'post-sales-supplier']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-credit-card-alt"
                                                                            aria-hidden="true"></i> &nbsp;Post Sales
                                                                        Supplier
                                                                    </span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-settings h5"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='voucher' ? 'active' : '' }}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'voucher']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                        &nbsp;Voucher</span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-settings h5"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='billing' ? 'active' : '' }}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'billing']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                                                        &nbsp;Billing
                                                                    </span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-settings h5"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='guest-documents'? 'active' : '' }}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'guest-documents']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                                        &nbsp;Guest Documents</span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-settings h5"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $tab=='history' ? 'active':''}}" href="{{ route('queries.show',['id'=>$query->id,'tab'=>'history']) }}">
                                                                    <span class="d-none d-md-block">
                                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                        &nbsp;History
                                                                    </span>
                                                                    <span class="d-block d-md-none">
                                                                        <i class="mdi mdi-settings h5"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                            <td align="left" valign="top">
                                              @if($tab == 'details')
                                                @include('queries.query-details')
                                                @elseif($tab == 'proposals')
                                                    @include('proposals.proposals')
                                                @elseif($tab == 'mails')
                                                    @include('mails.mails')
                                                @elseif($tab == 'followups')
                                                    @include('followups.followups')
                                                @elseif($tab == 'suppliers-communication')
                                                    @include('suppliers.suppliers')
                                                @elseif($tab == 'post-sales-supplier')
                                                    @include('suppliers.post-sales-supplier')
                                                @elseif($tab == 'voucher')
                                                    @include('voucher.voucher')
                                                @elseif($tab == 'billing')
                                                    @include('billing.billing')
                                                @elseif($tab == 'guest-documents')
                                                    @include('guest-documents.guest-documents')
                                                @elseif($tab == 'history')
                                                    @include('history.history')
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
