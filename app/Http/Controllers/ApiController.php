<?php

namespace App\Http\Controllers;

use App\Api;
use App\General;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function edit()
    {
     $mobile_api   =   Api::where("api_name","mobile_api")->first()->meta_id;
        return view("vendor.multiauth.dashboard.settings.api.index",compact("mobile_api"));
    }


    public function update(Request $request,$id)
    {
        $mobile_api_id  =   Api::where("api_name","mobile_api")->first();
       $mobile_api=   Api::find($mobile_api_id);
       $mobile_api->mobile_api   =   $request->mobile_api;
       $mobile_api->update();
        return redirect()->back()->with("success","Successfully Updated!");
    }

}
