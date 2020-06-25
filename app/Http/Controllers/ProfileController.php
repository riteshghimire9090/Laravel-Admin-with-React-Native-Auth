<?php

namespace App\Http\Controllers;

use App\User;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public  function index()
    {

        return view("vendor.multiauth.dashboard.profile.index");
    }

    public  function update(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);



        $user_profile   =   Admin::find(auth()->user()->id);
        $user_profile->name =   $request->name;
        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images/profile'), $imageName);
            $user_profile->profile_pic  =   $imageName;
        }


        $user_profile->update();
        return redirect()->back()->with("success","Successfully Updated Your Profile");
    }

}
