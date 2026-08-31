<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RestrictIp;
use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\ModulePermission;
use App\Http\Middleware\UpdateUserLastSeen;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'restrict.ip' => RestrictIp::class,
            'permission' => CheckPermission::class,
            'admin.only' => \App\Http\Middleware\AdminOnly::class,
            'module.permission' => ModulePermission::class,
        ]);
        $middleware->appendToGroup('web', [
            UpdateUserLastSeen::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
