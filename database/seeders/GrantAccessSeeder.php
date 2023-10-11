<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrantAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\Api\User::all();
        $roles = \Spatie\Permission\Models\Role::all();

        foreach ($users as $index => $user) {
            if ($user->getPermissionNames()->count() > 0) {
                continue; // Skip users with existing permissions
            }

            if (isset($roles[$index])) {
                $role = $roles[$index];
                $user->assignRole($role);

                // Assign permissions based on the role
                $permissions = [];

                if ($role->name === 'System Administrator') {
                    // Assign all permissions
                    $permissions = \Spatie\Permission\Models\Permission::all()->pluck('name');
                } elseif ($role->name === 'Manager') {
                    // Assign all permissions except 'create-system-users'
                    $permissions = \Spatie\Permission\Models\Permission::where('name', '!=', 'create-system-users')->pluck('name');
                } elseif ($role->name === 'Server') {
                    // Assign only 'view-reports' permission
                    $permissions = ['view-orders'];
                }

                $user->syncPermissions($permissions); // Use $user to sync permissions

            }
}
    }
}
