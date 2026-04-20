<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayItineraryMaster extends Model
{
    //use HasFactory;

    protected $table = 'day_itinerary_masters';

    protected $fillable = [
        'name',
        'destination',
        'details',
        'status',
        'added_by',
    ];

    /**
     * Relationship: Creator of itinerary
     */
    public function addedByUser()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
