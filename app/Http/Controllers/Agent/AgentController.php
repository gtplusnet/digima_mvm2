<?php
namespace App\Http\Controllers\Agent;

class MembeController extends Controller
{
	public function logout()
	{
		Session::forget('user_email');
		Session::forget('user_password');
		Session::forget('product_info');
		return Redirect::back();
	}
}