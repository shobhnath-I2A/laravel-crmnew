<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleMaster extends Model
{
 protected $fillable = [
        'name',
        'branch_id',
        'parent_id',
        'status',
        'added_by',
    ];

    public function permissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }
   public function children()
{
    return $this->hasMany(RoleMaster::class, 'parent_id', 'id')
        ->where('status', 1)
        ->orderBy('id', 'asc');
}

public function childrenRecursive()
{
    return $this->children()->with('childrenRecursive');
}

public function branch()
{
    return $this->belongsTo(BranchMaster::class, 'branch_id', 'id');
}
}
