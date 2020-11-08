<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users['name']       = 'Mr Admin';
        $users['email']      = 'admin@example.com';
        $users['phone']      = '0177895625';
        $users['password']   = Hash::make('123456');
        $admin = User::create($users);
        $admin->assignRole([1]);
    }
}
