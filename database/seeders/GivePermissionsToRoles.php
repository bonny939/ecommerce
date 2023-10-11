<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GivePermissionsToRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = \Spatie\Permission\Models\Role::all();

        foreach ($roles as $role) {
            if($role->permissions->count() != 0) continue;

            $permissions = \Spatie\Permission\Models\Permission::inRandomOrder()
                ->take(10)->get()->pluck('name');

            $role->syncPermissions($permissions);
        }
    }
}
