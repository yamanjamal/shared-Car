<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'make' => $this->faker->company(),
            'model' => $this->faker->word(),
            'year' => $this->faker->year(),
            'plate' => rand(100000,999999),
            'capacity' => $this->faker->randomNumber(),
            'color' => $this->faker->safeHexColor(),
            'driver_id' => User::factory(),
        ];
    }
}
