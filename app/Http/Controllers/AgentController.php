<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblBusinessModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblAgentModels;
use App\Models\Tbl_Agent;
use App\Models\TblPaymentMethod;
use App\Models\TblUserAccountModel;

use Session;
use Redirect;
use Carbon\Carbon;
<<<<<<< HEAD
=======
use Input;
>>>>>>> 780a4b04454cb25afca7d5d6774592ae26a24f7e
use Mail;


class AgentController extends Controller
{

	public static function allow_logged_in_users_only()
	{
		if(session("agent_login") != true)
		{
			return Redirect::to("/agent")->send();
		}
	}
	public static function allow_logged_out_users_only()
	{
		if(session("agent_login") )
		{
			return Redirect::to("/agent/dashboard")->send();
		}
	}

	public function index()
	{
		Self::allow_logged_in_users_only();
		$data['page']	= 'Dashboard';
		return view('agent.pages.dashboard',$data);
	}

	public function login()
	{
		Self::allow_logged_out_users_only();
		$data['page']	= 'Agent Login';
<<<<<<< HEAD
=======

>>>>>>> 780a4b04454cb25afca7d5d6774592ae26a24f7e
		return view ('agent.pages.login', $data);
	}

	public function dashboard()
    {
    	$data['page']	= 'Dashboard';
		return view ('agent.pages.dashboard', $data);	
    }

	public function agent_login(Request $request)
	{
		$validate_login = TblAgentModels::where('email',$request->email)->first();
		if($validate_login)


		{
			if (password_verify($request->password, $validate_login->password)) 
				{

					Session::put("agent_login",true);
    				Session::put("agent_id",$validate_login->agent_id);
    				Session::put("full_name",$validate_login->full_name);
    				Session::put("email",$validate_login->email);
    				Session::put("position",$validate_login->position);
					// Session::put("login", $validate->email);
				    $data['page']	= 'Dashboard';

				    return Redirect::to('/agent/dashboard');
				}
			else
			{
				$data['page']	= 'Agent Login';
				return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
			}
		}
		else
		{
			$data['page']	= 'Agent Login';
			return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
		}
	}


	public function profile()
	{
		Self::allow_logged_in_users_only();
		$data['page']	= 'Profile';
		return view ('agent.pages.profile', $data);		
	}

	public function client()
	{
		Self::allow_logged_in_users_only();
		$data['page']	 = 'Client';
		// $data['clients'] = TblUserAccountModel::where('status','registered')
		// 								  ->join('tbl_business','tbl_business.business_id','=','tbl_user_account.business_id')
		// 	                              ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
		// 	                              ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
		// 	                              ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
		// 	                              ->join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')
		// 	                              ->orderBy('tbl_business.date_created',"asc")

		// 	                              ->get();
		$data['clients'] = TblBusinessModel::Where('business_status',1)
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        $data['clients_pending'] = TblBusinessModel::Where('business_status',3)
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        $data['clients_activated'] = TblBusinessModel::Where('business_status',4)
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();



    	return view ('agent.pages.client', $data);	
	}

	public function get_client(Request $request)
	{
		Self::allow_logged_in_users_only();
		$s_date = $request->date_start;
		$e_date = $request->date_end;
		$data['clients'] = TblBusinessModel::Where('business_status',1)
						  ->whereBetween('date_created',[$s_date,$e_date])
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
		return view('agent.pages.filtered',$data);
	}
	public function get_client1(Request $request)
	{
		Self::allow_logged_in_users_only();
		$s_date = $request->date_start1;
		$e_date = $request->date_end1;
		$data['clients'] = TblBusinessModel::
		whereBetween('date_created',[$s_date,$e_date])
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
		return view('agent.pages.filtered1',$data);
	}
	public function get_client2(Request $request)
	{
		Self::allow_logged_in_users_only();
		$s_date = $request->date_start2;
		$e_date = $request->date_end2;
		$data['clients'] = TblBusinessModel::
		whereBetween('date_created',[$s_date,$e_date])
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
		return view('agent.pages.filtered2',$data);
	}

	public function get_client_transaction(Request $request)
	{
		Self::allow_logged_in_users_only();
		$trans_id = $request->transaction_id;
		// dd($request->transaction_id);
		$update['transaction_status'] = 'call in progress'; 
		$update['agent_id'] = session('agent_id'); 
		$check = TblBusinessModel::where('business_id',$trans_id)->update($update);
		

			return '';
		
	}

	public function get_client_transaction_reload(Request $request)
	{
		Self::allow_logged_in_users_only();
		$trans_id = $request->transaction_id;
		$update['transaction_status'] = 'called'; 
		$update['business_status'] = '2'; 
		$check = TblBusinessModel::where('business_id',$trans_id)->update($update);
				 // TblAgentModel::where('agent_id',session('agent_id'))->update($update);
		return '';
		
	}

	public function add_client_submit(Request $request)
	{
		Self::allow_logged_in_users_only();
		$check_email_availability = TblUserAccountModel::select('user_email')->where('user_email','=',$request->email)->first();

        if(count($check_email_availability) == 1)
        {
            echo 'Email has already been used.';
        }
        else
        {
	        $business_data = new TblBusinessModel;
	        $business_data->business_id = '';
	        $business_data->business_name = $request->business_name;
	        $business_data->city_id = $request->city_list;
	        $business_data->business_complete_address = $request->business_address;
	        $business_data->business_phone = $request->primary_business_phone;
	        $business_data->business_alt_phone = $request->secondary_business_phone;
	        $business_data->business_fax = $request->fax_number;
	        $business_data->facebook_url = $request->facebook_url;
	        $business_data->twitter_url = $request->twitter_username;
            $business_data->membership = $request->membership;
            // $business_data->date_created = Carbon::now();
            $business_data->date_created = date("Y/m/d");
            $business_data->save();

	        $contact_data = new TblBusinessContactPersonModel;
	        $contact_data->business_contact_person_id = '';
	        $contact_data->contact_prefix = $request->prefix;
	        $contact_data->contact_first_name = $request->first_name;
	        $contact_data->contact_last_name = $request->last_name;
	        $contact_data->business_id = $business_data->business_id;
            $contact_data->save();


            $account_data = new TblUserAccountModel;
            $account_data->user_email = $request->email_address;

            $myStr=$request->first_name;
            $myStrs=$request->primary_business_phone;
            $result = substr($myStr, 0, 3);
            $results = substr($myStrs, 0, 3);
            $final_result = $result.$results;

            $account_data->user_password = password_hash($final_result, PASSWORD_DEFAULT);
            $account_data->user_category = 'merchant';
            $account_data->status = 'registered';
            $account_data->business_id = $business_data->business_id;
            $account_data->business_contact_person_id = $contact_data->business_contact_person_id;
            $account_data->save();

           return Redirect::to('/agent/client');
<<<<<<< HEAD
    	}
=======

  		}
>>>>>>> 780a4b04454cb25afca7d5d6774592ae26a24f7e
	}
	public function add_client()
	{
		Self::allow_logged_in_users_only();
		$data['county_list'] = TblCountyModel::get();
		$data['membership_list'] = TblPaymentMethod::get();
		$data['page']	= 'Add Client';
		return view ('agent.pages.add_client', $data);		
	}

	public function filter_clients(request $request)
	{
	    Self::allow_logged_in_users_only();
		$sdate = $request->start_date;
		$edate = $request->end_date;
		dd($sdate.$edate);
	}
	public function get_city(Request $request)
    {
        $county_id = $request->county_id;


        $city_list = TblCityModel::where('county_id','=',$county_id)->get();

        $county_name = TblCountyModel::select('county_name')->where('county_id','=',$county_id)->first();

        $city_dropdown_output = '';

        $city_dropdown_output .= '<option value="--Select City--">--Select City for '.$county_name->county_name.'--</option>';

        foreach($city_list as $city_list)
        {
            $city_dropdown_output .= '<option value="'.$city_list->city_id.'">'.$city_list->city_name.'</option>';
        }

        return $city_dropdown_output;
    }

    public function get_zip_code(Request $request)
    {
        $city_id = $request->city_id;
        $postal_code = TblCityModel::select('postal_code')->where('city_id','=',$city_id)->first();

        return $postal_code->postal_code;
    }

	public function agent_logout()
	{
	
		Session::forget("agent_login");
        return Redirect::to("/agent");
	}
}