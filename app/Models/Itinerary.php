<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'adult',
        'child',
        'notes',
        'package_theme_id',
        'show_website',
        'queryId',
        'website_cost',
        'website_validity',
        'show_in_popular',
        'show_in_special',
        'about_package',
        'total_days'
    ];

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'itinerary_destination')->withTimestamps();
    }
}
