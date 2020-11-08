<?php

namespace App\Managers;

use App\User;
use Illuminate\Http\Request;

class EmployeeManager
{
    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {

    }

    /**
     * get all employees
     * @return mixed
     */
    public function getEmployees()
    {
        $employees = User::latest()->whereHas('roles', function($q) {
            $q->whereIn('name', ['employee'] );
        })->orderBy('id', 'desc')->get();
        return $employees;
    }

    public function getFirst()
    {
        $employee = User::latest()->whereHas('roles', function($q) {
            $q->whereIn('name', ['employee'] );
        })->with(['employee.department', 'employee.designation'])->first();
        return $employee;
    }
}
