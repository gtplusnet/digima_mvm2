<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblAdminModels;
use App\Models\TblSupervisorModels;
use App\Models\TblTeamModel;
use App\Models\TblAgentModels;
use Session;
use Redirect;
use Input;

class AdminController extends Controller
{

	public static function allow_logged_in_users_only()
	{
		if(session("login") != true)
		{
			return Redirect::to("/admin")->send();
		}
	}
	public static function allow_logged_out_users_only()
	{
		if(session("login") == true)
		{
			return Redirect::to("/admin/dashboard")->send();
		}
	}

	public function profile()
	{
		$data['page']	= 'Profile';
		return view ('admin.pages.profile', $data);		
	}

	public function client()
	{
		$data['page']	= 'Client';
		return view ('admin.pages.client', $data);		
	}

	public function user()
	{
		$data['page']	= 'User';
		return view ('admin.pages.user', $data);		
	}

	public function add_team()
	{
		$data['county_list'] = TblCountyModel::get();
		$data['page']	= 'Add Team';
		return view ('admin.pages.add_team', $data);
	}
	public function add_agent()
	{
		$data['county_list'] = TblCountyModel::get();
		$data['team_list'] = TblTeamModel::get();
		$data['page']	= 'Add Agent';
		return view ('admin.pages.add_agent', $data);		
	}

	public function add_supervisor()
	{
		// $data['team_list'] = Tbl_supervisor::get();
		$data['page']	= 'Add Agent';
		return view ('admin.pages.add_supervisor ', $data);		
	}

	public function add_admin()
	{
		
		$data['_data'] = TblAdminModels::get();
		$data['page']	= 'Add Admin';
		return view ('admin.pages.add_admin ', $data);		
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
    public function admin_login ()
    {
    	Self::allow_logged_out_users_only();
    	$data['page']   = 'Admin Login';
        return view('front.pages.adminlogin', $data);
    }

    public function admin_login_submit (Request $request)
    {
    	$validate_login = TblAdminModels::where('email','=',$request->email)->first();
        if($validate_login)
        {

        	if (password_verify($request->password, $validate_login->password)) 
				{
    				Session::put("login",true);
    				Session::put("admin_id",$validate_login->admin_id);
    				Session::put("full_name",$validate_login->full_name);
    				Session::put("email",$validate_login->email);
    				Session::put("position",$validate_login->position);
    				// Session::put("login",$validate_login->email);
					$data['page']	= 'Dashboard';
					return Redirect::to('/admin/dashboard');
				}
			else
	        {
	            return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
	        }
		}
        else
        {
            return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
        }
    }

		public function admin_logout ()
	{
		Session::forget("login");
		
        return Redirect::to("/admin");
	}
	
	public function dashboard()
    {
    	$data['page']	= 'Dashboard';
		return view ('admin.pages.dashboard', $data);	
    }

	public function add_team_submit(Request $request)
	{
		
      
		$data['team_name'] = $request->team_name;
		$data['team_information'] = $request->team_description;
		TblTeamModel::insert($data);
		return Redirect::to('/admin/add/team')->with('warning', 'testing');
	}

	public function add_agent_submit(Request $request)
	{
		
      
		$data['full_name'] = $request->prefix." ".$request->first_name." ".$request->last_name;
		$data['password'] = password_hash($request->password, PASSWORD_DEFAULT);

		$data['email'] = $request->email;
		$data['position'] = 'agent';
		$data['team_id'] = $request->team;
		$data['primary_phone'] = $request->primary_phone;
		$data['secondary_phone'] = $request->secondary_phone;
		$data['other_info'] = $request->other_info;
		// dd($data);
		TblAgentmodels::insert($data);
		return Redirect::to('/admin/add/agent')->with('warning', 'testing');
	}

	public function add_supervisor_submit(Request $request)
	{
		$data['full_name'] = $request->prefix." ".$request->first_name." ".$request->last_name;
		$data['password'] = password_hash($request->password, PASSWORD_DEFAULT);

		$data['email'] = $request->email;
		$data['position'] = 'supervisor';
		
		// dd($data);
		TblSupervisorModels::insert($data);
		return Redirect::to('/admin/add/supervisor')->with('warning', 'testing');

	}
	public function add_admin_submit(Request $request)
	{
		$data['full_name'] = $request->prefix." ".$request->first_name." ".$request->last_name;
		$data['password'] = password_hash($request->password, PASSWORD_DEFAULT);

		$data['email'] = $request->email;
		
		// dd($data);
		TblAdminModels::insert($data);
		return Redirect::to('/admin/add/admin')->with('warning', 'testing');

	}

}