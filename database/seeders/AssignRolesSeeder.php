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
    {
        $users = User::take(3)->get(); // Get the first three users
        $roles = \Spatie\Permission\Models\Role::all();

        if ($users->count() > 0 && $roles->count() > 0) {
            foreach ($users as $user) {
                // Assign roles to each of the first three users
                foreach ($roles as $role) {
                    $user->assignRole($role);
                }
            }

        }
    }
}
