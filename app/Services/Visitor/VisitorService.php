<?php

namespace App\Services\Visitor;

use App\Http\Requests\VisitorRequest;
use App\Models\Booking;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorService
{
    /**
     * @param Request $request
     * @param int $limit
     * @return mixed
     */
    public function all(Request $request, $limit = 5)
    {
        $keyword = $request->get('search');

            if (auth()->user()->hasRole('employee')) {
                $results = Booking::latest()
                    ->where('user_id', auth()->id())
                    ->where('is_pre_register', 0)
                    ->paginate($limit);
            } else {
                $results = Booking::where('is_pre_register', 0)->latest()->paginate($limit);
            }

        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        Visitor::find($id);

        return Visitor::find($id);
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhere($column, $value)
    {
        $result = Visitor::where($column, $value)->get();

        return $result;
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhereFirst($column, $value)
    {
        $result = Visitor::where($column, $value)->first();

        return $result;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 10)
    {
        return Visitor::paginate($perPage);
    }

    /**
     * @param VisitorRequest $request
     * @return mixed
     */
    public function make(VisitorRequest $request)
    {
        $result = Visitor::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name')
        ]);

        return $result;
    }

    /**
     * @param $id
     * @param VisitorRequest $request
     * @return mixed
     */
    public function update($id, VisitorRequest $request)
    {
        return Visitor::find($id)->update($request);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return Visitor::find($id)->delete();
    }

}
