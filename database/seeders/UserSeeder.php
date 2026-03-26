<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'data' => [
                    'name' => 'Admin',
                    'email' => 'admin@test.com',
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ],
                'roles' => ['ADMIN'],
            ],
            [
                'data' => [
                    'name' => 'User',
                    'email' => 'user@test.com',
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ],
                'roles' => ['USER'],
            ],
        ];

        foreach ($users as $user) {
            $createdUser = User::create($user['data']);
            $createdUser->assignRole($user['roles']);
        }
    }
}
