<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $systemAdminstrator = Role::create(['name'=>'System Adminstrator','guard_name'=>'web']);
        $manager = Role::create(['name'=>'Manager ','guard_name'=>'web']);
        $server = Role::create(['name'=>'Server','guard_name'=>'web']);
    }
}
