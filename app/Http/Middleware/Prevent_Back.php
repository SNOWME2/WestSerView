<?php

namespace App\Http\Middleware;

use Closure;


class Prevent_Back
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }
}