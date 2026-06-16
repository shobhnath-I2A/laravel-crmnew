<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['hotel_id', 'name', 'price', 'status', 'created_by', 'capacity'];

    // public function hotel()
    // {
    //     return $this->belongsTo(Hotel::class);
    // }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
