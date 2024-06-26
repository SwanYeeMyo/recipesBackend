<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'type' => 'premium',
            'password' => Hash::make('pyaesone'),
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'type' => 'premium',
            'password' => Hash::make('pyaesone'),
            'type' => 'premium'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('pyaesone'),
        ]);
    }
}
