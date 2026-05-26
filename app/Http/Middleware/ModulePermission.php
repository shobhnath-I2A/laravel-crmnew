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
            abort(403, 'Unauthorized access.');
        }

        $allowed = match ($type) {
            'view'     => $user->canView($module),
            'add'      => $user->canAdd($module),
            'edit'     => $user->canEdit($module),
            'delete'   => $user->canDelete($module),
            'download' => $user->canDownload($module),
            default    => false,
        };

        if (!$allowed) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
