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

          User::create([
              'name' => 'Admin',
              'email' => 'admin@example.com',
              'password' => bcrypt('admin123'),
              'email_verified_at' => now(),
          ]);

          User::create([
              'name' => 'Joshua Ngomi',
              'email' => 'manager@gmail.com',
              'password' => bcrypt('passworded'),
              'email_verified_at' => now(),
          ]);
        User::create([
            'name' => 'Cafeteria Server',
            'email' => 'server@cafeteria.com',
            'password' => bcrypt('passworded'),
            'email_verified_at' => now(),
        ]);
    }
}
