<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tbl_county;
use App\Models\Tbl_city;
use App\Models\Tbl_business;
use App\Models\Tbl_business_contact_person;
use App\Models\Tbl_user_account;
use App\Models\Tbl_business_hours;
use Carbon\Carbon;
use Redirect;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $countyList = Tbl_county::get();
        return view('front.pages.home', compact('countyList'));
    }

    public function registration()
    {
        $countyList = Tbl_county::get();
        return view('front.pages.registration', compact('countyList'));
    }

    public function getCity(Request $request)
    {
        if($request->ajax())
        {
            $cityList = Tbl_city::getCity($request->countyId)->get();
            $cityOutputList = '';
            $cityOutputList .= '<option value="" disabled selected>--City--</option>';
            foreach($cityList as $cityListItem)
            {
                $cityOutputList .= '<option value="'.$cityListItem->city_id.'">'.$cityListItem->city_name.'</option>';
            }
            return response()->json(['html' => $cityOutputList]);
        }
    }

    public function getPostalCode(Request $request)
    {
        if($request->ajax())
        {
             $postalCode = Tbl_city::getPostalCode($request->cityId)->first();
             return response()->json(['postalCode' => $postalCode->postal_code]);  
        }
    }

    public function registerBusiness(Request $request)
    {
        if($request->ajax())
        {
            $emailAvailability = Tbl_user_account::checkEmail($request->emailAddress)->first();
            if(count($emailAvailability) == 1)
            {
                return response()->json(['status' => 'used', 'message' => 'Email has already been used.']); 
            }
            else
            {
            $businessData = new Tbl_business;
            $businessData->business_id = '';
            $businessData->business_name = $request->businessName;
            $businessData->county_id = $request->countyDropdown;
            $businessData->city_id = $request->cityDropdown;
            $businessData->business_complete_address = $request->businessAddress;
            $businessData->business_phone = $request->primaryPhone;
            $businessData->business_alt_phone = $request->alternatePhone;
            $businessData->business_fax = $request->faxNumber;
            $businessData->facebook_url = $request->facebookUrl;
            $businessData->twitter_url = $request->twitterUsername;
            $businessData->date_created = Carbon::now();
            $businessData->save();

            $contactData = new Tbl_business_contact_person;
            $contactData->business_contact_person_id = '';
            $contactData->contact_prefix = $request->prefix;
            $contactData->contact_first_name = $request->firstName;
            $contactData->contact_last_name = $request->lastName;
            $contactData->business_id = $businessData->business_id;
            $contactData->save();

            $accountData = new Tbl_user_account;
            $accountData->user_email = $request->emailAddress;
            $accountData->user_password = $request->password;
            $accountData->user_category = 'merchant';
            $accountData->status = 2;
            $accountData->business_id = $businessData->business_id;
            $accountData->business_contact_person_id = $contactData->business_contact_person_id;
            $accountData->save();

            $businessHoursData = new Tbl_business_hours;
            $businessHoursData->insert(array(
                array('days' => 'Monday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Tuesday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Wednesday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Thursday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Friday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Saturday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Sunday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id)
            ));
            return response()->json(['status' => 'success', 'url' => '/success']); 
            } 
        }
    }

    public function businessSearch(Request $request)
    {
        return Redirect::to("/search-business-result?businessKeyword=$request->businessKeyword&countyId=$request->countyDropdown");
    }

    public function businessSearchResult(Request $request)
    {
        $businessKeyword = $request->businessKeyword;
        $businessResult = Tbl_business::searchBusinessResult($businessKeyword, $request->countyId)->paginate(5);
        return view('front.pages.searchresult', compact('businessResult', 'businessKeyword')); 
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
