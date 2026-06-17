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
        'created_by',
    ];

    /**
     * Relationship: Creator of itinerary
     */
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
