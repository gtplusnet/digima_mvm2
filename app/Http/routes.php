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

Route::any('/registration_first_step', 'RegistrationController@registration_first_step');
Route::any('/get_city', 'RegistrationController@get_city');
Route::any('/get_zip_code', 'RegistrationController@get_zip_code');
