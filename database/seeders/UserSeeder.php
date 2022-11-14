<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            // 'email_verified_at' => now(),
            // 'password' => Hash::make('cazh2022'),
            // 'role' => 'admin'
        ]);
        
        $admin->assignRole('admin');

        $admin = User::create([
            'username' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user123'),
            // 'email_verified_at' => now(),
            // 'password' => Hash::make('cazh2022'),
            // 'role' => 'admin'
        ]);
        
        $admin->assignRole('user');

        $admin = User::create([
            'username' => 'Mentor',
            'email' => 'mentor@mentor.com',
            'password' => Hash::make('mentor123'),
            // 'email_verified_at' => now(),
            // 'password' => Hash::make('cazh2022'),
            // 'role' => 'admin'
        ]);
        
        $admin->assignRole('mentor');
    }
}
