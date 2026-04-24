<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadNotification extends Model
{
    protected $fillable = [
        'lead_id',
        'user_id',
        'type',
        'title',
        'message',
        'data',
        'is_read',
        'read_at',
    ];

    protected $casts = [
        'data' => 'array',
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];
}
