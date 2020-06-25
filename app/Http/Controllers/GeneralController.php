<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function edit()
    {
        $general    =   General::find(1)->first();
        return view("vendor.multiauth.dashboard.settings.general.index",compact("general"));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'site_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
       $general =    General::find(1);
       $general->site_name   =   $request->site_name;
       $general->email    =   $request->email;
       $general->phone    =   $request->phone;
       $general->address    =   $request->address;
        if ($request->hasFile('site_logo')){
            $imageName = time().'.'.$request->site_logo->extension();

            $request->site_logo->move(public_path('images/general'), $imageName);
            $general->logo  =  $imageName;
        }

        if ($request->hasFile('favicon')){
            $imageName = time().'.'.$request->favicon->extension();

            $request->favicon->move(public_path('images/general'), $imageName);
            $general->favicon  =  $imageName;
        }

        if ($request->hasFile('footer_logo')){
            $imageName = time().'.'.$request->footer_logo->extension();

            $request->footer_logo->move(public_path('images/general'), $imageName);
            $general->footer_logo  =  $imageName;
        }
       $general->update();
        return redirect()->back()->with("success","Successfully Updated!");
    }

}
