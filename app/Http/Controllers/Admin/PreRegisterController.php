<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreRegisterRequest;
use App\Models\Employee;
use App\Models\Visitor;
use App\Services\PreRegister\PreRegisterService;
use Illuminate\Http\Request;

class PreRegisterController extends Controller
{
    protected $preRegisterService;

    public function __construct(PreRegisterService $preRegisterService)
    {
        $this->preRegisterService = $preRegisterService;

        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pre_registers = $this->preRegisterService->all($request);
        $pre_register = null;
        return view('admin.pre-register.index', compact('pre_registers','pre_register'));
    }

    public function show(Request $request, $id)
    {
        $pre_registers = $this->preRegisterService->all($request);
        $pre_register = Visitor::find($id);

        return view('admin.pre-register.index', compact('pre_registers','pre_register'));
    }

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

        return back()->with('success','Pre-register updated successfully');
    }

}
