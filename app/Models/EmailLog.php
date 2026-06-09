<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    protected $fillable = [
        'from_email',
        'to_email',
        'subject',
        'message',
        'status',
        'error_message',
        'created_by',
        'query_id',
        'cc',
        'attachment',
    ];
    public function queryRecord()
    {
        return $this->belongsTo(Query::class, 'query_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
