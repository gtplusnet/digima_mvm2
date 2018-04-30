<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Session;


class MerchantAuthController extends Controller
{
	function __construct()
	{
		if(!session('merchant_login') || !session('business_id'))
	    {
	    	Session::flash('error', 'Session Expired');
			return Redirect::to("/login")->send();
	    }
	}

	

}