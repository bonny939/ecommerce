<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class GivePermissionsToRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = \Spatie\Permission\Models\Role::all();
        $admin = Role::where('name', 'System Adminstrator')->first();
        $permissionsForAdmin = [
            'create-system-users',
            'view-system-users',
            'delete-system-users',
            'update-system-users',
            'create-products',
            'view-products',
            'delete-products',
            'update-products',
            'create-orders',
            'view-orders',
            'update-orders',
            'view-customers',
            'delete-customers',
            'update-customers',
            'view-reports',
            'view-dashboard'
        ];
        $admin->givePermissionTo($permissionsForAdmin);
        $admin->syncPermissions($permissionsForAdmin);
        $permissionsForManager = [
            'view-system-users',
            'create-products',
            'view-products',
            'delete-products',
            'update-products',
            'create-orders',
            'view-orders',
            'update-orders',
            'view-customers',
            'delete-customers',
            'update-customers',
            'view-reports',
            'view-dashboard'
        ];
        $manager = Role::where('name', 'Manager')->first();
        $manager->givePermissionTo($permissionsForManager);
        $manager->syncPermissions($permissionsForManager);
        $server = Role::where('name', 'Server')->first();
        $server->givePermissionTo('view-orders');


    }
}
