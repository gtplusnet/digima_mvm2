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





Route::get('/success', 'FrontController@success');
Route::get('/register', 'FrontController@register');



Route::get('/business', 'FrontController@business');



Route::get('/searchresult', 'SearchresultController@index');
Route::get('/category',		'SearchresultController@category');

Route::get('/searchresult', 'SearchresultController@index');
Route::get('/category', 'SearchresultController@category');
Route::get('/resultsortgrid', 'SearchresultController@resultsortgrid');
Route::get('/searchtabular', 'SearchresultController@searchtabular');



/*Merchant Page by Brain*/

Route::get('/merchant/dashboard', 			'MerchantController@index');
Route::get('/merchant/profile',		'MerchantController@profile');

Route::get('/merchant/category', 	'MerchantController@category');
Route::get('/merchant/bills', 		'MerchantController@bills');
//james
Route::get('/merchant/logout', 'MerchantController@logout');
Route::get('/login', 'MerchantController@login');
Route::post('/login', 'MerchantController@login_submit');
Route::get('/merchant/payment',	'MerchantController@payment');
Route::post('/merchant/upload_payment',	'MerchantController@upload_payment');

//Eden
Route::any('/merchant/add_other_info', 'MerchantController@add_other_info'); 
Route::any('/merchant/view_info', 'MerchantController@view_info');
Route::any('/merchant/sample', 'MerchantController@sample');


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
Route::any('/admin/sample', 	'AdminController@sample');


Route::get('/admin/user', 		'AdminController@user');
Route::any('/admin/add/supervisor', 'AdminController@add_supervisor');
Route::any('/admin/add/admin', 		'AdminController@add_admin');
// <<<<<<< HEAD
Route::any('/admin/get_city', 		'AdminController@get_city');
Route::any('/admin/get_zip_code', 	'AdminController@get_zip_code');
// =======



// >>>>>>> 780a4b04454cb25afca7d5d6774592ae26a24f7e

//james
Route::post('/admin/add_team_submit', 	'AdminController@add_team_submit');
Route::post('/admin/add_agent_submit', 	'AdminController@add_agent_submit');
Route::post('/admin/get_client', 		'AdminController@get_client');
Route::post('/admin/get_client_transaction', 		'AdminController@get_client_transaction');
Route::post('/admin/get_client_transaction_reload', 'AdminController@get_client_transaction_reload');




Route::get('/supervisor', 				'SupervisorController@index');
Route::post('/supervisor_login_submit', 	'SupervisorController@supervisor_login_submit');

/*Route::post('/admin_login', 	'AdminController@admin_login_submit');*/
// Route::any('/supervisor/logout', 		'SupervisorController@admin_logout');
Route::get('/supervisor/dashboard', 		'SupervisorController@dashboard');
Route::get('/supervisor/profile', 		'SupervisorController@profile');
Route::get('/supervisor/client', 		'SupervisorController@client');
Route::any('/supervisor/add/user', 		'SupervisorController@add_team');


Route::any('/supervisor/view/user', 	'SupervisorController@view_user');
Route::any('/supervisor/delete_team', 'SupervisorController@delete_team');
Route::any('/supervisor/delete_agent', 'SupervisorController@delete_agent');
Route::any('/supervisor/edit_team', 'SupervisorController@edit_team');
Route::any('/supervisor/update_team', 'SupervisorController@update_team');
Route::any('/supervisor/edit_agent/{id}', 'SupervisorController@edit_agent');
Route::any('/supervisor/update_agent', 'SupervisorController@update_agent');

Route::any('/supervisor/get_city', 		'SupervisorController@get_city');
Route::any('/supervisor/get_zip_code', 	'SupervisorController@get_zip_code');


Route::any('/admin/add_supervisor_submit', 		'AdminController@add_supervisor_submit');
Route::post('/admin/add_admin_submit', 	'AdminController@add_admin_submit');
Route::any('/admin/add_agent', 		'AdminController@add_agent');
Route::any('/admin/delete_agent/{agent_id}', 	'AdminController@delete_agent');
//Route::any('/admin/view_agent', 		'AdminController@view_agent');





//james
Route::post('/admin/add_team_submit', 	'AdminController@add_team_submit');
Route::post('/admin/add_agent_submit', 	'AdminController@add_agent_submit');


/*Agent Page by Joshua*/
Route::get('/agent/dashboard', 		'AgentController@dashboard');
Route::post('/agent_login', 	    'AgentController@agent_login');

Route::get('/agent/profile', 		'AgentController@profile');
Route::get('/agent/client', 		'AgentController@client');
Route::post('/agent/get_client', 		'AgentController@get_client');
Route::post('/agent/get_client1', 		'AgentController@get_client1');
Route::post('/agent/get_client2', 		'AgentController@get_client2');
Route::post('/agent/get_client_transaction', 		'AgentController@get_client_transaction');
Route::post('/agent/get_client_transaction_reload', 'AgentController@get_client_transaction_reload');
Route::any('/agent/upload-convo', 'SuperVisorController@uploadConvo');



Route::any('/agent/add/client', 	'AgentController@add_client');
Route::post('/add_client_submit',   'AgentController@add_client_submit');
Route::any('/agent/get_city', 		'AgentController@get_city');

Route::any('/agent/get_postal_code', 	'AgentController@get_zip_code');

//james agent//
Route::any('/agent',          'AgentController@login');
Route::any('/agent/logout', 		'AgentController@agent_logout');

//james agent//

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
Route::any('/general_admin/general_admin_login_submit', 'GeneralAdminController@general_admin_login_submit');

Route::any('/general_admin/get_business_list', 'GeneralAdminController@get_business_list');
Route::any('/general_admin/get_business_list_info', 'GeneralAdminController@get_business_list_info');
Route::any('/general_admin/get_business_info', 'GeneralAdminController@get_business_info');
Route::any('/general_admin/email_invoice', 'GeneralAdminController@email_invoice');
Route::any('/general_admin/report', 'GeneralAdminController@report');
//End of Renz's Routes
//james
Route::any('/general_admin/dashboard', 'GeneralAdminController@general_admin_dashboard');
Route::any('/general_admin/business_list', 'GeneralAdminController@general_admin_business_list');
Route::any('/general_admin/logout', 'GeneralAdminController@general_admin_logout');
Route::any('/general_admin/merchants', 'GeneralAdminController@general_admin_merchants');
Route::any('/general_admin/payment_monitoring', 'GeneralAdminController@general_admin_payment_monitoring');
Route::any('/general_admin/manage_user', 'GeneralAdminController@general_admin_manage_user');
Route::any('/general_admin/manage_categories', 'GeneralAdminController@general_admin_manage_categories');
Route::any('/general_admin/add_category', 'GeneralAdminController@general_admin_add_category');
Route::any('/general_admin/edit_category', 'GeneralAdminController@general_admin_edit_category');
Route::any('/general_admin/search_category', 'GeneralAdminController@general_admin_search_category');
Route::any('/general_admin/delete_category/{id}', 'GeneralAdminController@general_admin_delete_category');





Route::any('/sample', 'MerchantController@sample');

Route::any('/sample-upload', 'FrontController@sampleUpload');
Route::any('/upload-file', 'FrontController@uploadFile');

