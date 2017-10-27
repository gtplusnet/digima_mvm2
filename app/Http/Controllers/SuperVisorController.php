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
use App\Models\Tbl_conversation;
use Session;
use Redirect;
use Validator;
use Carbon\Carbon;

class SuperVisorController extends Controller
{
    public static function allow_logged_in_users_only()
    {
        if(session("supervisor_login") != true)
        {
            return Redirect::to("/supervisor")->send();
        }
    }
    public static function allow_logged_out_users_only()
    {
        if(session("supervisor_login") == true)
        {
            return Redirect::to("/supervisor/dashboard")->send();
        }
    }


	public function index()
    {
        Self::allow_logged_out_users_only();
        $data['page']   = 'Supervisor Login';

        return view ('supervisor.pages.supervisor_login', $data);

    }
    public function supervisor_logout()
    {

        Session::forget("supervisor_login");
        return Redirect::to("/supervisor");
   
    }
    //   public function supervisor_logout()
    // {
    //     Session::forget("supervisor_login_submit");
    //     return Redirect::to("/supervisor");
    // }

    public function supervisor_login_submit(Request $request)
    {
        $validate_login = TblSupervisorModels::where('email',$request->email)->first();
        if($validate_login)

        {
            if (password_verify($request->password, $validate_login->password)) 
                {

                    Session::put("supervisor_login",true);

                    Session::put("supervisor_id",$validate_login->supervisor_id);
                    Session::put("full_name",$validate_login->first_name." ".$validate_login->last_name);

                    Session::put("email",$validate_login->email);
                    Session::put("position",$validate_login->position);
                    // Session::put("login", $validate_login->email);
                    $data['page']   = 'Dashboard';

                    return Redirect::to('/supervisor/dashboard');
                }
            else
            {
                $data['page']   = 'supervisor Login';
                return Redirect::back()->withErrors(['User Login is Incorectsdfsd!', 'User Login is Incorect!fdsf']);
            }
        }
        else
        {
            
            return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
        }
    }


    public function profile()
	{
        Self::allow_logged_in_users_only();
		$data['page']	= 'Profile';
        $data['profile'] = TblSupervisorModels::where('supervisor_id',session('supervisor_id'))->first();
		return view ('supervisor.pages.profile', $data);		
	}

	public function client()
	{
        Self::allow_logged_in_users_only();
		$data['page']	= 'Client';

        $data['clients'] = TblBusinessModel::where('business_status', 2)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        $data['clients_activated'] = TblBusinessModel::where('business_status', 3)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();


		return view ('supervisor.pages.client', $data);		
	}
    public function get_client(Request $request)
    {
        $s_date = $request->date_start;
        $e_date = $request->date_end;
        $data['clients'] = TblBusinessModel::where('business_status', 2)
                          ->whereBetween('date_created',[$s_date,$e_date])
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        return view('supervisor.pages.filtered',$data);
    }
    public function get_client1(Request $request)
    {
        $s_date = $request->date_start1;
        $e_date = $request->date_end1;
        $data['clients'] = TblBusinessModel::
        whereBetween('date_created',[$s_date,$e_date])
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        return view('supervisor.pages.filtered1',$data);
    }
    

    public function get_client_transaction(Request $request)
    {
        $trans_id = $request->transaction_id;
        // dd($request->transaction_id);
        $update['transaction_status'] = 'call in progress'; 
        $update['agent_id'] = session('agent_id'); 
        $check = TblBusinessModel::where('business_id',$trans_id)->update($update);
        

            return '';
        
    }

    public function get_client_transaction_reload(Request $request)
    {
        $trans_id = $request->transaction_id;
        $update['transaction_status'] = 'called'; 
        $update['business_status'] = '2'; 
        $check = TblBusinessModel::where('business_id',$trans_id)->update($update);
                 // TblAgentModel::where('agent_id',session('agent_id'))->update($update);
        return '';
        
    }
    public function manage_merchant()
    {
        $data['page'] = 'Manage Merchant';
       $data['clients'] = TblBusinessModel::where('business_status', 2)->orWhere('business_status', 3)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        return view('supervisor.pages.manage_merchant',$data);
    }
    public function supervisor_add_team(Request $request)
    {
        $data['team_name']  = $request->team_name;
        $data['team_information']  = $request->team_des;
        TblTeamModel::insert($data);
        return "<div class='alert alert-success'><strong>Success!</strong>Team Added.</div>";

    }


	public function add_team()
    {
        Self::allow_logged_in_users_only();
		$data['county_list'] = TblCountyModel::get();
		$data['page']	= 'Add User';
        $data['team_list'] = TblTeamModel::get();

		return view ('supervisor.pages.add_user', $data);
	}
	public function add_agent()
	{
        Self::allow_logged_in_users_only();
		$data['county_list'] = TblCountyModel::get();
		$data['team_list'] = TblTeamModel::get();
		$data['page']	= 'Add Agent';
		return view ('supervisor.pages.add_user', $data);	
    }
    public function get_agent_info()
    {
        $data['james'] = 'james';
        return $data;
    }
    public function supervisor_assign_agent(Request $request)
    {
        $agent_id = $request->agent_id_assign;
        $update['team_id'] = $request->teamAssigned;
        TblAgentModels::where('agent_id',$agent_id)->update($update);
        return "<div class='alert alert-success'><strong>Success!</strong>Agent Assigned successfully.</div>";

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
        Self::allow_logged_in_users_only();
        $count_merchant_agent = TblBusinessModel::where('business_status',1)->get();
         $count_merchant_supervisor = TblBusinessModel::where('business_status',2)->get();
         $count_merchant_admin = TblBusinessModel::where('business_status',3)->get();
         $count_merchant_admin_payment = TblBusinessModel::where('business_status',4)->get();
         $count_merchant_admin_activated = TblBusinessModel::where('business_status',5)->get();
         $data['countCall'] = $count_merchant_agent->count();
         $data['countMP3'] = $count_merchant_supervisor->count();
         $data['countInvoice'] = $count_merchant_admin->count();
         $data['countPayment'] = $count_merchant_admin_payment->count();
         $data['countActivated'] = $count_merchant_admin_activated->count();
         $data['count_jan']  = TblBusinessModel::whereMONTH('date_transact', '=', 01 )->where('business_status','!=',5)->count();
         $data['count_feb']  = TblBusinessModel::whereMONTH('date_transact', '=', 02 )->where('business_status','!=',5)->count();
         $data['count_mar']  = TblBusinessModel::whereMONTH('date_transact', '=', 03 )->where('business_status','!=',5)->count();
         $data['count_apr']  = TblBusinessModel::whereMONTH('date_transact', '=', 04 )->where('business_status','!=',5)->count();
         $data['count_may']  = TblBusinessModel::whereMONTH('date_transact', '=', 05 )->where('business_status','!=',5)->count();
         $data['count_jun']  = TblBusinessModel::whereMONTH('date_transact', '=', 06 )->where('business_status','!=',5)->count();
         $data['count_jul']  = TblBusinessModel::whereMONTH('date_transact', '=', 07 )->where('business_status','!=',5)->count();
         $data['count_aug']  = TblBusinessModel::whereMONTH('date_transact', '=', '08' )->where('business_status','!=',5)->count();
         $data['count_sep']  = TblBusinessModel::whereMONTH('date_transact', '=', '09' )->where('business_status','!=',5)->count();
         $data['count_oct']  = TblBusinessModel::whereMONTH('date_transact', '=', '10' )->where('business_status','!=',5)->count();
         $data['count_nov']  = TblBusinessModel::whereMONTH('date_transact', '=', 11 )->where('business_status','!=',5)->count();
         $data['count_dec']  = TblBusinessModel::whereMONTH('date_transact', '=', 12 )->where('business_status','!=',5)->count();

         $data['counts_jan']  = TblBusinessModel::whereMONTH('date_transact', '=', 01 )->where('business_status',5)->count();
         $data['counts_feb']  = TblBusinessModel::whereMONTH('date_transact', '=', 02 )->where('business_status',5)->count();
         $data['counts_mar']  = TblBusinessModel::whereMONTH('date_transact', '=', 03 )->where('business_status',5)->count();
         $data['counts_apr']  = TblBusinessModel::whereMONTH('date_transact', '=', 04 )->where('business_status',5)->count();
         $data['counts_may']  = TblBusinessModel::whereMONTH('date_transact', '=', 05 )->where('business_status',5)->count();
         $data['counts_jun']  = TblBusinessModel::whereMONTH('date_transact', '=', 06 )->where('business_status',5)->count();
         $data['counts_jul']  = TblBusinessModel::whereMONTH('date_transact', '=', 07 )->where('business_status',5)->count();
         $data['counts_aug']  = TblBusinessModel::whereMONTH('date_transact', '=', '08' )->where('business_status',5)->count();
         $data['counts_sep']  = TblBusinessModel::whereMONTH('date_transact', '=', '09' )->where('business_status',5)->count();
         $data['counts_oct']  = TblBusinessModel::whereMONTH('date_transact', '=', '10' )->where('business_status',5)->count();
         $data['counts_nov']  = TblBusinessModel::whereMONTH('date_transact', '=', 11 )->where('business_status',5)->count();
         $data['counts_dec']  = TblBusinessModel::whereMONTH('date_transact', '=', 12 )->where('business_status',5)->count();


        $data['date_mon'] = $mon =date('Y/m/d',strtotime('monday this week'));
        $data['date_tue'] = $tue =date('Y/m/d',strtotime('tuesday this week'));
        $data['date_wed'] = $wed =date('Y/m/d',strtotime('wednesday this week'));
        $data['date_thu'] = $thu =date('Y/m/d',strtotime('Thursday this week'));
        $data['date_fri'] = $fri =date('Y/m/d',strtotime('Friday this week'));
        $data['date_sat'] = $sat =date('Y/m/d',strtotime('Saturday this week'));
        $data['date_sun'] = $sun =date('Y/m/d',strtotime('Sunday this week'));
        // dd(" ".$mon." ".$tue." ".$wed." ".$thu." ".$fri." ".$sat." ".$sun);
        $data['mon'] = TblBusinessModel::where('agent_call_date',$mon)->count();
        $data['tue'] = TblBusinessModel::where('agent_call_date',$tue)->count();
        $data['wed'] = TblBusinessModel::where('agent_call_date',$wed)->count();
        $data['thu'] = TblBusinessModel::where('agent_call_date',$thu)->count();
        $data['fri'] = TblBusinessModel::where('agent_call_date',$fri)->count();
        $data['sat'] = TblBusinessModel::where('agent_call_date',$sat)->count();
        $data['sun'] = TblBusinessModel::where('agent_call_date',$sun)->count();
        // dd($data);

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
    // supervisor_add_agent
	public function supervisor_add_agent(Request $request)
	{ 

        $ins['prefix'] = $request->prefix;
        $ins['first_name'] = $request->first_name;
        $ins['last_name'] = $request->last_name;
		$ins['email'] = $request->email;
		$ins['position'] = 'agent';
		$ins['team_id'] = $request->team_id;
		$ins['primary_phone'] = $request->primary;
		$ins['secondary_phone'] = $request->secondary;
		$ins['other_info'] = $request->other_info;
        $ins['date_created'] = date("Y/m/d");
        $ins['agent_call'] = '0';

        $ins['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        if($ins['password']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Password.</div>";
        }
        else if($ins['first_name']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input First Name.</div>";
        }
        else if($ins['last_name']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Last Name.</div>";
        }
        else if($ins['email']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Email.</div>";
        }
        else if($ins['primary_phone']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Primary Phone.</div>";
        }
        
        else
        {
            $check_insert = TblAgentmodels::insert($ins);
            if($check_insert)
            {
              return "<div class='alert alert-success'><strong>Success!</strong>Agent Added Successfully!</div>";  
            }
            else
            {
                return "<div class='alert alert-danger'><strong>Fail!</strong>Something went wrong!</div>";
            }
        }
         
        
        
	}

    //Eden
    public function manage_user()
    {
        Self::allow_logged_in_users_only();
        $data['page']   = 'Manage Team/Agent';
        $data['viewteam']   = TblTeamModel::get();
        $data['viewagent']  = TblAgentModels::join('tbl_team','tbl_team.team_id','=','tbl_agent.team_id')
                             ->get();
        return view ('supervisor.pages.manage_user', $data); 
    }
    public function supervisor_delete_team(Request $request,$id)
    {

        TblTeamModel:: where ('team_id',$id)->delete();
        return Redirect::to("/supervisor/manage_user")->with('delete_team', 'testing');
    }
    public function supervisor_delete_agent(Request $request)
    {   

        TblAgentModels:: where ('agent_id',$request->delete_agent_id)->delete();
        return "<div class='alert alert-success'><strong>Success!</strong>Agent Deleted</div>";
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

    public function uploadConvo(Request $request) {
        Self::allow_logged_in_users_only();
		if($request->ajax()) {
			$fileConvo = $request->file("file");
            $fileConvo->move('conversations', $fileConvo->getClientOriginalName());
            $convoInfo = new Tbl_conversation;
            $convoInfo->file_path = '/conversations/'.$fileConvo->getClientOriginalName().'';
            $convoInfo->file_name = $fileConvo->getClientOriginalName();
            $convoInfo->business_id = $request->input("businessId");
            $convoInfo->business_contact_person_id = $request->input("contactId");
            $convoInfo->save();

            $update['business_status'] = "3";
            $update['date_transact'] = date("Y/m/d"); 
            TblBusinessModel::where('business_id',$request->input("businessId"))->update($update);
        }
	}
    public function force_activate(Request $request)
    {
        Self::allow_logged_in_users_only();
        if($request->ajax()) {
            $convoInfo = new Tbl_conversation;
            $convoInfo->file_path = 'not available';
            $convoInfo->file_name = 'not available';
            $convoInfo->business_id = $request->input("businessId");
            $convoInfo->business_contact_person_id = $request->input("contactId");
            $convoInfo->save();

            $update['business_status'] = "3";
            $update['date_transact'] = date("Y/m/d");
            TblBusinessModel::where('business_id',$request->input("businessId"))->update($update);
            return "<div class='alert alert-success'><strong>Success!</strong>Procedure OverRide!</div>";
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