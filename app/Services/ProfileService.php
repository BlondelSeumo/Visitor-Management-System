<?php

namespace App\Services;

use App\User;

class ProfileService
{
    public function profile()
    {
        return User::findorFail(auth()->id());
    }

    public function profileUpdate($request)
    {
        $picture = '';
        if ($request->hasFile('picture')) {
            $request->file('picture')->store('public');
            $picture = $request->picture->hashName();
        }
        $array = [
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'username'   => $request->input('username'),
            'email'      => $request->input('email'),
            'phone'      => $request->input('phone'),
            'country_id' => $request->input('country_id'),
            'state_id'   => $request->input('state_id'),
            'area_id'    => $request->input('area_id'),
            'picture'    => $picture,
        ];

        if ($picture == '') {
            unset($array['picture']);
        }

        return User::where('id', auth()->id())->update($array);
    }

    public function changePassword($request)
    {
        return User::where('id', auth()->id())->update(['password' => bcrypt($request->password)]);
    }

    public function profileDeactivate()
    {
        return User::where('id', auth()->id())->delete();
    }



}
