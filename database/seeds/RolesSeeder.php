<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => "Admin",
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => "SuperAdmin",
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => "Landlord",
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => "Tenant",
            'guard_name' => 'web'
        ]);

    }

}
