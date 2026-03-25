<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'info@nexgen.com'],
            [
                'name' => 'NEX Gen Admin',
                'password' => Hash::make('Password@123'),
                'email_verified_at' => now(),
            ]
        );
    }
}
