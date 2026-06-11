<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDayItem extends Model
{
    protected $table = 'package_day_items';
    protected $guarded = [];
    protected $fillable = [
        'package_id',
        'hotel_id',
        'destination_id',
        'type',
        'day',
        'day_order',
        'name',
        'room_type',
        'hotel_category',
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
        'day_subject',
        'show_time',
        'hotel_type',
        'from_destination',
        'to_destination',
        'flight_no',
        'flight_duration'
    ];
    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
    ];
    // public function package()
    // {
    //     return $this->belongsTo(Package::class);
    // }
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function transporationMaster()
    {
        return $this->belongsTo(TransferMaster::class, 'hotel_id');
    }

    public function getDisplayNameAttribute()
    {
        if ($this->type == 'accommodation') {
            return $this->hotel_type == 1
                ? ($this->hotel->name ?? '')
                : ($this->name ?? '');
        }

        return $this->name ?? $this->title ?? $this->item_name ?? '';
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function hotelDetail()
    {
        return $this->hasOne(PackageDayItemHotel::class);
    }

    public function flightDetail()
    {
        return $this->hasOne(PackageDayItemFlight::class);
    }
    public function prices()
    {
        return $this->hasMany(PackageDayItemPrice::class, 'package_day_item_id');
    }
}
