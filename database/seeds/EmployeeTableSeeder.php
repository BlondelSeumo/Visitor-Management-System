<?php

use App\Enums\Gender;
use App\Enums\Status;
use App\Models\Department;
use App\Models\Employee;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeTableSeeder extends Seeder
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

            $user                    = new User;
            $user->name              = $faker->name;
            $user->email             = $faker->email;
            $user->phone             = $faker->phoneNumber;
            $user->email_verified_at = now();
            $user->password          = Hash::make('123456');
            $user->remember_token    = Str::random(10);
            $user->save();
            $user->assignRole([3]);

            $employee                                 = new Employee;
            $employee->first_name                     = $faker->firstName;
            $employee->last_name                      = $faker->lastName;
            $employee->nickname                       = $faker->name;
            $employee->display_name                   = $faker->name;
            $employee->phone                          = $faker->phoneNumber;
            $employee->user_id                        = $user->id;
            $employee->gender                         = Gender::MALE;
            $employee->official_identification_number = env('REF_PREFIX').mt_rand(100000, 999999);
            $employee->date_of_joining                = now();
            $employee->department_id                  = Department::all()->random()->id;
            $employee->designation_id                 = Department::all()->random()->id;
            $employee->status                         = Status::ACTIVE;
            $employee->about                          = $faker->text(99);
            $employee->creator_type                   = 'App\User';
            $employee->creator_id                     = User::all()->random()->id;
            $employee->editor_type                    = 'App\User';
            $employee->editor_id                      = User::all()->random()->id;
            $employee->save();
        }
    }
}
