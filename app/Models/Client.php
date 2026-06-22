<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'submit_name',
        'first_name',
        'last_name',
        'email',
        'email2',
        'mobile_code',
        'mobile',
        'mobile_code2',
        'mobile2',
        'city_id',
        'address',
        'dob',
        'status',
        'created_by',
        'marriage_anniversary',
    ];

    public function city()
    {
        return $this->belongsTo(Destination::class, 'city_id');
    }
    public function addedBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
