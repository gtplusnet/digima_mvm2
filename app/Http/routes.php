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
Route::get('/about', 'FrontController@about');
Route::get('/contact', 'FrontController@contact');
Route::get('/login', 'FrontController@login');
Route::get('/success', 'FrontController@success');
Route::get('/business', 'FrontController@business');


/*Merchant Page by Brain*/
Route::get('/merchant', 			'MerchantController@index');
Route::get('/merchant/profile', 	'MerchantController@profile');
Route::get('/merchant/category', 	'MerchantController@category');
Route::get('/merchant/bills', 		'MerchantController@bills');

/*Agent Page by Joshua*/
Route::get('/agent', 				'AgentController@index');
Route::get('/agent/profile', 		'AgentController@profile');
Route::get('/agent/client', 		'AgentController@client');
Route::any('/agent/add_client', 	'AgentController@add_client');
Route::any('/agent/get_city', 	'AgentController@get_city');
Route::any('/agent/get_zip_code', 	'AgentController@get_zip_code');




// Route::get('/', function () {
//     return view('digimamvm.home');
// });

//Renz's Routes

//Routes for Login
Route::any('/login', 'LoginController@index');
Route::any('/check_login', 'LoginController@check_login');

//Routes for Registration
Route::any('/registration', 'RegistrationController@registration');
Route::any('/get_city', 'RegistrationController@get_city');
Route::any('/get_zip_code', 'RegistrationController@get_zip_code');
Route::any('/register_business', 'RegistrationController@register_business');

//Routes for Search
Route::any('/search', 'SearchController@index');
Route::any('/search_business', 'SearchController@search_business');
Route::any('/business_info', 'SearchController@business_info');

//End of Renz's Routes


Route::any('/sample', 'MerchantController@sample');
