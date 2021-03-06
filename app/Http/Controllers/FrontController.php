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
use App\Models\TblPaymentModel;

use Session;
use Carbon\Carbon;
use Redirect;
use DB;
use Mail;
use Crypt;

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
        $data['contact_us']         = TblContactUs::first();
        $data['cityList']           = TblCityModel::get();
        $data['_membership']        = TblMembeshipModel::where('archived',0)->get();
        $data["_business_list"]     = TblBusinessModel::BusinessFront(5,1)->paginate(9);
        $data["_featured_list"]     = TblBusinessModel::BusinessFront(5,1)->get();
        $data["_free_list"]         = TblBusinessModel::BusinessFront(6,9)
                                                      ->paginate(10);
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['_categories']        = TblBusinessCategoryModel::where('archived',0)->where('parent_id',0)->get();

        $data['_most_viewed']       = TblReportsModel::BusinessFront(5,1)->get();
        return view('front.pages.home',$data);

    }
    public function mob_category()
    {
        Self::allow_logged_out_users_only();
        
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['contact_us']         = TblContactUs::first();
        $data['cityList']           = TblCityModel::get();
        $data['_membership']        = TblMembeshipModel::where('archived',0)->get();
        $data["_business_list"]     = TblBusinessModel::BusinessFront(5,1)->paginate(9);
        $data["_featured_list"]     = TblBusinessModel::BusinessFront(5,1)->get();
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['_categories']        = TblBusinessCategoryModel::where('archived',0)->where('parent_id',0)->get();

        $data['_most_viewed']       = TblReportsModel::BusinessFront(5,1)->get();
        
        return view('front.pages.mob_category', $data);
    }
    public function mob_category_get_sub_category(Request $request)
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
        $data['_categories_list']   = TblBusinessCategoryModel::where('parent_id',0)->where('archived',0)->get();
        $data['_membership']        = TblMembeshipModel::where('archived',0)->get();
        $data["_business_list"]     = TblBusinessTagCategoryModel::BusinessFront($request->parent_id)->paginate(9);
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['_categories_list']   = TblBusinessCategoryModel::where('parent_id',0)->where('archived',0)->get();
        $data["_featured_list"]     = TblBusinessModel::BusinessFront(5,1)->get();
        $data['_categories']        = TblBusinessCategoryModel::where('parent_id',$request->parent_id)->get();
        $data['_most_viewed']       = TblReportsModel::BusinessFront(5,1)->get();
        
        return view("front.pages.mob_category_filtered_list",$data);

    }
    public function registration()
    {
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['_membership']        = TblMembeshipModel::where('archived',0)->where('archived',0)->limit(2)->get();
        $data['contact_us']         = TblContactUs::first();
        $data['terms']              = TblTerms::first();
        
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
        $data['_categories_list']   = TblBusinessCategoryModel::where('parent_id',0)->where('archived',0)->get();
        $data['_membership']        = TblMembeshipModel::where('archived',0)->get();
        $data["_business_list"]     = TblBusinessTagCategoryModel::BusinessFront($request->parent_id)->paginate(9);
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['_categories_list']   = TblBusinessCategoryModel::where('parent_id',0)->where('archived',0)->get();

        $data["_featured_list"]     = TblBusinessModel::BusinessFront(5,1)->get();
        $data['_categories']        = TblBusinessCategoryModel::where('parent_id',$request->parent_id)->get();
        $data['_most_viewed']       = TblReportsModel::BusinessFront(5,1)->get();
        
        return view("front.pages.show_list",$data);

    }
    public function redirect_deactivated()
    {
        $data['index']              = 'deactivated';
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        return view('front.pages.success',$data);
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
                return response()->json(['status' => 'used', 'message' => 'E-pošta je već korištena.']); 
            }
            elseif(count($phoneAvailability) != 0)
            {
                return response()->json(['status' => 'used', 'message' => 'Primarni ili sekundarni telefon već je korišten.']); 
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
            $businessData->user_call_date = '';
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
            $accountData->user_password =  Crypt::encrypt($request->password);
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
                array('days' => 'Ponedjeljak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Utorak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Srijeda', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Četvrtak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Petak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Subota', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Nedjelja', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
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
        $data['businessKeyword'] = $businessKeyword = $request->businessKeyword;
        $data['countyID']        = $countyID = $request->countyId;
        $data['postal_code']     = $postalCode = $request->cityOrpostalCode;
        $data['_businessResult'] = TblBusinessModel::selectRaw('*, tbl_business.business_id as orig_business_id')
                                                   ->where("business_status", '!=',6)
                                                   ->where("membership", '!=',9);
        if($postalCode)
        {
            $data['_businessResult'] = $data['_businessResult']->Business($businessKeyword, $postalCode);  
        }
        else
        {
            $data['_businessResult'] = $data['_businessResult']->Business($businessKeyword);  
        }
        if($countyID)
        {
            
            $data['_businessResult'] = $data['_businessResult']->where('tbl_business.county_id',$countyID);  
        }
        $data['_businessResult'] = $data['_businessResult']->groupBy('tbl_business.business_id')
                                                            ->orderBy('tbl_business.membership','DESC')
                                                            ->paginate(9);
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['contact_us']         = TblContactUs::first();
        $data['cityList']           = TblCityModel::get();
        $data['_membership']        = TblMembeshipModel::where('archived',0)->get();
        $data["_business_list"]     = TblBusinessModel::BusinessFront(5,1)->paginate(9);
        $data["_featured_list"]     = TblBusinessModel::BusinessFront(5,1)->get();
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        
        $data['_categories']        = TblBusinessCategoryModel::where('archived',0)->where('parent_id',0)->get();
        $data['_most_viewed']       = TblReportsModel::BusinessFront(5,1)->get();
        $data["_free_list"]         = TblBusinessModel::BusinessFront(6,9)
                                                      ->paginate(10);
//arcy
        return view('front.pages.searchresult',$data); 
    }
    public function business(Request $request,$id)
    {
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['contact_us']         = TblContactUs::first();
        $data['page']               = 'business';
        $data['business_id']        = $id;

        $check = TblReportsModel::where('business_id',$id)->whereMonth('report_date', '=', date('m'))->first();

        if($check)
        {
            if($check->business_views%10==0)
            {
                $update['business_views']   = $check->business_views + 5;
                
            }
            else
            {
                $update['business_views']   = $check->business_views + 1;
            }
            TblReportsModel::where('report_id',$check->report_id)->update($update);
        }
        else
        {
            $insert['business_id']      = $id;
            $insert['business_views']   = '1';
            $insert['report_date']      = date('Y-m-d');
            TblReportsModel::insert($insert);   
        }
        $data["business_info"] = TblBusinessModel::where('tbl_business.business_id', $id)->BusinessInfo()->first();

        $address = $data['business_info']->postal_code." ".$data['business_info']->city_name." ".$data['business_info']->county_name;
        $location                       = Self::getCoordinates_location($data["business_info"]->business_complete_address);
        $data['coordinates']            = $location['long'];
        $data['coordinates1']           = $location['lat'];

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
      return "<div class='alert alert-success'><strong>Uspjeh!</strong> Poruka je poslana.</div>";
    }
    public static function getCoordinates_location($address)
    {
        $api                = "AIzaSyCP2EwPxHUeJWibOlD1dUH8iShXjtW6aco";
        $address            = str_replace(" ", "+", $address); 
        $url                = "https://maps.google.com/maps/api/geocode/json?sensor=false&address=".$address."&key=".$api;
        $response           = file_get_contents($url);
        $json               = json_decode($response,TRUE); 
   
        if (isset($json['status']) && ($json['status'] == 'OK')) 
        {
            $location['lat'] = $json['results'][0]['geometry']['location']['lat']; // Latitude
            $location['long']= $json['results'][0]['geometry']['location']['lng']; // Longitude
        }
        else
        {
            $location['lat'] = 45.815399; // Latitude
            $location['long']= 15.966568; // Longitude
        }
        return $location;
    }
    

    public function success()
    {
        $data['index']          = 'register';
        $data['_mob_categories']= TblBusinessCategoryModel::all();
        $data['countyList']     = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['contact_us']     = TblContactUs::first();
        $data['thank_you']      = TblThankYou::first();
        return view('front.pages.success',$data);
    }

    

    public function about()
    {
        $data['page']               = 'About';
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['_about_us']          = TblAboutUs::first();
        $data['contact_us']         = TblContactUs::first();
        return view('front.pages.about', $data);
    }
    public function contact()
    {
        $data['page']               = 'Contact';
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['contact_us']         = TblContactUs::first();
        return view('front.pages.contact', $data);

    }
    public function contact_send(Request $request)
    {
        $data['index']          = "register";
        $contact_name           = $request->name;
        $contact_email_add      = $request->email_add;
        $contact_subject        = $request->subject;
        $contact_help_message   = $request->help_message;
        $date                   = date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));

        $contact = TblContactUs::first();
        $contacts = $contact->email; 

        $data                   =   array('name'=>$contact_name,'email_to'=>$contacts,'email_add'=>$contact_email_add,'subject'=>$contact_subject,'help_message'=>$contact_help_message,'date'=>$date);
        $check_mail             =   Mail::send('front.pages.merchant_sending_email', $data, function($message) use ($data) {
                                        $message->to($data['email_to'], 'Zute Stranice')->subject('THE RIGHT PLACE FOR BUSINESS');
                                        $message->from('guardians35836@gmail.com','Zute Stranice');
                                    });
        $data['guest_messages'] = TblBusinessContactPersonModel::get(); 
        if($check_mail)
        {
            Session::flash('success', 'Uspjeh! Poruka je poslana.');
            return Redirect::to('/contact');
        }
        else
        {
            Session::flash('error', 'Žao mi je!. Pogreška mreže, transakcija nije uspjela!');
            return Redirect::to('/contact');
        }
    }
    public function payment()
    {
        $data['page']             = 'payment';
        $data['_mob_categories']  = TblBusinessCategoryModel::all();
        $data['countyList']       = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['method']           = TblPaymentMethod::where('archived',0)->get();
        $check                    = TblPaymentModel::where('business_id',session('business_id'))->first();
        if($check)
        {
            return Redirect::to('/merchant/redirect/exist');
        }
        else
        {
          $data['method']           = TblPaymentMethod::where('archived',0)->get();
          $data['_mob_categories']  = TblBusinessCategoryModel::all();
          $data['countyList']       = TblCountyModel::orderBy('county_name','ASC')->get();
          $data["merchant_info"]    = TblBusinessModel::where('tbl_business.business_id', session('business_id'))
                                    ->BusinessAdmin()
                                    ->leftjoin('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                                    ->leftjoin('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                                    ->leftjoin('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                                    ->first();  
          return view('front.pages.payment_merchant', $data);
        }
    }
    public function upload_payment(Request $request)
    {
        TblPaymentModel::where('business_contact_person_id',$request->contact_id)->where('business_id',$request->business_id)->where('payment_status','submitted')->delete();
        
        $file = $request->file('payment_file_name');
        $link = $request->link;
        if($file==null||$file=='')
        {
          $data['payment_reference_number']   = $request->payment_reference_number;
          $data['payment_amount']             = $request->payment_amount;
          $data['payment_method']             = $request->payment_method;
          $data['payment_file_name']          = 'Image Not Available';
          $data['business_contact_person_id'] = $request->contact_id;
          $data['business_id']                = $request->business_id;
          $data['payment_status']             = 'submitted';
          $check_insert = TblPaymentModel::insert($data);
          if($check_insert)
          {
            Session::flash('sucess_payment',$link );
            return Redirect::to('/merchant/redirect/exist');
          }
           else
          {
            echo "Failed to Upload";
          }
        }
        else
        {
          $filename         = '/payment_upload/'.uniqid().$file->getClientOriginalName();
          $file_ext         = $file->getClientOriginalExtension();
          $destinationPath  = public_path('/payment_upload');
          $check            = $file->move($destinationPath, $filename);   
            if($check)
            {
              $data['payment_reference_number']   = $request->payment_reference_number;
              $data['payment_amount']             = $request->payment_amount;
              $data['payment_method']             = $request->payment_method;
              $data['payment_file_name']          = $filename;
              $data['business_contact_person_id'] = $request->contact_id;
              $data['business_id']                = $request->business_id;
              $data['payment_status']             = 'submitted';
              $check_insert = TblPaymentModel::insert($data);
              if($check_insert)
              {
                Session::flash('sucess_payment',$link);
                return Redirect::to('/merchant/redirect/exist');
              }
               else
              {
                echo "Failed to Upload";
              }
            }
        }
    }

    public function payment_merchant(Request $request,$id)
    {
        $data['method']         = TblPaymentMethod::where('archived',0)->get();
        $data['_mob_categories']= TblBusinessCategoryModel::all();
        $data['countyList']     = TblCountyModel::orderBy('county_name','ASC')->get();
        $data["merchant_info"]  = TblBusinessModel::where('tbl_business.business_id', $id)
                                ->BusinessAdmin()
                                ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                                ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                                ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                                ->where('tbl_invoice.invoice_status','!=','paid')
                                ->first();
        return view('front.pages.payment_merchant', $data);
    }
    public function merchant_redirect()
    {
        $data['index']            = "unpaid";
        $data['_mob_categories']  = TblBusinessCategoryModel::all();
        $data['countyList']       = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['contact_us']       = TblContactUs::first();

        return view ('front.pages.success',$data);
    }

    public function merchant_redirect_exist()
    {
        $data['index'] = 'redirect_exist';
        $data['_mob_categories']  = TblBusinessCategoryModel::all();
        $data['countyList']       = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['contact_us']       = TblContactUs::first();
        return view('front.pages.success',$data);
    }
}
