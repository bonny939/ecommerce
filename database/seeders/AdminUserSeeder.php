<?php

namespace Database\Seeders;

use App\Models\Customer;
use Spatie\Permission\Models\Role;
use App\Models\Api\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Create roles if they don't exist
          $roles = ['System Administrator', 'Manager', 'Server'];
          foreach ($roles as $roleName) {
              $role = Role::firstOrNew(['name' => $roleName]);
              if (!$role->exists) {
                  $role->save();
              }
          }

          // Create users and assign roles
          User::create([
              'name' => 'Admin',
              'email' => 'admin@example.com',
              'password' => bcrypt('admin123'),
              'email_verified_at' => now(),
          ])->assignRole('System Administrator');

          User::create([
              'name' => 'Joshua',
              'email' => 'manager@gmail.com',
              'password' => bcrypt('bonny123'),
              'email_verified_at' => now(),
          ])->assignRole('Manager');
        User::create([
            'name' => 'Jatelo',
            'email' => 'josh@gmail.com',
            'password' => bcrypt('bonny123'),
            'email_verified_at' => now(),
        ])->assignRole('Server');

        Customer::create([
            'first_name' => 'Bonito',
            'last_name' => 'bonface@gmail.com',
            'phone' => "0795548900",
            'status' => 'active',
        ]);
    }
}
