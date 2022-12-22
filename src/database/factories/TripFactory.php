<?php

namespace Database\Factories;

use App\Enums\TripStatus;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    public function definition(): array
    {
        return [
            'from' => $this->faker->city(),
            'to' => $this->faker->city(),
            'status' => $this->faker->randomElement(TripStatus::cases()),
            'driver_id' => User::factory(),
            'vehicle_id' => Vehicle::factory(),
        ];
    }
}
