<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblBusinessModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblAgentModel;
use App\Models\TblBusinessOtherInfoModel;
use App\Models\Tbl_Agent;
use App\Models\TblPaymentMethod;
use App\Models\Tbl_business_hours;
use App\Models\TblUserAccountModel;
use App\Models\TblMembeshipModel;

use Session;
use Redirect;
use Carbon\Carbon;
use Input;
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
		$data['countyList'] = TblCountyModel::get();
		return view ('agent.pages.login', $data);
	}

	public function dashboard()
    {
    	$data['page']	= 'Dashboard';
         $count_merchant_signup = TblBusinessModel::get();
    	 $count_merchant_signup = TblBusinessModel::where('business_status',1)->get();
         $count_merchant_pending = TblBusinessModel::where('business_status',2)->get();
         $count_merchant_activated = TblBusinessModel::where('business_status',3)->get();
         $data['countSignup'] = $count_merchant_signup->count();
         $data['countPending'] = $count_merchant_pending->count();
         $data['countActivated'] = $count_merchant_activated->count();
         


		return view ('agent.pages.dashboard', $data);	
    }

	public function agent_login(Request $request)
	{
		$validate_login = TblAgentModel::where('email',$request->email)->first();
		dd($validate_login);
		
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
				return Redirect::back()->withErrors(['User Login is Incorect!-2', 'User Login is Incorect!-2']);
			}
		}
		else
		{
			$data['page']	= 'Agent Login';
			return Redirect::back()->withErrors(['User Login is Incorect!-1', 'User Login is Incorect!-1']);
		}
	}


	public function profile()
	{
		Self::allow_logged_in_users_only();
		$data['page']	= 'Profile';
		$data['profile'] = TblAgentModel::get();
		$data['agent_info'] = TblAgentModel::where('agent_id',session('agent_id'))->first();
		return view ('agent.pages.profile', $data);		

	}

	public function client()
	{
		Self::allow_logged_in_users_only();
		$data['page']	 = 'Client';

		$data['clients'] = TblUserAccountModel::where('status','registered')
										  ->join('tbl_business','tbl_business.business_id','=','tbl_user_account.business_id')
			                              ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
			                              ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
			                              ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
			                              ->join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')
			                              ->orderBy('tbl_business.date_created',"asc")
			                              ->get();

		$data['clients'] = TblBusinessModel::Where('business_status',1)
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        
        $data['clients_pending'] = TblBusinessModel::where('business_status', 4)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();


        
        $data['clients_activated'] = TblBusinessModel::where('business_status', 5)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
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
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
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
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
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
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
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
		$update['date_transact'] = date("Y/m/d"); 
		$check = TblBusinessModel::where('business_id',$trans_id)->update($update);
		

			return '';
		
	}

	public function get_client_transaction_reload(Request $request)
	{
		Self::allow_logged_in_users_only();
		$trans_id = $request->transaction_id;
		$update['transaction_status'] = 'called'; 
		$update['business_status'] = '2';
		$update['date_transact'] = date("Y/m/d"); 
		$update['agent_call_date'] = date("Y/m/d"); 
		$check = TblBusinessModel::where('business_id',$trans_id)->update($update);
		$count_call = TblAgentModel::where('agent_id',session('agent_id'))->first();
		$agent['agent_call'] = $count_call->agent_call + 1;
        TblAgentModel::where('agent_id',session('agent_id'))->update($agent);
		return '';
		
	}

	public function add_client_submit(Request $request)
	{
		// Self::allow_logged_in_users_only();
		// dd($request->city_list);
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

	        $business_data->county_id = $request->county_id;

	        $business_data->business_complete_address = $request->business_address;
	        $business_data->business_phone = $request->primary_business_phone;
	        $business_data->business_alt_phone = $request->secondary_business_phone;
	        $business_data->business_fax = $request->fax_number;
	        $business_data->facebook_url = $request->facebook_url;
	        $business_data->twitter_url = $request->twitter_username;
            $business_data->membership = $request->membership;

            $business_data->transaction_status = 'Added';
            $business_data->business_status = '20';
            $business_data->agent_id = session('agent_id');
            $business_data->date_transact = date("Y/m/d");
            $business_data->date_created = date("Y/m/d");
            $business_data->agent_call_date = date("Y/m/d");
            $business_data->save();

	        $contactData = new TblBusinessContactPersonModel;
            $contactData->business_contact_person_id = '';
            $contactData->contact_prefix = $request->prefix;
            $contactData->contact_first_name = $request->first_name;
            $contactData->contact_last_name = $request->last_name;
            $contactData->business_id = $business_data->business_id;
            $contactData->save();

            $accountData = new TblUserAccountModel;
            $accountData->user_email = $request->email_address;
            $accountData->user_password =  password_hash('habagat', PASSWORD_DEFAULT);
            $accountData->user_category = 'merchant';
            $accountData->status = 'registered';
            $accountData->string_password = 'habagat';
            $accountData->business_id = $business_data->business_id;
            $accountData->business_contact_person_id = $contactData->business_contact_person_id;
            $accountData->save();

            $otherData = new TblBusinessOtherInfoModel;
            $otherData->business_other_info_id = '';
            $otherData->company_information = 'none';
            $otherData->business_website = 'none';
            $otherData->year_established = 'none';
            $otherData->company_profile = '';
            $otherData->business_id = $business_data->business_id;
            $otherData->save();

            

            $businessHoursData = new Tbl_business_hours;
            $businessHoursData->insert(array(
                array('days' => 'Monday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Tuesday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Wednesday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Thursday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Friday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Saturday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Sunday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id)
            ));
           Session::flash('add_merchant', "New Merchant Added");
           return Redirect::to('/agent/add/client');

       }
	}
	public function add_client()
	{
		// Self::allow_logged_in_users_only();
		$data['county_list'] = TblCountyModel::get();
		$data['membership_list'] = TblMembeshipModel::get();
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