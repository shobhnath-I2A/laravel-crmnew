<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyExchangeMaster extends Model
{
    protected $fillable = [
        'name',
        'rate',
        'status',
        'addedBy',
        'dateAdded',
    ];
}
