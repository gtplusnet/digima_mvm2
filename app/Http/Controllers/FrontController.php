<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblPaymentMethod;
use App\Models\TblBusinessModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblUserAccountModel;
use App\Models\TblBusinessOtherInfoModel;
use App\Models\Tbl_county;
use App\Models\Tbl_city;
use App\Models\Tbl_business;
use App\Models\Tbl_business_contact_person;
use App\Models\Tbl_user_account;
use App\Models\Tbl_business_hours;
use App\Models\Tbl_audio;
use App\Models\TblMembeshipModel;
use Session;
use Carbon\Carbon;
use Redirect;
use DB;
use Mail;

class FrontController extends Controller
{
    // public static function allow_logged_in_users_only()
    // {
    //     if(session("login") != true)
    //     {
    //       return Redirect::to("/login")->send();
    //     }
    // }

    // public static function allow_logged_out_users_only()
    // {
    //     if(session("login") == true)
    //     {
    //       return Redirect::to("/home")->send();
    //     }
    // }
    public function index()
    {
        $data['countyList'] = TblCountyModel::get();
        $data['cityList'] = TblCityModel::get();
        Session::forget("merchant_login");
        Session::forget("full_name");
        Session::forget("email");
        Session::forget("business_name");
        Session::forget("business_id");
        Session::forget("business_contact_person_id");
        Session::forget("business_address");
        Session::forget("city_state");
        Session::forget("zip_code");

        $data["_business_list"] = TblBusinessModel::paginate(9);

        return view('front.pages.home',$data);
    }

    public function registration()
    {

        $data['county_list'] = TblCountyModel::get();
        // dd($data);
        $data['membership'] = TblMembeshipModel::get();
        $data['countyList'] = Tbl_county::get();
        return view('front.pages.registration', $data);
    }
    public function redirect_deactivated()
    {
        return view('front.pages.deactivated_account');
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
            $businessData->membership = $request->membership;
            $businessData->business_status = '1';
            $businessData->agent_call_date = '';
            $businessData->date_transact = date("Y/m/d");
            $businessData->date_created = date("Y/m/d");

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
            $accountData->user_password =  password_hash($request->password, PASSWORD_DEFAULT);
            $accountData->user_category = 'merchant';
            $accountData->status = 'registered';
            $accountData->string_password = $request->password;
            $accountData->business_id = $businessData->business_id;
            $accountData->business_contact_person_id = $contactData->business_contact_person_id;
            $accountData->save();

            $otherData = new TblBusinessOtherInfoModel;
            $otherData->business_other_info_id = '';
            $otherData->company_information = 'none';
            $otherData->business_website = 'none';
            $otherData->year_established = 'none';
            $otherData->company_profile = '';
            $otherData->business_id = $businessData->business_id;
            $otherData->save();

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

     //    else
     //    {
	    //     $business_data = new TblBusinessModel;
	    //     $business_data->business_id = '';
	    //     $business_data->business_name = $request->business_name;
	    //     $business_data->city_id = $request->city_list;
	    //     $business_data->business_complete_address = $request->business_address;
	    //     $business_data->business_phone = $request->primary_business_phone;
	    //     $business_data->business_alt_phone = $request->secondary_business_phone;
	    //     $business_data->business_fax = $request->fax_number;
	    //     $business_data->facebook_url = $request->facebook_url;
	    //     $business_data->twitter_url = $request->twitter_username;
     //        $business_data->membership = $request->membership;
     //        // $business_data->date_created = Carbon::now();
     //        $business_data->date_created = date("Y/m/d");
     //        $business_data->save();

	    //     $contact_data = new TblBusinessContactPersonModel;
	    //     $contact_data->business_contact_person_id = '';
	    //     $contact_data->contact_prefix = $request->prefix;
	    //     $contact_data->contact_first_name = $request->first_name;
	    //     $contact_data->contact_last_name = $request->last_name;
	    //     $contact_data->business_id = $business_data->business_id;
     //        $contact_data->save();


     //        $account_data = new TblUserAccountModel;
     //        $account_data->user_email = $request->email;
     //        $account_data->user_password = password_hash($request->password, PASSWORD_DEFAULT);
     //        $account_data->user_category = 'merchant';
     //        $account_data->status = 'registered';
     //        $account_data->business_id = $business_data->business_id;
     //        $account_data->business_contact_person_id = $contact_data->business_contact_person_id;
     //        $account_data->save();
  
    	// }
	}
    //   public function payment()
    // {
    //     $data['page']   = 'payment';
    //     return view('front.pages.payment', $data);
    // }

   

    public function businessSearch(Request $request)
    {
        return Redirect::to("/search-business-result?businessKeyword=$request->businessKeyword&countyId=$request->countyDropdown&cityId=$request->cityDropdown");
    }

    public function businessSearchResult(Request $request)
    {
        $data['businessKeyword'] = $businessKeyword = $request->businessKeyword;
        $data['countyID'] = $countyID = $request->countyId;
        $data['cityID'] = $cityID = $request->cityId;
        // $data['businessResult'] = TblBusinessModel::where('business_name', 'like', '%'.$businessKeyword.'%')->where('county_id', $countyID)->where('city_id',$cityID)->get();
        $data['businessResult'] = TblBusinessModel::where('business_name', 'like', '%'.$businessKeyword.'%')->where('county_id', $countyID)->get();
        $data["_business_list"] = TblBusinessModel::paginate(9);
        $data['countyList'] = TblCountyModel::get();
        return view('front.pages.searchresult',$data); 
    }

    public function business_details(Request $request)
    {
        $address = '1700 Parañaque City Philippines';
        $data['coordinates']  = Self::getCoordinates_long($address);
        $data['coordinates1'] = Self::getCoordinates_lat($address);
        return view('front.pages.business_details',$data); 
    }
    function getCoordinates_long($address){
        $address = str_replace(" ", "+", $address); 
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
        $response = file_get_contents($url);
        $json = json_decode($response,TRUE); 
        $lat = $json['results'][0]['geometry']['location']['lat'];
        $long = $json['results'][0]['geometry']['location']['lng'];
        return $long;
    }
    function getCoordinates_lat($address){
        $address = str_replace(" ", "+", $address); 
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
        $response = file_get_contents($url);
        $json = json_decode($response,TRUE); 
        $lat = $json['results'][0]['geometry']['location']['lat'];
        return $lat;
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

    public function business_info(Request $request)
    {
        $data['business_info'] = DB::table('tbl_business')
        ->join('tbl_user_account', 'tbl_business.business_id', '=', 'tbl_user_account.business_id')
        ->where('tbl_business.business_id', '=', $request->business_id)
        ->get();
        return view('front.pages.business', $data); 
    }

    public function about()
    {
        $data['page']   = 'About';
        $data['countyList'] = TblCountyModel::get();
        return view('front.pages.about', $data);
    }
    public function contact()
    {
        $data['page']   = 'Contact';
        $data['countyList'] = TblCountyModel::get();
        return view('front.pages.contact', $data);

    }
    public function contact_send(Request $request)
    {
        $contact_name= $request->name;
        $contact_email_add = $request->email_add;
        $contact_subject = $request->subject;
        $contact_help_message = $request->help_message;
        $date=date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));

        $data = array('name'=>$contact_name,'email_add'=>$contact_email_add,'subject'=>$contact_subject,'help_message'=>$contact_help_message,'date'=>$date);
        $check_mail = Mail::send('front.pages.merchant_sending_email', $data, function($message) {
         $message->to('guardians35836@gmail.com', 'Croatia Team')->subject
            ('THE RIGHT PLACE FOR BUSINESS');
         $message->from('guardians35836@gmail.com','Croatia Customer');
        });
        if($check_mail)
        {
            Session::flash('success', 'Thank you!. Your Message Send Successfully!');
            return Redirect::to('/contact');
        }
        else
        {
            Session::flash('error', 'Sorry!. Network error, Transaction Fail!');
            return Redirect::to('/contact');
        }
    }
    
    public function business(Request $request)
    {
        $data['page']   = 'business';
         $data['business_info'] = DB::table('tbl_business')
        ->join('tbl_user_account', 'tbl_business.business_id', '=', 'tbl_user_account.business_id')
        ->where('tbl_business.business_id', '=', $request->business_id)
        ->get();
        return view('front.pages.business', $data);
    }
    public function admin()
    {
        $data['page']   = 'generaladmin';
        return view('generaladmin');
    }

    public function sampleUpload() {
        return view('practice-page.upload');
    }

    //UPLOAD FILE SAMPLE
    public function uploadFile(Request $request) {
        $file = $request->file("file");
        if ($file == "") {
            echo "File is empty.";
        }
        else if($file->getClientOriginalExtension() != "mp3") {
            echo "File is not an audio, please select audio file.";
        }
        else {
            $file->move('uploads', $file->getClientOriginalName());
            $audioInfo = new Tbl_audio;
            $audioInfo ->audio_name = $file->getClientOriginalName();
            $audioInfo->audio_path = '/uploads/'.$file->getClientOriginalName().'';
            $audioInfo->save();
        }
    }
}
