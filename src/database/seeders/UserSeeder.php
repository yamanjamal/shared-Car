<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
                'id' => 'bd5720a7-4482-4a84-97e2-f7b973f3a475',
                'name' => 'Yaman',
                'last_name' => 'Jamal',
                'phone' => '0191981',
                'rate' => '5',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'email' => 'yaman.jamal@alternativa.dev',
                'image' => null,
                'username' => 'yamanjamal',
                'email_verified_at' => now(),
        ]);
        User::factory(10)->create();
    }
}
