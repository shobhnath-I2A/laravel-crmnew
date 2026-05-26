<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModulePermission
{
    public function handle(Request $request, Closure $next, $module, $type = 'view'): Response
    {
        $user = auth()->user();

        if (!$user) {
            abort(403);
        }

        if ($type == 'view' && !$user->canViewModule($module)) {
            abort(403, 'Unauthorized access.');
        }

        if ($type == 'edit' && !$user->canEditModule($module)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
