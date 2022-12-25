<?php

namespace Database\Seeders;

use Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'administrator@example.com'],
            ['name' => 'administrator', 'password' => Hash::make('password')]
        );

        User::factory()->count(10)->create();
    }
}
