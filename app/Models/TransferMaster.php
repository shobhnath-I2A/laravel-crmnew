<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferMaster extends Model
{
    protected $table = 'transfer_masters';
    protected $fillable = [
        'name',
        'destination_id',
        'details',
        'image',
        'status',
        'created_by'
    ];

    // 🔗 Relationship (if using destination ID)
    public function destinationCity()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
