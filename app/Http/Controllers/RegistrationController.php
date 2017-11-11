<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblBusinessModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblUserAccountModel;
use Carbon\Carbon;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

   /* public function registration()
    {
        $data['county_list'] = TblCountyModel::get();

        return view('mvm.front.registration', $data);
    }
*/
    public function get_city(Request $request)
    {
        $county_id = $request->county_id;

        $city_list = TblCityModel::where('county_id','=',$county_id)->get();

        $county_name = TblCountyModel::select('county_name')->where('county_id','=',$county_id)->first();

        $city_dropdown_output = '';

        $city_dropdown_output .= '<option value="--Select City--">--Select City for '.$county_name->county_name.'--</option>';

        foreach($city_list as $city_list)
        {
            $city_dropdown_output .= '<option value="'.$city_list->city_id.'">'.$city_list->city_name.'</option>';
        }

        return $city_dropdown_output;
    }

    public function get_zip_code(Request $request)
    {
        $city_id = $request->city_id;

        $postal_code = TblCityModel::select('postal_code')->where('city_id','=',$city_id)->first();

        return $postal_code->postal_code;
    }


    public function register_business(Request $request)
    {
        $check_email_availability = TblUserAccountModel::select('user_email')->where('user_email','=',$request->email)->first();

        if(count($check_email_availability) == 1)
        {
            echo 'Email has already been used.';
        }
        else
        {
            $business_data = new TblBusinessModel;
            $business_data->business_id = '';
            $business_data->business_name = $request->business_name;
            $business_data->city_id = $request->city_list;
            $business_data->business_complete_address = $request->business_address;
            $business_data->business_phone = $request->primary_business_phone;
            $business_data->business_alt_phone = $request->secondary_business_phone;
            $business_data->business_fax = $request->fax_number;
            $business_data->facebook_url = $request->facebook_url;
            $business_data->twitter_url = $request->twitter_username;
            $business_data->date_created = Carbon::now();

            $business_data->save();

            $contact_data = new TblBusinessContactPersonModel;
            $contact_data->business_contact_person_id = '';
            $contact_data->contact_prefix = $request->prefix;
            $contact_data->contact_first_name = $request->first_name;
            $contact_data->contact_last_name = $request->last_name;
            $contact_data->business_id = $business_data->business_id;

            $contact_data->save();

            $account_data = new TblUserAccountModel;
            $account_data->user_email = $request->email;
            $account_data->user_password = $request->password;
            $account_data->user_category = 'merchant';
            $account_data->status = 2;
            $account_data->business_id = $business_data->business_id;
            $account_data->business_contact_person_id = $contact_data->business_contact_person_id;

            $account_data->save();

            echo 'Registered successfully ! But your account is pending.';
        }   
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
