<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessOtherInfoModel;
use App\Tbl_payment_method;
use App\Tbl_business_category;
use Redirect;

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
		//$data['_payment_method']	= Tbl_payment_method::get();
		return view ('admin.merchant.pages.profile', $data);		
	}

	public function view_info()
	{
		$data['page']				= 'Profile';
		$data['other_info']	= TblBusinessOtherInfoModel::get();
		return view ('admin.merchant.pages.view_info', $data);		
	}

	
    public function add_other_info()//
    {
    	//dd(Request::input());
    	$data['page']				= 'Profile';
        $insert["company_information"] = Request::input("company_information"); 
        $insert["business_website"] = Request::input("business_website"); 
        $insert["year_established"] = Request::input("year_established");
        TblBusinessOtherInfoModel::insert($insert); 
        Redirect::to('/merchant/view_info')->send();
    }

/**
    public function edit($id)
    {
        
        $data['_edit']=tbl_users::where('id', $id)->first();
        // dd($id);
        return view('edit', $data);
    }

    public function edit_submit($id)
    {
        $update["name"] = Request::input("name");
        $update["location"] = Request::input("location");
        $update["nickname"] = Request::input("nickname");
  
        
        tbl_users::where('id', $id)->update($update);
       Redirect::to("/pageview")->send();
        
    }*/

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
