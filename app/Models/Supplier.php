<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'destination_id',
        'company_name',
        'submit_name',
        'first_name',
        'last_name',
        'email',
        'mobile_code',
        'mobile',
        'address',
        'status',
        'created_by',
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
