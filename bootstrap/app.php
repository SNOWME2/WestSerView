<?php


use App\Http\Middleware\roles\fob;
use App\Http\Middleware\roles\housekeeping;
use App\Http\Middleware\roles\frontdesk;
use App\Http\Middleware\Admin_Mid;

use App\Http\Middleware\Normal_auth;

use App\Http\Middleware\Prevent_Back;

use Illuminate\Foundation\Application;

use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([

            'normal' => Normal_auth::class,
            'Prevent_Backdoor' => Prevent_Back::class,
            'admin' => Admin_Mid::class,

            'frontdesk' => frontdesk::class,
            'fob' => fob::class,
            'housekeeping' => housekeeping::class,


        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
