<?php

use App\Models\RolePermission;

function userCanAccess($module, $type = 'view')
{
    $user = auth()->user();

    if (!$user) {
        return false;
    }

    if ($user->user_type == 0) {
        return true;
    }

    $column = match ($type) {
        'view' => 'can_view',
        'add_edit' => 'can_add_edit',
        'download' => 'can_download',
        default => null,
    };

    if (!$column) {
        return false;
    }

    return RolePermission::where('role_id', $user->role_id)
        ->where('module', $module)
        ->value($column) == 1;
}
