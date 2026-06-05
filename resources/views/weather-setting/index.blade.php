@extends('layouts.app')
@section('content')
    </div>
    <div class="wrapper" style="margin-left: 15px;margin-right: 15px;">
        <div class="container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title cardtitle"> Weather Settings
                                        <form action="{{ route('weather-setting.index') }}" class="newsearchsecform"
                                            style="left:54px;" method="get" enctype="multipart/form-data">
                                            <input type="text" name="keyword" class="form-control newsearchsec"
                                                placeholder="Search by name" value="{{ request('keyword') }}"
                                                style="margin-top: 3px;">
                                        </form>
                                        <div class="float-right">
                                            <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                                                onclick="openPopup('Add Weather Setting','{{ route('weather-setting.create') }}')"
                                                data-backdrop="static">Add Weather Setting</button>
                                        </div>
                                    </h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th width="32%">title</th>
                                                    <th width="32%">Detail</th>
                                                    <th width="1%" align="left">Status</th>
                                                    <th width="15%" align="left">By</th>
                                                    <th width="12%" align="left">Date</th>
                                                    <th width="1%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                @foreach ($weatherSetting as $setting)
                                                    <tr>
                                                        <td style="cursor:pointer;"
                                                            onclick="openPopup('Edit Weather Setting', '{{ route('weather-setting.show', $setting->id) }}')">
                                                            <strong>{{ ucfirst($setting->city_name) }}</strong>
                                                        </td>

                                                        <td>
                                                            Temp: {{ $setting->temp_weather ?? '-' }}°C <br>
                                                            Feels Like: {{ $setting->feels_like ?? '-' }}°C <br>
                                                            Humidity: {{ $setting->humidity ?? '-' }}% <br>
                                                            Wind: {{ $setting->wind_speed ?? '-' }}
                                                        </td>

                                                        <td>
                                                            <span
                                                                class="badge {{ $setting->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                                {{ $setting->status == 1 ? 'Active' : 'Inactive' }}
                                                            </span>
                                                        </td>

                                                        <td>
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

                                                        <td>{{ optional($setting->created_at)->format('d M Y') }}</td>

                                                        <td>
                                                            <a class="dropdown-item neweditpan"
                                                                onclick="openPopup('Edit Weather Setting', '{{ route('weather-setting.edit', $setting->id) }}')">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3 pageingouter">
                                        <div
                                            style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">
                                            Total Records: <strong>{{ $weatherSettingCount }}</strong></div>
                                        <div class="d-flex justify-content-end">
                                            {{ $weatherSetting->links() }}
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
