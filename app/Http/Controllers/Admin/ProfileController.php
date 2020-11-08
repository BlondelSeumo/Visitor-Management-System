<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Http\Request;
use DB;
use Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $id = auth()->user()->id;
        if($id){
            $user = User::findOrFail($id);
            return view('admin.profile', compact('user'));
        }else{
            return redirect('dashboard');
        }

    }

    public function profileUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'   => 'required',
            'email'        => 'required|unique:users,email,'.$id,
            'phone'        => 'required|unique:users,phone,'.$id,
        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        if ($request->file('picture')) {
            $user->addMedia($request->file('picture'))->toMediaCollection('users');
        }
        return back()->with('success','User updated successfully');
    }

    public function change(ChangePasswordRequest $request)
    {
        $user           = auth()->user();
        $user->password = \Illuminate\Support\Facades\Hash::make(request('password'));
        $user->save();
        return redirect(route('admin.profile'))->withSuccess('The Password updated successfully');
    }

}
