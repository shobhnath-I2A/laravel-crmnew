<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryMaster extends Model
{
    protected $table = 'country_master';

    protected $fillable = [
        'modify_by',
        'added_by',
        'date_added',
        'modify_date',
        'delete_status',
        'name',
        'sortname',
        'country_code',
        'status',
    ];
}
