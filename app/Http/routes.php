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

/*Agent Page by Joshua*/
Route::get('/agent', 			'AgentController@index');
Route::get('/agent/profile', 	'AgentController@profile');
Route::get('/agent/client', 	'AgentController@client');
Route::any('/agent/add_client', 	'AgentController@add_client');



Route::get('/', function () {
    return view('digimamvm.home');
});

Route::any('/registration_first_step', 'RegistrationController@registration_first_step');
Route::any('/get_city', 'RegistrationController@get_city');
Route::any('/get_zip_code', 'RegistrationController@get_zip_code');


