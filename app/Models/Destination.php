<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = 'destinations';
    protected $fillable = ['name', 'status', 'created_by'];

    public function itineraries()
    {
        return $this->belongsToMany(Itinerary::class, 'itinerary_destination')->withTimestamps();
    }

    public function queries()
    {
        return $this->belongsToMany(Query::class);
    }
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
