<?php

use App\Enums\Gender;
use App\Enums\Status;
use App\Enums\VisitType;
use App\Models\Employee;
use App\Models\Visitor;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class VisitorTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $employee = Employee::all()->random();

            $visitor                                 = new Visitor;
            $visitor->first_name                     = $faker->firstName;
            $visitor->last_name                      = $faker->lastName;
            $visitor->email                          = $faker->email;
            $visitor->phone                          = $faker->phoneNumber;
            $visitor->reg_no                         = env('REF_PREFIX').mt_rand(100000, 999999);
            $visitor->address                        = $faker->address;
            $visitor->company_name                   = $faker->company;
            $visitor->status                         = Status::ACTIVE;
            $visitor->employee_id                    = $employee->id;
            $visitor->user_id                        = $employee->user_id;
            $visitor->creator_type                   = 'App\User';
            $visitor->creator_id                     = User::all()->random()->id;
            $visitor->editor_type                    = 'App\User';
            $visitor->editor_id                      = User::all()->random()->id;
            $visitor->save();
        }
    }
}
