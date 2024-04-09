<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminPermission = Permission::where('name', 'super admin')->pluck('name');

        $role1 = Role::find(1);

        $role1->syncPermissions($superadminPermission);

        $adminPermission = Permission::where('name', 'admin')->pluck('name');

        $role2 = Role::find(2);

        $role2->syncPermissions($adminPermission);

        $userPermission = Permission::where('name', 'user')->pluck('name');

        $role2 = Role::find(3);

        $role2->syncPermissions($userPermission);
    }
}
