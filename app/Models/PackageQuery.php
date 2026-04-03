<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageQuery extends Model
{
    protected $table = 'package_queries';

    protected $fillable = [
        'package_number',
        'email',
        'price',
        'rating',
        'from_city',
        'to_city',
        'phone_number',
        'phone_code',
        'days',
        'guid',
        'email_type',
        'full_name',
        'url',
        'is_authorized',
        'package_date',
        'portal_id',
        'source',
        'client_ip',
        'status',
        'enquiry_type',
        'ent_date',
        'company_name',
        'description',
        'campaign',
        'total_pax',
        'travel_month',
    ];

    //  Casts (important for dates & boolean)
    protected $casts = [
        'price' => 'decimal:2',
        'rating' => 'float',
        'days' => 'integer',
        'email_type' => 'integer',
        'is_authorized' => 'boolean',
        'package_date' => 'date',
        'ent_date' => 'datetime',
        'portal_id' => 'integer',
        'total_pax' => 'integer',
    ];
}
