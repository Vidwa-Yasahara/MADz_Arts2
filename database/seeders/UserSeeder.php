<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin12345'),
            'role' => 'admin',
        ]);

        \App\Models\User::create([
            'name' => 'Normal User',
            'email' => 'user@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('user12345'),
            'role' => 'user',
        ]);
    }
}
