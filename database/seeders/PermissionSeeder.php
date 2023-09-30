<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-system-users', 'guard_name' => 'sanctum', ]);
        Permission::create(['name' => 'view-system-users', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'delete-system-users', 'guard_name' => 'sanctum' ]);
        Permission::create(['name' => 'update-system-users', 'guard_name' => 'sanctum' ]);
        
}
}
