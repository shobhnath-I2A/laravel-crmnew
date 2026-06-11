<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDayItemPrice extends Model
{
    protected $fillable = [
        'package_day_item_id',
        'net_cost',
        'markup_type',
        'markup_value',
        'gross_cost',
        'cgst',
        'sgst',
        'igst',
        'tcs',
        'discount',
        'final_amount',
    ];
    public function dayItem()
    {
        return $this->belongsTo(PackageDayItem::class, 'package_day_item_id');
    }
}
