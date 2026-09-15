<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryNote extends Model
{
    protected $table = 'query_notes';

    protected $fillable = [
        'query_id',
        'details',
        'added_by',
        'date_added',
    ];

    protected $casts = [
        'date_added' => 'datetime',
    ];
}
