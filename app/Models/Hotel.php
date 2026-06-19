<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'category',
        'destination_id',
        'details',
        'contact_person',
        'contact_person_email',
        'contact_person_phone',
        'image',
        'img_link',
        'status',
        'created_by'
    ];

    public function rates()
    {
        return $this->hasMany(HotelRate::class, 'hotel_id');
    }
    public function destinationCity()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function getRoomSummaryAttribute()
    {
        $rooms = [
            'Single' => $this->single_room,
            'Double' => $this->double_room,
            'Triple' => $this->triple_room,
            'Quad'   => $this->quad_room,
            'CWB'    => $this->cwb_room,
            'CNB'    => $this->cnb_room,
        ];

        return collect($rooms)
            ->filter(fn($count) => $count > 0)
            ->map(fn($count, $type) => "{$count} {$type}")
            ->implode(' | ');
    }
}
