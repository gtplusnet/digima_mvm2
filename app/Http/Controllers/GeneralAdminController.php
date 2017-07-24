<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessModel;
use DB;

class GeneralAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["all_business"] = TblBusinessModel::get();

        $data["business_list"] = DB::table('tbl_business')->join('tbl_user_account', 'tbl_business.business_id', '=', 'tbl_user_account.business_id')->paginate(5);

        $data["business_count"] = count($data["all_business"]);

        return view('general_admin.dashboard', $data);
    }

    public function search_business_general_admin(Request $request)
    {
        $business_name = $request->search_business_txt;

        $business_search = DB::table('tbl_business')->join('tbl_user_account', 'tbl_business.business_id', '=', 'tbl_user_account.business_id')->where('tbl_business.business_name', 'LIKE', '%'.$business_name.'%')->paginate(5)->appends('business_name', $business_name);

        $business_list_output = '';

        foreach($business_search as $business_result_item)
        {
            if($business_result_item->status == 1)
            {
                $status_result = "Activated";
            }
            else if($business_result_item->status == 2)
            {
                $status_result = "Not Activated";
            }
            else 
            {
                $status_result = "Disabled";
            }

            $business_list_output .= '
                <tr>
                    <td>'.$business_result_item->business_id.'</td>
                    <td>'.$business_result_item->business_name.'</td>
                    <td>'.$business_result_item->date_created.'</td>
                    <td><a href="#">View</a></td>
                    <td>'.$status_result.'</td>
                </tr>
            ';

            $business_result_array = array("html" => $business_list_output);
        }

        echo json_encode($business_result_array);
    }

    public function report()
    {
        
        return view('general_admin.report');
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
