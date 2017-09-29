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
Route::get('/get-city', 'FrontController@getCity');
Route::get('/get-postal-code', 'FrontController@getPostalCode');
Route::any('/register-business', 'FrontController@registerBusiness');

Route::any('/business-search', 'FrontController@businessSearch');
Route::any('/search-business-result', 'FrontController@businessSearchResult');
Route::any('/business_info', 'FrontController@business_info');



Route::get('/about', 'FrontController@about');
Route::get('/contact', 'FrontController@contact');
Route::get('/login', 'FrontController@login');

Route::post('/login1', 'FrontController@login_submit');







Route::get('/success', 'FrontController@success');
Route::get('/register', 'FrontController@register');



Route::get('/business', 'FrontController@business');
Route::get('/payment',	'FrontController@payment');


Route::get('/searchresult', 'SearchresultController@index');
Route::get('/category',		'SearchresultController@category');

Route::get('/searchresult', 'SearchresultController@index');
Route::get('/category', 'SearchresultController@category');
Route::get('/resultsortgrid', 'SearchresultController@resultsortgrid');
Route::get('/searchtabular', 'SearchresultController@searchtabular');



/*Merchant Page by Brain*/
Route::get('/merchant', 			'MerchantController@index');
Route::get('/merchant/profile',		'MerchantController@profile');
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

Route::get('/admin/user', 		'AdminController@user');
Route::any('/admin/add/team', 		'AdminController@add_team');
Route::any('/admin/add/agent', 		'AdminController@add_agent');
Route::any('/admin/add/supervisor', 'AdminController@add_supervisor');
Route::any('/admin/add/admin', 		'AdminController@add_admin');



Route::any('/admin/get_city', 		'AdminController@get_city');
Route::any('/admin/get_zip_code', 	'AdminController@get_zip_code');

//james
Route::post('/admin/add_team_submit', 	'AdminController@add_team_submit');
Route::post('/admin/add_agent_submit', 	'AdminController@add_agent_submit');
Route::post('/admin/get_client', 		'AdminController@get_client');
Route::post('/admin/get_client_transaction', 		'AdminController@get_client_transaction');
Route::post('/admin/get_client_transaction_reload', 'AdminController@get_client_transaction_reload');



Route::any('/admin/team', 			'AdminController@team');
Route::any('/admin/add_team', 		'AdminController@add_team');
Route::any('/admin/view_team', 		'AdminController@view_team');
Route::any('/admin/edit_team/{team_id}', 	'AdminController@edit_team');
Route::any('/admin/update_team/{team_id}', 	'AdminController@update_team');
Route::any('/admin/delete_team/{team_id}', 	'AdminController@delete_team');

Route::any('/admin/add_supervisor_submit', 		'AdminController@add_supervisor_submit');
Route::post('/admin/add_admin_submit', 	'AdminController@add_admin_submit');


Route::any('/admin/add_agent', 		'AdminController@add_agent');
Route::any('/admin/delete_agent/{agent_id}', 	'AdminController@delete_agent');
//Route::any('/admin/view_agent', 		'AdminController@view_agent');

/*Agent Page by Joshua*/
Route::get('/agent/dashboard', 		'AgentController@index');
Route::post('/agent_login', 	    'AgentController@agent_login');

Route::get('/agent/profile', 		'AgentController@profile');
Route::get('/agent/client', 		'AgentController@client');

Route::post('/agent/get_client', 		'AgentController@get_client');
Route::post('/agent/get_client_transaction', 		'AgentController@get_client_transaction');
Route::post('/agent/get_client_transaction_reload', 'AgentController@get_client_transaction_reload');



Route::any('/agent/add/client', 	'AgentController@add_client');
Route::post('/add_client_submit',   'AgentController@add_client_submit');
Route::any('/agent/get_city', 		'AgentController@get_city');
Route::any('/agent/get_postal_code', 	'AgentController@get_zip_code');

//james agent//
Route::any('/agent',          'AgentController@login');

Route::any('/agent/logout', 		'AgentController@agent_logout');


// Route::get('/', function () {
//     return view('digimamvm.home');
// });

//Renz's Routes

//Routes for LoginController
//Route::any('/login', 'LoginController@index');
//Route::any('/check_login', 'LoginController@check_login');

//Routes for Registration
//Route::any('/registration', 'RegistrationController@registration');
//Route::any('/get_city', 'RegistrationController@get_city');
//Route::any('/get_zip_code', 'RegistrationController@get_zip_code');
//Route::any('/register_business', 'RegistrationController@register_business');

//Routes for Search
//Route::any('/search', 'SearchController@index');
//Route::any('/search_result', 'SearchController@search_result');
//Route::any('/search_result_list', 'SearchController@search_result_list');


//Routes for General Admin
Route::any('/general_admin', 'GeneralAdminController@index');
Route::any('/general_admin/get_business_list', 'GeneralAdminController@get_business_list');
Route::any('/general_admin/get_business_list_info', 'GeneralAdminController@get_business_list_info');
Route::any('/general_admin/get_business_info', 'GeneralAdminController@get_business_info');
Route::any('/general_admin/email_invoice', 'GeneralAdminController@email_invoice');
Route::any('/general_admin/report', 'GeneralAdminController@report');
//End of Renz's Routes


Route::any('/sample', 'MerchantController@sample');
