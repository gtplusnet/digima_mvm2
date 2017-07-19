<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchresultController extends Controller
{
	public function index()
    {
        $data['page']   = 'searchresult';
        return view('front.pages.searchresult', $data);
    }
    public function category()
    {
        $data['page']   = 'category';
        return view('front.pages.category', $data);
    }
}
