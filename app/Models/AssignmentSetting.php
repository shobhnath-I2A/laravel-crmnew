<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSetting extends Model
{
    protected $fillable = [
        'min_gap_minutes',
        'default_max_leads_per_day',
        'override_daily_limit',
        'auto_assignment_enabled',
    ];

    protected $casts = [
        'override_daily_limit' => 'boolean',
        'auto_assignment_enabled' => 'boolean',
    ];
}
