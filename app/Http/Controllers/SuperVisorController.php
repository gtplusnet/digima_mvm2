<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblTeamModel;
use App\Models\TblAgentModel;
use App\Models\TblSupervisorModels;
use App\Models\TblBusinessModel;
use App\Models\Tbl_conversation;
use App\Models\TblContactUs;
use App\Models\TblBusinessCategoryModel;
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
        if(session("supervisor_login"))
        {
            return Redirect::to("/supervisor/dashboard")->send();
        }
    }
    public function index()
    {
        Self::allow_logged_out_users_only();

        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['contact_us']         = TblContactUs::first();
        $data['page']   = 'login';
        return view('front.pages.login', $data);
    }
    public function supervisor_logout()
    {

        Session::forget("supervisor_login");
        return Redirect::to("/supervisor");
    }
    public function supervisor_login_submit(Request $request)
    {
        $validate_login = TblSupervisorModels::where('email',$request->email)->first();
        if($validate_login)

        {
            if (password_verify($request->password, $validate_login->password)) 
                {
                  if($validate_login->archived==0)
                      {
                        Session::put("supervisor_login",true);
                        Session::put("profile",$validate_login->profile);
                        Session::put("supervisor_id",$validate_login->supervisor_id);
                        Session::put("full_name_supervisor",$validate_login->first_name." ".$validate_login->last_name);

                        Session::put("email",$validate_login->email);
                        Session::put("position",$validate_login->position);
                        $data['page']   = 'Dashboard';

                        return Redirect::to('/supervisor/dashboard');
                      }
                      else
                      {
                        return Redirect::back()->withErrors(['You Are Restricted to this site!', 'You Are Restricted to this site!']);
                      }

                    
                }
            else
            {
                $data['page']   = 'supervisor Login';
                return Redirect::back()->withErrors(['User Login is Incorrect!', 'User Login is Incorrect']);
            }
        }
        else
        {
            
            return Redirect::back()->withErrors(['User Login is Incorrect!', 'User Login is Incorect!']);
        }
    }
    public function profile()
  	{
      Self::allow_logged_in_users_only();
  		$data['page']	= 'Profile';
      $data['profile'] = TblSupervisorModels::where('supervisor_id',session('supervisor_id'))->first();
  		return view ('supervisor.pages.profile', $data);		
  	}

    public function update_profile(Request $request)
    {
      $data['transaction'] = 'profile';
      $data['profile'] = TblSupervisorModels::where('supervisor_id',session('supervisor_id'))->first();   
      return view('supervisor.pages.update_profile',$data); 
    }
    public function update_password(Request $request)
    {   
      $data['transaction'] = 'password';
      return  view('supervisor.pages.update_profile',$data);
    }
    public function checking_password(Request $request )
    {
      $user = TblSupervisorModels::where('supervisor_id',session('supervisor_id'))->first();   
      if(password_verify($request->currentPassword,$user->password))
      {
        if($request->newPassword == $request->confirmPassword)
        {
          $data['password'] = password_hash($request->newPassword, PASSWORD_DEFAULT);
          TblSupervisorModels::where('supervisor_id',session('supervisor_id'))->update($data);
          return "<div class='alert alert-success'><strong>Thank you!</strong>Password Successfully Change.</div>";
        }
        else
        {
          return "<div class='alert alert-danger'><strong>Sorry!</strong> Your new password and confirm password did'nt match.</div>";
        }
      }
      else
      {
        return "<div class='alert alert-danger'><strong>Sorry! </strong>Password you entered did not match to your current password.</div>";
      }
    }
    public function saving_profile(Request $request)
    { 
      Self::allow_logged_in_users_only();
      if($request->ajax())
      {
          if($request->stats=='null')
          {
            $data['primary_phone']    = $request->primaryPhone;
            $data['secondary_phone']  = $request->secondaryPhone;
            $data['other_info']       = $request->otherInfo;
            $data['address']          = $request->address;
            $data['profile']          = $request->imageText;;

            $check = TblSupervisorModels::where('supervisor_id',session('supervisor_id'))->update($data);
            if($check)
            {
              return "<div class='alert alert-success'><strong>Thank you!</strong>Profile successfully updated.</div>";
            }
            else
            {
              return "<div class='alert alert-waring'><strong>Sorry!</strong> Nothing has change.</div>"; 
            }

          }
          else
          {
            $unique=uniqid();
            $fileConvo = $request->file("file");
            $file_name = '/business_images/'.$unique."-".$fileConvo->getClientOriginalName().'';
            $fileConvo->move('business_images', $file_name);
            $data['profile']          = $file_name; 
            $data['primary_phone']    = $request->primaryPhone;
            $data['secondary_phone']  = $request->secondaryPhone;
            $data['other_info']       = $request->otherInfo;
            $data['address']          = $request->address;
            TblSupervisorModels::where('supervisor_id',session('supervisor_id'))->update($data);
          }
      }
    }

  	public function client()
  	{
      Self::allow_logged_in_users_only();
  		$data['page']	= 'Client';

      $data['clients'] = TblTeamModel::where('tbl_team.supervisor_id', session('supervisor_id'))
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                            ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                            ->where('tbl_business.business_status',2)
                            ->orderBy('tbl_business.date_created',"asc")
                            ->get();
      $data['clients_activated'] = TblTeamModel::where('tbl_team.supervisor_id', session('supervisor_id'))
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                            ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                            ->join('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')
                            ->where('tbl_business.business_status',3)
                            ->orderBy('tbl_business.date_created',"asc")
                            ->get();
      return view ('supervisor.pages.client', $data);		
  	}
    public function get_client(Request $request)
    {
        $s_date = $request->date_start;
        $e_date = $request->date_end;
        $data['clients'] = TblBusinessModel::where('business_status', 2)
                          ->whereBetween('date_transact',[$s_date,$e_date])
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
        $data['clients_activated'] = TblBusinessModel::where('business_status',3)
                          ->whereBetween('date_transact',[$s_date,$e_date])
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        return view('supervisor.pages.filtered1',$data);
    }
    public function get_client_transaction(Request $request)
    {
        $trans_id = $request->transaction_id;
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
        return '';
    }
    
    public function supervisor_add_team(Request $request)
    {
        $data['team_name']  = $request->team_name;
        $data['team_information']  = $request->team_des;
        $data['supervisor_id']  = session('supervisor_id');
        TblTeamModel::insert($data);
        return "<div class='alert alert-success'><strong>Success!</strong>Team Added.</div>";
    }
    public function get_agent_info()
    {
      $data['james'] = 'james';
      return $data;
    }
    public function supervisor_assign_agent(Request $request)
    {
        $agent_id          = $request->agent_id_assign;
        $update['team_id'] = $request->teamAssigned;
        TblAgentModel::where('agent_id',$agent_id)->update($update);
        return "<div class='alert alert-success'><strong>Success!</strong>Agent Assigned successfully.</div>";

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
      $data['count_jan']    = TblBusinessModel::whereMONTH('date_transact', '=', 01 )->where('business_status','!=',5)->count();
      $data['count_feb']    = TblBusinessModel::whereMONTH('date_transact', '=', 02 )->where('business_status','!=',5)->count();
      $data['count_mar']    = TblBusinessModel::whereMONTH('date_transact', '=', 03 )->where('business_status','!=',5)->count();
      $data['count_apr']    = TblBusinessModel::whereMONTH('date_transact', '=', 04 )->where('business_status','!=',5)->count();
      $data['count_may']    = TblBusinessModel::whereMONTH('date_transact', '=', 05 )->where('business_status','!=',5)->count();
      $data['count_jun']    = TblBusinessModel::whereMONTH('date_transact', '=', 06 )->where('business_status','!=',5)->count();
      $data['count_jul']    = TblBusinessModel::whereMONTH('date_transact', '=', 07 )->where('business_status','!=',5)->count();
      $data['count_aug']    = TblBusinessModel::whereMONTH('date_transact', '=', '08' )->where('business_status','!=',5)->count();
      $data['count_sep']    = TblBusinessModel::whereMONTH('date_transact', '=', '09' )->where('business_status','!=',5)->count();
      $data['count_oct']    = TblBusinessModel::whereMONTH('date_transact', '=', '10' )->where('business_status','!=',5)->count();
      $data['count_nov']    = TblBusinessModel::whereMONTH('date_transact', '=', 11 )->where('business_status','!=',5)->count();
      $data['count_dec']    = TblBusinessModel::whereMONTH('date_transact', '=', 12 )->where('business_status','!=',5)->count();
      $data['counts_jan']   = TblBusinessModel::whereMONTH('date_transact', '=', 01 )->where('business_status',5)->count();
      $data['counts_feb']   = TblBusinessModel::whereMONTH('date_transact', '=', 02 )->where('business_status',5)->count();
      $data['counts_mar']   = TblBusinessModel::whereMONTH('date_transact', '=', 03 )->where('business_status',5)->count();
      $data['counts_apr']   = TblBusinessModel::whereMONTH('date_transact', '=', 04 )->where('business_status',5)->count();
      $data['counts_may']   = TblBusinessModel::whereMONTH('date_transact', '=', 05 )->where('business_status',5)->count();
      $data['counts_jun']   = TblBusinessModel::whereMONTH('date_transact', '=', 06 )->where('business_status',5)->count();
      $data['counts_jul']   = TblBusinessModel::whereMONTH('date_transact', '=', 07 )->where('business_status',5)->count();
      $data['counts_aug']   = TblBusinessModel::whereMONTH('date_transact', '=', '08' )->where('business_status',5)->count();
      $data['counts_sep']   = TblBusinessModel::whereMONTH('date_transact', '=', '09' )->where('business_status',5)->count();
      $data['counts_oct']   = TblBusinessModel::whereMONTH('date_transact', '=', '10' )->where('business_status',5)->count();
      $data['counts_nov']   = TblBusinessModel::whereMONTH('date_transact', '=', 11 )->where('business_status',5)->count();
      $data['counts_dec']   = TblBusinessModel::whereMONTH('date_transact', '=', 12 )->where('business_status',5)->count();
      $data['date_mon']     = $mon =  date('Y/m/d',strtotime('monday this week'));
      $data['date_tue']     = $tue =  date('Y/m/d',strtotime('tuesday this week'));
      $data['date_wed']     = $wed =  date('Y/m/d',strtotime('wednesday this week'));
      $data['date_thu']     = $thu =  date('Y/m/d',strtotime('Thursday this week'));
      $data['date_fri']     = $fri =  date('Y/m/d',strtotime('Friday this week'));
      $data['date_sat']     = $sat =  date('Y/m/d',strtotime('Saturday this week'));
      $data['date_sun']     = $sun =  date('Y/m/d',strtotime('Sunday this week'));
      $data['mon']          = TblBusinessModel::where('agent_call_date',$mon)->count();
      $data['tue']          = TblBusinessModel::where('agent_call_date',$tue)->count();
      $data['wed']          = TblBusinessModel::where('agent_call_date',$wed)->count();
      $data['thu']          = TblBusinessModel::where('agent_call_date',$thu)->count();
      $data['fri']          = TblBusinessModel::where('agent_call_date',$fri)->count();
      $data['sat']          = TblBusinessModel::where('agent_call_date',$sat)->count();
      $data['sun']          = TblBusinessModel::where('agent_call_date',$sun)->count();
      $data['_agents']   = TblTeamModel::where('supervisor_id',session('supervisor_id'))
                         ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                         ->get();
      $data['_teams']   = TblTeamModel::where('archived',0)->where('supervisor_id',session('supervisor_id'))->get();
      $data['page']	= 'Dashboard';
      return view ('supervisor.pages.dashboard', $data);	
    }
    
    public function supervisor_show_agent_calls(Request $request)
    {
      $data['date_mon'] = $mon =date('Y/m/d',strtotime('monday this week'));
      $data['date_tue'] = $tue =date('Y/m/d',strtotime('tuesday this week'));
      $data['date_wed'] = $wed =date('Y/m/d',strtotime('wednesday this week'));
      $data['date_thu'] = $thu =date('Y/m/d',strtotime('Thursday this week'));
      $data['date_fri'] = $fri =date('Y/m/d',strtotime('Friday this week'));
      $data['date_sat'] = $sat =date('Y/m/d',strtotime('Saturday this week'));
      $data['date_sun'] = $sun =date('Y/m/d',strtotime('Sunday this week'));

      $agent_id = $request->agent_id;
      $data['mon'] = TblAgentModel::where('tbl_agent.agent_id',$agent_id)
                    ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                    ->where('agent_call_date',$mon)
                    ->count();
      $data['tue'] = TblAgentModel::where('tbl_agent.agent_id',$agent_id)
                    ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                    ->where('agent_call_date',$tue)
                    ->count();
      $data['wed'] = TblAgentModel::where('tbl_agent.agent_id',$agent_id)
                    ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                    ->where('agent_call_date',$wed)
                    ->count();
      $data['thu'] = TblAgentModel::where('tbl_agent.agent_id',$agent_id)
                    ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                    ->where('agent_call_date',$thu)
                    ->count();
      $data['fri'] = TblAgentModel::where('tbl_agent.agent_id',$agent_id)
                    ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                    ->where('agent_call_date',$fri)
                    ->count();
      $data['sat'] = TblAgentModel::where('tbl_agent.agent_id',$agent_id)
                    ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                    ->where('agent_call_date',$sat)
                    ->count();
      $data['sun'] = TblAgentModel::where('tbl_agent.agent_id',$agent_id)
                    ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                    ->where('agent_call_date',$sun)
                    ->count();
      $data['_agents']   = TblAgentModel::get();
      $data['active_agent'] = TblAgentModel::where('tbl_agent.agent_id',$agent_id)
                    ->first();
      // dd($data);
      return view('supervisor.pages.show_agent_calls',$data);

    }
    public function supervisor_show_team_calls(Request $request)
    {
      $data['date_mon'] = $mon =date('Y/m/d',strtotime('monday this week'));
      $data['date_tue'] = $tue =date('Y/m/d',strtotime('tuesday this week'));
      $data['date_wed'] = $wed =date('Y/m/d',strtotime('wednesday this week'));
      $data['date_thu'] = $thu =date('Y/m/d',strtotime('Thursday this week'));
      $data['date_fri'] = $fri =date('Y/m/d',strtotime('Friday this week'));
      $data['date_sat'] = $sat =date('Y/m/d',strtotime('Saturday this week'));
      $data['date_sun'] = $sun =date('Y/m/d',strtotime('Sunday this week'));

      $data['mon']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->where('agent_call_date',$mon)
                            ->count();
      $data['tue']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->where('agent_call_date',$tue)
                            ->count();
      $data['wed']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->where('agent_call_date',$wed)
                            ->count();
      $data['thu']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->where('agent_call_date',$thu)
                            ->count();                                                                
      $data['fri']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->where('agent_call_date',$fri)
                            ->count();
      $data['sat']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->where('agent_call_date',$sat)
                            ->count();
      $data['sun']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->join('tbl_business','tbl_business.agent_id','=','tbl_agent.agent_id')
                            ->where('agent_call_date',$sun)
                            ->count();                      
      $data['_teams']   = TblTeamModel::get(); 
      $data['active_teams']   = TblTeamModel::where('team_id',$request->team_id)->first();                         
      return view('supervisor.pages.show_team_calls',$data);
    }
    // supervisor_add_agent
  	public function supervisor_add_agent(Request $request)
  	{ 
      $ins['prefix']        = $request->prefix;
      $ins['first_name']    = $request->first_name;
      $ins['last_name']     = $request->last_name;
  		$ins['email']         = $request->email;
  		$ins['position']      = 'agent';
  		$ins['team_id']       = $request->team_id;
  		$ins['primary_phone'] = $request->primary;
  		$ins['secondary_phone'] = $request->secondary;
  		$ins['other_info']    = $request->other_info;
      $ins['date_created']  = date("Y/m/d");
      $ins['agent_call']    = '0';

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
          $check_insert = TblAgentModel::insert($ins);
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
        $data['page']       = 'Manage Team/Agent';
        $data['viewteam']   = TblTeamModel::where('supervisor_id',session('supervisor_id'))
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            -> selectRaw('sum(agent_call) as sum, tbl_team.*,tbl_team.team_id as id')
                            ->groupBy('tbl_team.team_id')
                            ->get();
        $data['_agent_team']= TblTeamModel::where('supervisor_id',session('supervisor_id'))->get();
        $data['viewagent']  = TblTeamModel::where('supervisor_id',session('supervisor_id'))
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->get();
        return view ('supervisor.pages.manage_user', $data); 
    }
    public function view_all_members(Request $request)
    {
      $id = $request->team_id;
      $data['_supervisor'] = TblTeamModel::where('tbl_team.team_id',$id)
                            ->join('tbl_supervisor','tbl_supervisor.supervisor_id','=','tbl_team.supervisor_id')
                            ->get();
      $data['_data_agent'] = TblTeamModel::where('tbl_team.team_id',$id)
                            ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                            ->get();
      return view('supervisor.pages.viewmember',$data);
    }
    public function supervisor_delete_team(Request $request)
    {
      TblTeamModel:: where ('team_id',$request->delete_agent_id)->delete();
      return "<div class='alert alert-success'><strong>Success!</strong>Team Deleted</div>";
    }
    public function supervisor_delete_agent(Request $request)
    {   

        TblAgentModel:: where ('agent_id',$request->delete_agent_id)->delete();
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
        $update["team_information"] = $request->team_info;
        TblTeamModel::where('team_id',$request->team_id)->update($update);
        return "<div class='alert alert-success'><strong>Success!</strong>Team Updated</div>";
    }
    public function edit_agent(Request $request,$id)
    {
        $data['page']   = 'View User';
        $data['_edit']=TblAgentModel::where('agent_id', $id)->first();
        $data['agent_list'] = TblTeamModel::get();
        return view('supervisor.pages.edit_agent', $data);
    }
    public function update_agent(Request $request)
    {
        $ins['prefix']        = $request->prefix;
        $ins['first_name']    = $request->first_name;
        $ins['last_name']     = $request->last_name;
        $ins['password']      = $request->password;
        $ins['email']         = $request->email;
        $ins['position']      = 'agent';
        $ins['team_id']       = $request->team;
        $ins['primary_phone'] = $request->primary_phone;
        $ins['secondary_phone'] = $request->secondary_phone;
        $ins['other_info']    = $request->other_info;

        $rules['first_name']  = 'required';
        $rules['last_name']   = 'required';
        $rules['password']    = 'required';
        $rules['email']       = 'email';
        $rules['team_id']     = 'required';
        $rules['primary_phone'] = 'required|numeric';
        $rules['secondary_phone'] = 'required|numeric';

        $validator = Validator::make($ins, $rules);

        $ins['password']  = password_hash($request->password, PASSWORD_DEFAULT);
        $return_message   = '';
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
            TblAgentModel::where('agent_id', $request->agent_id)->update($update);
            return Redirect::to("/supervisor/view/user")->with('warning_agent','testing');
        }
    }

    public function uploadConvo(Request $request) 
    {
      Self::allow_logged_in_users_only();
  		if($request->ajax())
      {
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



    public function supervisor_search_client(Request $request)
    {

    $search_key = $request->search_key;
    $data['clients'] = TblBusinessModel::where('business_status',2)->where('business_name','like','%'.$search_key.'%')
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->get();
      return view('supervisor.pages.filtered',$data);

    }

    public function supervisor_search_client_activated(Request $request)
    {

    $search_key_act = $request->search_key_act;
    $data['clients_activated'] = TblBusinessModel::where('business_status', 3)->where('business_name','like','%'.$search_key_act.'%')
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->get();
      return view('supervisor.pages.filtered1',$data);
    }




    public function supervisor_search_team(Request $request)
    {

    $search_key_team = $request->search_key_team;
    $data['viewteam']   = TblTeamModel:: selectRaw('sum(agent_call) as sum, tbl_team.*')
                          ->where('team_name','like','%'.$search_key_team.'%')
                          ->join('tbl_agent','tbl_agent.team_id','=','tbl_team.team_id')
                          ->groupBy('team_id')->get();
    return view('supervisor.pages.search_team_blade',$data);
    }

     public function supervisor_search_agent(Request $request)
    {

    $search_key_agent = $request->search_key_agent;
    $data['viewagent']  = TblAgentModel::join('tbl_team','tbl_team.team_id','=','tbl_agent.team_id')
                          ->where('email','like','%'.$search_key_agent.'%')
                          ->get();
    return view('supervisor.pages.search_agent_blade',$data);
   
    }


}

