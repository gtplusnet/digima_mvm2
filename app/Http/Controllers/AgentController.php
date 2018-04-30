<?php
namespace App\Http\Controllers;

use App\Http\Controllers\ActiveAuthController;


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
use App\Models\TblTeamModel;
use App\Models\TblContactUs;
use Carbon\Carbon;
use App\Models\TblBusinessCategoryModel;

use App\Models\TblUserInfoModel;
use App\Models\TblUserTeamModel;
use App\Models\TblUserModel;


use Input;
use Mail;
use Session;
use Redirect;
use Crypt;


class AgentController extends ActiveAuthController
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
    	$data['page']	          		= 'Dashboard';
     	$count_merchant_signup    		= TblBusinessModel::get();
    	$count_merchant_signup    		= TblBusinessModel::where('business_status',1)->get();
        $count_merchant_pending   		= TblBusinessModel::where('business_status',4)->get();
        $count_merchant_activated 		= TblBusinessModel::where('business_status',5)->get();
        $data['countSignup']      		= $count_merchant_signup->count();
        $data['countPending']     		= $count_merchant_pending->count();
        $data['countActivated']   		= $count_merchant_activated->count();

		$data['date_mon'] 		= $mon =date('Y/m/d',strtotime('monday this week'));
	    $data['date_tue'] 		= $tue =date('Y/m/d',strtotime('tuesday this week'));
	    $data['date_wed'] 		= $wed =date('Y/m/d',strtotime('wednesday this week'));
	    $data['date_thu'] 		= $thu =date('Y/m/d',strtotime('Thursday this week'));
	    $data['date_fri'] 		= $fri =date('Y/m/d',strtotime('Friday this week'));
	    $data['date_sat'] 		= $sat =date('Y/m/d',strtotime('Saturday this week'));
	    $data['date_sun'] 		= $sun =date('Y/m/d',strtotime('Sunday this week'));

	    $data['mon'] = $monr 	= TblBusinessModel::where('date_created',$mon)->count();
	    $data['tue'] = $tuer 	= TblBusinessModel::where('date_created',$tue)->count();
	    $data['wed'] = $wedr 	= TblBusinessModel::where('date_created',$wed)->count();
	    $data['thu'] = $thur 	= TblBusinessModel::where('date_created',$thu)->count();
	    $data['fri'] = $frir 	= TblBusinessModel::where('date_created',$fri)->count();
	    $data['sat'] = $satr 	= TblBusinessModel::where('date_created',$sat)->count();
	    $data['sun'] = $sunr 	= TblBusinessModel::where('date_created',$sun)->count();

	    $data['mona'] = $monc 	= TblBusinessModel::where('date_transact',$mon)->where('business_status',5)->count();
	    $data['tuea'] = $tuec 	= TblBusinessModel::where('date_transact',$tue)->where('business_status',5)->count();
	    $data['weda'] = $wedc 	= TblBusinessModel::where('date_transact',$wed)->where('business_status',5)->count();
	    $data['thua'] = $thuc 	= TblBusinessModel::where('date_transact',$thu)->where('business_status',5)->count();
	    $data['fria'] = $fric 	= TblBusinessModel::where('date_transact',$fri)->where('business_status',5)->count();
	    $data['sata'] = $satc 	= TblBusinessModel::where('date_transact',$sat)->where('business_status',5)->count();
	    $data['suna'] = $sunc 	= TblBusinessModel::where('date_transact',$sun)->where('business_status',5)->count();

	    $data['total_r'] 		= $monr+$tuer+$wedr+$thur+$frir+$satr+$sunr;
	    $data['total_c'] 		= $monc +$tuec+$wedc+$thuc+$fric+$satc+$sunc;

	    $data['count_jan']  	= TblBusinessModel::whereMONTH('date_transact', '=', 01 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_feb']  	= TblBusinessModel::whereMONTH('date_transact', '=', 02 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_mar']  	= TblBusinessModel::whereMONTH('date_transact', '=', 03 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_apr']  	= TblBusinessModel::whereMONTH('date_transact', '=', 04 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_may']  	= TblBusinessModel::whereMONTH('date_transact', '=', 05 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_jun']  	= TblBusinessModel::whereMONTH('date_transact', '=', 06 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_jul']  	= TblBusinessModel::whereMONTH('date_transact', '=', 07 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_aug']  	= TblBusinessModel::whereMONTH('date_transact', '=', '08' )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_sep']  	= TblBusinessModel::whereMONTH('date_transact', '=', '09' )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_oct']  	= TblBusinessModel::whereMONTH('date_transact', '=', '10' )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_nov']  	= TblBusinessModel::whereMONTH('date_transact', '=', 11 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();
        $data['count_dec']  	= TblBusinessModel::whereMONTH('date_transact', '=', 12 )->where('business_status','!=',5)->where('user_id',session('user_id'))->count();

        $data['counts_jan']  	= TblBusinessModel::whereMONTH('date_transact', '=', 01 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_feb']  	= TblBusinessModel::whereMONTH('date_transact', '=', 02 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_mar']  	= TblBusinessModel::whereMONTH('date_transact', '=', 03 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_apr']  	= TblBusinessModel::whereMONTH('date_transact', '=', 04 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_may']  	= TblBusinessModel::whereMONTH('date_transact', '=', 05 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_jun']  	= TblBusinessModel::whereMONTH('date_transact', '=', 06 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_jul']  	= TblBusinessModel::whereMONTH('date_transact', '=', 07 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_aug']  	= TblBusinessModel::whereMONTH('date_transact', '=', '08' )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_sep']  	= TblBusinessModel::whereMONTH('date_transact', '=', '09' )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_oct']  	= TblBusinessModel::whereMONTH('date_transact', '=', '10' )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_nov']  	= TblBusinessModel::whereMONTH('date_transact', '=', 11 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        $data['counts_dec']  	= TblBusinessModel::whereMONTH('date_transact', '=', 12 )->where('business_status',5)->where('user_id',session('user_id'))->count();
        
	    return view ('agent.pages.dashboard', $data);	
	}
	public function profile()
	{	
		$data['user']       = Self::global();
		$data['page']		= 'Profile';
		$data['agent_info'] = TblUserInfoModel::where('tbl_user_info.user_id',session('user_id'))
		                    ->join('tbl_user','tbl_user.user_id','=','tbl_user_info.user_id')
		                    ->first();
		$data['team']	    = TblUserTeamModel::where('user_id',session('user_id'))
		                    ->join('tbl_team','tbl_team.team_id','=','tbl_user_team.team_id')
		                    ->first();		
		return view ('agent.pages.profile', $data);		
	}
	public function update_profile(Request $request)
	{
		$data['transaction'] = 'profile';
		$data['agent_info'] = TblUserInfoModel::where('tbl_user_info.user_id',session('user_id'))
		                    ->join('tbl_user','tbl_user.user_id','=','tbl_user_info.user_id')
		                    ->first();			
		return view('agent.pages.update_profile',$data); 
	}
	public function saving_profile(Request $request)
	{
		if($request->ajax())
	  	{
	  		if($request->stats=='null')
	    	{	
				$data['primary_phone']		= $request->primaryPhone;
				$data['secondary_phone']	= $request->secondaryPhone;
				$data['other_info']			= $request->otherInfo;
				$data['address']			= $request->address;
				$data['profile']          	= $request->imageText;;
				
				$check = TblAgentModel::where('agent_id',session('agent_id'))->update($data);
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
	          $data['user_profile'] 			= $file_name;
	          $data['user_phone_number']		= $request->user_phone_number;
			  $data['user_address']				= $request->user_address;
			  
	          TblUserInfoModel::where('user_id',session('user_id'))->update($data);

	          $datas['user_email'] 				= $request->user_email;

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
		if(Crypt::decrypt($user->password)==$request->currentPassword)
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
		$data['page']	 = 'Merchant';
		$data['clients'] = TblBusinessModel::where('business_status',1)
							->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
	                        ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
	                        ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
	                        ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id') 
	                        ->orderBy('tbl_business.date_created',"asc")
	                        ->paginate(10);
        
        $data['clients_pending'] = TblBusinessModel::where("user_id", session("user_id"))
        					->where(function($query)
						       {
						        $query->where('tbl_business.business_status', 4);
						        $query->orWhere('tbl_business.business_status', 20);
						       })
						    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
						    ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
						    ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
	                        ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
						    ->orderBy('tbl_business.date_created',"DESC")
                            ->paginate(10);

        $data['clients_activated'] = TblBusinessModel::where('business_status', 5)->where("user_id", session("user_id"))
                           ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                           ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                           ->orderBy('tbl_business.date_created',"DESC")
                           ->paginate(10);

    	return view ('agent.pages.merchant', $data);	
	}

	public function get_client(Request $request)
	{
		$s_date          = $request->date_start;
		$e_date          = $request->date_end;
		$data['clients'] = TblBusinessModel::Where('business_status',1)
						  ->whereBetween('date_created',[$s_date,$e_date])
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->orderBy('tbl_business.date_created',"asc")
                           ->paginate(10);
		return view('agent.pages.filtered',$data);
	}
	public function get_client1(Request $request)
	{
		$s_date = $request->date_start1;
		$e_date = $request->date_end1;
		$data['clients_pending'] = TblBusinessModel::where('business_status', 4)
							->where("agent_id", session("agent_id"))
						    ->whereBetween('date_transact',[$s_date,$e_date])
						    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                            ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                            ->orderBy('tbl_business.date_transact',"asc")
                            ->paginate(10);
		return view('agent.pages.filtered1',$data);
	}

	public function get_client2(Request $request)
	{
		Self::allow_logged_in_users_only();
		$s_date = $request->date_start2;
		$e_date = $request->date_end2;
		$data['clients_activated'] = TblBusinessModel::where('business_status',5)
						    ->whereBetween('date_transact',[$s_date,$e_date])
						    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
 	                        ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
 	                        ->orderBy('tbl_business.date_transact',"asc")
 	                        ->paginate(10);
		return view('agent.pages.filtered2',$data);
	}

	public function get_client_transaction(Request $request)
	{
		$trans_id                     = $request->transaction_id;
		$update['transaction_status'] = 'call in progress'; 
		$update['user_id']           = session('user_id'); 
		$update['date_transact']      = date("Y/m/d"); 
		$check = TblBusinessModel::where('business_id',$trans_id)->update($update);
		$data['client'] = TblBusinessModel::Where('tbl_business.business_id',$trans_id)
						  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                          ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id') 
                          ->first();
	
		return view('agent.pages.agent_call',$data);
	}

	public function get_client_transaction_reload(Request $request)
	{
		$trans_id 	= $request->transaction_id;
		$status 	= $request->status;

		if($status==4)
		{
			$update['transaction_status'] 	= 'called'; 
			$update['date_transact']      	= date("Y/m/d");
			$update['user_call_date']		= date("Y/m/d"); 
			$check = TblBusinessModel::where('business_id',$trans_id)->update($update);

			return '';	
		}
		elseif($status==20)
		{
			$update['transaction_status'] 	= 'Added'; 
			$update['date_transact'] 		= date("Y/m/d"); 
			$check = TblBusinessModel::where('business_id',$trans_id)->update($update);
			return '';
		}
		elseif($status==1)
		{
			$update['transaction_status'] 	= 'called'; 
			$update['business_status'] 		= '2';
			$update['date_transact'] 		= date("Y/m/d");
			$update['user_call_date']		= date("Y/m/d");  
			$check = TblBusinessModel::where('business_id',$trans_id)->update($update);
			$count_call = TblUserTeamModel::where('user_id',session('user_id'))->first();
			$agent['user_calls'] = $count_call->user_calls + 1;
	        TblUserTeamModel::where('user_id',session('user_id'))->update($agent);
			return '';
		}
	}
	public function add_merchant()
	{
		$data['user']       		= Self::global();
		$data['county_list'] 		= TblCountyModel::get();
		$data['membership_list'] 	= TblMembeshipModel::get();
		$data['page']	            = 'Add Merchant';
		return view ('agent.pages.add_merchant', $data);		
	}
	public function add_client_submit(Request $request)
	{
		$check_email_availability = TblUserAccountModel::select('user_email')->where('user_email','=',$request->email_address)->first();
		$phoneAvailability = TblBusinessModel::checkPhone($request->primary_business_phone,$request->secondary_business_phone)->first();
        if(count($check_email_availability) == 1)
        {
           Session::flash('add_merchant', "Sorry!, Email Exist");
           return Redirect::to('/agent/add/merchant');
        }
        elseif(count($phoneAvailability) !=0)
        {
           Session::flash('add_merchant', "Sorry!, Phone Exist");
           return Redirect::to('/agent/add/merchant');
        }
        else
        {
        	$password   = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890"), 0,8);

	        $business_data = new TblBusinessModel;
	        $business_data->business_id 	= '';
	        $business_data->business_name 	= $request->business_name;
	        $business_data->city_id 		= $request->city_list;
	        $business_data->county_id 		= $request->county_id;
	        $business_data->business_complete_address = $request->business_address;
	        $business_data->business_phone 	= $request->primary_business_phone;
	        $business_data->business_alt_phone = $request->secondary_business_phone;
	        $business_data->business_fax 	= $request->fax_number;
	        $business_data->facebook_url 	= $request->facebook_url;
	        $business_data->twitter_url 	= $request->twitter_username;
            $business_data->transaction_status = 'Added';
            $business_data->membership 		= $request->membership;
            $business_data->business_status = '20';
            $business_data->user_id 		= session('user_id');
            $business_data->date_transact 	= date("Y/m/d");
            $business_data->date_created 	= date("Y/m/d");
            $business_data->user_call_date 	= date("Y/m/d");
            $business_data->save();

	        $contactData = new TblBusinessContactPersonModel;
            $contactData->business_contact_person_id 	= '';
            $contactData->contact_prefix 				= $request->prefix;
            $contactData->contact_first_name 			= $request->first_name;
            $contactData->contact_last_name 			= $request->last_name;
            $contactData->business_id 					= $business_data->business_id;
            $contactData->save();

            $accountData = new TblUserAccountModel;
            $accountData->user_email 				= $request->email_address;
            $accountData->user_password 			= Crypt::encrypt($password);
            $accountData->user_category 			= 'merchant';
            $accountData->status 					= 'registered';
            $accountData->string_password 			= 'none';
            $accountData->business_id 				= $business_data->business_id;
            $accountData->business_contact_person_id= $contactData->business_contact_person_id;
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
                array('days' => 'Ponedjeljak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Utorak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Srijeda', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Četvrtak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Petak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Subota', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id),
                array('days' => 'Nedjelja', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $business_data->business_id)
            ));

           Session::flash('add_merchant', "New Merchant Added");
           return Redirect::to('/agent/add/merchant');
        }
	}

	public function search_client(Request $request)
    {
      $search_key = $request->search_key;
      $data['clients'] = TblBusinessModel::where('business_status',1)->where('business_name','like','%'.$search_key.'%')
      		             ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
 	                     ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
 	                     ->paginate(10);
      return view('agent.pages.filtered',$data);

    }

    public function search_client_pending(Request $request)
    {
      $search_key1 = $request->search_key1;
      $data['clients_pending'] = TblBusinessModel::where('business_status',4)->where('business_name','like','%'.$search_key1.'%')
      						    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
 	                            ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
 	                            ->paginate(10);
      return view('agent.pages.filtered1',$data);

    }

     public function search_client_activated(Request $request)
    {
   
     $search_key2 = $request->search_key2;
     $data['clients_activated'] = TblBusinessModel::where('business_status',5)->where('business_name','like','%'.$search_key2.'%')
      						    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
 	                            ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
 	                            ->paginate(10);
      return view('agent.pages.filtered2',$data);

    }

	public function filter_clients(request $request) 
	{
	    Self::allow_logged_in_users_only();
		$sdate = $request->start_date;
		$edate = $request->end_date;
	
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
        $city_id 	 = $request->city_id;
        $postal_code = TblCityModel::select('postal_code')->where('city_id','=',$city_id)->first();

        return $postal_code->postal_code;
    }


	public function agent_logout()
    {
        Session::forget("agent_login");
        return Redirect::to("/agent");
    }

}