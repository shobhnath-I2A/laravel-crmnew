<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoleMaster;
class BranchMaster extends Model
{
    protected $table = 'branch_masters';

    protected $fillable = [
        'name',
        'destinations',
        'status',
        'created_by',
    ];
     public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function roles()
    {
        return $this->hasMany(RoleMaster::class, 'branch_id', 'id')
            ->where('parent_id', 0)
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->with('childrenRecursive');
    }
}
