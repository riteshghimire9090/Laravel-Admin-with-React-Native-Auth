<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendUserController extends Controller
{
    public function index(Request $request)
    {
        $requested  =  $request->search_user;
        $frontusers  =   User::where("name","like","%".$request->search_user."%")
            ->orWhere("email","like","%".$request->search_user."%")
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view("vendor.multiauth.dashboard.user.front.show",compact("frontusers","requested"));
    }

    public function destroy($id)
    {
            User::find($id)->delete();
            return redirect()->back()->with("success","Successfully Deleted User!");
    }

    public function edit($id)
    {
              $user=  User::find($id);
                return view("vendor.multiauth.dashboard.user.front.edit",compact("user"));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required'
        ]);



        $user_profile   =   User::find($id);
        $user_profile->name =   $request->name;
        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images/profile'), $imageName);
            $user_profile->profile_pic  =  $imageName;
        }


        $user_profile->update();
        return redirect()->back()->with("success","Successfully Updated Your Profile");
    }
    public function  verify($id)
    {

        $user =      User::find($id);
        $user->email_verified_at    =   Carbon::now()->timestamp;
        $user->update();
        return redirect()->back()->with("success","Successfully Verified User!");
    }
    public function  change_status($id)
    {
        if (User::find($id)->status)
        {    $user   =    User::find($id);
             $user->status   =   false;
             $user->update();
        }
        else{
            $user   =    User::find($id);
            $user->status   =   true;
            $user->update();
        }

        return redirect()->back()->with("success","Successfully Verified User!");
    }
}
