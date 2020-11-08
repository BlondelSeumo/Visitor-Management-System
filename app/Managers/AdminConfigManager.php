<?php

namespace App\Managers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminConfigManager
{
    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {

    }

    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveAdminWizard(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $role = Role::create([
            'name' => 'Admin',
            'label' => 'admin'
        ]);
        $user->roles()->save($role);
        return $user;
    }
}
