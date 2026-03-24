<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDayItem extends Model
{
    protected $table = 'package_day_items';

    protected $fillable = [
       'package_id',
        'hotel_id',
        'destination_id',
        'type',
        'day',
        'show_day_order',
        'hotel_name',
        'room_type',
        'category',
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
        'description',
    ];
    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function prices()
    {
        return $this->hasMany(PackageDayItemPrice::class, 'package_day_item_id');
    }
}
