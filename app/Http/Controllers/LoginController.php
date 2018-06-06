<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblUserAccountModel;
use App\Models\TblCountyModel;
use App\Models\TblBusinessCategoryModel;
use App\Models\TblContactUs;
use App\Models\TblUserModel;

use App\Models\TblBusinessContactPersonModel;

use Crypt;
use Session;
use Redirect;

class LoginController extends Controller
{
  public static function allow_logged_out_users_only()
  {
      if(session("active"))
      {
          if(session("user_access_level")=="ADMIN")
          {
            return Redirect::to('/general_admin/dashboard');
          }
          else if(session("user_access_level")=="SUPERVISOR")
          {
            return Redirect::to('/supervisor/dashboard');
          }
          else if(session("user_access_level")=="AGENT")
          {
            return Redirect::to('/agent/dashboard');
          }
          else
          {
            Session::flash('error', 'You are not a user.');
            return Redirect::to('/user/login');
          }
      }
      if(session("merchant_login") )
      {
        return Redirect::to("/merchant/dashboard")->send();
      }
  }
  public function user_login()
  {
      Self::allow_logged_out_users_only();
      $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
      $data['_mob_categories']    = TblBusinessCategoryModel::all();
      $data['contact_us']         = TblContactUs::first();
      $data['page']               = 'PAGE';
      return view('front.pages.login', $data);
  }
  public function user_login_submit(Request $request)
  {
      $validate_login = TblUserModel::where('user_email',$request->user_email)->first();
      
      
      if(count($validate_login)==1)
      {
          if(Crypt::decrypt($validate_login->user_password)==$request->user_password)
          {
            if($validate_login->archived==0)
            {
              Session::put('active','active_user_login');
              Session::put('user_id',$validate_login->user_id);
              Session::put('user_access_level',$validate_login->user_access_level);

              if($validate_login->user_access_level=="ADMIN")
              {
                return Redirect::to('/general_admin/dashboard');
              }
              else if($validate_login->user_access_level=="SUPERVISOR")
              {
                return Redirect::to('/supervisor/dashboard');
              }
              else if($validate_login->user_access_level=="AGENT")
              {
                return Redirect::to('/agent/dashboard');
              }
              else
              {
                Session::flash('error', 'You are not a user.');
                return Redirect::to('/user/login');
              }
              
            }
            else
            {
              Session::flash('error', 'Your account has been deactivated.');
              return Redirect::to('/user/login');
            }
            
          }
          else
          {
            Session::flash('error', 'Password you entered is incorrect.');
            return Redirect::to('/user/login');
          }
      }
      else
      {
          $data['page']   = 'Agent Login';
          return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
      }
  }
  public function user_logout()
  {
      Session::forget('active');
      Session::forget('user_id');
      Session::forget('user_access_level');
      return Redirect::to("/user/login");
  }
  public function login()
  {
    Self::allow_logged_out_users_only();
    $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
    $data['_mob_categories']    = TblBusinessCategoryModel::all();
    $data['contact_us']         = TblContactUs::first();
    $data['page']   = 'login';
    return view('front.pages.login', $data);
  }
  public function login_submit(Request $request)
  {
    $validate_login = TblUserAccountModel::where('user_email',$request->email)->first();
    if($validate_login)
    {
      if (Crypt::decrypt($validate_login->user_password)==$request->password)
      {
        if($validate_login->status=="Activated"||$validate_login->status=="activated")
        {
          $user_info = TblBusinessContactPersonModel::where('business_contact_person_id',$validate_login->business_contact_person_id)->first();
          Session::put("merchant_login",true);
          Session::put("business_id",$user_info->business_id);
          Session::put("business_banner",$validate_login->business_banner);
          Session::put("email",$validate_login->user_email);
          Session::put("full_name",$user_info->contact_first_name." ".$user_info->contact_last_name);
          return Redirect::to('/merchant/dashboard');
        }
        elseif($validate_login->status=="registered"||$validate_login->status=="Registered")
        {
          $user_info = TblUserAccountModel::where('user_account_id',$validate_login->user_account_id)->UserAccount()->first();
          Session::put("full_name",$user_info->contact_first_name." ".$user_info->contact_last_name);
          Session::put("email",$user_info->user_email);
          Session::put("business_name",$user_info->business_name);
          Session::put("business_id",$user_info->business_id);
          Session::put("business_contact_person_id",$user_info->business_contact_person_id);
          Session::put("business_address",$user_info->business_complete_address);
          Session::put("city_state",$user_info->city_name.", ".$user_info->county_name);
          Session::put("zip_code",$user_info->postal_code);
          return Redirect::to('/merchant/redirect');
        }
        elseif($validate_login->status=="deactivated"||$validate_login->status=="Deactivated")
        {
          return Redirect::to('/redirect');
        }
      }
      else
      {
        $data['page']   = 'Merchant Login';
        return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
      }
    }
    else
    {
      $data['page']   = 'Merchant Login';
      return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
    }
  }
  public function logout()
  {
    Session::forget("merchant_login");
    return Redirect::to("/login");
  }
}
