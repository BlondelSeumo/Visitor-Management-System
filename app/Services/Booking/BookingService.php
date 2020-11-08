<?php

namespace App\Services\Booking;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Attendance;
use App\Models\Booking;
use App\Models\Employee;
use App\User;
use Illuminate\Http\Request;

class BookingService
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
            if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('reception')) {
                $results = Booking::latest()
                    ->where('reg_no', 'LIKE', "%$keyword%")
                    ->paginate($limit);
            } else {
                $results = Booking::latest()
                    ->where('user_id', auth()->id())
                    ->where('reg_no', 'LIKE', "%$keyword%")
                    ->paginate($limit);
            }
        } else {
            if (auth()->user()->hasRole('employee')) {
                $results = Booking::latest()
                    ->where('user_id', auth()->id())
                    ->paginate($limit);
            } else {
                $results = Booking::latest()->paginate($limit);
            }

        }

        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Booking::findorFail($id);
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhere($column, $value)
    {
        $result = Booking::where($column, $value)->get();

        return $result;
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhereFirst($column, $value)
    {
        $result = Booking::where($column, $value)->first();

        return $result;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 10)
    {
        return Booking::paginate($perPage);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return Booking::find($id)->delete();
    }

}
