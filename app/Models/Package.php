<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'total_days',
        'price_per_person',
        'show_on_website',
        'validity',
        'is_popular',
        'is_special',
        'package_theme_id',
        'created_by',
        'itinerary_id'
    ];

    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }

    public function itinerary()
    {
        return $this->belongsTo(Itinerary::class);
    }

    public function dayItems()
    {
        return $this->hasMany(PackageDayItem::class);
    }

    public function queries()
    {
        return $this->hasMany(Query::class);
    }
}
