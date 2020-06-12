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
            'name' => 'admin',
            'emai' => 'admin@mail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'user',
            'emai' => 'user@mail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'superadmin',
            'emai' => 'superadmin@mail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'landlord',
            'emai' => 'landlord@mail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'tenant',
            'emai' => 'tenant@mail.com',
            'password' => 'password'
        ]);


    }

}
