<?php

namespace Database\Seeders;

use Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $model = User::firstOrCreate(
            ['email' => 'administrator@example.com'],
            ['name' => 'administrator', 'password' => Hash::make('password')]
        );

        $model->assignRole('super-admin');

        User::factory()->count(10)->create();
    }
}
