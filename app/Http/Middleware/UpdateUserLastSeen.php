<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {

            $user = auth()->user();

            /*
             * Don't hit DB on absolutely every request.
             * Update only if older than 1 minute.
             */
            if (
                !$user->last_seen_at ||
                $user->last_seen_at->lt(now()->subMinute())
            ) {
                $user->updateQuietly([
                    'last_seen_at' => now(),
                ]);
            }
        }
        return $next($request);
    }
}
