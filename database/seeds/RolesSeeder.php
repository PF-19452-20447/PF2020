<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

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
    }
}
