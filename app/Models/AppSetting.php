<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = [
        'country_code',
        'group_name',
        'key_name',
        'value',
    ];
}
