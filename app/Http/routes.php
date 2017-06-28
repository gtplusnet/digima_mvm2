<?php

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


/*Route::get('/', function () {
    return view('welcome');
});*/

/*Front Page*/
Route::get('/', 'FrontController@index');


/*Merchant Page by Brain*/
Route::get('/merchant', 			'MerchantController@index');
Route::get('/merchant/profile', 	'MerchantController@profile');
Route::get('/merchant/category', 	'MerchantController@category');
Route::get('/merchant/bills', 		'MerchantController@bills');


Route::get('/', function () {
    return view('digimamvm.home');
});

//Renz's Routes
Route::any('/registration', 'RegistrationController@registration');
Route::any('/get_city', 'RegistrationController@get_city');
Route::any('/get_zip_code', 'RegistrationController@get_zip_code');
//End of Renz's Routes



