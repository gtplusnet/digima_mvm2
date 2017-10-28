<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessModel;
use Redirect;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mvm.front.search');
    }

    public function search_result(Request $request)
    {
        //dd($request->search_business);
        $business_name = $request->business_name;
        $data["_business_list"] = TblBusinessModel::paginate(9);

        return Redirect::to("/search_result_list?business_name={$business_name}");
    }

    public function search_result_list(Request $request)
    {
        $data['business_search'] = TblBusinessModel::where('business_name', 'LIKE', '%'.$request->business_name.'%')->get();
        
        return view('mvm.front.search_result', $data); 
    }

    public function business_info(Request $request)
    {
        $data['business_info'] = TblBusinessModel::where('business_id', '=', $request->business_id)->get();

        return view('mvm.front.business_info', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
