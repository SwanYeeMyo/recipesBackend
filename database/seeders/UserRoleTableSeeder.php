<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'superadmin@gmail.com')->first();
        $admin->syncRoles(1);

        $user = User::where('email', 'admin@gmail.com')->first();
        $user->syncRoles(2);

        $user = User::where('email', 'user@gmail.com')->first();
        $user->syncRoles(3);
    }
}
