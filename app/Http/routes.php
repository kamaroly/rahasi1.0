<?php

Route::group(['middleware' => ['web']], function () 
{
	Route::get('/',['as'=>'home', function () {
    return view('marketing');
	}]);
	Route::get('/docs',['as'=>'docs', function () {
	    return view('docs.index');
	}]);
	
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

	    // PAY BILL ROUTES
	    Route::group(['prefix'=>'/bills'], function(){
		   Route::post('pay',['as'=>'api.v1.bills.pay','uses'=>'Apis\PayBillApiController@store']);
		   Route::get('get/{transactionid}',['as'=>'api.v1.bills.get','uses'=>'Apis\PayBillApiController@show']);
	    });
});

Route::get('/test',function(){
	dd(getModels());
});