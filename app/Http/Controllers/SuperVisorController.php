<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblTeamModel;
use App\Models\TblAgentModels;
use App\Models\TblSupervisorModels;
use App\Models\TblBusinessModel;
use Session;
use Redirect;
use Validator;
class SuperVisorController extends Controller
{

	public function index()
    {
        // Self::allow_logged_out_users_only();
        $data['page']   = 'Supervisor Login';

        return view ('supervisor.pages.supervisor_login', $data);

    }
    public function supervisor_login_submit(Request $request)
    {
        $validate_login = TblSupervisorModels::where('email',$request->email)->first();
        if($validate_login)


        {
            if (password_verify($request->password, $validate_login->password)) 
                {

                    Session::put("supervisor_login",true);
                    Session::put("supervisor_id",$validate_login->agent_id);
                    Session::put("full_name",$validate_login->first_name." ".$validate_login->last_name);
                    Session::put("email",$validate_login->email);
                    Session::put("position",$validate_login->position);
                    // Session::put("login", $validate->email);
                    $data['page']   = 'Dashboard';

                    return Redirect::to('/supervisor/dashboard');
                }
            else
            {
                $data['page']   = 'supervisor Login';
                return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
            }
        }
        else
        {
            $data['page']   = 'supervisor Login';
            return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
        }
    }
    public function profile()
	{
		$data['page']	= 'Profile';
		return view ('supervisor.pages.profile', $data);		
	}

	public function client()
	{
		$data['page']	= 'Client';

        $data['clients'] = TblBusinessModel::Where('business_status',2)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();


		return view ('supervisor.pages.client', $data);		
	}
	public function add_team()
    {
		$data['county_list'] = TblCountyModel::get();
		$data['page']	= 'Add User';
        $data['team_list'] = TblTeamModel::get();

		return view ('supervisor.pages.add_user', $data);
	}
	public function add_agent()
	{
		$data['county_list'] = TblCountyModel::get();
		$data['team_list'] = TblTeamModel::get();
		$data['page']	= 'Add Agent';
		return view ('supervisor.pages.add_user', $data);	
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
	public function dashboard()
    {
    	$data['page']	= 'Dashboard';
		return view ('supervisor.pages.dashboard', $data);	
    }

	public function add_team_submit(Request $request)
	{
		$ins['team_name'] = $request->team_name;
		$ins['team_information'] = $request->team_information;

        $rules['team_name'] = 'required';
        $rules['team_information'] = 'required';
		

        $validator = validator::make($ins, $rules);

        $return_message = '';
        if($validator->fails())
        {
            foreach ($validator->messages()->all('<li style=`list-style:none`>:message</li>')as $keys => $message)
            {
                $return_message .= $message;
            }

            return Redirect::to('/supervisor/add/user')->with('error_team', $return_message);
        }
        else
        {
            TblTeamModel::insert($ins);
            return Redirect::to('/supervisor/add/user')->with('warning_team', 'testing');
        }

	}
	public function add_agent_submit(Request $request)
	{ 
        $ins['prefix'] = $request->prefix;
        $ins['first_name'] = $request->first_name;
        $ins['last_name'] = $request->last_name;
		$ins['password'] = $request->password;
		$ins['email'] = $request->email;
		$ins['position'] = 'agent';
		$ins['team_id'] = $request->team;
		$ins['primary_phone'] = $request->primary_phone;
		$ins['secondary_phone'] = $request->secondary_phone;
		$ins['other_info'] = $request->other_info;

        $rules['first_name'] = 'required';
        $rules['last_name'] = 'required';
        $rules['password'] = 'required';
        $rules['email'] = 'email';
        $rules['team_id'] = 'required';
        $rules['primary_phone'] = 'required|numeric';
        $rules['secondary_phone'] = 'required|numeric';

        $validator = validator::make($ins, $rules);

        $ins['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $return_message = '';
        if($validator->fails())
        {
            foreach ($validator->messages()->all('<li style=`list-style:none`>:message</li>')as $keys => $message)
            {
                $return_message .= $message;
            }

            return Redirect::to('/supervisor/add/user')->with('error_agent', $return_message);
        }
        else
        {
            TblAgentmodels::insert($ins);
            return Redirect::to('/supervisor/add/user')->with('warning_agent', 'testing');
        }
	}

    //Eden
    public function view_user()
    {
        $data['page']   = 'View User';
        $data['team_list'] = TblTeamModel::get();
        $data['viewteam']   = TblTeamModel::get();
        $data['viewagent']  = TblAgentModels::team()->get();
        return view ('supervisor.pages.view_user', $data); 
    }
    public function delete_team(Request $request)
    {
        TblTeamModel:: where ('team_id',$request->team_id)->delete();
        return Redirect::to("/supervisor/view/user")->with('delete_team', 'testing');
    }
    public function delete_agent(Request $request)
    {
        TblAgentModels:: where ('agent_id',$request->agent_id)->delete();
        return Redirect::to("/supervisor/view/user")->with('warning_agent', 'testing');
    }
    public function edit_team(Request $request)
    {
        $data['page']   = 'View User';
        $data['_edit']=TblTeamModel::where('team_id',$request->team_id)->first();
        return view('supervisor.pages.edit_team', $data);
    }
    public function update_team(Request $request)
    {
        $data['page']   = 'View User';
        $update["team_name"] = $request->team_name;
        $update["team_information"] = $request->team_information;
        TblTeamModel::where('team_id',$request->team_id)->update($update);
        return Redirect::to("/supervisor/view/user")->with('warning_team','testing');
    }
    public function edit_agent(Request $request,$id)
    {
        $data['page']   = 'View User';
        $data['_edit']=TblAgentModels::where('agent_id', $id)->first();
        $data['agent_list'] = TblTeamModel::get();
        return view('supervisor.pages.edit_agent', $data);
    }
    public function update_agent(Request $request)
    {
        /*$data['page']   = 'View User';
        $update["full_name"] = $request->prefix." ".$request->first_name." ".$request->last_name;
        $update["password"] = $request->password;
        $update["email"] = $request->email;
        $update["team_id"] = $request->team_id;
        $update["primary_phone"] = $request->primary_phone;
        $update["secondary_phone"] = $request->secondary_phone;
        $update["other_info"] = $request->other_info;
        TblAgentModels::where('agent_id', $request->agent_id)->update($update);
       return Redirect::to("/supervisor/view/user")->with('warning_agent','testing');*/

        $ins['prefix'] = $request->prefix;
        $ins['first_name'] = $request->first_name;
        $ins['last_name'] = $request->last_name;
        $ins['password'] = $request->password;
        $ins['email'] = $request->email;
        $ins['position'] = 'agent';
        $ins['team_id'] = $request->team;
        $ins['primary_phone'] = $request->primary_phone;
        $ins['secondary_phone'] = $request->secondary_phone;
        $ins['other_info'] = $request->other_info;

        $rules['first_name'] = 'required';
        $rules['last_name'] = 'required';
        $rules['password'] = 'required';
        $rules['email'] = 'email';
        $rules['team_id'] = 'required';
        $rules['primary_phone'] = 'required|numeric';
        $rules['secondary_phone'] = 'required|numeric';

        $validator = Validator::make($ins, $rules);

        $ins['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $return_message = '';
        if($validator->fails())
        {
            foreach ($validator->messages()->all('<li style=`list-style:none`>:message</li>')as $keys => $message)
            {
                $return_message .= $message;
            }

            return Redirect::to('/supervisor/add/user')->with('error_agent', $return_message);
        }
        else
        {
            TblAgentModels::where('agent_id', $request->agent_id)->update($update);
            return Redirect::to("/supervisor/view/user")->with('warning_agent','testing');
        }


    }
/*
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
	
    public function view_agent()
	{
		$data['page']	= 'View Agent';
		$data['viewagent']	= TblAgentModel::get();
		return view ('admin.pages.view_team', $data);	
	}
    

*/

}