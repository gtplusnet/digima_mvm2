<?php



/*Routes for SAMPLE PAGES*/
Route::get('/pdfview','GeneralAdminController@pdfview');
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');
Route::any('/sample', 'MerchantController@sample');
Route::any('/sample1', 'MerchantController@sample1');
Route::any('/sample2', 'MerchantController@sample2');
Route::any('/sample_invoice', 'GeneralAdminController@sample_invoice');


/*Routes for Front*/
Route::get('/', 						'FrontController@index');
Route::any('/registration', 			'FrontController@registration');
Route::get('/get-city', 				'FrontController@getCity');
Route::get('/get-postal-code', 			'FrontController@getPostalCode');
Route::any('/register-business', 		'FrontController@registerBusiness');
Route::any('/business-search', 			'FrontController@businessSearch');
Route::any('/search-business-result',   'FrontController@businessSearchResult');
Route::any('/business_info', 			'FrontController@business_info');
Route::get('/about', 					'FrontController@about');
Route::get('/contact', 					'FrontController@contact');
Route::any('/contact_send', 			'FrontController@contact_send');
Route::get('/success',			 		'FrontController@success');
Route::get('/register', 				'FrontController@register');
Route::get('/redirect', 				'FrontController@redirect_deactivated');
Route::get('/business/{id}', 			'FrontController@business');
Route::any('/guest/add_messages', 		'FrontController@add_messages');
Route::get('/business/details', 		'FrontController@business_details');
Route::get('/forgot/password', 			'FrontController@forgot_password');
Route::any('/home/get_sub_category', 	'FrontController@get_sub_category');
Route::get('/searchresult', 			'SearchresultController@index');
Route::get('/category', 				'SearchresultController@category');
Route::get('/resultsortgrid', 			'SearchresultController@resultsortgrid');
Route::get('/searchtabular', 			'SearchresultController@searchtabular');


/*Routes for Merchant*/
Route::get('/login', 									'MerchantController@login');
Route::post('/login', 									'MerchantController@login_submit');
Route::get('/merchant/logout', 							'MerchantController@logout');
Route::get('/merchant/payment',							'MerchantController@payment');
Route::post('/merchant/upload_payment',					'MerchantController@upload_payment');
Route::any('/merchant/add_other_info',  				'MerchantController@add_other_info'); 
Route::get('/merchant/payment/{id}/{name}', 			'MerchantController@payment_merchant');
Route::get('/merchant/redirect', 						'MerchantController@merchant_redirect');
Route::get('/merchant/redirect/exist', 					'MerchantController@merchant_redirect_exist');
Route::get('/merchant/dashboard', 						'MerchantController@index');
Route::get('/merchant/profile',							'MerchantController@profile');
Route::get('/merchant/profile/update_hours',			'MerchantController@update_hours');
Route::get('/merchant/category', 						'MerchantController@category');
Route::get('/merchant/category/add_category', 			'MerchantController@add_category');
Route::post('/merchant/category/add_keywords', 			'MerchantController@add_keywords');
Route::get('/merchant/category/delete_keywords/{id}',   'MerchantController@delete_keywords');
Route::get('/merchant/tag_category', 					'MerchantController@tag_category');
Route::post('/merchant/add_tag_category', 				'MerchantController@add_tag_category');
Route::any('/merchant/add_business_category', 			'MerchantController@add_business_category');
Route::any('/merchant/delete_business_category/{id}', 	'MerchantController@delete_business_category');
Route::get('/merchant/messages', 						'MerchantController@messages');
Route::any('/merchant/add_images', 						'MerchantController@add_images');
Route::any('/merchant/delete_messages/{id}', 			'MerchantController@delete_messages');
Route::get('/merchant/bills', 							'MerchantController@bills');
Route::any('/merchant/add_other_info', 					'MerchantController@add_other_info');
Route::any('/merchant/add_payment_method', 				'MerchantController@add_payment_method');
Route::any('/merchant/delete_payment_method', 			'MerchantController@delete_payment_method');
Route::any('/merchant/edit_payment_method', 			'MerchantController@edit_payment_method');
Route::any('/merchant/view_info', 						'MerchantController@view_info');
Route::any('/merchant/sample', 							'MerchantController@sample');


/*Routes for Supervisor*/
Route::any('/supervisor', 				    'SuperVisorController@index');
Route::post('/supervisor_login_submit',     'SuperVisorController@supervisor_login_submit');
Route::any('/supervisor_logout', 			'SuperVisorController@supervisor_logout');
Route::any('/supervisor/logout', 			'SuperVisorController@supervisor_logout');
Route::get('/supervisor/dashboard', 		'SuperVisorController@dashboard');
Route::get('/supervisor/profile', 			'SuperVisorController@profile');
Route::get('/supervisor/client', 			'SuperVisorController@client');
Route::post('/supervisor/get_client', 		'SuperVisorController@get_client');
Route::post('/supervisor/get_client1', 		'SuperVisorController@get_client1');
Route::post('/supervisor/get_client2', 		'SuperVisorController@get_client2');
Route::post('/supervisor/get_client_transaction', 		'SuperVisorController@get_client_transaction');
Route::post('/supervisor/get_client_transaction_reload', 'SuperVisorController@get_client_transaction_reload');
Route::get('/supervisor/manage/merchant', 	'SuperVisorController@manage_merchant');
Route::any('/supervisor/manage_user', 		'SuperVisorController@manage_user');
Route::post('/supervisor/add_team', 		'SuperVisorController@supervisor_add_team');
Route::post('/supervisor/add_agent', 		'SuperVisorController@supervisor_add_agent');
Route::post('/supervisor/get_agent_info', 	'SuperVisorController@get_agent_info');//wala
Route::post('/supervisor/assign_agent', 	'SuperVisorController@supervisor_assign_agent');
Route::any('/supervisor/delete_team/{id}',  'SuperVisorController@supervisor_delete_team');
Route::post('/supervisor/delete_agent', 	'SuperVisorController@supervisor_delete_agent');
Route::any('/supervisor/edit_team', 		'SuperVisorController@edit_team');
Route::any('/supervisor/update_team', 		'SuperVisorController@update_team');
Route::any('/supervisor/edit_agent/{id}', 	'SuperVisorController@edit_agent');
Route::any('/supervisor/update_agent', 		'SuperVisorController@update_agent');
Route::any('/supervisor/get_city', 			'SuperVisorController@get_city');
Route::any('/supervisor/get_zip_code', 		'SuperVisorController@get_zip_code');
Route::any('/supervisor/upload-convo', 		'SuperVisorController@uploadConvo');
Route::any('/supervisor/force_activate', 	'SuperVisorController@force_activate');
Route::any('/agent/upload-convo', 			'SuperVisorController@uploadConvo');





/*Routes for Agent*/
Route::any('/agent',          						'AgentController@login');
Route::get('/agent/dashboard', 						'AgentController@dashboard');
Route::post('/agent_login', 	    				'AgentController@agent_login');
Route::get('/agent/profile', 						'AgentController@profile');
Route::get('/agent/client', 						'AgentController@client');
Route::post('/agent/get_client', 					'AgentController@get_client');
Route::post('/agent/get_client1', 					'AgentController@get_client1');
Route::post('/agent/get_client2', 					'AgentController@get_client2');
Route::post('/agent/get_client_transaction', 		'AgentController@get_client_transaction');
Route::post('/agent/get_client_transaction_reload', 'AgentController@get_client_transaction_reload');
Route::any('/agent/add/client', 					'AgentController@add_client');
Route::post('/add_client_submit',   				'AgentController@add_client_submit');
Route::any('/agent/get_city', 						'AgentController@get_city');
Route::any('/agent/get_postal_code', 				'AgentController@get_zip_code');
Route::any('/agent/logout', 						'AgentController@agent_logout');


//Routes for General Admin
Route::any('/general_admin', 										'GeneralAdminController@index');
Route::any('/general_admin/general_admin_login_submit', 			'GeneralAdminController@general_admin_login_submit');
Route::any('/general_admin/get_business_list', 						'GeneralAdminController@get_business_list');
Route::any('/general_admin/get_business_list_info', 				'GeneralAdminController@get_business_list_info');
Route::any('/general_admin/get_business_info',						'GeneralAdminController@get_business_info');
Route::any('/general_admin/email_invoice', 							'GeneralAdminController@email_invoice');
Route::any('/general_admin/report', 								'GeneralAdminController@report');
Route::any('/general_admin/dashboard', 								'GeneralAdminController@general_admin_dashboard');
Route::any('/general_admin/business_list', 							'GeneralAdminController@general_admin_business_list');
Route::any('/general_admin/logout', 								'GeneralAdminController@general_admin_logout');
Route::any('/general_admin/merchants', 								'GeneralAdminController@general_admin_merchants');
Route::any('/general_admin/payment_monitoring', 					'GeneralAdminController@general_admin_payment_monitoring');
Route::any('/general_admin/manage_user', 							'GeneralAdminController@general_admin_manage_user');
Route::any('/general_admin/manage_categories', 						'GeneralAdminController@general_admin_manage_categories');
Route::any('/general_admin/add_category', 							'GeneralAdminController@general_admin_add_category');
Route::any('/general_admin/edit_category', 							'GeneralAdminController@general_admin_edit_category');
Route::any('/general_admin/search_category', 						'GeneralAdminController@general_admin_search_category');
Route::any('/general_admin/delete_category', 						'GeneralAdminController@general_admin_delete_category');
Route::any('/general_admin/add_sub_category', 						'GeneralAdminController@general_admin_add_sub_category');
Route::any('/general_admin/get_sub_category', 						'GeneralAdminController@general_admin_get_sub_category');
// Route::any('/general_admin/get_sub_sub_category', 					'GeneralAdminController@general_admin_get_sub_sub_category');
// Route::any('/general_admin/add_sub_sub_category', 					'GeneralAdminController@general_admin_add_sub_sub_category');
// Route::any('/general_admin/sub_sub_sub_category', 					'GeneralAdminController@general_admin_sub_sub_sub_category');




Route::any('/general_admin/edit_sub_category', 						'GeneralAdminController@general_admin_edit_sub_category');
Route::any('/general_admin/send_invoice/{id}', 						'GeneralAdminController@general_admin_send_invoice');
Route::any('/general_admin/send_save_invoice/{id}', 				'GeneralAdminController@general_admin_send_save_invoice');
Route::any('/general_admin/manage_invoice', 						'GeneralAdminController@general_admin_manage_invoice');
Route::any('/general_admin/resend_invoice', 						'GeneralAdminController@general_admin_resend_invoice');
Route::post('/general_admin/accept_and_activate', 					'GeneralAdminController@general_admin_accept_and_activate');
Route::post('/general_admin/decline_and_deactivate', 				'GeneralAdminController@general_admin_decline_and_deactivate');
Route::post('/general_admin/manage_user/add_agent', 				'GeneralAdminController@general_admin_add_agent');
Route::post('/general_admin/manage_user/add_team', 					'GeneralAdminController@general_admin_add_team');
Route::post('/general_admin/manage_user/add_supervisor', 			'GeneralAdminController@general_admin_add_supervisor');
Route::post('/general_admin/manage_user/add_admin', 				'GeneralAdminController@general_admin_add_generaladmin');
Route::any('/general_admin/manage_user/delete_agent', 				'GeneralAdminController@general_admin_delete_agent');
Route::any('/general_admin/manage_user/delete_team', 				'GeneralAdminController@general_admin_delete_team');
Route::any('/general_admin/manage_user/assign_agent', 				'GeneralAdminController@general_admin_assign_agent');
Route::get('/general_admin/manage_website', 						'GeneralAdminController@general_admin_manage_website');
Route::post('/general_admin/manage_website/add_membership', 		'GeneralAdminController@general_admin_add_membership');
Route::post('/general_admin/manage_website/add_payment_method', 	'GeneralAdminController@general_admin_add_payment_method');
Route::post('/general_admin/manage_website/add_county', 			'GeneralAdminController@general_admin_add_county');
Route::post('/general_admin/manage_website/add_city', 				'GeneralAdminController@general_admin_add_city');
Route::post('/general_admin/manage_website/delete_membership',        'GeneralAdminController@general_admin_delete_membership');
Route::post('/general_admin/manage_website/delete_payment_method',  'GeneralAdminController@general_admin_delete_payment_method');
Route::post('/general_admin/manage_website/delete_county',        	'GeneralAdminController@general_admin_delete_county');
Route::post('/general_admin/manage_website/delete_city',        	'GeneralAdminController@general_admin_delete_city');
Route::post('/general_admin/manage_website/update_membership',        'GeneralAdminController@general_admin_update_membership');
Route::post('/general_admin/manage_website/update_payment_method',        'GeneralAdminController@general_admin_update_payment_method');
Route::post('/general_admin/manage_website/update_county',        'GeneralAdminController@general_admin_update_county');
Route::post('/general_admin/manage_website/update_city',        'GeneralAdminController@general_admin_update_city');


Route::post('/general_admin/manage_user/view_merchant_info',        'GeneralAdminController@general_admin_view_merchant_info');












Route::any('/sample', 'MerchantController@sample');
Route::any('/sample-upload', 'FrontController@sampleUpload');
Route::any('/upload-file', 'FrontController@uploadFile');




