<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{

    protected $fillable = [
        'role_id',
        'module',
        'can_view',
        'can_add_edit',
        'can_download',
    ];

}
