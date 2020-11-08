<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitorRequest;
use App\Models\Visitor;
use App\Services\Visitor\VisitorService;
use Illuminate\Http\Request;
use DB;

class VisitorController extends Controller
{
    protected $visitorService;

    public function __construct(VisitorService $visitorService)
    {
        $this->visitorService = $visitorService;

        $this->middleware('auth');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $visitors = $this->visitorService->all($request);
        $visitor = null;

        return view('admin.visitor.index', compact('visitors','visitor'));
    }

    public function store(VisitorRequest $request)
    {
        $this->visitorService->make($request);

        return back()->with(['success' => 'Congratulations! visitor successfully registered.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show(Request $request, $id)
    {

        $visitors = $this->visitorService->all($request);
        $visitor = $this->visitorService->find($id);
        return view('admin.visitor.index', compact('visitors','visitor'));
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
        $validatedData = $request->validate([
            'name'   => 'required',
            'email'        => 'required|unique:visitors,email,'.$id,
            'phone'        => 'required|unique:visitors,phone,'.$id,
            'company_name' => '',
            'company_employee_id' => '',
            'national_identification_no' => '',
            'is_group_enabled' => '',
            'address' => '',
        ]);
        $visitor = Visitor::find($id);
        $visitor->update($validatedData);
        if ($request->file('picture')) {
            $visitor->media()->delete();
            $visitor->addMedia($request->file('picture'))->toMediaCollection('visitor');
        }

        return redirect()->route('admin.visitors.index')->with('success','Visitor updated successfully');
    }

    public function destroy($id)
    {
        $this->visitorService->delete($id);
        return back()->with(['success' => 'Visitor delete successfully.']);
    }
}
