<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'make' => $this->faker->year(),
            'model' => $this->faker->sentence(),
            'year' => $this->faker->year(),
            'plate' => $this->faker->randomDigit(6),
            'capacity' => $this->faker->randomNumber(),
            'color' => $this->faker->safeHexColor(),
            'driver_id' => User::factory(),
        ];
    }
}
