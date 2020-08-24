<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
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
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Landlord',
            'email' => 'landlord@mail.com',
            'password' => Hash::make('12345678')
        ]);
        // User::create([
        //     'name' => 'Tenant',
        //     'email' => 'tenant@mail.com',
        //     'password' => Hash::make('12345678')
        // ]);


    }

}
