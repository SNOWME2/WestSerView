<?php

namespace App\Http\Controllers\PMS;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class POSController extends Controller
{
    // Generate report based on the type
    public function generateReport(Request $request, $type)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = DB::table('carts')
            ->join('reservations', 'carts.reservation_id', '=', 'reservations.reservation_id')
            ->join('rooms', 'reservations.room_id', '=', 'rooms.room_id')
            ->select(
                DB::raw('SUM(CASE WHEN carts.status = "Completed" THEN carts.total ELSE 0 END) as completed_cart_total'),
                DB::raw('SUM(DATEDIFF(reservations.reservation_end_date, reservations.reservation_start_date) * rooms.price) as room_total'),
                DB::raw('SUM(CASE WHEN carts.status = "Completed" THEN carts.total ELSE 0 END) + SUM(DATEDIFF(reservations.reservation_end_date, reservations.reservation_start_date) * rooms.price) as total_expense'),
                'reservations.guest_name',
                'reservations.reservation_start_date'
            )
            ->whereBetween('reservations.reservation_start_date', [$startDate, $endDate])
            ->groupBy('reservations.guest_name', 'reservations.reservation_start_date', 'rooms.price');

        switch ($type) {
            case 'daily':
                $query->select(DB::raw('DATE(reservations.reservation_start_date) as date'));
                break;
            case 'monthly':
                $query->select(DB::raw('MONTH(reservations.reservation_start_date) as month'), DB::raw('YEAR(reservations.reservation_start_date) as year'));
                break;
            case 'yearly':
                $query->select(DB::raw('YEAR(reservations.reservation_start_date) as year'));
                break;
        }

        $report = $query->get();

        return view('pos.report', [
            'report' => $report,
            'type' => $type,
        ]);
    }
}