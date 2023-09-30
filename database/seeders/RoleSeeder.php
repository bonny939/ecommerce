<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $systemAdminstrator = Role::create(['name'=>'System Adminstrator']);
        $server = Role::create(['name'=>'server']);
        $manager = Role::create(['name'=>'manager ']);
    }
}
