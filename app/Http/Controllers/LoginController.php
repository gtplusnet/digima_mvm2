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
    }
    public function user_login()
    {
        Self::allow_logged_out_users_only();
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['contact_us']         = TblContactUs::first();
        $data['page']               = 'LOGIN';
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
}
