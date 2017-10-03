<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessOtherInfoModel;
use App\Tbl_payment_method;
use App\Tbl_business_category;
use App\Models\TblUserAccountModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblPaymentMethod;
use App\Models\TblPaymentModel;
use Redirect;
use Session;
// use Request;
use Input;
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
                   if($validate_login->status=="activated")
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
                    $user_info = TblUserAccountModel::where('user_account_id',$validate_login->user_account_id)
                                          ->join('tbl_business','tbl_business.business_id','=','tbl_user_account.business_id')
                                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                                          ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                                          ->join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')
                                         ->first();
                                          // dd($user_info);
                    Session::put("full_name",$user_info->contact_first_name." ".$user_info->contact_last_name);
                    Session::put("email",$user_info->user_email);
                    Session::put("business_name",$user_info->business_name);
                    Session::put("business_id",$user_info->business_id);
                    Session::put("business_contact_person_id",$user_info->business_contact_person_id);
                    Session::put("business_address",$user_info->business_complete_address);
                    Session::put("city_state",$user_info->city_name.", ".$user_info->county_name);
                    Session::put("zip_code",$user_info->postal_code);
                   
                    $data['page']   = 'Dashboard';

                    return Redirect::to('/merchant/payment');
                   }
                    
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
     public function payment()
    {
        $data['page']   = 'payment';
        $data['method'] = TblPaymentMethod::get();
        $data['picture'] = TblPaymentModel::get();
        return view('front.pages.payment', $data);

        // $account_data = new TblUserAccountModel;
        // $account_data->user_email = $request->email;
        // $account_data->user_password = $request->password;
        // $account_data->user_category = 'merchant';
        // $account_data->status = 2;
        // $account_data->business_id = $business_data->business_id;
        // $account_data->business_contact_person_id = $contact_data->business_contact_person_id;
        // $account_data->save();
        // echo 'Registered successfully ! But your account is pending.';
   }
    public function upload_payment(Request $request)
    {
       
        // dd($data);
        $file = $request->payment_file_name;
        if($file==null||$file=='')
        {
           echo "mag browse ka muna ng picture!!!" ; 
        }
        else
        {
            $filename='/payment_upload/'.uniqid().$file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();
            $destinationPath = public_path('/payment_upload');
            $check=$file->move($destinationPath, $filename);   
            if($check)
                {

                    $data['payment_reference_number'] = $request->payment_reference_number;
                    $data['payment_amount'] = $request->payment_amount;
                    $data['payment_method'] = $request->payment_method;
                    $data['payment_file_name'] = $filename;
                    $data['business_contact_person_id'] = session('business_contact_person_id');
                    $data['business_id'] = session('business_id');
                    $check_insert = TblPaymentModel::insert($data);
                    if($check_insert)
                    {
                        echo "tama ka";
                    }
                    else
                    {
                        echo "mali ka";
                    }
                }
        }
       
       
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
