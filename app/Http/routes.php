<?php



/*Routes for SAMPLE PAGES*/

Route::get('/pdfview',               'GeneralAdminController@pdfview');
Route::get('sendbasicemail',         'MailController@basic_email');
Route::get('sendhtmlemail',          'MailController@html_email');
Route::get('sendattachmentemail',    'MailController@attachment_email');
Route::any('/sample',                'MerchantController@sample');
Route::any('/sample1',               'MerchantController@sample1');
Route::any('/sample2',               'MerchantController@sample2');
Route::any('/sample_invoice',        'GeneralAdminController@sample_invoice');

Route::any('/truncate/{table_name}', 'MerchantController@truncate');




/*Routes for Front*/
Route::get('/', 						'FrontController@index');
Route::get('/home', 					'FrontController@index');
Route::any('/home/get_sub_category', 	'FrontController@get_sub_category');

Route::get('/about', 					'FrontController@about');
Route::get('/contact', 					'FrontController@contact');


Route::any('/registration', 			'FrontController@registration');
Route::get('/get-city', 				'FrontController@getCity');
Route::get('/get-postal-code', 			'FrontController@getPostalCode');
Route::any('/register-business', 		'FrontController@registerBusiness');
Route::any('/business-search', 			'FrontController@businessSearch');
Route::any('/search-business-result',   'FrontController@businessSearchResult');
Route::any('/business_info', 			'FrontController@business_info');


Route::any('/contact_send', 			'FrontController@contact_send');
Route::get('/success',			 		'FrontController@success');
Route::get('/register', 				'FrontController@register');
Route::get('/redirect', 				'FrontController@redirect_deactivated');
Route::get('/business/{id}', 			'FrontController@business');
Route::any('/guest/add_messages', 		'FrontController@add_messages');


/*Routes for Login*/
Route::get('/user/login', 				'LoginController@user_login');
Route::post('/user/login/submit', 		'LoginController@user_login_submit');
Route::get('/user/logout', 		        'LoginController@user_logout');
/*Routes for Password*/
Route::get('/forgot/password', 			'PasswordController@forgot_password');
Route::post('/reset/password',       	'PasswordController@reset_password');
Route::any('/user/forgot/password',     'PasswordController@user_forgot_password');
Route::any('/user/reset/password',      'PasswordController@user_reset_password');
/*Routes for Merchant*/
Route::get('/login', 									'MerchantController@login');
Route::post('/login', 									'MerchantController@login_submit');
Route::get('/merchant/logout', 							'MerchantController@logout');
Route::get('/merchant/payment',							'MerchantController@payment');
Route::post('/merchant/upload_payment',					'MerchantController@upload_payment');
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
Route::any('/merchant/delete_tag_category/{id}', 	    'MerchantController@delete_tag_category');
Route::get('/merchant/messages', 						'MerchantController@messages');
Route::any('/merchant/add_images', 						'MerchantController@add_images');
Route::any('/merchant/delete_messages/{id}', 			'MerchantController@delete_messages');
Route::any('/merchant/bills', 				   		    'MerchantController@bills');
Route::any('/merchant/add_other_info', 					'MerchantController@update_other_info');
Route::any('/merchant/update_merchant_info', 		    'MerchantController@update_merchant_info');
Route::any('/merchant/saving_merchant_info', 			'MerchantController@saving_merchant_info');
Route::any('/merchant/get_city', 						'MerchantController@get_city');
Route::any('/merchant/get_zip_code', 					'MerchantController@get_zip_code');
Route::any('/merchant/add_payment_method', 				'MerchantController@add_payment_method');
Route::any('/merchant/delete_payment_method', 			'MerchantController@delete_payment_method');
Route::any('/merchant/edit_payment_method', 			'MerchantController@edit_payment_method');
Route::any('/merchant/change_password', 				'MerchantController@merchant_change_password');
Route::any('/merchant/sample', 							'MerchantController@sample');


/*Routes for Supervisor*/

Route::get('/supervisor/dashboard', 				    'SuperVisorController@dashboard');

Route::get('/supervisor/profile', 					    'SuperVisorController@profile');
Route::any('/supervisor/update_profile', 			    'SuperVisorController@update_profile');
Route::any('/supervisor/update_password', 			    'SuperVisorController@update_password');
Route::any('/supervisor/checking_password', 		    'SuperVisorController@checking_password');
Route::any('/supervisor/saving_profile', 			    'SuperVisorController@saving_profile');

Route::get('/supervisor/merchant', 						'SuperVisorController@merchant');
Route::post('/supervisor/get_client', 					'SuperVisorController@get_client');
Route::post('/supervisor/get_client1', 					'SuperVisorController@get_client1');
Route::post('/supervisor/get_client2', 					'SuperVisorController@get_client2');
Route::post('/supervisor/get_client_transaction', 		'SuperVisorController@get_client_transaction');
Route::post('/supervisor/get_client_transaction_reload','SuperVisorController@get_client_transaction_reload');
Route::any('/supervisor/upload-convo', 					'SuperVisorController@uploadConvo');
Route::any('/supervisor/force_activate', 				'SuperVisorController@force_activate');
Route::any('/supervisor/changeAudioFile', 				'SuperVisorController@changeAudioFile');

Route::any('/supervisor/manage_user', 					'SuperVisorController@manage_user');
Route::post('/supervisor/add_team', 					'SuperVisorController@supervisor_add_team');
Route::post('/supervisor/assign_agent', 				'SuperVisorController@supervisor_assign_agent');
Route::any('/supervisor/delete_team',  					'SuperVisorController@supervisor_delete_team');
Route::post('/supervisor/delete_agent', 				'SuperVisorController@supervisor_delete_agent');
Route::any('/supervisor/update_team', 					'SuperVisorController@update_team');
Route::any('/supervisor/manage_user/view_all_members', 	'SuperVisorController@view_all_members');

Route::any('/supervisor/show_agent_calls', 				'SuperVisorController@supervisor_show_agent_calls');
Route::any('/supervisor/show_team_calls', 				'SuperVisorController@supervisor_show_team_calls');
Route::any('/supervisor/supervisor_search_client', 		'SuperVisorController@supervisor_search_client');
Route::any('/supervisor/supervisor_search_client_activated', 'SuperVisorController@supervisor_search_client_activated');
Route::any('/supervisor/supervisor_search_team', 		'SuperVisorController@supervisor_search_team');
Route::any('/supervisor/supervisor_search_agent', 		'SuperVisorController@supervisor_search_agent');



/*Routes for Agent*/
Route::get('/agent/dashboard', 						'AgentController@dashboard');
Route::get('/agent/profile', 						'AgentController@profile');

Route::any('/agent/update_profile', 				'AgentController@update_profile');
Route::any('/agent/saving_profile', 				'AgentController@saving_profile');
Route::any('/agent/update_password', 				'AgentController@update_password');
Route::any('/agent/checking_password', 				'AgentController@checking_password');

Route::get('/agent/merchant', 						'AgentController@merchant');
Route::post('/agent/get_client', 					'AgentController@get_client');
Route::post('/agent/get_client1', 					'AgentController@get_client1');
Route::post('/agent/get_client2', 					'AgentController@get_client2');
Route::post('/agent/get_client_transaction', 		'AgentController@get_client_transaction');
Route::post('/agent/get_client_transaction_reload', 'AgentController@get_client_transaction_reload');
Route::any('/agent/search_client', 					'AgentController@search_client');
Route::any('/agent/search_client_pending', 			'AgentController@search_client_pending');
Route::any('/agent/search_client_activated', 		'AgentController@search_client_activated');

Route::any('/agent/add/merchant', 					'AgentController@add_merchant');
Route::post('/add_client_submit',   				'AgentController@add_client_submit');
Route::any('/agent/get_city', 						'AgentController@get_city');
Route::any('/agent/get_postal_code', 				'AgentController@get_zip_code');



//Routes for General Admin
Route::any('/general_admin/dashboard', 								'GeneralAdminController@general_admin_dashboard');

Route::any('/general_admin/merchants', 								'GeneralAdminController@general_admin_merchants');
Route::any('/general_admin/send_invoice/{id}', 						'GeneralAdminController@general_admin_send_invoice');
Route::any('/general_admin/send_save_invoice/{id}', 				'GeneralAdminController@general_admin_send_save_invoice');
Route::any('/general_admin/resend_invoice', 						'GeneralAdminController@general_admin_resend_invoice');
Route::any('/general_admin/send_new_invoice/{id}/{id2}', 			'GeneralAdminController@general_admin_send_new_invoice');
Route::get('/general_admin/deactivate_user/{id}', 					'GeneralAdminController@general_admin_deactivate_user');
Route::get('/general_admin/decline_user/{id}', 						'GeneralAdminController@general_admin_decline_user');

Route::post('/general_admin/get_client', 							'GeneralAdminController@get_client');
Route::post('/general_admin/get_client1', 							'GeneralAdminController@get_client1');
Route::post('/general_admin/get_client2', 							'GeneralAdminController@get_client2');
Route::post('/general_admin/get_client3', 							'GeneralAdminController@get_client3');

Route::post('/general_admin/filter_due_date', 						'GeneralAdminController@filter_due_date');
Route::get('/general_admin/export_report_excel/{params}/{param}','GeneralAdminController@export_report_excel');



Route::any('/general_admin/payment_monitoring', 					'GeneralAdminController@general_admin_payment_monitoring');
Route::post('/general_admin/view_payment_details', 					'GeneralAdminController@general_admin_view_payment_details');
Route::post('/general_admin/accept_and_activate', 					'GeneralAdminController@general_admin_accept_and_activate');
Route::post('/general_admin/decline_and_deactivate', 				'GeneralAdminController@general_admin_decline_and_deactivate');


Route::any('/general_admin/manage_invoice', 						'GeneralAdminController@general_admin_manage_invoice');



Route::any('/general_admin/manage_categories', 						'GeneralAdminController@general_admin_manage_categories');
Route::any('/general_admin/add_category', 							'GeneralAdminController@general_admin_add_category');
Route::any('/general_admin/edit_category', 							'GeneralAdminController@general_admin_edit_category');
Route::any('/general_admin/search_category', 						'GeneralAdminController@general_admin_search_category');
Route::any('/general_admin/delete_category', 						'GeneralAdminController@general_admin_delete_category');
Route::any('/general_admin/add_sub_category', 						'GeneralAdminController@general_admin_add_sub_category');
Route::any('/general_admin/get_sub_category', 						'GeneralAdminController@general_admin_get_sub_category');
Route::any('/general_admin/edit_sub_category', 						'GeneralAdminController@general_admin_edit_sub_category');



Route::any('/general_admin/manage_user', 							'GeneralAdminController@general_admin_manage_user');
Route::any('/general_admin/manage_user/user_details', 				'GeneralAdminController@general_admin_manage_user_details');
Route::post('/general_admin/manage_user/add_user', 				'GeneralAdminController@general_admin_add_user');
Route::any('/general_admin/manage_user/assign_user', 				'GeneralAdminController@general_admin_assign_user');
Route::any('/general_admin/manage_user/delete_user', 				'GeneralAdminController@general_admin_delete_user');
Route::post('/general_admin/manage_user/update_user', 		'GeneralAdminController@general_admin_update_user');
Route::post('/general_admin/manage_user/add_team', 					'GeneralAdminController@general_admin_add_team');
Route::post('/general_admin/manage_user/view_all_members', 			'GeneralAdminController@general_admin_view_all_members');
Route::any('/general_admin/manage_user/delete_team', 				'GeneralAdminController@general_admin_delete_team');
Route::post('/general_admin/manage_user/update_team_info', 			'GeneralAdminController@general_admin_update_team_info');

Route::post('/general_admin/manage_user/view_merchant_info',        'GeneralAdminController@general_admin_view_merchant_info');
Route::post('/general_admin/manage_user/update_merchant_business_info','GeneralAdminController@update_merchant_business_info');
Route::post('/general_admin/manage_user/merchant_update_images',     'GeneralAdminController@merchant_update_images');
Route::post('/general_admin/manage_user/merchant_update_hours',     'GeneralAdminController@merchant_update_hours');
Route::post('/general_admin/manage_user/add_merchant_payment_method',	'GeneralAdminController@add_merchant_payment_method');
Route::post('/general_admin/manage_user/delete_merchant_payment_method','GeneralAdminController@delete_merchant_payment_method');


Route::get('/general_admin/manage_website', 						'GeneralAdminController@general_admin_manage_website');
Route::post('/general_admin/manage_website/add_membership', 		'GeneralAdminController@general_admin_add_membership');
Route::post('/general_admin/manage_website/add_payment_method', 	'GeneralAdminController@general_admin_add_payment_method');
Route::post('/general_admin/manage_website/add_county', 			'GeneralAdminController@general_admin_add_county');
Route::post('/general_admin/manage_website/add_city', 				'GeneralAdminController@general_admin_add_city');
Route::post('/general_admin/manage_website/delete_membership',      'GeneralAdminController@general_admin_delete_membership');
Route::post('/general_admin/manage_website/delete_payment_method',  'GeneralAdminController@general_admin_delete_payment_method');
Route::post('/general_admin/manage_website/delete_county',        	'GeneralAdminController@general_admin_delete_county');
Route::post('/general_admin/manage_website/delete_city',        	'GeneralAdminController@general_admin_delete_city');
Route::post('/general_admin/manage_website/update_membership',      'GeneralAdminController@general_admin_update_membership');
Route::post('/general_admin/manage_website/update_payment_method',  'GeneralAdminController@general_admin_update_payment_method');
Route::post('/general_admin/manage_website/update_county',          'GeneralAdminController@general_admin_update_county');
Route::post('/general_admin/manage_website/update_city',            'GeneralAdminController@general_admin_update_city');



Route::any('/general_admin/manage_front', 							'GeneralAdminController@general_admin_manage_front');
Route::any('/general_admin/update_about_us', 						'GeneralAdminController@general_admin_update_about_us');
Route::any('/general_admin/update_contact_us', 						'GeneralAdminController@general_admin_update_contact_us');
Route::any('/general_admin/update_thank_you', 						'GeneralAdminController@general_admin_update_thank_you');
Route::any('/general_admin/update_terms', 							'GeneralAdminController@general_admin_update_terms');


Route::any('/general_admin/archived', 								'GeneralAdminController@general_admin_archived');
Route::any('/general_admin/archived/restore_merchant', 				'GeneralAdminController@archived_restore_merchant');
Route::any('/general_admin/archived/restore_user', 				    'GeneralAdminController@archived_restore_user');
Route::post('/general_admin/archived/restore_payment', 				'GeneralAdminController@archived_restore_payment');
Route::post('/general_admin/archived/restore_membership', 			'GeneralAdminController@archived_restore_membership');
Route::post('/general_admin/archived/restore_category', 			'GeneralAdminController@archived_restore_category');
Route::post('/general_admin/archived/restore_team', 				'GeneralAdminController@archived_restore_team');























Route::any('/general_admin/search_payment_monitoring', 			     'GeneralAdminController@search_payment_monitoring');
Route::any('/general_admin/search_manage_invoice', 			         'GeneralAdminController@search_manage_invoice');
Route::any('/general_admin/search_send_invoice', 			         'GeneralAdminController@search_send_invoice');
Route::any('/general_admin/search_agent_added', 			         'GeneralAdminController@search_agent');
Route::any('/general_admin/search_pending', 			         	 'GeneralAdminController@search_pending');
Route::any('/general_admin/search_registered', 			         	 'GeneralAdminController@search_registered');
Route::any('/general_admin/search_merchant', 			         	 'GeneralAdminController@search_merchant');

Route::any('/general_admin/search_team_user', 			         	 'GeneralAdminController@search_team_user');


Route::any('/developer/website/maintenance', 			     		 'GeneralAdminController@developer_website_maintenance');




