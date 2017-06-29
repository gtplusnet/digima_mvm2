<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        $data['page']   = 'Home';
        return view('front.pages.home', $data);
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
}
