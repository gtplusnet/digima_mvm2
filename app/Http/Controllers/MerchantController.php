<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessOtherInfoModel;
use App\Tbl_payment_method;
use App\Tbl_business_category;
use App\Models\TblUserAccountModel;
use App\Models\TblBusinessContactPersonModel;
use Redirect;
use Session;
// use Request;

class MerchantController extends Controller
{
	public static function allow_logged_in_users_only()
	{
		if(session("merchant_login") != true)
		{
			return Redirect::to("/login")->send();
		}
	}
	public static function allow_logged_out_users_only()
	{
		if(session("merchant_login") )
		{
			return Redirect::to("/merchant/dashboard")->send();
		}
	}

	public function login()
    {
    	Self::allow_logged_out_users_only();
        $data['page']   = 'login';
        return view('front.pages.login', $data);
    }
    public function login_submit(Request $request)
    {
        $validate_login = TblUserAccountModel::where('user_email',$request->email)->first();
                       
        if($validate_login)
        {
            if (password_verify($request->password, $validate_login->user_password)) 
                {
                    $user_info = TblBusinessContactPersonModel::where('business_contact_person_id',$validate_login->business_contact_person_id)
                                // ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id')
                                ->first();
                    // dd($user_info);

                    Session::put("merchant_login",true);
                    Session::put("email",$validate_login->user_email);
                    Session::put("full_name",$user_info->contact_first_name." ".$user_info->contact_last_name);
                    $data['page']   = 'Dashboard';

                    return Redirect::to('/merchant/dashboard');
                }
            else
            {
                $data['page']   = 'Merchant Login';
                return Redirect::back()->withErrors(['User Login is Incorect!'.$request->email.$request->password, 'User Login is Incorect!']);
            }
        }
        else
        {
            $data['page']   = 'Merchant Login';
            return Redirect::back()->withErrors(['User Login is Incorect!'.$request->email.$request->password, 'User Login is Incorect!']);
        }
    }

    public function logout()
	{
		Session::forget("merchant_login");
        return Redirect::to("/login");
	}

	public function index()
	{	
		Self::allow_logged_in_users_only();
		$data['page']	= 'Dashboard';
		return view ('merchant.pages.dashboard', $data);	
		
	}

	public function profile()
	{
		Self::allow_logged_in_users_only();
		$data['page']				= 'Profile';
		//$data['_payment_method']	= Tbl_payment_method::get();
		return view ('merchant.pages.profile', $data);		
	}

	public function view_info()
	{
		Self::allow_logged_in_users_only();
		$data['page']				= 'Profile';
		$data['other_info']	= TblBusinessOtherInfoModel::get();
		return view ('merchant.pages.view_info', $data);		
	}

	
    public function add_other_info()//
    {
    	//dd(Request::input());
    	Self::allow_logged_in_users_only();
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
		Self::allow_logged_in_users_only();
		$data['page']				= 'Category';

		$data['categories'] 		= Tbl_business_category::where('parent_id', '=','0')->get();	

		return view('merchant.pages.category', $data);		
	}

	public function bills()
	{
		Self::allow_logged_in_users_only();
		$data['page']	= 'Bills';
		return view ('merchant.pages.bills', $data);		
	}

	public function sample()
	{
		return view ('merchant.pages.sample');	
	}

	

	
}
