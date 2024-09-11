<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StaffSeeder extends Seeder
{
    /**
     * Seed the staff table.
     *
     * @return void
     */
    public function run()
    {
        // Sample staff data
        $staffData = [
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'role' => 'Front Desk',
                'status' => 'Online',
                'last_activity_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'role' => 'Food&Beverages',
                'status' => 'Online',
                'last_activity_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'username' => 'janesmith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'role' => 'Maintenance',
                'status' => 'Offline',
                'last_activity_at' => now()->subDays(1),
            ],
            [
                'name' => 'Alice Johnson',
                'username' => 'alicejohnson',
                'email' => 'alice.johnson@example.com',
                'password' => Hash::make('password123'),
                'role' => 'House Keeper',
                'status' => 'Online',
                'last_activity_at' => now(),
            ],
        ];

        // Insert data into the staff table
        DB::table('staffs')->insert($staffData);
    }
}
