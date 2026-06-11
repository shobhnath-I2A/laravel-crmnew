<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDayItemFlight extends Model
{
    protected $fillable = [
        'package_day_item_id',
        'flight_no',
        'flight_duration',
        'from_destination',
        'to_destination',
    ];

    public function item()
    {
        return $this->belongsTo(PackageDayItem::class,'package_day_item_id');
    }
}
