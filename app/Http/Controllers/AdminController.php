<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;

use App\Models\Tbl_admin;
use App\Models\TblTeamModel;
use App\Models\TblAgentModels;
use Session;
use Redirect;
use Input;

class AdminController extends Controller
{

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

/*		$data['page']	= 'Team';
        $data['_team'] = TblTeamModel::get();
		return view ('admin.pages.team', $data);*/		

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
    	$data['page']   = 'Admin Login';
        return view('front.pages.adminlogin', $data);
    }

    public function admin_login_submit (Request $request)
    {
    	$validate_login = Tbl_admin::where('email','=',$request->email)->first();
        // dd("2352");
        if($validate_login)
        {

        	if (password_verify($request->password, $validate_login->password)) 
			{
    			Session::put("login", true);
				$data['page']	= 'Dashboard';
				return Redirect::to('/admin/dashboard');
			}
			else
	        {
	            $data['page']  = 'Admin login';
                return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
	        }
		}
        else
        {
            return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
        }
    }

		public function admin_logout ()

/*	public function logout()*/
	{
		Session::put("login", true);
		$data['page']   = 'Admin Login';
        return view('front.pages.adminlogin', $data);
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

	//Eden 
	// public function add_team()
	// {
	// 	$data['page']	= 'Team';
 //        $insert["team_name"] = Request::input("team_name"); 
 //        $insert["team_information"] = Request::input("team_information"); 
 //        TblTeamModel::insert($insert); 
 //        Redirect::to('/admin/view_team')->send();
	// }
    /*
	public function view_team()
	{
		$data['page']	= 'View Team';
		$data['viewteam']	= TblTeamModel::get();
        $data['viewagent']  = TblAgentModel::get();
		return view ('admin.pages.view_team', $data);		
	}
	public function edit_team($id)
    {
        $data['page']	= 'View Team';
        $data['_edit']=TblTeamModel::where('team_id', $id)->first();
        return view('admin.pages.edit_team', $data);
    }
    public function update_team($id)
    {
    	$data['page']	= 'View Team';
        $update["team_name"] = Request::input("team_name");
        $update["team_information"] = Request::input("team_information");
        TblTeamModel::where('team_id', $id)->update($update);
       Redirect::to("/admin/view_team")->send();
    }
    public function delete_team($id)
    {
        TblTeamModel:: where ('team_id',$id)->delete();
        Redirect::to("/admin/view_team")->send();
    }
    public function add_agent()
	{
		$data['page']	= 'Team';
        $insert["team_id"] = Request::input("team_id"); 
        $insert["agent_fname"] = Request::input("agent_fname"); 
        $insert["agent_lname"] = Request::input("agent_lname"); 
        $insert["agent_username"] = Request::input("agent_username"); 
        $insert["agent_password"] = Request::input("agent_password");

        $agent_confirm_password = Request::input("agent_confirm_password");
        if ($insert["agent_password"] == $agent_confirm_password)
        {
            TblAgentModel::insert($insert);
            Session::forget('agent');
            Redirect::to('/admin/view_team')->send();
        }
        else
        {
            Session::put('agent','agent');
            return  Redirect::to('/admin/team')->with('error', 'Password not match.');
	    }
    }
    public function delete_agent($id)
    {
        TblAgentModel:: where ('agent_id',$id)->delete();
        Redirect::to("/admin/view_team")->send();
    }
    

	
    /*public function view_agent()
	{
		$data['page']	= 'View Agent';
		$data['viewagent']	= TblAgentModel::get();
		return view ('admin.pages.view_team', $data);	
	}
    
	public function edit_agent($id)
    {
        $data['page']	= 'View Team';
        $data['_edit']=TblAgentModel::where('agent_id', $id)->first();
        return view('admin.pages.edit_team', $data);
    }
    public function update_agent($id)
    {
    	$data['page']	= 'View Team';
        $update["agent_fname"] = Request::input("agent_fname");
        $update["agent_lname"] = Request::input("agent_lname");
        $update["agent_username"] = Request::input("agent_username");
        $update["agent_password"] = Request::input("agent_password");
        TblAgentModel::where('team_id', $id)->update($update);
       Redirect::to("/admin/view_team")->send();
    }
*/

}