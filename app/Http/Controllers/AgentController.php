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
					return view ('agent.pages.dashboard', $data);
				}
		}
		else
		{
			echo "HULI KA!";
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
		$data['clients'] = TblBusinessModel::
										    join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
			                              ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
			                              ->get();
    // dd($data['clients']);
		return view ('agent.pages.client', $data);	

	}
	public function add_client()
	{
		$data['county_list'] = TblCountyModel::get();
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