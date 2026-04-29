<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIps = [
            '127.0.0.1',
            '::1',
            '103.xxx.xxx.xxx',
        ];

        $ip = $request->getClientIp();

        // Allow admins from anywhere (optional)
        // if ($request->user() && $request->user()->role === 'admin') {
        //     return $next($request);
        // }

        if (!in_array($ip, $allowedIps)) {
            abort(403, "Access denied from ");
            // abort(403, "Access denied from IP: {$ip}");
        }

        return $next($request);
    }
}
