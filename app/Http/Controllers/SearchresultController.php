<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessModel;


class SearchresultController extends Controller
{
	public function index(Request $request)
    {
        $data['page']   = 'searchresult';
        return view('front.pages.searchresult', $data);
    }
    public function category()
    {
        $data['page']   = 'category';
        $data['business'] = TblBusinessModel::paginate(10);
        $data['featured'] = TblBusinessModel::where('membership',1)->get();
        return view('front.pages.category', $data);
    }
    public function resultsortgrid()
    {
        $data['page']   = 'resultsortgrid';
        return view('front.pages.resultsortgrid', $data);
    }
    public function searchtabular()
    {
        $data['page']   = 'searchtabular';
        return view('front.pages.searchtabular', $data);
    }
}
