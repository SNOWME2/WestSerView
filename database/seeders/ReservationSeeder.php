<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
                'guest_id' => 1, // Assuming a guest with ID 1 exists
                'room_id' => 1,  // Assuming a room with ID 1 exists
                'reservation_type' => 'Standard',
                'reservation_start_date' => Carbon::today()->toDateString(),
                'reservation_end_date' => Carbon::tomorrow()->toDateString(),
                'number_of_guest' => 2,

                'added_by' => 'Front Desk',
                'mode_of_reservation' => 'Online',
                'onsite_guest_name' => null, // Only for on-site reservations
                'onsite_guest_contact' => null, // Only for on-site reservations
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'guest_id' => null, // For on-site reservation without guest account
                'room_id' => 2,     // Assuming a room with ID 2 exists
                'reservation_type' => 'Deluxe',
                'reservation_start_date' => Carbon::today()->toDateString(),
                'reservation_end_date' => Carbon::parse('+3 days')->toDateString(),
                'number_of_guest' => 3,

                'added_by' => 'Front Desk',
                'mode_of_reservation' => 'On-site',
                'onsite_guest_name' => 'John Doe',
                'onsite_guest_contact' => '123-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}