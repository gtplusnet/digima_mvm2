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
use App\Models\TblContactUs;
use App\Models\TblBusinessCategoryModel;
use Session;
use Mail;
use Redirect;
use Crypt;

class PasswordController extends Controller
{

    public function user_forgot_password()
    {
        $data['countyList']         = TblCountyModel::get();
        $data['contact_us']         = TblContactUs::first();
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['page']               = 'Forgot Password';

        return view('front.pages.forgot_password',$data);
    }
    public function user_reset_password(Request $request)
    {   
        $data['page']   = 'Forgot Password';
        $email          = $request->email;
        $phone          = $request->phone;
        $check          = TblUseModel::where('tbl_user_account.user_email',$email)
                        ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id')
                        ->first();
        if(count($check) ==1)
        {
            $date                   = date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));
            $name                   = $check->user_first_name.' '.$check->user_last_name;
            $mail                   = $check->user_email;
            $password               = Crypt::decrypt($check->user_password);
            $link                   = 'http://mvm.digimahouse.com/user/login';
            $data                   = array('name'=>$name,'password'=>$password,'email_add'=>$mail,'date'=>$date,'link'=>$link);
            $check_mail             = Mail::send('front.pages.send_password_reset_link', $data, function($message) use($data) {
                                        $message->to($data['email_add'], 'Zute Stranice')->subject('PASSWORD RESET');
                                        $message->from('guardians35836@gmail.com','Zute Stranice');
                                    });
            if($check_mail)
            {
               
                Session::flash('sent', 'message');
                $data['countyList']         = TblCountyModel::get();
                $data['contact_us']         = TblContactUs::first();
                $data['_mob_categories']    = TblBusinessCategoryModel::all();
                return view('front.pages.forgot_password',$data);
            }
            else
            {
                print_r('ERROR 404');
            }
            
        }
        else
        {
            $data['countyList']         = TblCountyModel::get();
            $data['contact_us']         = TblContactUs::first();
            $data['_mob_categories']    = TblBusinessCategoryModel::all();
            Session::flash('notmatch', 'message');
            return view('front.pages.forgot_password',$data);
        }
    }
    
    
    public function forgot_password()
    {
        $data['countyList']         = TblCountyModel::get();
        $data['contact_us']         = TblContactUs::first();
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['page']               = 'Forgot Password';
        return view('front.pages.forgot_password',$data);
    }
    public function reset_password(Request $request)
    {   
        $data['page']   = 'Forgot Password';
        $email          = $request->email;
        $phone          = $request->phone;
        $check          = TblUserAccountModel::where('tbl_user_account.user_email',$email)
                        ->join('tbl_business','tbl_business.business_id','=','tbl_user_account.business_id')
                        ->first();
        if(count($check) ==1)
        {
            $date                   = date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));
            $name                   = $check->business_name;
            $mail                   = $check->user_email;
            $password               = Crypt::decrypt($check->user_password);
            $link                   = 'http://mvm.digimahouse.com/login';
            $data                   = array('name'=>$name,'password'=>$password,'email_add'=>$mail,'date'=>$date,'link'=>$link);
            $check_mail             = Mail::send('front.pages.send_password_reset_link', $data, function($message) use($data) {
                                        $message->to($data['email_add'], 'Zute Stranice')->subject('PASSWORD RESET');
                                        $message->from('guardians35836@gmail.com','Zute Stranice');
                                    });
            if($check_mail)
            {
               
                Session::flash('sent', 'message');
                $data['countyList']         = TblCountyModel::get();
                $data['contact_us']         = TblContactUs::first();
                $data['_mob_categories']    = TblBusinessCategoryModel::all();
                return view('front.pages.forgot_password',$data);
            }
            else
            {
                print_r('ERROR 404');
            }
            
        }
        else
        {
            $data['countyList']         = TblCountyModel::get();
            $data['contact_us']         = TblContactUs::first();
            $data['_mob_categories']    = TblBusinessCategoryModel::all();
            Session::flash('notmatch', 'message');
            return view('front.pages.forgot_password',$data);
        }
    }
}
