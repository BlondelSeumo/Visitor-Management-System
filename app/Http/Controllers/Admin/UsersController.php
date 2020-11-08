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

class UsersController extends Controller
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
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;
        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->whereHas('roles', function($q) {
                $q->where('name', '!=', 'employee');
            })->paginate($perPage);
        } else {

            $users = User::latest()->whereHas('roles', function($q) {
                $q->where('name', '!=', 'employee');
            })->paginate($perPage);
        }
        $user = User::find(auth()->user()->id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.users.index', compact('users','user','roles','userRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $perPage = 15;
        $users = User::latest()->whereHas('roles', function($q) {
            $q->where('name', '!=', 'employee');
        })->paginate($perPage);
        $roles = Role::pluck('name','name')->all();
       return view('admin.users.create', compact('users','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $user->assignRole($request->input('roles'));
        if ($request->file('picture')) {
            $user->addMedia($request->file('picture'))->toMediaCollection('users');
        }
        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $perPage = 15;
        $users = User::latest()->whereHas('roles', function($q) {
            $q->where('name', '!=', 'employee');
        })->paginate($perPage);

        $user = User::find($id);
        if($user){
            $roles = Role::pluck('name','name')->all();
            $userRole = $user->roles->pluck('name','name')->all();
        }

        return view('admin.users.index',compact('users','user','roles','userRole'));
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
       //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(UserUpdateRequest $request, $id)
    {

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        if ($request->file('picture')) {
            $user->media()->delete();
            $user->addMedia($request->file('picture'))->toMediaCollection('users');
        }
        return back()->with('success','User updated successfully');
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
            $user->media()->delete();
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success','User deleted successfully');
    }
}
