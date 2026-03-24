<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDayItemPrice extends Model
{
    public function dayItem()
    {
        return $this->belongsTo(PackageDayItem::class, 'package_day_item_id');
    }
}
