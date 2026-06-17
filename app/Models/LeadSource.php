<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadSource extends Model
{
    protected $fillable = [
        'name',
        'status',
        'created_by'
    ];

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
