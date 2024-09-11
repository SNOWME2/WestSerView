<?php

namespace App\Http\Middleware\roles;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class frontdesk
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('staff')->check()) {
            return redirect()->route('login.staff');
        }

        $userRole = Auth::guard('staff')->user()->role;
        if ($userRole !== 'Front Desk') {
            if ($userRole == 'House Keeper') {
                return redirect()->route('login.staff');
            } else if ($userRole == 'Food&Beverages') {
                return redirect()->route('PMS.food&beverages');
            } else {
                return redirect()->route('login.staff');
            }
        }

        return $next($request);
    }
}
