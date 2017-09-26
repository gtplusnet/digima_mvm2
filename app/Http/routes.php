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
// 



/*Route::get('/', function () {
    return view('welcome');
});*/

/*Front Page*/
Route::get('/', 'FrontController@index');

Route::any('/registration', 'FrontController@registration');
Route::any('/get_city', 'FrontController@get_city');
Route::any('/get_postal_code', 'FrontController@get_postal_code');
Route::any('/register_business', 'FrontController@register_business');

Route::any('/search_result', 'FrontController@search_result');
Route::any('/search_result_list', 'FrontController@search_result_list');
Route::any('/business_info', 'FrontController@business_info');


Route::get('/about', 'FrontController@about');
Route::get('/contact', 'FrontController@contact');
Route::get('/login', 'FrontController@login');
Route::post('/login', 'FrontController@login_submit');


Route::get('/success', 'FrontController@success');
Route::get('/register', 'FrontController@register');


Route::get('/business', 'FrontController@business');
Route::get('/payment',	'FrontController@payment');


Route::get('/searchresult', 'SearchresultController@index');
Route::get('/category',		'SearchresultController@category');


/*Merchant Page by Brain*/
Route::get('/merchant', 			'MerchantController@index');
Route::get('/merchant/profile', 	'MerchantController@profile');
Route::get('/merchant/category', 	'MerchantController@category');
Route::get('/merchant/bills', 		'MerchantController@bills');


//Eden
Route::any('/merchant/add_other_info', 'MerchantController@add_other_info'); 
Route::any('/merchant/view_info', 'MerchantController@view_info');

Route::get('/admin', 				'AdminController@admin_login');
Route::post('/admin_login', 	'AdminController@admin_login_submit');
Route::any('/admin/logout', 		'AdminController@admin_logout');

Route::get('/admin/dashboard', 		'AdminController@dashboard');
Route::get('/admin/profile', 		'AdminController@profile');
Route::get('/admin/client', 		'AdminController@client');
Route::any('/admin/add/team', 		'AdminController@add_team');
Route::any('/admin/add/agent', 		'AdminController@add_agent');
Route::any('/admin/get_city', 		'AdminController@get_city');
Route::any('/admin/get_zip_code', 	'AdminController@get_zip_code');
//james
Route::post('/admin/add_team_submit', 	'AdminController@add_team_submit');
Route::post('/admin/add_agent_submit', 	'AdminController@add_agent_submit');




/*Agent Page by Joshua*/
Route::get('/agent/dashboard', 		'AgentController@index');
Route::post('/agent_login', 	    'AgentController@agent_login');

Route::get('/agent/profile', 		'AgentController@profile');
Route::get('/agent/client', 		'AgentController@client');
Route::any('/agent/add/client', 	'AgentController@add_client');
Route::post('/add_client_submit',   'AgentController@add_client_submit');
Route::any('/agent/get_city', 		'AgentController@get_city');
Route::any('/agent/get_zip_code', 	'AgentController@get_zip_code');
//james agent//
Route::any('/agent',          'AgentController@login');

// Route::get('/', function () {
//     return view('digimamvm.home');
// });

//Renz's Routes

//Routes for Login
//Route::any('/login', 'LoginController@index');
Route::any('/check_login', 'LoginController@check_login');

//Routes for Registration
//Route::any('/registration', 'RegistrationController@registration');
//Route::any('/get_city', 'RegistrationController@get_city');
//Route::any('/get_zip_code', 'RegistrationController@get_zip_code');
//Route::any('/register_business', 'RegistrationController@register_business');

//Routes for Search
//Route::any('/search', 'SearchController@index');
//Route::any('/search_result', 'SearchController@search_result');
//Route::any('/search_result_list', 'SearchController@search_result_list');


//End of Oliver's Routes

Route::any('/generaladmin', 'GeneralAdmin@admin');
Route::get('/admin_login', 		'AdminController@index');


