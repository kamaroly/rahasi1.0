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
 Route::get('/test',function(){
 	$user = Rahasi\Models\User::find(1);
 	$merchant = Rahasi\Models\Merchant::first();
 	return $merchant->bills;
 });

Route::group(['middleware' => ['web']], function () 
{
	Route::group(['prefix'=>'merchants','middleware'=>'sentry.auth'],function()
 	{
		Route::post('/{user_hash}',['as'=>'merchants.store','uses'=>'MerchantController@store']);
		Route::put('/{user_hash}',['as'=>'merchants.edit','uses'=>'MerchantController@edit']);
	});
	// bills routes
	Route::group(['prefix'=>'bills','middleware'=>'sentry.auth'],function()
 	{
	Route::get('/',['as'=>'bills.index','uses'=>'PayBillController@index']);
	});

	// settings routes
 	Route::group(['prefix'=>'settings','middleware'=>'sentry.auth'],function()
 	{
	Route::get('keys/',['as'=>'settings.keys','uses'=>'SettingContoller@keys']);
	Route::get('keys/{environment}/{userid}',['as'=>'settings.keys.generate','uses'=>'SettingContoller@generateKey']);
	});


});

Route::group(['prefix' => 'api/v1', 'middleware' => 'throttle:120'], function () {
	   Route::resource('paybill', 'Apis\PayBillApiController');
});
