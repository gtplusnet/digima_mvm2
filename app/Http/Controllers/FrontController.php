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
use App\Models\TblGuestMessages;
use App\Models\TblBusinessCategoryModel;
use App\Models\TblReportsModel;
use App\Models\TblABusinessPaymentMethodModel;
use App\Models\TblBusinessHoursmodels;
use App\Models\TblBusinessImages;
use App\Models\TblPasswordResetModel;
use App\Models\TblBusinessTagCategoryModel;
use App\Models\TblAboutUs;
use App\Models\TblContactUs;
use App\Models\TblTerms;
use App\Models\TblThankYou;
use Session;
use Carbon\Carbon;
use Redirect;
use DB;
use Mail;

class FrontController extends Controller
{
    public static function allow_logged_in_users_only()
    {
        if(session("merchant_login") != true)
        {
          return Redirect::to("/login")->send();
        }
    }

    public static function allow_logged_out_users_only()
    {
        if(session("merchant_login") == true)
        {
          return Redirect::to("/merchant/dashboard")->send();
        }
    }
    
    public function index()
    {
        Self::allow_logged_out_users_only();
        
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
         $data['contact_us']           = TblContactUs::first();
        $data['cityList']           = TblCityModel::get();
        $data['_membership']        = TblMembeshipModel::get();
        $data["_business_list"]     = TblBusinessModel:: where('business_status',5)->where('membership',1)
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_business.business_name','ASC')
                                    ->groupBy('tbl_business.business_id')
                                    ->paginate(9);
        $data["_featured_list"]     = TblBusinessModel::where('membership',1)->where('business_status',5) 
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_business.business_name','DESC')
                                    ->groupBy('tbl_business.business_id')
                                    ->get();
        $data['_categories']        = TblBusinessCategoryModel::where('parent_id',0)->get();
        $data['_most_viewed']       = TblReportsModel::join('tbl_business','tbl_business.business_id','=','tbl_reports.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_reports.business_views','ASC')
                                    ->groupBy('tbl_business.business_id')
                                    ->limit(4)
                                    ->get();
        return view('front.pages.home',$data);

    }
    public function registration()
    {

        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['membership']         = TblMembeshipModel::get();
        $data['_membership']        = TblMembeshipModel::get();
        $data['countyList']         = Tbl_county::get();
        $data['contact_us']           = TblContactUs::first();
        $data['terms']                = TblTerms::first();
        
        return view('front.pages.registration', $data);
    }
    public function get_sub_category(Request $request)
    {
        $check      = TblBusinessCategoryModel::where('business_category_id',$request->parent_id)->first();
        $cat        = array($check->business_category_name);
        $cat1       = array($check->business_category_id);
        if($check->parent_id!=0)
        {
            
            $check1         = TblBusinessCategoryModel::where('business_category_id',$check->parent_id)->first();
            $cat            = array( $check1->business_category_name,$check->business_category_name);
            $cat1           = array( $check1->business_category_id,$check->business_category_id);
                
            if($check1->parent_id!=0)
            {
                $check2     = TblBusinessCategoryModel::where('business_category_id',$check1->parent_id)->first();
                $cat        = array($check2->business_category_name,$check1->business_category_name,$check->business_category_name);
                $cat1       = array($check2->business_category_id,$check1->business_category_id,$check->business_category_id);
                 
                if($check2->parent_id)
                {
                    $check3 = TblBusinessCategoryModel::where('business_category_id',$check1->parent_id)->first();
                    $cat    = array($check3->business_category_name,$check2->business_category_name,$check1->business_category_name,$check->business_category_name );
                    $cat1   = array($check3->parent_id,$check2->parent_id,$check1->parent_id,$check->parent_id );
                    if($check2->parent_id)
                    {
                        $check4 = TblBusinessCategoryModel::where('business_category_id',$check1->parent_id)->first();
                        $cat    = array($check4->business_category_name,$check3->business_category_name,$check2->business_category_name,$check1->business_category_name,$check->business_category_name );
                        $cat1   = array($check4->parent_id,$check3->parent_id,$check2->parent_id,$check1->parent_id,$check->parent_id );
                    }
                    else
                    {

                    }
                }
                else
                {
                   
                }
            }
            else
            {
               
            }
        }
        else
        {
          
        }
        $data['value']              = $cat1;
        $data['_filtered']          = $cat;
        $data['_categories_list']   = TblBusinessCategoryModel::where('parent_id',0)->get();
        $data['_membership']        = TblMembeshipModel::get();
        $data["_business_list"]     = TblBusinessTagCategoryModel::where('tbl_business.membership',1)->where('business_category_id',$request->parent_id)->where('business_status',5)
                                    ->join('tbl_business','tbl_business.business_id','=','tbl_business_tag_category.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                    ->groupBy('tbl_business.business_id')
                                    ->orderBy('tbl_business.membership',"ASC")
                                    ->paginate(9);
        $data['_categories_list']   = TblBusinessCategoryModel::where('parent_id',0)
                                    ->get();

        $data["_featured_list"]     = TblBusinessModel::where('tbl_business.membership',1)->where('business_status',5)  
                                    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->groupBy('tbl_business.business_id')
                                    ->get();
        $data['_categories']        = TblBusinessCategoryModel::where('parent_id',$request->parent_id)->get();
        $data['_most_viewed']       = TblReportsModel::where('tbl_business.membership',1)->join('tbl_business','tbl_business.business_id','=','tbl_reports.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_reports.business_views','DESC')
                                    ->limit(4)
                                    ->get();
        
        return view("front.pages.show_list",$data);

    }
    public function redirect_deactivated()
    {
        return view('front.pages.deactivated_account');
    }

    public function getCity(Request $request)
    {
        if($request->ajax())
        {
            $cityList               = Tbl_city::getCity($request->countyId)->get();
            $cityOutputList         = '';
            $cityOutputList         .= '<option value="" disabled selected>--City--</option>';
            foreach($cityList as $cityListItem)
            {
                $cityOutputList     .= '<option value="'.$cityListItem->city_id.'">'.$cityListItem->city_name.'</option>';
            }
            return response()->json(['html' => $cityOutputList]);
        }
    }

    public function getPostalCode(Request $request)
    {

        if($request->ajax())
        {
             $postalCode = Tbl_city::getPostalCode($request->cityId)->first();
             return response()->json($postalCode->postal_code);  
        }
    }

    public function registerBusiness(Request $request)
    {
        if($request->ajax())
        {
            $emailAvailability = Tbl_user_account::checkEmail($request->emailAddress)->first();
            $phoneAvailability = TblBusinessModel::checkPhone($request->primaryPhone,$request->alternatePhone)->first();
            if(count($emailAvailability) == 1)
            {
                return response()->json(['status' => 'used', 'message' => 'Email has already been used.']); 
            }
            elseif(count($phoneAvailability) != 0)
            {
                return response()->json(['status' => 'used', 'message' => 'Primary or Secondary Phone has already been used.']); 
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
            $accountData->string_password = "none";
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

	}
    public function businessSearch(Request $request)
    {
        return Redirect::to("/search-business-result?businessKeyword=$request->businessKeyword&countyId=$request->countyDropdown&cityOrpostalCode=$request->postalCode");
    }

    public function businessSearchResult(Request $request)
    {
        $data['contact_us']           = TblContactUs::first();
        $data['businessKeyword'] = $businessKeyword = $request->businessKeyword;
        $data['countyID'] = $countyID = $request->countyId;
        $data['postal_code'] = $postalCode = $request->cityOrpostalCode;
        if($postalCode=="")
        {
            
            $data['_businessResult'] = TblBusinessModel::where('tbl_business.county_id',$countyID)->Business($businessKeyword)
                                    ->groupBy('tbl_business.business_id')
                                    ->orderBy('tbl_business.membership','DESC')
                                    ->paginate(9);  
        }
        else
        {
            
            $data['_businessResult'] = TblBusinessModel::where('tbl_business.county_id',$countyID)->Businesses($businessKeyword,$postalCode)
                                    ->groupBy('tbl_business.business_id')
                                    ->orderBy('tbl_business.membership','DESC')
                                    ->paginate(9);  
        }
        $data['countyList']         = TblCountyModel::get();
        $data['cityList']           = TblCityModel::get();
        $data['_membership']        = TblMembeshipModel::get();
        $data["_business_list"]     = TblBusinessModel:: where('business_status',5)
                                    ->groupBy('tbl_business.business_id')
                                    ->orderBy('tbl_business.membership','ASC')
                                    ->paginate(9);
        $data["_featured_list"]     = TblBusinessModel::where('membership',2)->where('business_status',5)  
                                    ->groupBy('tbl_business.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->get();
        $data['_categories']        = TblBusinessCategoryModel::where('parent_id',0)->get();
        $data['_most_viewed']       = TblReportsModel::join('tbl_business','tbl_business.business_id','=','tbl_reports.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_reports.business_views','DESC')
                                    ->limit(4)
                                    ->get();
        return view('front.pages.searchresult',$data); 
    }
    public function business(Request $request,$id)
    {
        $data['contact_us']     = TblContactUs::first();
        $data['page']           = 'business';
        $data['countyList']     = TblCountyModel::get();
        $data['business_id']    = $id;

        $check = TblReportsModel::where('business_id',$id)->first();
        if($check)
        {
            $update['business_id']      = $id;
            $update['business_views']   = $check->business_views + 1;
            TblReportsModel::where('business_id',$id)->update($update);   
        }
        else
        {
            $insert['business_id']      = $id;
            $insert['business_views']   = '1';
            TblReportsModel::insert($insert);   
        }
        $data["business_info"] = TblBusinessModel::where('tbl_business.business_id', $id)
                               ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                               ->join('tbl_business_other_info','tbl_business_other_info.business_id','=','tbl_business.business_id')
                               ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                               ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                               ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                               ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                               ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                               ->first();

        $address = $data['business_info']->postal_code." ".$data['business_info']->city_name." ".$data['business_info']->county_name;
        $data['coordinates']            = Self::getCoordinates_long($address);
        $data['coordinates1']           = Self::getCoordinates_lat($address); 

        $data['_tag_category']          = TblBusinessTagCategoryModel::where('business_id',$id)
                                        ->join('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id')
                                        ->get();
        $images                         = TblBusinessImages::where('business_id',$id)->count();
            if($images==0)
            {
                $data['images']         = 0;
            }
            else
            {
                $data['images']         = 1;
                $data['_images']        = TblBusinessImages::where('business_id',$id)->first();
            }
            $data['_business_hours']    = TblBusinessHoursmodels::where('act','!=','yes')->where('business_id',$id)->get();
            $check_payment              = TblABusinessPaymentMethodModel::where('business_id',$id)->get();

            if($check_payment)
            {
                $data['_payment_method']=$check_payment;
            }
            else
            {
                $data['_payment_method']="";
            }
        return view('front.pages.business', $data);
    }
    public function add_messages(Request $request)
    { 
      $data["email"]             = $request->email;
      $data["subject"]           = $request->subject;
      $data["messages"]          = $request->messages;
      $data["business_id"]       = $request->business_id;

      TblGuestMessages::insert($data);;
      return "<div class='alert alert-success'><strong>Success!</strong> Message Sent.</div>";
    }

    

    public static function getCoordinates_long($address){
        $address        = str_replace(" ", "+", $address); 
        $url            = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=".$address;
        $response       = file_get_contents($url);
        $json           = json_decode($response,TRUE); 
        $long           = $json['results'][0]['geometry']['location']['lng'];
        return $long;
    }
    public static function getCoordinates_lat($address){
        $address        = str_replace(" ", "+", $address); 
        $url            = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=".$address;
        $response       = file_get_contents($url);
        $json           = json_decode($response,TRUE); 
        $lat            = $json['results'][0]['geometry']['location']['lat'];
        return $lat;
    }
    

    public function success()
    {
        $data['countyList']     = TblCountyModel::get();
        $data['contact_us']     = TblContactUs::first();
        $data['thank_you']      = TblThankYou::first();
        return view('front.pages.success',$data);
    }

    public function business_info(Request $request)
    {
        $data['countyList']     = TblCountyModel::get();
        $data['contact_us']           = TblContactUs::first();
        $data['business_info']  = DB::table('tbl_business')
                                ->join('tbl_user_account', 'tbl_business.business_id', '=', 'tbl_user_account.business_id')
                                ->where('tbl_business.business_id', '=', $request->business_id)
                                ->get();
        return view('front.pages.business', $data); 
    }

    public function about()
    {
        $data['page']           = 'About';
        $data['countyList']     = TblCountyModel::get();
        $data['_about_us']      = TblAboutUs::first();
         $data['contact_us']           = TblContactUs::first();
        return view('front.pages.about', $data);
    }
    public function contact()
    {
        $data['page']           = 'Contact';
        $data['countyList']     = TblCountyModel::get();
        $data['contact_us']     = TblContactUs::first();
        return view('front.pages.contact', $data);

    }
    public function contact_send(Request $request)
    {
        $contact_name           = $request->name;
        $contact_email_add      = $request->email_add;
        $contact_subject        = $request->subject;
        $contact_help_message   = $request->help_message;
        $date                   = date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));

        $data                   = array('name'=>$contact_name,'email_add'=>$contact_email_add,'subject'=>$contact_subject,'help_message'=>$contact_help_message,'date'=>$date);
        $check_mail             = Mail::send('front.pages.merchant_sending_email', $data, function($message) {
                                  $message->to('guardians35836@gmail.com', 'Croatia Team')->subject
                                    ('THE RIGHT PLACE FOR BUSINESS');
                                  $message->from('guardians35836@gmail.com','Croatia Customer');
        });
        $data['guest_messages'] = TblBusinessContactPersonModel::get(); 
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

    public function admin()
    {
        $data['page']                 = 'generaladmin';
        $data['contact_us']           = TblContactUs::first();
        return view('generaladmin');
    }

    public function sampleUpload() {
        return view('practice-page.upload');
    }
    //UPLOAD FILE SAMPLE
    public function uploadFile(Request $request) {
        $file = $request->file("file");
        if ($file == "") 
        {
            echo "File is empty.";
        }
        else if($file->getClientOriginalExtension() != "mp3") 
        {
            echo "File is not an audio, please select audio file.";
        }
        else 
        {
            $file->move('uploads', $file->getClientOriginalName());
            $audioInfo = new Tbl_audio;
            $audioInfo ->audio_name = $file->getClientOriginalName();
            $audioInfo->audio_path = '/uploads/'.$file->getClientOriginalName().'';
            $audioInfo->save();
        }
    }
}
