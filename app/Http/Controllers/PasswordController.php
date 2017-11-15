<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessModel;
use App\Models\TblCountyModel;
use App\Models\TblUserAccountModel;
use App\Models\TblPasswordResetModel;
use App\Models\TblAgentModel;
use Session;
use Mail;
use Redirect;

class PasswordController extends Controller
{

    public function forgot_password_user()
    {
        $data['countyList'] = TblCountyModel::get();
        $data['page']   = 'Forgot Password';
        return view('password_blade.forgot_user_password',$data);
    }
    public function forgot_password_user_reset_password(Request $request)
    {
        $data['page']   = 'Forgot Password';
        $email = $request->email;
        $phone = $request->phone;
        $check = TblAgentModel::where('email',$email)->where('primary_phone',$phone)->first();
        if($check==true)
        {
            $date=date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));
            $str = $email.$phone.date('Y-m-d');
            $ins['password_code'] = $st = md5($str);
            $ins['business_id'] = $id =  $check->agent_id;
            $link = 'http://mvm.digimahouse.com/forgot_password_user/reset_link/'.$st.'/'.$id.'/'.$check->position;
            $data = array('name'=>'user','email'=>'jamesomosora@gmail.com','date'=>$date,'link'=>$link);
            $check_mail = Mail::send('front.pages.send_password_reset_link', $data, function($message) use($data) {
            $message->to($data['email'], 'Croatia Team')->subject('PASSWORD RESET');
            $message->from('guardians35836@gmail.com','Croatia Representative');
            });
            if($check_mail)
            {
                $exist = TblPasswordResetModel::where('password_code',$st)->first();
                if($exist)
                {
                    TblPasswordResetModel::where('password_code',$st)->update($ins);
                    Session::flash('sent', 'message');
                    $data['countyList'] = TblCountyModel::get();
                    return view('password_blade.forgot_user_password',$data);
                }
                else
                {
                    TblPasswordResetModel::insert($ins);
                    Session::flash('sent', 'message');
                    $data['countyList'] = TblCountyModel::get();
                    return view('password_blade.forgot_user_password',$data);
                }
            }
            
        }
        else
        {
            Session::flash('notmatch', 'message');
            $data['countyList'] = TblCountyModel::get();
            return view('password_blade.forgot_user_password',$data);
        }
    }
    public function forgot_password_user_reset_link(Request $request,$code,$id,$post)
    {
        $check = TblPasswordResetModel::where('business_id',$id)->where('password_code',$code)->first();
        $data['business_id']    = $id;
        $data['password_code']  = $code;
        $data['position']       = $post;
        // dd($data);
        $data['countyList']     = TblCountyModel::get();
        if($check)
        {
            Session::flash('message', 'message');
            return view('password_blade.forgot_user_password_change',$data);
        }
        else
        {
            Session::flash('notmatch', 'message');
            return view('password_blade.forgot_user_password_change',$data);
        }
    }
    public function forgot_password_user_submit_reset_password(Request $request)
    {
        $data['countyList']     = TblCountyModel::get();
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $business_id = $request->business_id;
        $password_code = $request->password_code;
        $position = $request->position;
        $data['business_id']    = $business_id;
        
        // dd($business_id);
        if($position=='agent')
        {
            if($password==$confirm_password)
            {
                $update['password'] = password_hash($request->password, PASSWORD_DEFAULT);
                TblAgentModel::where('agent_id',$business_id)->update($update);
                TblPasswordResetModel::where('password_code',$password_code)->delete();
                Session::flash('success', 'message');
                return view('password_blade.forgot_user_password_change',$data);
            }
            else
            {
                Session::flash('error', 'message');
                return view('password_blade.forgot_user_password_change',$data);
            }  
        }
        elseif($position=='supervisor')
        {
            if($password==$confirm_password)
            {
                $update['password'] = password_hash($request->password, PASSWORD_DEFAULT);
                TblSupervisorModel::where('supervisor_id',$business_id)->update($update);
                TblPasswordResetModel::where('password_code',$password_code)->delete();
                Session::flash('success', 'message');
                return view('password_blade.forgot_user_password_change',$data);
            }
            else
            {
                Session::flash('error', 'message');
                return view('password_blade.forgot_user_password_change',$data);
            }  
        }
        elseif($position=='gm')
        {
            if($password==$confirm_password)
            {
                $update['password'] = password_hash($request->password, PASSWORD_DEFAULT);
                TblAdminModel::where('admin_id',$business_id)->update($update);
                TblPasswordResetModel::where('password_code',$password_code)->delete();
                Session::flash('success', 'message');
                return view('password_blade.forgot_user_password_change',$data);
            }
            else
            {
                Session::flash('error', 'message');
                return view('password_blade.forgot_user_password_change',$data);
            }  
        }
        else
        {
            return "link expired";
        }
        
    }





    public function forgot_password()
    {
        $data['countyList'] = TblCountyModel::get();
        $data['page']   = 'Forgot Password';
        return view('front.pages.forgot_password',$data);
    }
    public function reset_password(Request $request)
    {
        
        $data['page']   = 'Forgot Password';
        $email = $request->email;
        $phone = $request->phone;
        $check = TblUserAccountModel::where('user_email',$email)->first();
        $checks = TblBusinessModel::where('business_phone',$phone)->first();
        if($check==true && $checks==true)
        {
            $date=date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));
            $name = $checks->business_name;
            $mail = $check->user_email;
            $str = $checks->business_name.date('Y-m-d');
            $ins['password_code'] = $st = md5($str);
            $ins['business_id'] = $business_id = $checks->business_id;
            $link = 'http://mvm.digimahouse.com/password/'.$st.'/'.$business_id;
            $data = array('name'=>$name,'email_add'=>$mail,'date'=>$date,'link'=>$link);
            $check_mail = Mail::send('front.pages.send_password_reset_link', $data, function($message) use($data) {
            $message->to($data['email_add'], 'Croatia Team')->subject('PASSWORD RESET');
            $message->from('guardians35836@gmail.com','Croatia Customer');
            });
            if($check_mail)
            {
                $exist = TblPasswordResetModel::where('business_id',$business_id)->first();
                if($exist)
                {
                    TblPasswordResetModel::where('business_id',$business_id)->update($ins);
                    Session::flash('sent', 'message');
                    $data['countyList'] = TblCountyModel::get();
                    return view('front.pages.forgot_password',$data);
                }
                else
                {
                    TblPasswordResetModel::insert($ins);
                    Session::flash('sent', 'message');
                    $data['countyList'] = TblCountyModel::get();
                    return view('front.pages.forgot_password',$data);
                }
                
            }
            
        }
        else
        {
            Session::flash('notmatch', 'message');
            $data['countyList'] = TblCountyModel::get();
            return view('front.pages.forgot_password',$data);
        }
    }
    public function password_reset_link(Request $request,$code,$id)
    {
        $check = TblPasswordResetModel::where('business_id',$id)->where('password_code',$code)->first();
        $data['business_id']    = $id;
        $data['countyList']     = TblCountyModel::get();
        if($check)
        {
            Session::flash('message', 'message');
            return view('front.pages.change_password',$data);
        }
        else
        {
            Session::flash('notmatch', 'message');
            return view('front.pages.change_password',$data);
        }
    }
    public function reset_user_password(Request $request)
    {
        $data['countyList']     = TblCountyModel::get();
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $business_id = $request->business_id;
        $data['business_id']    = $business_id;
        
        // dd($business_id);

        if($password==$confirm_password)
        {
            $update['user_password'] = password_hash($request->password, PASSWORD_DEFAULT);
            TblUserAccountModel::where('business_id',$business_id)->update($update);
            TblPasswordResetModel::where('business_id',$business_id)->delete();
            Session::flash('success', 'message');
            return view('front.pages.change_password',$data);
        }
        else
        {
            Session::flash('error', 'message');
            return view('front.pages.change_password',$data);
        }
    }
    
    

    

    
}
