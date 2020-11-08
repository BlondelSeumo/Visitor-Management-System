<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentsRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = Department::all();
        $department = null;
        return view('admin.departments.index', compact('departments','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentsRequest $request)
    {
        $input = $request->all();
        Department::create($input);

        return redirect()->route('departments.index')->with('success','Departments created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $departments = Department::all();

        return view('admin.departments.index',compact('departments','department'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, ['name' => 'required|string|max:255|unique:departments,name,' . $id]);
        $input = $request->all();
        $department = Department::findOrFail($id);
        $department->update($input);

        return redirect()->route('departments.index')->with('success','Departments updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Department::findOrFail($id)->delete();
        return redirect()->route('departments.index')->with('success','Departments deleted successfully');
    }
}
