<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentRoster extends Model
{
    protected $fillable = [
        'user_id',
        'roster_date',
        'shift_start',
        'shift_end',
        'priority',
        'max_assigned_leads',
        'is_available',
    ];

    protected $casts = [
        'roster_date' => 'date',
        'is_available' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
