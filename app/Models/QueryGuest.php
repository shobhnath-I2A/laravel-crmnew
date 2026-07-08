<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryGuest extends Model
{
      protected $fillable = [
        'query_id',
        'title',
        'first_name',
        'last_name',
        'gender',
        'dob'
    ];


    public function query()
    {
        return $this->belongsTo(Query::class);
    }
}
