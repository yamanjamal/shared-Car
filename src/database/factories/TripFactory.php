<?php

namespace Database\Factories;

use App\Enums\TripStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    public function definition()
    {
        return [
            'from' => now()->addHours(rand(1, 5)),
            'to' => now()->addHours(rand(5, 10)),
            'status' => $this->faker->randomElement(TripStatus::cases()),
            'user_id' => User::factory(),
        ];
    }
}
