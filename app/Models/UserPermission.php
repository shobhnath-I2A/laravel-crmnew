<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
   protected $fillable = [
        'user_id',
        'module',
        'can_view',
        'can_add_edit',
    ];
}
