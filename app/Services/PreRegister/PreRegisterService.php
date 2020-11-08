<?php

namespace App\Services\PreRegister;

use App\Http\Requests\PreRegisterRequest;
use App\Models\Booking;
use App\Models\PreRegister;
use App\Models\Visitor;
use Illuminate\Http\Request;
use DB;

class PreRegisterService
{
    /**
     * @param Request $request
     * @param int $limit
     * @return mixed
     */
    public function all(Request $request, $limit = 5)
    {

            if (auth()->user()->hasRole('employee')) {
                $results = Booking::latest()
                    ->where('user_id', auth()->id())
                    ->where('is_pre_register', 1)
                    ->paginate($limit);
            } else {
                $results = Booking::where('is_pre_register', 1)->latest()->paginate($limit);
            }

        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        Booking::find($id);

        return Booking::find($id);
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhere($column, $value)
    {
        $result = PreRegister::where($column, $value)->get();

        return $result;
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhereFirst($column, $value)
    {
        $result = PreRegister::where($column, $value)->first();

        return $result;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 10)
    {
        return PreRegister::paginate($perPage);
    }

    /**
     * @param PreRegisterRequest $request
     * @return mixed
     */
    public function make(PreRegisterRequest $request)
    {
        $visitor = DB::table('visitors')->orderBy('reg_no', 'desc')->first();
        $date    = date('y-m-d');
        $data    = substr($date, 0, 2);
        $data1   = substr($date, 3, 2);
        $data2   = substr($date, 6, 8);

        if ($visitor) {
            $value = substr($visitor->reg_no, -2);
            if ($value < 1000) {
                $reg_no = $data2 . $data1 . $data . $value + 1;
            } else {
                $reg_no = $data2 . $data1 . $data . '01';
            }
        } else {
            $reg_no = $data2 . $data1 . $data . '01';
        }
        $input['first_name'] = $request->input('first_name');
        $input['last_name'] = $request->input('last_name');
        $input['email'] = $request->input('email');
        $input['phone'] = $request->input('phone');
        $input['company_name'] = $request->input('company_name');
        $input['reg_no'] = $reg_no;
        $input['purpose'] = $request->input('purpose');
        $input['gender'] = $request->input('gender');
        $input['address'] = $request->input('address');
        $input['employee_id'] = $request->input('employee_id');
        $input['visit_type'] = 1;
        $input['user_id'] = 1;
        $input['status'] = 1;
        $visitor = Visitor::create($input);
        $result='';
        if($visitor) {
            $data['expected_date'] = $request->input('expected_date');
            $data['expected_time'] = $request->input('expected_time');
            $data['visitor_id'] = $visitor->id;
            $result = PreRegister::create($data);
            if ($request->file('pre_register')) {
                $result->addMedia($request->file('picture'))->toMediaCollection('pre_register');
            }

        }
        return $result;

    }

    /**
     * @param $id
     * @param PreRegisterRequest $request
     * @return mixed
     */
    public function update($id, PreRegisterRequest $request)
    {
        $pre_register = PreRegister::findOrFail($id);

        $input['first_name'] = $request->input('first_name');
        $input['last_name'] = $request->input('last_name');
        $input['email'] = $request->input('email');
        $input['phone'] = $request->input('phone');
        $input['company_name'] = $request->input('company_name');
        $input['purpose'] = $request->input('purpose');
        $input['gender'] = $request->input('gender');
        $input['address'] = $request->input('address');
        $input['employee_id'] = $request->input('employee_id');
        $input['visit_type'] = 1;
        $input['user_id'] = 1;
        $input['status'] = 1;
        $pre_register->visitor->update($input);
        if($pre_register) {
            $data['expected_date'] = $request->input('expected_date');
            $data['expected_time'] = $request->input('expected_time');
            $data['visitor_id'] = $pre_register->visitor->id;
            $pre_register->update($data);
            if ($request->file('pre_register')) {
                $pre_register->addMedia($request->file('picture'))->toMediaCollection('pre_register');
            }

        }
        return $pre_register;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return PreRegister::find($id)->delete();
    }

}
