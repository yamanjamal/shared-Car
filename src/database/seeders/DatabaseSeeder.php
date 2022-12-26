<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            VehicleSeeder::class,
            TripSeeder::class,
            StepSeeder::class,
            PermissionsSeeder::class,
        ]);
    }
}
