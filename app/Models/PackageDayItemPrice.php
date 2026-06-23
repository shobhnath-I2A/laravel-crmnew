<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDayItemPrice extends Model
{
    protected $fillable = [
        'package_day_item_id',
        'adult_cost',
        'child_cost',
        'vehicle',
        'vehicle_cost',
        'single_room_cost',
        'double_room_cost',
        'triple_room_cost',
        'quad_room_cost',
        'child_bed_cost',
        'extra_adult_cost',
        'total_price',
        'markup',
        'markup_amount',
        'final_price',
        'pricing_data',
    ];

    protected $casts = [
        'pricing_data' => 'array',
    ];
    public function dayItem()
    {
        return $this->belongsTo(PackageDayItem::class, 'package_day_item_id');
    }
}
