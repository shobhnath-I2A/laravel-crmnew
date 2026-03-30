<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'from_city',
        'destination_id',
        'details',
        'image',
        'status',
    ];
    public function rates()
    {
        return $this->hasMany(ActivityRate::class);
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
}
