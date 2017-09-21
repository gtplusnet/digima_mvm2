<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tbl_admin;


class GeneralAdmin extends Controller
{
    
    public function admin()
    {
    	$data['page']   = 'GeneralAdmin';
        return view('front.pages.GeneralAdmin', $data);
    }

    public function admin_login(Request $request)
    {
        $validate_login = Tbl_admin::select('admin_id')->where('email','=',$request->login_email)->where('password','=',$request->login_password)->first();

        if(count($validate_login) == 1)
        {
            if($validate_login->status == 1)
            {
                echo 'Correct credentials.';
            }
            else if($validate_login->status == 2)
            {
                echo 'Sorry, your account is not activated yet.';
            }
            else
            {
                echo 'Sorry, your account has been disabled.';
            }
        }
        else
        {
            echo 'Incorrect Email/Password.';
        }
    }

}