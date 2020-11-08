<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesignationsRequest;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationsController extends Controller
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
        $designations = Designation::all();
        $designation = null;
        return view('admin.designations.index', compact('designations','designation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DesignationsRequest $request)
    {
        $input = $request->all();
        Designation::create($input);

        return redirect()->route('designations.index')->with('success','Designations created successfully');
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
        $designation = Designation::findOrFail($id);
        $designations = Designation::all();

        return view('admin.designations.index',compact('designations','designation'));

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

        $this->validate($request, ['name' => 'required|string|max:255|unique:designations,name,' . $id]);
        $input = $request->all();
        $designation = Designation::findOrFail($id);
        $designation->update($input);

        return redirect()->route('designations.index')->with('success','Designations updated successfully');
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
        Designation::findOrFail($id)->delete();
        return redirect()->route('designations.index')->with('success','Designations deleted successfully');
    }
}
