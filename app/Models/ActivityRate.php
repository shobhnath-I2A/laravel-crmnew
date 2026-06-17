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
        'child',
        'created_by'
    ];
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    public function addedBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
