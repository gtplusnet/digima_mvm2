<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Redirect;

class AdminController extends Controller
{
    
    public function admin()
    {
        return view('admin');
    }
}