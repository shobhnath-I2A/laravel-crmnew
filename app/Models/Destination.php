<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = 'destinations';
    protected $fillable = ['name', 'status', 'added_by'];

    public function itineraries()
    {
        return $this->belongsToMany(Itinerary::class, 'itinerary_destination')->withTimestamps();
    }

    public function queries()
    {
        return $this->belongsToMany(Query::class);
    }
}
