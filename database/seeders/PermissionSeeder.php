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
    {  app()['cache']->forget('spatie.permission.cache');
        \Eloquent::unguard();
        Permission::create(['name' => 'create-system-users', 'guard_name' => 'web', ]);
        Permission::create(['name' => 'view-system-users', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete-system-users', 'guard_name' => 'web' ]);
        Permission::create(['name' => 'update-system-users', 'guard_name' => 'web' ]);

        Permission::create(['name' => 'create-products', 'guard_name' => 'web', ]);
        Permission::create(['name' => 'view-products', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete-products', 'guard_name' => 'web' ]);
        Permission::create(['name' => 'update-products', 'guard_name' => 'web' ]);

        Permission::create(['name' => 'create-orders', 'guard_name' => 'web', ]);
        Permission::create(['name' => 'view-orders', 'guard_name' => 'web']);
        Permission::create(['name' => 'update-orders', 'guard_name' => 'web' ]);

        Permission::create(['name' => 'view-customers', 'guard_name' => 'web', ]);
        Permission::create(['name' => 'delete-customers', 'guard_name' => 'web' ]);
        Permission::create(['name' => 'update-customers', 'guard_name' => 'web' ]);

        Permission::create(['name' => 'view-reports', 'guard_name' => 'web']);

        Permission::create(['name' => 'view-dashboard', 'guard_name' => 'web']);

}
}
