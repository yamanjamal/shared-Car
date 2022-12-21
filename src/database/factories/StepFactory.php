<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends Factory
{
    public function definition()
    {
        return [
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
        ];
    }
}
