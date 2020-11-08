<?php

use App\Enums\Status;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentArray[0]['name']      = 'Operation';
        $departmentArray[0]['status']    = Status::ACTIVE;

        $departmentArray[1]['name']      = 'IT';
        $departmentArray[1]['status']    = Status::ACTIVE;

        $departmentArray[2]['name']      = 'Marketing';
        $departmentArray[2]['status']    = Status::INACTIVE;

        $departmentArray[3]['name']      = 'Service';
        $departmentArray[3]['status']    = Status::INACTIVE;

        if (!blank($departmentArray)) {
            foreach ($departmentArray as $department) {
                Department::create($department);
            }
        }
    }
}
