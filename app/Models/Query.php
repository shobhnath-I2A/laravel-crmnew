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
}
