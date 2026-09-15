<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryLog extends Model
{
    protected $table = 'query_logs';

    protected $fillable = [
        'query_id',
        'details',
        'added_by',
        'date_added',
        'status_comment',
        'log_type',
    ];

    protected $casts = [
        'date_added' => 'datetime',
    ];
}
