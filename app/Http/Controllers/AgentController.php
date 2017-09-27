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
use App\Models\TblPaymentMethod;
use App\Models\TblUserAccountModel;
use Redirect;
use Carbon\Carbon;



class AgentController extends Controller
{

	public function login()
	{
		$data['page']	= 'Agent Login';
		return view ('agent.pages.login', $data);
	}

	public function agent_login(Request $request)
	{
		$validate = TblAgentModels::where('email',$request->email)->first();
		if($validate)
		{
			if (password_verify($request->password, $validate->password)) 
				{
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

	public function index()
	{

		$data['page']	= 'Dashboard';
		$data['county_list'] = TblCountyModel::get();
		return view ('agent.pages.dashboard', $data);		
	}

	public function profile()
	{
		$data['page']	= 'Profile';
		return view ('agent.pages.profile', $data);		
	}

	public function client()
	{
		$data['page']	 = 'Client';
		$data['clients'] = TblBusinessModel::join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
			                              ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
			                              ->orderBy('tbl_business.date_created',"asc")
			                              ->get();
    	return view ('agent.pages.client', $data);	
	}

	public function get_client(Request $request)
	{
		$s_date = $request->date_start;
		$e_date = $request->date_end;
		$data['clients'] = TblBusinessModel::whereBetween('date_created',[$s_date,$e_date])
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
		return view('agent.pages.filtered',$data);
	}
	public function add_client_submit(Request $request)
	{

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
            $business_data->date_created = Carbon::now();
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
            $account_data->user_password = "123";
            $account_data->user_category = 'merchant';
            $account_data->status = 'registered';
            $account_data->business_id = $business_data->business_id;
            $account_data->business_contact_person_id = $contact_data->business_contact_person_id;
            $account_data->save();

            // dd($business_data."<br>james" .$contact_data."<br>james" .$account_data);

           return Redirect::to('/agent/client');

  
    	}
	}
	public function add_client()
	{
		$data['county_list'] = TblCountyModel::get();
		$data['membership_list'] = TblPaymentMethod::get();
		$data['page']	= 'Add Client';
		return view ('agent.pages.add_client', $data);		
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


		public function logout()
	{
		Session::forget('user_email');
		Session::forget('user_password');
		return Redirect::back();
	}



}