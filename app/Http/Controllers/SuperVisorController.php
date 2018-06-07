<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ActiveAuthController;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblTeamModel;
// use App\Models\TblAgentModel;
// use App\Models\TblSupervisorModels;
use App\Models\TblBusinessModel;
use App\Models\Tbl_conversation;
use App\Models\TblContactUs;
use App\Models\TblBusinessCategoryModel;

use App\Models\TblUserInfoModel;
use App\Models\TblUserTeamModel;
use App\Models\TblUserModel;


use Input;
use Mail;
use Session;
use Redirect;
use Crypt;
use Validator;
use Carbon\Carbon;

class SuperVisorController extends ActiveAuthController
{
    public static function global()
    {
        $user_info = TblUserInfoModel::where('tbl_user_info.user_id',session('user_id'))
                    ->join('tbl_user','tbl_user.user_id','=','tbl_user_info.user_id')
                    ->first();
        return $user_info;
    }
    public function dashboard()
    {
        $data['user']                   = Self::global();
        $count_merchant_agent           = TblBusinessModel::where('business_status',1)->get();
        $count_merchant_supervisor      = TblBusinessModel::where('business_status',2)->get();
        $count_merchant_admin           = TblBusinessModel::where('business_status',3)->get();
        $count_merchant_admin_payment   = TblBusinessModel::where('business_status',4)->get();
        $count_merchant_admin_activated = TblBusinessModel::where('business_status',5)->get();

        $data['countCall']      = $count_merchant_agent->count();
        $data['countMP3']       = $count_merchant_supervisor->count();
        $data['countInvoice']   = $count_merchant_admin->count();
        $data['countPayment']   = $count_merchant_admin_payment->count();
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
        $data['mon']          = TblBusinessModel::where('user_call_date',$mon)->count();
        $data['tue']          = TblBusinessModel::where('user_call_date',$tue)->count();
        $data['wed']          = TblBusinessModel::where('user_call_date',$wed)->count();
        $data['thu']          = TblBusinessModel::where('user_call_date',$thu)->count();
        $data['fri']          = TblBusinessModel::where('user_call_date',$fri)->count();
        $data['sat']          = TblBusinessModel::where('user_call_date',$sat)->count();
        $data['sun']          = TblBusinessModel::where('user_call_date',$sun)->count();
        $data['_agents']      = TblTeamModel::where('supervisor_id',session('user_id'))->TeamUser()->where('tbl_user.archived',0)->where('tbl_user.user_access_level','AGENT')->get();
        $data['_teams']       = TblTeamModel::where('archived',0)->where('supervisor_id',session('user_id'))->get();
        $data['page']         = 'Dashboard';
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

      $user_id = $request->agent_id;
      $data['mon'] = TblUserModel::where('tbl_user.user_id',$user_id)
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                    ->where('user_call_date',$mon)
                    ->count();
      $data['tue'] = TblUserModel::where('tbl_user.user_id',$user_id)
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                    ->where('user_call_date',$tue)
                    ->count();
      $data['wed'] = TblUserModel::where('tbl_user.user_id',$user_id)
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                    ->where('user_call_date',$wed)
                    ->count();
      $data['thu'] = TblUserModel::where('tbl_user.user_id',$user_id)
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                    ->where('user_call_date',$thu)
                    ->count();
      $data['fri'] = TblUserModel::where('tbl_user.user_id',$user_id)
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                    ->where('user_call_date',$fri)
                    ->count();
      $data['sat'] = TblUserModel::where('tbl_user.user_id',$user_id)
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                    ->where('user_call_date',$sat)
                    ->count();
      $data['sun'] = TblUserModel::where('tbl_user.user_id',$user_id)
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                    ->where('user_call_date',$sun)
                    ->count();
      $data['_agents']   = TblTeamModel::where('supervisor_id',session('user_id'))->TeamUser()->where('tbl_user.archived',0)->where('tbl_user.user_access_level','AGENT')->get();
      $data['active_agent'] = TblUserInfoModel::where('user_id',$user_id)->first();
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

        $data['mon']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)->TeamBusiness()->where('user_call_date',$mon)->count();
        $data['tue']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)->TeamBusiness()->where('user_call_date',$tue)->count();
        $data['wed']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)->TeamBusiness()->where('user_call_date',$wed)->count();
        $data['thu']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)->TeamBusiness()->where('user_call_date',$thu)->count();                                                                
        $data['fri']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)->TeamBusiness()->where('user_call_date',$fri)->count();
        $data['sat']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)->TeamBusiness()->where('user_call_date',$sat)->count();
        $data['sun']   = TblTeamModel::where('tbl_team.team_id',$request->team_id)->TeamBusiness()->where('user_call_date',$sun)->count();                      
      

        $data['_teams']       = TblTeamModel::where('archived',0)->where('supervisor_id',session('user_id'))->get();
        $data['active_teams']   = TblTeamModel::where('team_id',$request->team_id)->first();                         
        return view('supervisor.pages.show_team_calls',$data);
    }
    public function profile()
    {
        $data['user']       = Self::global();
        $data['page']       = 'Profile';
        $data['supervisor_info'] = TblUserInfoModel::where('tbl_user_info.user_id',session('user_id'))
                            ->join('tbl_user','tbl_user.user_id','=','tbl_user_info.user_id')
                            ->first();
        $data['team']       = TblUserTeamModel::where('user_id',session('user_id'))
                            ->join('tbl_team','tbl_team.team_id','=','tbl_user_team.team_id')
                            ->first();    
        return view ('supervisor.pages.profile', $data);    
    }
    public function update_profile(Request $request)
    {
       $data['transaction'] = 'profile';
        $data['agent_info'] = TblUserInfoModel::where('tbl_user_info.user_id',session('user_id'))->join('tbl_user','tbl_user.user_id','=','tbl_user_info.user_id')->first();            
        return view('supervisor.pages.update_profile',$data); 
    }
    public function saving_profile(Request $request)
    {
        if($request->ajax())
        {
            if($request->stats=='null')
            { 
                $data['user_phone_number']      = $request->user_phone_number;
                $data['user_address']            = $request->user_address;
                
                
                $check = TblUserInfoModel::where('user_id',session('user_id'))->update($data);
                if($check)
                {
                  return "<div class='alert alert-success'><strong>Thank you!</strong>Profile successfully updated.</div>";
                }
                else
                {
                  return "<div class='alert alert-danger'><strong>Sorry!</strong> Nothing has changed.</div>"; 
                }
            }
            else
            {
                $unique=uniqid();
                $fileConvo = $request->file("file");
                $file_name = '/business_images/'.$unique."-".$fileConvo->getClientOriginalName().'';
                $fileConvo->move('business_images', $file_name);
                $data['user_profile']       = $file_name;
                $data['user_phone_number']    = $request->user_phone_number;
                $data['user_address']       = $request->user_address;
            
                TblUserInfoModel::where('user_id',session('user_id'))->update($data);

                $datas['user_email']        = $request->user_email;

                TblUserModel::where('user_id',session('user_id'))->update($datas);
            }
        }
    }
    public function update_password(Request $request)
    {   
        $data['transaction'] = 'password';
        return  view('agent.pages.update_profile',$data);
    }
    public function checking_password(Request $request )
    {
        $user = TblUserModel::where('user_id',session('user_id'))->first();
        if(Crypt::decrypt($user->user_password)==$request->currentPassword)
        {
            if($request->newPassword == $request->confirmPassword)
            {
                $data['user_password'] = Crypt::encrypt($request->newPassword);
                TblUserModel::where('user_id',session('user_id'))->update($data);
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
  public function merchant()
	{
    $data['user']       = Self::global();
		$data['page']	      = 'Merchant';
    $data['merchant']   = TblTeamModel::where('tbl_team.supervisor_id', session('user_id'))->get();
    foreach($data['merchant'] as $key=>$team)
    {
      $data['merchant'][$key]['clients'] = TblUserTeamModel::where('tbl_user_team.team_id', $team->team_id)
                          ->join('tbl_user','tbl_user.user_id','=','tbl_user_team.user_id')
                          ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->where('tbl_business.business_status',2)
                          ->groupBy('tbl_business.business_name')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
       $data['merchant'][$key]['clients_activated'] = TblTeamModel::where('tbl_team.supervisor_id', $team->team_id)
                          ->join('tbl_user_team','tbl_user_team.team_id','=','tbl_user_team.team_id')
                          ->join('tbl_user','tbl_user.user_id','=','tbl_user_team.user_id')
                          ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->where('tbl_business.business_status',3)
                          ->orderBy('tbl_business.date_created',"asc")
                          ->groupBy('tbl_business.business_name')
                          ->get();
    }
    return view ('supervisor.pages.merchant', $data);		
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
    public function manage_user()
    {
        $data['page']       = 'Manage Team/Agent';
        $data['user']       = Self::global();
        $team_id            = TblUserTeamModel::where('user_id',session('user_id'))->value('team_id');
        $data['viewteam']   = TblTeamModel::where('tbl_team.supervisor_id',session('user_id'))->get();
        foreach($data['viewteam'] as $key=>$team)
        {
          $data['viewteam'][$key]['sum_of_calls']  = TblUserTeamModel::where('team_id',$team->team_id)->selectRaw('sum(user_calls) as sum_of_calls')->where('tbl_user_team.archived',0)->value('sum_of_calls');
          $data['viewteam'][$key]['viewagent']  = TblUserTeamModel::where('tbl_user_team.archived',0)->where('tbl_user_team.team_id',$team->team_id)->where('tbl_user.user_access_level','AGENT')->TeamAgent()->get();
        }
        $data['_agent_team']= TblTeamModel::where('archived',0)->where('supervisor_id',session('user_id'))->get();
        
        return view ('supervisor.pages.manage_user', $data); 
    }
    public function supervisor_add_team(Request $request)
    {
        $data['team_name']          = $request->team_name;
        $data['team_information']   = $request->team_des;
        $data['supervisor_id']      = session('user_id');
        TblTeamModel::insert($data);
        return "<div class='alert alert-success'><strong>Success!</strong>Team Added.</div>";
    }
    public function supervisor_assign_agent(Request $request)
    {
        $user_id            = $request->agent_id_assign;
        $update['team_id']  = $request->teamAssigned;
        TblUserTeamModel::where('user_id',$user_id)->update($update);
        return "<div class='alert alert-success'><strong>Success!</strong>Agent Assigned successfully.</div>";

    } 
    public function view_all_members(Request $request)
    {
      $id = $request->team_id;
      $data['_supervisor'] = TblUserTeamModel::where('tbl_user_team.team_id',$id)->TeamAgent()->where('tbl_user.user_access_level','SUPERVISOR')->get();
      $data['_data_agent'] = TblUserTeamModel::where('tbl_user_team.team_id',$id)->TeamAgent()->where('tbl_user.user_access_level','AGENT')->get();
      return view('supervisor.pages.viewmember',$data);
    }
    public function supervisor_delete_team(Request $request)
    {
      $archived['archived'] = 1;
      TblTeamModel:: where ('team_id',$request->delete_team_id)->update($archived);
      return "<div class='alert alert-success'><strong>Success!</strong>Team Deleted</div>";
    }
    public function supervisor_delete_agent(Request $request)
    { 
      $archived['archived'] = 1;
      TblUserModel:: where ('user_id',$request->delete_agent_id)->update(archived);
      return "<div class='alert alert-success'><strong>Success!</strong>Agent Deleted</div>";
    }
    
    public function update_team(Request $request)
    {
        $data['page']   = 'View User';
        $update["team_name"] = $request->team_name;
        $update["team_information"] = $request->team_info;
        TblTeamModel::where('team_id',$request->team_id)->update($update);
        return "<div class='alert alert-success'><strong>Success!</strong>Team Updated</div>";
    }
    
    
    public function uploadConvo(Request $request) 
    {
      if($request->ajax())
      {
  			$fileConvo = $request->file("file");
              $file_ref = uniqid().$fileConvo->getClientOriginalName();
              $fileConvo->move('conversations',$file_ref );
              $convoInfo = new Tbl_conversation;
              $convoInfo->file_path = '/conversations/'.$file_ref .'';
              $convoInfo->file_name = $fileConvo->getClientOriginalName();
              $convoInfo->business_id = $request->input("businessId");
              $convoInfo->business_contact_person_id = $request->input("contactId");
              $convoInfo->save();

              $update['business_status'] = "3";
              $update['date_transact'] = date("Y/m/d"); 
              TblBusinessModel::where('business_id',$request->input("businessId"))->update($update);
      }
    }
    public function changeAudioFile(Request $request)
    {
      if($request->ajax())
      {
        $fileConvo = $request->file("file");
              $file_ref = uniqid().$fileConvo->getClientOriginalName();
              $fileConvo->move('conversations', $file_ref);
              $change['file_path'] = '/conversations/'.$file_ref.'';
              $change['file_name'] = $fileConvo->getClientOriginalName();
              $conversation_id = $request->input("conversation_id");
              
              Tbl_conversation::where('conversation_id',$conversation_id)->update($change);
              $update['business_status'] = "3";
              $update['date_transact'] = date("Y/m/d"); 
              TblBusinessModel::where('business_id',$request->input("businessId"))->update($update);
      }

    }
    public function force_activate(Request $request)
    {
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
        $data['clients'] = TblBusinessModel::where('business_status',2)->where('business_name','like','%'.$search_key.'%')->BusinessInformation()->get();
        return view('supervisor.pages.filtered',$data);
    }

    public function supervisor_search_client_activated(Request $request)
    {
        $search_key_act = $request->search_key_act;
        $data['clients_activated'] = TblBusinessModel::where('business_status', 3)->where('business_name','like','%'.$search_key_act.'%')->BusinessInformation()->get();
        return view('supervisor.pages.filtered1',$data);
    }
    public function supervisor_search_team(Request $request)
    {
        $search_key_team = $request->search_key_team;
        $data['viewteam']   = TblTeamModel:: selectRaw('sum(user_calls) as sum, tbl_team.*')
                              ->where('team_name','like','%'.$search_key_team.'%')
                              ->join('tbl_user_team','tbl_user_team.team_id','=','tbl_team.team_id')
                              ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user_team.user_id')
                              ->groupBy('team_id')->get();
        return view('supervisor.pages.search_team_blade',$data);
    }

    public function supervisor_search_agent(Request $request)
    {

        $search_key_agent   = $request->search_key_agent;
        $data['viewagent']  = TblUserModel::join('tbl_team','tbl_team.team_id','=','tbl_agent.team_id')
                            ->where('email','like','%'.$search_key_agent.'%')
                            ->get();
        return view('supervisor.pages.search_agent_blade',$data);
   
    }


}

