<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityRate extends Model
{
    protected $fillable = [
        'activity_id',
        'start_date',
        'end_date',
        'adult',
        'child'
    ];
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
