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

    protected $casts = [
        'reminderDate' => 'datetime',
        'confirmDate' => 'datetime',
        'sentMailDate' => 'datetime',
    ];

   public function queryData()
    {
        return $this->belongsTo(\App\Models\Query::class, 'queryId', 'id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 0);
    }

    public function getStatusLabelAttribute()
    {
        return $this->status == 1 ? 'Done' : 'Pending';
    }
}
