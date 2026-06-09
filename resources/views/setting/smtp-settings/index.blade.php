@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="row" style="padding-left:20px;padding-right:20px;">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Setup SMTP Settings</h4>
                                    <form class="custom-validation"
                                       action="{{ isset($smtpSetting) ? route('smtp-setting.update', $smtpSetting->id) : route('smtp-setting.store') }}"
                                        novalidate="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($smtpSetting))
                                            @method('PUT')
                                        @endif
                                        <div class="col-md-12">
                                            <div class="table-responsive mb-0 fixed-solution"
                                                data-pattern="priority-columns">
                                                <div class="alert icon-custom-alert alert-outline-success alert-success-shadow"
                                                    role="alert" id="mailsenddiv" style=" display:none;   ">
                                                    <i class="mdi mdi-check-all alert-icon"></i>
                                                    <div class="alert-text">
                                                        <strong>Changes Saved</strong>
                                                    </div>
                                                </div>
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="30%">Name</td>
                                                            <td>
                                                                <input type="text" name="from_name" class="form-control"
                                                                    value="{{ old('from_name', $smtpSetting->from_name ?? '') }}"
                                                                    maxlength="100" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%">Email</td>
                                                            <td>
                                                                <input type="email" name="email_account"
                                                                    class="form-control"
                                                                    value="{{ old('email_account', $smtpSetting->email_account ?? '') }}"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%">Password</td>
                                                            <td>
                                                                <input type="password" name="email_password"
                                                                    class="form-control" value="{{ $smtpSetting->email_password??'' }}"
                                                                    {{ isset($smtpSetting) ? '' : 'required' }}>

                                                                @if (isset($smtpSetting))
                                                                    <small class="text-muted">
                                                                        Leave if you do not want to change password.
                                                                    </small>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%">SMTP Server</td>
                                                            <td>
                                                                <input type="text" name="smtp_server"
                                                                    class="form-control"
                                                                    value="{{ old('smtp_server', $smtpSetting->smtp_server ?? '') }}"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%">Port</td>
                                                            <td>
                                                                <input type="number" name="email_port" class="form-control"
                                                                    value="{{ old('email_port', $smtpSetting->email_port ?? 587) }}"
                                                                    maxlength="5" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%">Security Type</td>
                                                            <td>
                                                                @php
                                                                    $security = old(
                                                                        'security_type',
                                                                        $smtpSetting->security_type ?? 'tls',
                                                                    );
                                                                @endphp
                                                                <select name="security_type" class="form-control" required>
                                                                    <option value="none"
                                                                        {{ $security == 'none' ? 'selected' : '' }}>None
                                                                    </option>
                                                                    <option value="ssl"
                                                                        {{ $security == 'ssl' ? 'selected' : '' }}>SSL
                                                                    </option>
                                                                    <option value="tls"
                                                                        {{ $security == 'tls' ? 'selected' : '' }}>TLS
                                                                    </option>
                                                                </select>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%">
                                                                <div class="col-md-6">
                                                                    <label>Status</label>
                                                                    <select name="status" class="form-control reqfield @error('status') is-invalid @enderror">
                                                                        <option value="">Select</option>
                                                                        <option value="1" {{ old('status', $smtpSetting->status ?? '') == 1 ? 'selected' : '' }}>
                                                                            Active
                                                                        </option>
                                                                        <option value="0" {{ old('status', $smtpSetting->status ?? '') == 0 ? 'selected' : '' }}>
                                                                            Inactive
                                                                        </option>
                                                                    </select>
                                                                    @error('status')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary px-5 py-2">
                                                                    <i class="fas fa-save"></i>
                                                                    {{ isset($smtpSetting) && $smtpSetting->id ? 'Update Settings' : 'Save Settings' }}
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <h5 class="card-header bg-secondary text-white mt-0">Configure Email</h5>
                                <div class="card-body">
                                    <div style="text-align:center;"> Connect your email inbox and transform the way you do
                                        sales.<br>
                                        <table border="0" align="center" cellpadding="0" cellspacing="0"
                                            style="font-size:12px; margin:4px 0px;">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="padding:0px 20px;"><img src="{{ asset('assets/system/e1.png')}}"
                                                            height="97"><br>
                                                        Access your customer emails with holistic CRM information</td>
                                                    <td align="center" style="padding:0px 20px;"><img src="{{ asset('assets/system/e2.png')}}"
                                                            height="97"><br>
                                                        Send and receive mails from inside CRM records</td>
                                                    <td align="center" style="padding:0px 20px;"><img src="{{ asset('assets/system/e3.png')}}"
                                                            height="97"><br>
                                                        Synchronize your email inbox</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div style="padding:10px; background-color:#F5F5F5; text-align:left;"> <strong>Use
                                                the
                                                following settings:</strong>
                                            <div style="margin-top:10px; font-size:12px;">
                                                1) Mail.com SMTP server
                                                address:&nbsp;<strong>smtp.yourdomain.com</strong><br>
                                                2) Mail.com SMTP username:&nbsp;<strong>Your full yourdomain.com email
                                                    address</strong><br>
                                                3) Mail.com SMTP password:&nbsp;<strong>Your yourdomain.com
                                                    password</strong><br>
                                                4) Mail.com
                                                SMTP&nbsp;port:&nbsp;<strong>587</strong>&nbsp;(alternatives:&nbsp;<strong>465&nbsp;</strong>and&nbsp;<strong>25</strong>)<br>
                                                5) Mail.com SMTPTLS/SSL
                                                required:&nbsp;<strong>yes&nbsp;</strong>(<strong>no&nbsp;</strong>can be
                                                used
                                                as an alternative)
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
    </div>
@endsection
