<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FoodAndBeveragesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = ['Main Course', 'Desert', 'Beverages', 'Appetizer'];
        $statuses = ['Available', 'Not Available'];

        $items = [];

        for ($i = 1; $i <= 50; $i++) {
            $items[] = [
                'product_name' => $faker->word() . ' ' . $faker->word(),
                'description' => $faker->sentence(),
                'category' => $categories[array_rand($categories)],
                'price' => $faker->randomFloat(2, 5, 50),
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('food_and_beverages')->insert($items);
    }
}
