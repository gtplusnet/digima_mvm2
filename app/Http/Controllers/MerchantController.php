<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tbl_payment_method;
use App\Tbl_business_category;

class MerchantController extends Controller
{
    
	public function index()
	{
		$data['page']	= 'Dashboard';
		return view ('admin.merchant.pages.dashboard', $data);		
		
	}

	public function profile()
	{
		$data['page']				= 'Profile';
		$data['_payment_method']	= Tbl_payment_method::get();
		return view ('admin.merchant.pages.profile', $data);		
	}
	public function category()
	{
		$data['page']				= 'Category';

		$data['categories'] 		= Tbl_business_category::where('parent_id', '=','0')->get();	

		return view('admin.merchant.pages.category', $data);		
	}

	public function bills()
	{
		$data['page']	= 'Bills';
		return view ('admin.merchant.pages.bills', $data);		
	}

	public function sample()
	{
		return view ('admin.merchant.pages.sample');	
	}

	public function mercant()
	{
		$data['page'] 		= 'Merchant List';	 
		$data['_mercant'] 	= Tbl_business::get();
		return view('admin.agent.merchant_list', $data);
	}

	public function generaladmin()
	{
		return view ('admin.merchant.pages.generaladmin');	
	}
	
}
