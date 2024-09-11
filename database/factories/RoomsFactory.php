<?php

namespace Database\Factories;

use App\Models\Rooms;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoomsFactory extends Factory
{
    protected $model = Rooms::class;

    public function definition()
    {
        return [
            'room_number' => $this->faker->unique()->numberBetween(100, 999),
            'room_type' => $this->faker->randomElement(['Single', 'Double', 'Suite']),
            'capacity' => $this->faker->numberBetween(1, 4),
            'price' => $this->faker->numberBetween(50, 500),
            'added_by' => $this->faker->name,
        ];
    }
}