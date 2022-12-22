<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class StepFactory extends Factory
{
    public function definition(): array
    {
        return [
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
            'trip_id' => Trip::factory(),
        ];
    }
}
