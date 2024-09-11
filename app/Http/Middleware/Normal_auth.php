<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Normal_auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        $userRole = Auth::user('guest')->role;


        if ($userRole === 'Maintenance') {
            return redirect()->route('/staff');
        }
        if ($userRole === 'House Keeper') {
            return redirect()->route('/staff');
        } else
            return $next($request);
    }
}