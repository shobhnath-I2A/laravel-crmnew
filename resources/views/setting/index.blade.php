@extends('layouts.app')
@section('content')
</div>
<style>
.newboxheading{padding-left: 296px;}
.settingleftsection { width: 220px; position: fixed; left: 64px; top: 0px; height: 100%; z-index: 99; border-right: 1px solid #E5EBEF; background: #f9fbfc; overflow:auto; }
body{background-color:#FFFFFF !important; background-image:none !important;}
html{background-image:none !important;background-color:#FFFFFF !important;}
.col-xl-12{padding-left: 0px; padding-right: 0px;}
.settingleftsection .lmenu { padding-top: 56px; }
.settingleftsection .lmenu ul{list-style:none; padding:0px; margin:0px;}
.settingleftsection .lmenu ul li a{ padding:10px 15px; display:block; font-size:15px; color:#333333;}
.settingleftsection .lmenu h5{padding-left:15px;}
.settingleftsection .lmenu ul li .active{color: #1980d8; background-color: #D9EFFF;}
.settingleftsection .lmenu ul li a .fa{margin-right: 5px;}
.settingleftsection .lmenu ul li a:hover{ background-color:#f1f1f1;}
</style>
<div class="wrapper">
    <div class="container-fluid">
        <div class="main-content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="2" align="left" valign="top">
                            <div class="settingleftsection">
                                <div class="lmenu">
                                    <h5>Settings</h5>
                                    <ul>
                                        <li><a href="{{ route('settings.index',['tab'=>'team-management']) }}" class="{{ $tab=='team-management' ? 'active' : '' }}">
                                            <i class="fa fa-user" aria-hidden="true"></i> Team Management</a></li>
                                        <li><a href="{{ route('settings.index',['tab'=>'organisation-settings']) }}" class="{{ $tab=='organisation-settings' ? 'active' : '' }}">
                                            <i class="fa fa-building-o" aria-hidden="true"></i> Organisation Settings</a></li>
                                        <li><a href="{{ route('settings.index',['tab'=>'default-setting']) }}" class="{{ $tab=='default-setting' ? 'active' : '' }}">
                                            <i class="fa fa-sliders" aria-hidden="true"></i> Default Settings</a></li>

                                        <li><a href="{{ route('settings.index',['tab'=>'admin-settings']) }}" class="{{ $tab=='admin-settings' ? 'active' : '' }}">
                                            <i class="fa fa-cog" aria-hidden="true"></i> Admin Settings</a></li>
                                        <li><a href="{{ route('settings.index',['tab'=>'package-inclusions']) }}" class="{{ $tab=='package-inclusions' ? 'active' : '' }}">
                                            <i class="fa fa-check" aria-hidden="true"></i> Package Inclusions</a></li>
                                        <li><a href="{{ route('settings.index',['tab'=>'automation']) }}" class="{{ $tab=='automation' ? 'active' : '' }}">
                                            <i class="fa fa-retweet" aria-hidden="true"></i> Automation</a></li>
                                        <li><a href="{{ route('settings.index',['tab'=>'branches-setting']) }}" class="{{ $tab=='branches-setting' ? 'active' : '' }}">
                                            <i class="fa fa-home" aria-hidden="true"></i> Branch Setting</a></li>
                                        <li><a href="{{ route('settings.index',['tab'=>'roles']) }}" class="{{ $tab=='roles' ? 'active' : '' }}">
                                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Roles</a></li>
                                        <li><a href="{{ route('settings.index',['tab'=>'apidocs']) }}" class="{{ $tab=='apidocs' ? 'active' : '' }}">
                                            <i class="fa fa-database" aria-hidden="true"></i> API Docs.</a></li>

                                    </ul>
                                </div>
                            </div>

                            <div style="width:220px;"></div>
                        </td>
                        <td align="left" valign="top">
                        @if ($tab == 'team-management')
                            @include('setting.team-management')
                        @elseif ($tab == 'organisation-settings')
                            @include('setting.organisation-setting')
                        @elseif ($tab == 'default-setting')
                            @include('setting.default-setting')
                        @elseif ($tab == 'admin-settings')
                            @include('setting.admin-setting')
                        @elseif ($tab == 'package-inclusions')
                            @include('setting.package-inclusion')
                        @elseif ($tab == 'automation')
                            @include('setting.automation')
                        @elseif ($tab == 'branches-setting')
                            @include('setting.branches-setting')
                        @elseif ($tab == 'roles')
                            @include('setting.roles')
                        @elseif ($tab == 'apidocs')
                            @include('setting.apidoc')
                          @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
