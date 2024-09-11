<?php

namespace App\Http\Controllers\PMS;

use App\Models\Cart;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Generate daily report.
     *
     * @return \Illuminate\Http\Response
     */
    public function dailyReport()
    {
        $today = Carbon::today();
        $dailyExpenses = Cart::whereDate('created_at', $today)
            ->sum('total');

        return view('reports.daily', [
            'date' => $today->format('M d, Y'),
            'totalExpenses' => $dailyExpenses
        ]);
    }

    /**
     * Generate monthly report.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthlyReport()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $monthlyExpenses = Cart::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('total');

        return view('reports.monthly', [
            'month' => $startOfMonth->format('F Y'),
            'totalExpenses' => $monthlyExpenses
        ]);
    }

    /**
     * Generate yearly report.
     *
     * @return \Illuminate\Http\Response
     */
    public function yearlyReport()
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        $yearlyExpenses = Cart::whereBetween('created_at', [$startOfYear, $endOfYear])
            ->sum('total');

        return view('reports.yearly', [
            'year' => $startOfYear->format('Y'),
            'totalExpenses' => $yearlyExpenses
        ]);
    }
}