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
            'email' => 'admin@mail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@mail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'landlord',
            'email' => 'landlord@mail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'tenant',
            'email' => 'tenant@mail.com',
            'password' => 'password'
        ]);


    }

}
