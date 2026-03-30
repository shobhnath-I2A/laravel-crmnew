<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'category',
        'destination',
        'details',
        'contact_person',
        'contact_person_email',
        'contact_person_phone',
        'image',
        'img_link',
        'status'
    ];

    public function rates()
    {
         return $this->hasMany(HotelRate::class, 'hotel_id');
    }
    public function destinationCity()
    {
        return $this->belongsTo(Destination::class, 'destination');
    }
}
