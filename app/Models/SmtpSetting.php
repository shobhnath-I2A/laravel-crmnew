<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class SmtpSetting extends Model
{
    protected $fillable = [
        'country_code',
        'from_name',
        'email_account',
        'email_password',
        'smtp_server',
        'email_port',
        'security_type',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function setEmailPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['email_password'] = Crypt::encryptString($value);
        }
    }

    public function getEmailPasswordAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value;
        }
    }
}
