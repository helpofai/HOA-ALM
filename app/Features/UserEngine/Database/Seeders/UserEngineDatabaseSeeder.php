<?php

namespace App\Features\UserEngine\Database\Seeders;

use App\Models\User;
use App\Shared\Enums\SharedRoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserEngineDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::firstOrCreate(
            ['email' => 'admin@linkshortpro.com'],
            [
                'name' => 'Admin Boss',
                'password' => Hash::make('password'),
                'role' => SharedRoleEnum::ADMIN->value,
            ]
        );

        // Create Standard User
        User::firstOrCreate(
            ['email' => 'user@company.com'],
            [
                'name' => 'Standard User',
                'password' => Hash::make('password'),
                'role' => SharedRoleEnum::USER->value,
            ]
        );
    }
}
