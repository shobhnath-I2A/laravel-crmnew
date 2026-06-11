<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDayItemHotel extends Model
{
    protected $fillable = [
        'package_day_item_id',
        'hotel_id',
        'hotel_type',
        'hotel_category',
        'room_type',
        'room_name',
        'meal_plan',
        'hotel_options',
        'single_room',
        'double_room',
        'triple_room',
        'quad_room',
        'cwb_room',
        'cnb_room',
        'check_in_date',
        'check_in_time',
        'check_out_date',
        'check_out_time',
    ];

    public function item()
    {
        return $this->belongsTo(PackageDayItem::class,'package_day_item_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
