<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
  protected $fillable = ['hotel_id', 'name', 'price', 'status', 'capacity'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
