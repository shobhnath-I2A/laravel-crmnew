@extends('layouts.app')
@section('content')
    </div>
    <style>
        .editprofilediv {
            display: none;
        }
    </style>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class=" ">
                        <div class="col-md-12 col-xl-12" id="displayprofile">
                            <div class="card" style="padding:20px;">
                                <div
                                    style=" background-color:#FFFFFF; padding-bottom:20px; border-bottom:1px solid #ececec; position:relative;">
                                    <a class="dropdown-item neweditpan"
                                        style="cursor:pointer; position:absolute; right:0px; top:10px;z-index: 1;background-color: #c6e5f5;"
                                        onclick="$('#displayprofile').hide();$('.editprofilediv').show();">
                                        <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    @if(!empty($user->profile_image))
                                                        <img src="{{ asset('uploads/profile/'.$user->profile_image) }}"
                                                            alt="{{ $user->name }}"
                                                            width="60"
                                                            height="60"
                                                            class="rounded-circle border">
                                                    @else
                                                        <div class="profileuserbadges">
                                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td width="95%" style=" position:relative;">
                                                    <div style="margin-bottom:0px; font-size:16px; font-weight:700;">
                                                        {{ $user->name ?? '' }} {{ $user->last_name ?? '' }}</div>
                                                    <div style="margin-bottom:0px; font-size:14px; font-weight:400;">Email:
                                                        <strong>{{ $user->email ?? '' }}</strong></div>
                                                    <div style="margin-bottom:0px; font-size:13px; font-weight:400;">Last
                                                        Login: <strong>29/05/2026 - 10:32 AM</strong></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="padding:20px 0px;">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px;">User Information</div>
                                    <table border="0" cellpadding="5" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td style="padding-right:100px;">Profile</td>
                                                <td>
                                                    {{ $user->role->name == 'Director' ? 'Administrator' : $user->role->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>{{ $user->mobile_code ?? '' }}-{{ $user->mobile ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Website</td>
                                                <td>{{ $user->website ?? '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="padding:20px 0px;">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px;">Locale Information
                                    </div>
                                    <table border="0" cellpadding="5" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td style="padding-right:80px;">Language</td>
                                                <td>{{ $user->language ?? 'English (United States)' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Country Location</td>
                                                <td>{{ ucfirst($user->country->name ?? 'N/A') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Time Format</td>
                                               <td>
                                                 {{ str_contains(config('app.time_format', 'h:i A'), 'A') ? '12 Hours' : '24 Hours' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Time Zone</td>
                                               <td>
                                                (GMT {{ $user->gmt_offset ?? '+5:30' }})
                                                {{ $user->timezone_name ?? 'India Standard Time' }}
                                                ({{ $user->timezone ?? 'Asia/Kolkata' }})
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div style="padding:20px 0px;">
                                    <div style="font-size:16px; font-weight:600; margin-bottom:5px;">Signature</div>
                                    <div class="users-sign-box" onclick="loadpop('Update Signature',this,'800px')"
                                        data-toggle="modal" data-target=".bs-example-modal-center"
                                        popaction="action=addsignature">
                                        <div dir="ltr">
                                            <p class="MsoNormal"
                                                style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
                                                &nbsp;</p>
                                            <p class="MsoNormal"
                                                style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
                                                <strong>Thanks &amp; Regards,</strong>
                                            </p>
                                            <p class="MsoNormal"
                                                style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
                                                <strong>{{ucfirst($user->name ?? '') }} {{ ucfirst($user->last_name ?? '') }}</strong>
                                            </p>
                                            <p class="MsoNormal"
                                                style="margin: 0px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
                                                &nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left:20px; padding-right:20px;">
                            <div class="col-md-12 col-xl-8 editprofilediv">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#settings" role="tab"
                                                    aria-selected="true" style="padding-left:0px; cursor:default;">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block" style="text-align:left;"><strong>Edit
                                                            Profile</strong></span>
                                                </a>
                                            </li>
                                        </ul>

                                        <form action="{{ route('profile.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="tab-content p-3 text-muted">
                                                <div class="tab-pane active" id="settings" role="tabpanel">
                                                    <div class="row mt-4">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="firstname">&nbsp;</label>
                                                                <select name="submit_name" class="form-control">
                                                                    <option value="Mr."
                                                                        {{ old('submit_name', $user->submit_name) == 'Mr.' ? 'selected' : '' }}>
                                                                        Mr.</option>
                                                                    <option value="Mrs."
                                                                        {{ old('submit_name', $user->submit_name) == 'Mrs.' ? 'selected' : '' }}>
                                                                        Mrs.</option>
                                                                    <option value="Ms."
                                                                        {{ old('submit_name', $user->submit_name) == 'Ms.' ? 'selected' : '' }}>
                                                                        Ms.</option>
                                                                    <option value="Dr."
                                                                        {{ old('submit_name', $user->submit_name) == 'Dr.' ? 'selected' : '' }}>
                                                                        Dr.</option>
                                                                    <option value="Prof."
                                                                        {{ old('submit_name', $user->submit_name) == 'Prof.' ? 'selected' : '' }}>
                                                                        Prof.</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="firstname">First Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{ old('name', $user->name) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="firstname">Last Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="last_name"
                                                                    value="{{ old('last_name', $user->last_name ?? '') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <label for="useremail">Email Address</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    readonly=""
                                                                    value="{{ old('email', $user->email ?? '') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" style="display:none;">
                                                            <div class="form-group mb-0">
                                                                <label for="userpassword">Password</label>
                                                                <input type="password" class="form-control"
                                                                    name="password" readonly=""
                                                                    value="{{ old('password', $user->password ?? '') }}">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div>
                                                    <div class="row" style=" margin-top: 15px;">
                                                        <div class="col-md-2">
                                                            <div class="form-group mb-0">
                                                                <label for="useremail">Code</label>
                                                                <input name="mobile_code" type="text"
                                                                    class="form-control" id="mobile_code"
                                                                    placeholder="eg. +91"
                                                                    value="{{ old('mobile_code', $user->mobile_code) }}"
                                                                    maxlength="4">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group mb-0">
                                                                <label for="useremail">Mobile</label>
                                                                <input name="mobile" type="text" class="form-control"
                                                                    id="mobile"
                                                                    value="{{ old('mobile', $user->mobile ?? '') }}"
                                                                    maxlength="10">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Profile image </label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="changeprofilepic"
                                                                        class="form-control" id="changeprofilepic"
                                                                        accept="image/*">
                                                                    @if (!empty($user->profile_image))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset('uploads/profile/' . $user->profile_image) }}"
                                                                                width="80" height="80"
                                                                                class="rounded border">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end col -->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <label for="useremail">Website</label>
                                                                <input type="website" class="form-control" name="website"
                                                                    value="{{ old('website', $user->website) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style=" margin-top: 15px; display:none;">
                                                        <div class="col-12">
                                                            <div class="form-group mb-0">
                                                                <label for="userpassword">Address</label>
                                                                <input type="texr" class="form-control" id="address"
                                                                    name="address" value="New Delhi">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style=" margin-top: 15px;">
                                                        <table width="100%" cellpadding="10" class="table mb-0 padd">
                                                            <thead>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding:10px;"><strong>Themes</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:10px;">
                                                                        <style>
                                                                            .selectedSkin {
                                                                                border: 3px solid #fff;
                                                                                box-shadow: 0 0 3px #888;
                                                                                position: relative;
                                                                                margin-top: px;
                                                                                border-radius: 3px;
                                                                            }

                                                                            .colorbox {
                                                                                width: 25px;
                                                                                height: 25px;
                                                                                float: left;
                                                                                border-bottom: solid 3px #fff;
                                                                                cursor: pointer;
                                                                            }
                                                                        </style>

                                                                        <script>
                                                                            function setSkinValues(obj) {
                                                                                var ccolor = $(obj).attr('color-choosen');
                                                                                $('#newtab_bg').val(ccolor);
                                                                                $('.colorbox').removeClass('selectedSkin');
                                                                                $(obj).addClass('selectedSkin');
                                                                                $('.header-bg').css('background-color', '#' + ccolor);


                                                                                $('#ActionDiv').load('actionpage.php?ccolor=' + ccolor + '&userid=1&action=changetheme');
                                                                            }
                                                                        </script>
                                                                        <div class="colorbox"
                                                                            style="background-color:#660000"
                                                                            color-choosen="660000"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#990000"
                                                                            color-choosen="990000"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#D24143"
                                                                            color-choosen="D24143"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#DE4F5D"
                                                                            color-choosen="DE4F5D"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#ea4c88"
                                                                            color-choosen="ea4c88"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#993399"
                                                                            color-choosen="993399"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#663399"
                                                                            color-choosen="663399"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#07385D"
                                                                            color-choosen="07385D"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#1e5598"
                                                                            color-choosen="1e5598"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#2d72d9"
                                                                            color-choosen="2d72d9"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#366dc7"
                                                                            color-choosen="366dc7"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#018EE0"
                                                                            color-choosen="018EE0"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#0099cc"
                                                                            color-choosen="0099cc"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#37a5a5"
                                                                            color-choosen="37a5a5"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#439454"
                                                                            color-choosen="439454"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#336600"
                                                                            color-choosen="336600"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#165151"
                                                                            color-choosen="165151"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#999900"
                                                                            color-choosen="999900"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#E9A23F"
                                                                            color-choosen="E9A23F"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#996633"
                                                                            color-choosen="996633"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox"
                                                                            style="background-color:#553A48"
                                                                            color-choosen="553A48"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="colorbox selectedSkin"
                                                                            style="background-color:#313949"
                                                                            color-choosen="313949"
                                                                            onclick="setSkinValues(this);"></div>
                                                                        <div class="cB"></div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div
                                                        style="padding-bottom:10px; margin-bottom:10px; border-bottom:1px solid #ddd;">
                                                    </div>
                                                    <div class="form-group" style="overflow:hidden; margin-bottom:0px;">
                                                        <button type="submit"
                                                            class="btn btn-secondary btn-lg waves-effect waves-light"
                                                            style="float: right;"> Save Changes</button>
                                                        <button type="button"
                                                            class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray"
                                                            style="float: right;margin-right: 20px;"
                                                            onclick="$('.editprofilediv').hide();$('#displayprofile').show();">
                                                            Cancel </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-4 editprofilediv">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#settings"
                                                    role="tab" aria-selected="true"
                                                    style="padding-left:0px; cursor:default;">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block"
                                                        style="text-align:left;"><strong>Change Password</strong></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content p-3 text-muted">
                                            <form action="{{ route('profile.password.update') }}" method="POST">
                                                @csrf
                                                <div class="tab-pane active" id="settings" role="tabpanel">
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="userbio">Old Password</label>
                                                                <input type="password" class="form-control"
                                                                    name="oldpassword" placeholder="Enter Old Password">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="userbio">New Password</label>
                                                                <input type="password" class="form-control"
                                                                    name="newpassword" placeholder="Enter New Password">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="userbio">Confirm Password</label>
                                                                <input type="password" class="form-control"
                                                                    name="repassword"
                                                                    placeholder="Enter Confirm Password">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group"
                                                            style="overflow:hidden; margin-bottom:0px;">
                                                            <button type="submit"
                                                                class="btn btn-secondary btn-lg waves-effect waves-light"
                                                                style="float: right;"><i class="fa fa-check"
                                                                    aria-hidden="true"></i> Change Password </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="action" value="updatePassword">
                                                <input type="hidden" name="editId" value="100001">
                                            </form>
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
