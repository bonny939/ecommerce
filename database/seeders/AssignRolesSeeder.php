<?php

namespace Database\Seeders;

use App\Models\Api\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {$users = User::all();

        $roles = [
            'System Administrator',
            'Manager',
            'Server',
        ];

        foreach ($users as $index => $user) {
            if ($user->getRoleNames()->count() > 0) {
            }

            $role = Role::where('name', $roles[$index])->first();

            if ($role) {
                $user->assignRole($role);
            }
        }



    }
}
