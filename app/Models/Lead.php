<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
   protected $fillable = [
        'full_name',
        'portal_id',
        'email',
        'phone',
        'phone_code',
        'from_city',
        'to_city',
        'travel_date',
        'travel_month',
        'total_pax',
        'days',
        'budget',
        'description',
        'source',
        'campaign',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'client_ip',
        'reference_url',
        'assigned_to',
        'created_by',
        'status',
        'priority',
        'company_name',
        'is_authorized',
    ];
}
