<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin Classcode',
            'email' => '19102116@ittelkom-pwt.ac.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
    }
}
