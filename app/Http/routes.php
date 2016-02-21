<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home', function () {
    return view('welcome');
}]);

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
 Route::get('/dashboard',function(){
 	return view('welcome');
 });

 Route::group(['prefix'=>'settings'],function(){
	Route::get('keys/',['as'=>'settings.keys','uses'=>'\Rahasi\Http\Controllers\SettingContoller@keys']);
	Route::get('keys/{environment}',['as'=>'settings.keys.generate','uses'=>'\Rahasi\Http\Controllers\SettingContoller@generateKey']);

});

Route::group(['prefix' => 'api/v1', 'middleware' => 'throttle:5'], function () {
	   Route::resource('paybill', 'PayBillController');
});
