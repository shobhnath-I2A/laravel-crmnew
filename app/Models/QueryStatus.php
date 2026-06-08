<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryStatus extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'color',
        'sort_order',
        'is_active',
    ];

    public function queries()
    {
        return $this->hasMany(Query::class, 'statusid');
    }
}
