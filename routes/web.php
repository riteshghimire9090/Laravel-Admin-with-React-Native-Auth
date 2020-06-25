<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("app", function (){
   return view("vendor.multiauth.dashboard.main.view");
});
Route::prefix('dashboard')->middleware(['auth:admin'])->group(function () {
    //-----------------------Start Profile-------------------------------------------------------------
    Route::get("/profile","ProfileController@index")->name("dashboard.profile");
    Route::post("/profile","ProfileController@update")->name("dashboard.profile.update");
    //-----------------------End Profile-------------------------------------------------------------

    //-----------------------Start Front User-------------------------------------------------------------
    Route::get("/front_user","FrontendUserController@index")->name("front.user.index");
    Route::get("/front_user/delete/{id}","FrontendUserController@destroy")->name("front.user.delete");
    Route::get("/front_user/edit/{id}","FrontendUserController@edit")->name("front.user.edit");
    Route::get("/front_user/verify/{id}","FrontendUserController@verify")->name("front.user.verify");
    Route::get("/front_user/change_status/{id}","FrontendUserController@change_status")->name("front.user.change_status");
    Route::post("/front_user/update/{id}","FrontendUserController@update")->name("front.user.update");

    //-----------------------End Front User-------------------------------------------------------------

    //-----------------------Start Settings General  -------------------------------------------------------------
    Route::get("/settings/general","GeneralController@edit")->name("setting.general.edit");
    Route::post("/settings/general/{id}","GeneralController@update")->name("setting.general.update");

    //-----------------------stop Settings General  -------------------------------------------------------------

    //-----------------------Start Settings api  -------------------------------------------------------------
    Route::get("/settings/api","ApiController@edit")->name("setting.api.edit");
    Route::post("/settings/api/{id}","ApiController@update")->name("setting.api.update");

    //-----------------------stop Settings api  -------------------------------------------------------------

});



