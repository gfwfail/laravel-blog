<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Session;

class ProfileController extends Controller
{
    public function getProfile()
    {

        $user = auth()->user();

        return view('admin.profile',compact('user'));
    }


    public function putProfile(Request $request)
    {
        $user = auth()->user();


        if ($request->hasFile('avatar')) {
            $path = $request->avatar->storeAs('avatars', $user->id.'.jpg');
            $user->avatar = $path;
            $user->save();
        }

        Session::flash('flash_message', 'User updated!');

        return redirect()->back();
    }


}
