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
use App\Models\Tbl_business_hours;
use Carbon\Carbon;
use Redirect;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $countyList = TblCountyModel::get();
        return view('front.pages.home', compact('countyList'));
    }

    public function registration()
    {
        $countyList = TblCountyModel::get();
        return view('front.pages.registration', compact('countyList'));
    }

    public function getCity(Request $request)
    {
        $cityList = TblCityModel::getCity($request->countyId)->get();

        $cityOutputList = '';

        $cityOutputList .= '<option value="--City--" disabled selected>--City--</option>';

        foreach($cityList as $cityListItem)
        {
            $cityOutputList .= '<option value="'.$cityListItem->city_id.'">'.$cityListItem->city_name.'</option>';
        }

        return response()->json(['html' => $cityOutputList]);
    }

    public function getPostalCode(Request $request)
    {
        $postalCode = TblCityModel::getPostalCode($request->cityId)->first();

        return response()->json(['postalCode' => $postalCode->postal_code]);  
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
        return view('front.pages.success');
    }

    public function payment()
    {
        $data['page']   = 'payment';
        return view('front.pages.payment', $data);
    }

    public function register_business(Request $request)
    {
        $check_email_availability = TblUserAccountModel::select('user_email')->where('user_email','=',$request->email)->first();

        if(count($check_email_availability) == 1)
        {
            $check_email_array = array("status" => 'failed', "message" => 'Email has already been used.');
            echo json_encode($check_email_array);
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

        $business_hours_data = new Tbl_business_hours;

        $business_hours_data->insert(array(
            array('days' => 'Monday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
            'desc' => 'none', 'business_id' => $business_data->business_id),
            array('days' => 'Tuesday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
            'desc' => 'none', 'business_id' => $business_data->business_id),
            array('days' => 'Wednesday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
            'desc' => 'none', 'business_id' => $business_data->business_id),
            array('days' => 'Thursday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
            'desc' => 'none', 'business_id' => $business_data->business_id),
            array('days' => 'Friday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
            'desc' => 'none', 'business_id' => $business_data->business_id),
            array('days' => 'Saturday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
            'desc' => 'none', 'business_id' => $business_data->business_id),
            array('days' => 'Sunday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
            'desc' => 'none', 'business_id' => $business_data->business_id)
        ));
        
        $success_array = array("status" => 'success', "url" => '/success');
        echo json_encode($success_array);
        }   
    }

    public function search_result(Request $request)
    {
        $business_name = $request->business_name;

        return Redirect::to("/search_result_list?business_name={$business_name}");
    }

    public function search_result_list(Request $request)
    {
        $business_name = $request->business_name;
        $business_search = TblBusinessModel::where('business_name', 'LIKE', '%'.$business_name.'%')->paginate(5);

        return view('front.pages.searchresult', compact('business_search', 'business_name')); 
    }

    public function business_info(Request $request)
    {
        $data['business_info'] = DB::table('tbl_business')->join('tbl_user_account', 'tbl_business.business_id', '=', 'tbl_user_account.business_id')->where('tbl_business.business_id', '=', $request->business_id)->get();

        return view('front.pages.business', $data); 
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
