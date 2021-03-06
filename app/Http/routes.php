<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controllers to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => ['web']], function () {
//    Route::controllers('login','LoginController');
//    Route::controllers('regist','RegistController');
//
//});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::Controller('home', 'HomeController');
    Route::Controller('settings', 'SettingController');
    Route::Controller('talent', 'TalentController');
    Route::get('talent/create', 'TalentController@getCreate');
    Route::Controller('api/seed', 'Api\SeedController');
    Route::Controller('api/profile', 'Api\ProfileController');
    Route::Controller('api/owm', 'Api\OWMController');
    Route::Controller('api','ApiController');
});
