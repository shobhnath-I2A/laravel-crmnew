<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchMaster extends Model
{
    protected $table = 'branch_masters';

    protected $fillable = [
        'name',
        'destinations',
        'status',
        'addedBy',
    ];
     public function user()
    {
        return $this->belongsTo(User::class, 'addedBy');
    }
    public function roles()
{
    return $this->hasMany(Rolemaster::class, 'branch_id', 'id')
        ->where('parent_id', 0)
        ->where('status', 1)
        ->orderBy('name', 'asc')
        ->with('childrenRecursive');
}
}
