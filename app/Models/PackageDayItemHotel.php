<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateFormatter;
class PackageDayItemHotel extends Model
{
    use DateFormatter;

    protected $fillable = [
        'package_day_item_id',
        'hotel_id',
        'source_type',
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
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
    public function setCheckInDateAttribute($value)
    {
        $this->attributes['check_in_date'] = $this->convertDate($value);
    }

    public function setCheckOutDateAttribute($value)
    {
        $this->attributes['check_out_date'] = $this->convertDate($value);
    }

    public function getCheckInDateAttribute($value)
    {
        return $this->formatDateForDisplay($value);
    }

    public function getCheckOutDateAttribute($value)
    {
        return $this->formatDateForDisplay($value);
    }
}
