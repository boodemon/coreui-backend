<?php
header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    if (Auth::guard('admin')->guest()) {
        return redirect('login');
    } else {
        return redirect('dashboard');
    }
});

Route::resource('login', 'Backend\AuthController');

Route::group(['middleware'=>'admin'], function () {
    Route::resource('dashboard', 'Backend\DashboardController');
    // SETTING MENU //
    Route::resource('setting/user','Backend\UserController');
    Route::get('user/profile', 'Backend\UserController@getProfile');
    Route::post('user/profile', 'Backend\UserController@postProfile');
    Route::post('user/checker', 'Backend\UserController@checker');
    Route::get('logout','Backend\AdminController@logout');
});


