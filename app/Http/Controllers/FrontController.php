<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        $data['page']   = 'home';
        return view('front.pages.home', $data);
    }
    public function registration()
    {
        $data['page']   = 'Registration';
        return view('front.pages.registration', $data);
    }
    // THIS IS A DUMMY
    // STARTS HERE
    public function dummypage()
    {
        $data['page']   = 'dummypage';
        return view('front.pages.dummypage', $data);
    }
    // ENDS HERE
    public function success()
    {
        $data['page']   = 'success';
        return view('front.pages.success', $data);
    }
    public function payment()
    {
        $data['page']   = 'payment';
        return view('front.pages.payment', $data);
    }


    public function about()
    {
        $data['page']   = 'About';
        return view('front.pages.about', $data);
    }
    public function contact()
    {
        $data['page']   = 'Contact';
        return view('front.pages.contact', $data);
    }
    public function login()
    {
        $data['page']   = 'login';
        return view('front.pages.login', $data);
    }
    public function business()
    {
        $data['page']   = 'business';
        return view('front.pages.business', $data);
    }
     
}
