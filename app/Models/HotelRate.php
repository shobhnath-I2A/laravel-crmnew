<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRate extends Model
{
    protected $fillable = [
        'hotel_id',
        'start_date',
        'end_date',
        'room_type',
        'meal_plan',
        'single',
        'double',
        'triple',
        'quad',
        'child_bed',
        'extra_adult'
    ];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
