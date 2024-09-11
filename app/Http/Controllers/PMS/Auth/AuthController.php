<?php

namespace App\Http\Controllers\PMS\Auth;

use App\Models\Staff;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\StaffAttendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Staff\LoginRequest;

class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('sub_views (PMS).login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();

        // Regenerate session
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::guard('staff')->user();

        if ($user) {
            // Update status to Active and set last_activity_at

            $user->update([
                'status' => 'Online',
                'last_activity_at' => now(),
            ]);

            // Record login time in attendance
            StaffAttendance::create([
                'staff_id' => $user->staff_id,
                'login_at' => now(),
            ]);
            // Redirect based on user role
            if ($user->role === 'House Keeper') {

                return redirect(route('PMS.frontdesk'));
            }
            if ($user->role === 'Food&Beverages') {
                return redirect(route('PMS.food&beverages'));
            }
            if ($user->role === 'Front Desk') {
                return redirect(route('PMS.frontdesk'));
            }
            if ($user->role === 'General Manager') {
                return redirect()->intended(route('frontdesk.dashboard'));
            }
        }

        return redirect()->route('staff.login')->withErrors([
            'email' => 'Invalid role.',
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::guard('staff')->user();

        if ($user) {
            // Update the latest attendance record with the logout time
            $attendance = StaffAttendance::where('staff_id', $user->staff_id)
                ->whereNull('logout_at')
                ->latest('login_at')
                ->first();

            if ($attendance) {
                $attendance->update([
                    'logout_at' => now(),
                ]);
            }

            // Update status to Offline before logging out
            $user->update([
                'status' => 'Offline',
                'last_activity_at' => now(),
            ]);
        }

        Auth::guard('staff')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.staff');
    }

    public function updateStatus(Request $request)
    {
        $staffId = $request->input('staff_id');
        $user = Staff::find($staffId);

        if ($user) {
            $user->update([
                'status' => $request->input('status'),
                'last_activity_at' => now(),
            ]);

            // Update the latest attendance record with the logout time
            $attendance = StaffAttendance::where('staff_id', $staffId)
                ->whereNull('logout_at')
                ->latest('login_at')
                ->first();

            if ($attendance) {
                $attendance->update([
                    'logout_at' => now(),
                ]);
            }
        }

        return response()->json(['message' => 'Status updated successfully']);
    }
}
