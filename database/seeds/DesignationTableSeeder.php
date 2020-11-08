<?php

use App\Enums\Status;
use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designationArray[0]['name']      = 'HR Director';
        $designationArray[0]['status']    = Status::ACTIVE;

        $designationArray[1]['name']      = 'Chief Human Resource Officer';
        $designationArray[1]['status']    = Status::ACTIVE;

        $designationArray[2]['name']      = 'General HR Manager';
        $designationArray[2]['status']    = Status::INACTIVE;

        $designationArray[3]['name']      = 'Production Manager';
        $designationArray[3]['status']    = Status::INACTIVE;

        if (!blank($designationArray)) {
            foreach ($designationArray as $designation) {
                Designation::create($designation);
            }
        }
    }
}
