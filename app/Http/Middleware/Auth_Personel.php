<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Auth_Personel
{
    public function handle(Request $request, Closure $next): Response
    {
        // Staffs Middleware
        if (!Auth::guard('staff')->check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::guard('staff')->user()->role;

        if ($userRole !== 'Front Desk') {
            return redirect()->route('login.staff');
        }

        if ($userRole !== 'House Keeper') {
            return redirect()->route('login.staff'); // Redirect if not Front Desk
        }

        if ($userRole !== 'Maintenance') {
            return redirect()->route('login.staff'); // Redirect if not Front Desk
        }


        // Admin Middleware
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login.admin');
        }

        return $next($request);
    }
}