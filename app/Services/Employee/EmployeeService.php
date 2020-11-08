<?php

namespace App\Services\Employee;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Attendance;
use App\Models\Employee;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class EmployeeService
{
    /**
     * @param Request $request
     * @param int $limit
     * @return mixed
     */
    public function all(Request $request, $limit = 5)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $results = Employee::latest()
                        ->where('first_name', 'LIKE', "%$keyword%")
                        ->orWhere('last_name', 'LIKE', "%$keyword%")
                        ->orWhereHas('user', function($q) use($keyword) {
                            $q->where('email', 'LIKE', "%$keyword%");
                        })
                        ->paginate($limit);
        } else {
            $results = Employee::latest()->paginate($limit);
        }

        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Employee::findorFail($id);
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhere($column, $value)
    {
        $result = Employee::where($column, $value)->get();

        return $result;
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhereFirst($column, $value)
    {
        $result = Employee::where($column, $value)->first();

        return $result;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 10)
    {
        return Employee::paginate($perPage);
    }

    /**
     * @param EmployeeRequest $request
     * @return mixed
     */
    public function make(EmployeeRequest $request)
    {
        $input['name'] = $request->input('first_name'). ' '.$request->input('last_name');
        $input['email'] = $request->input('email');
        $input['phone'] = $request->input('phone');
        $input['password'] = bcrypt($request->input('password'));
        $user = User::create($input);
        $user = $user->assignRole(['3']);
        if ($request->file('picture')) {
            $user->addMedia($request->file('picture'))->toMediaCollection('users');
        }
        $result='';
        if($user) {
            $data['first_name'] = $request->input('first_name');
            $data['last_name'] = $request->input('last_name');
            $data['nickname'] = $request->input('nickname');
            $data['phone'] = $request->input('phone');
            $data['user_id'] = $user->id;
            $data['gender'] = $request->input('gender');
            $data['department_id'] = $request->input('department_id');
            $data['designation_id'] = $request->input('designation_id');
            $data['date_of_joining'] = $request->input('date_of_joining');
            $data['about'] = $request->input('about');
            $data['status'] = 1;
            $result = Employee::create($data);


        }
        return $result;

    }

    /**
     * @param $id
     * @param EmployeeUpdateRequest $request
     * @return mixed
     */
    public function update($id, EmployeeUpdateRequest $request)
    {
        $employee = Employee::find($id);
        $input['name'] = $request->input('first_name'). ' '.$request->input('last_name');
        $input['email'] = $request->input('email');
        $input['phone'] = $request->input('phone');
        if($request->input('password')){
            $input['password'] = bcrypt($request->input('password'));
        }
        $user = User::find($employee->user_id);
        $user->update($input);
        if ($request->file('picture')) {
            $user->media()->delete();
            $user->addMedia($request->file('picture'))->toMediaCollection('users');
        }
        if($user) {
            $data['first_name'] = $request->input('first_name');
            $data['last_name'] = $request->input('last_name');
            $data['nickname'] = $request->input('nickname');
            $data['phone'] = $request->input('phone');
            $data['user_id'] = $user->id;
            $data['gender'] = $request->input('gender');
            $data['department_id'] = $request->input('department_id');
            $data['designation_id'] = $request->input('designation_id');
            $data['date_of_joining'] = $request->input('date_of_joining');
            $data['about'] = $request->input('about');
            $data['status'] = 1;
            $employee->update($data);

        }
        return $employee;
    }

    public function check($id,$request)
    {

        if($request['status'] == 1){
            $checkin = new Attendance();
            $checkin->employee_id            = $id;
            $checkin->status                 = $request['status'];
            $checkin->checkin_time           = $request['checkin_time'];
            $checkin->date                   = date('Y-m-d', strtotime($request['date']));
            $checkin->save();
            return $checkin;
        }elseif ($request['status'] == 2){

            $checkout = Attendance::where(['employee_id'=>$id,'date'=>date('Y-m-d')])->first();
            $checkout->status                   = $request['status'];
            $checkout->checkout_time            = $request['checkout_time'];
            $checkout->date                     = date('Y-m-d', strtotime($request['date']));
            $checkout->save();
            return $checkout;
        }
        return false;
    }
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return Employee::find($id)->delete();
    }

}
