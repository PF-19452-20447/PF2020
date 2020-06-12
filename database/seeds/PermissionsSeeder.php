<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => "view_users",
            'guard_name' => 'web'
        ]);

       Permission::create([
            'name' => "add_users",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "edit_users",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "delete_users",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "view_roles",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "add_roles",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "edit_roles",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "delete_roles",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "adminFullApp",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "adminApp",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "accessAsTenant",
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => "accessAsLandlord",
            'guard_name' => 'web'
        ]);
    }
}
