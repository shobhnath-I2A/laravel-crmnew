<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Query;
use App\Models\User;

class Automation extends Model
{
    protected $fillable = [
        'query_status',
        'package_id',
        'destination_id',
        'details',
        'start_date',
        'end_date',
        'status',
        'added_by',
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function queryStatus()
    {
        return $this->belongsTo(Query::class, 'query_status');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
