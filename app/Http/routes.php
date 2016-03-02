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
    return view('marketing');
}]);
Route::get('/docs',['as'=>'docs', function () {
    return view('docs.index');
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

Route::group(['middleware' => ['web']], function () 
{
	
	// Dashboard route
	Route::get('/dashboard',['as'=>'dashboard','middleware'=>'sentry.auth','uses'=>'DashboardController@index']);
	// Merchants routes
	Route::group(['prefix'=>'merchants','middleware'=>'sentry.auth'],function()
 	{
		Route::post('/{user_hash}',['as'=>'merchants.store','uses'=>'MerchantController@store']);
		Route::put('/{user_hash}',['as'=>'merchants.edit','uses'=>'MerchantController@edit']);
	});
	// bills routes
	Route::group(['prefix'=>'bills','middleware'=>'sentry.auth'],function()
 	{
	 Route::get('/',['as'=>'bills.index','uses'=>'PayBillController@index']);
	 Route::get('/{hash}/show',['as'=>'bills.show','uses'=>'PayBillController@show']);
	});

	// settings routes
 	Route::group(['prefix'=>'settings','middleware'=>'sentry.auth'],function()
 	{
 		Route::get('/', ['as'=>'settings.index','uses'=>'SettingContoller@index']);
		Route::get('keys/',['as'=>'settings.keys','uses'=>'SettingContoller@keys']);
		Route::get('keys/{environment}/{userid}',['as'=>'settings.keys.generate','uses'=>'SettingContoller@generateKey']);
	});


});

Route::group(['prefix' => 'api/v1', 'middleware' => 'throttle:120'], function () {
	   Route::resource('paybill', 'Apis\PayBillApiController');
});