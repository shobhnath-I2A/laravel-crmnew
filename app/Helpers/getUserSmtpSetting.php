<?php

use App\Models\SmtpSetting;
use Illuminate\Support\Facades\Auth;

function getUserSmtpSetting()
{
    $countryCode = Auth::user()->country_code ?? 'IN';

    return SmtpSetting::where('country_code', strtoupper($countryCode))
        ->where('status', 1)
        ->first();
}
