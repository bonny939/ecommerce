<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'is_admin' => true
        ]);
        User::create([
            'name' => 'bonny',
            'email' => 'bonface@gmail.com',
            'password' => bcrypt('bonny123'),
            'email_verified_at' => now(),
            'is_admin' => false
        ]);

        Customer::create([
            'first_name' => 'bonny',
            'last_name' => 'bonface@gmail.com',
            'phone' => "0795548900",
            'status' => 'active',
            

        ]);
    }
}
