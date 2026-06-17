<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyExchangeMaster extends Model
{
    protected $fillable = [
        'name',
        'rate',
        'status',
        'created_by',
        'dateAdded',
    ];

    public function addedBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
