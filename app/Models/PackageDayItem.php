<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDayItem extends Model
{
    protected $table = 'package_day_items';
    protected $guarded = [];
    protected $fillable = [
        'package_id',
        'destination_id',
        'day',
        'day_order',
        'type',
        'source_type',
        'name',
        'description',
        'show_time',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'show_time'  => 'boolean',
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

    // public function getDisplayNameAttribute()
    // {
    //     if ($this->type == 'accommodation') {
    //         return $this->source_type == 1
    //             ? ($this->hotel->name ?? '')
    //             : ($this->name ?? '');
    //     }

    //     return $this->name ?? $this->title ?? $this->item_name ?? '';
    // }
    public function getDisplayNameAttribute()
    {
        if ($this->type === 'accommodation') {
            if ($this->hotelDetail?->source_type == 1) {
                return $this->hotelDetail?->hotel?->name ?? '';
            }

            return $this->name ?? '';
        }

        if ($this->type === 'flight') {
            return $this->flightDetail?->flight_no
                ? 'Flight ' . $this->flightDetail->flight_no
                : ($this->name ?? 'Flight');
        }

        return $this->name ?? '';
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
