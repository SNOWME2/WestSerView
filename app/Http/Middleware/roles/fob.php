<?php

namespace App\Http\Middleware\roles;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class fob
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('staff')->check()) {
            return redirect()->route('login.staff');
        }

        $userRole = Auth::guard('staff')->user()->role;
        if ($userRole !== 'Food&Beverages') {
            if ($userRole == 'House Keeper') {
                return redirect()->route('login.staff');
            } else if ($userRole == 'Front Desk') {
                return redirect()->route('PMS.frontdesk');
            } else {
                return redirect()->route('login.staff');
            }
        }

        return $next($request);
    }
}
