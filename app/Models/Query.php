<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $fillable = [
        'mobile',
        'email',
        'submitName',
        'name',
        'querytype',
        'travelMonth',
        'origin',
        'destination',
        'startDate',
        'endDate',
        'adult',
        'child',
        'infant',
        'leadSource',
        'priorityStatus',
        'assignTo',
        'serviceId',
        'statusId',
        'details'
    ];

    public function tasks()
    {
        return $this->hasMany(\App\Models\QueryTask::class, 'queryId', 'id');
    }
     public function emailLogs()
    {
        return $this->hasMany(EmailLog::class, 'query_id', 'id')
            ->latest();
    }


    //  Origin relation
    public function originCity()
    {
        return $this->belongsTo(Destination::class, 'origin');
    }

    //  Destination relation
    public function destinationCity()
    {
        return $this->belongsTo(Destination::class, 'destination');
    }
    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'queryId', 'id');
    }
    public function PackageDayItems()
    {
        return $this->hasMany(PackageDayItem::class, 'queryId', 'id');
    }
    public function status()
    {
        return $this->belongsTo(QueryStatus::class, 'statusid');
    }
}
