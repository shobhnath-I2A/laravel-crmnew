<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryTask extends Model
{
    protected $fillable = [
        'queryId',
        'details',
        'reminderDate',
        'status',
        'addedBy',
        'taskType',
        'assignTo',
        'makeDone',
        'confirmDate',
        'sentMailDate',
        'notificationType'
    ];
}
