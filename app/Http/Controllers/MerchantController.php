<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MerchantController extends Controller
{
    
	public function index()
	{
		$data['page']	= 'Dashboard';
		return view ('admin.merchant.pages.dashboard', $data);		
	}

	public function profile()
	{
		$data['page']	= 'Profile';
		return view ('admin.merchant.pages.profile', $data);		
	}

	public function category()
	{
		$data['page']	= 'Category';
		return view ('admin.merchant.pages.category', $data);		
	}

	public function bills()
	{
		$data['page']	= 'Bills';
		return view ('admin.merchant.pages.bills', $data);		
	}

}
