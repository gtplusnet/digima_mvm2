<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessOtherInfoModel;
use App\Tbl_payment_method;
use App\Tbl_business_category;
use App\Models\TblUserAccountModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblPaymentMethod;
use App\Models\TblPaymentModel;
use App\Models\TblBusinessModel;
use App\Models\TblBusinessHoursmodels;
use App\Models\TblCountyModel;
use App\Models\TblGuestMessages;
use App\Models\Tbl_business_hours;
use App\Models\TblBusinessImages;
use App\Models\TblBusinessKeywordsModel;
use App\Models\TblBusinessCategoryModel;
use App\Models\TblBusinessSubCategoryModel;
use App\Models\TblBusinessTagCategoryModel;
use Redirect;
use insert;
use DB;
use Session;
use Input;
use flash;
use where;
use id;
use Crypt;


class MerchantController extends Controller
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
		if(session("merchant_login") )
		{
			return Redirect::to("/merchant/dashboard")->send();
		}
	}

	public function login()
    {
      	Self::allow_logged_out_users_only();
        $data['countyList'] = TblCountyModel::get();
        $data['page']   = 'login';
        Session::forget("merchant_login");
        return view('front.pages.login', $data);
    }
    public function login_submit(Request $request)
    {
        $validate_login = TblUserAccountModel::where('user_email',$request->email)->first();
                       
        if($validate_login)
        {
            if (password_verify($request->password, $validate_login->user_password)) 
                {
                   if($validate_login->status=="activated")
                   {
                    $user_info = TblBusinessContactPersonModel::where('business_contact_person_id',$validate_login->business_contact_person_id)
                                // ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id')
                                ->first();
                    // dd($user_info);

                    Session::put("merchant_login",true);
                    Session::put("business_id",$user_info->business_id);
                    Session::put("email",$validate_login->user_email);
                    Session::put("full_name",$user_info->contact_first_name." ".$user_info->contact_last_name);
                    $data['page']   = 'Dashboard';

                    return Redirect::to('/merchant/dashboard');
                   }
                   elseif($validate_login->status=="registered")
                   {
                    $user_info = TblUserAccountModel::where('user_account_id',$validate_login->user_account_id)
                                          ->join('tbl_business','tbl_business.business_id','=','tbl_user_account.business_id')
                                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                                          ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                                          ->join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')
                                          ->first();
                                          // dd($user_info);
                    Session::put("full_name",$user_info->contact_first_name." ".$user_info->contact_last_name);
                    Session::put("email",$user_info->user_email);
                    Session::put("business_name",$user_info->business_name);
                    Session::put("business_id",$user_info->business_id);
                    Session::put("business_contact_person_id",$user_info->business_contact_person_id);
                    Session::put("business_address",$user_info->business_complete_address);
                    Session::put("city_state",$user_info->city_name.", ".$user_info->county_name);
                    Session::put("zip_code",$user_info->postal_code);
                   
                    $data['page']   = 'Dashboard';

                    return Redirect::to('/merchant/redirect');
                   }
                   else
                   {
                     $data['page']   = 'Merchant Login';
                     return Redirect::to('/redirect');
                   }
                    
                }
            else
            {
                $data['page']   = 'Merchant Login';
                return Redirect::back()->withErrors(['User Login is Incorect!'.$request->email.$request->password, 'User Login is Incorect!']);
            }
        }
        else
        {
            $data['page']   = 'Merchant Login';
            return Redirect::back()->withErrors(['User Login is Incorect!'.$request->email.$request->password, 'User Login is Incorect!']);
      }
   }

   public function logout()
	 {
		  Session::forget("merchant_login");
      return Redirect::to("/login");
	 }

	 public function index()
	 {	
		Self::allow_logged_in_users_only();
        // $fb_page = '742953982442308'; 

        // $access_token = 'EAAD6rZBdEZBzABAIf5b2ZC4MNedpKRM1DC7XiUaqxkDSYBqxA8s4lutvB9az0BZBd3BhLPqDOZBwqxlbsuucm11rafaEaCIMRXFtPl9cdzcyUOZCdgQiHWU8N5TxJMz9K9WOiz4pE5hA7ivLJUIy1g9rjKHvarE4pQkWqFScBwBZAu9cXUhlfvWU57xuWNqSNsZD';

        // $url = "https://graph.facebook.com/v2.10/".$fb_page.'?fields=id,name,fan_count&access_token='.$access_token;
        // $curl = curl_init($url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // $result = curl_exec($curl);  
        // curl_close($curl);
        // $details = json_decode($result,true);

        // // dd($details);
        // $data['fb'] = $details['fan_count'];
        $data['fb']="526";
        $data['page']	= 'Dashboard';

		return view ('merchant.pages.dashboard', $data);	
		
	  }
    public function merchant_redirect()
    {
      $data['countyList'] = TblCountyModel::get();
      return view ('merchant.pages.merchant_redirect',$data);
    }

    public function merchant_redirect_exist()
    {
      $data['countyList'] = TblCountyModel::get();
       return view('merchant.pages.merchant_redirect_exist',$data);
    }

    public function payment()
    {
        $data['page']   = 'payment';
        $data['countyList'] = TblCountyModel::get();
        $data['method'] = TblPaymentMethod::get();
        $data['picture'] = TblPaymentModel::get();
        $check = TblPaymentModel::where('business_id',session('business_id'))->first();
        if($check)
        {
            return Redirect::to('/merchant/redirect/exist');
        }
        else
        {
            return view('front.pages.payment', $data);
        }
        

        // $account_data = new TblUserAccountModel;
        // $account_data->user_email = $request->email;
        // $account_data->user_password = $request->password;
        // $account_data->user_category = 'merchant';
        // $account_data->status = 2;
        // $account_data->business_id = $business_data->business_id;
        // $account_data->business_contact_person_id = $contact_data->business_contact_person_id;
        // $account_data->save();
        // echo 'Registered successfully ! But your account is pending.';
     }
    public function upload_payment(Request $request)
    {
          // dd($data);
          $file = $request->file('payment_file_name');
        if($file==null||$file=='')
          {
          echo "mag browse ka muna ng picture!!!" ; 
          }
    
        else
        {
          $filename='/payment_upload/'.uniqid().$file->getClientOriginalName();
          $file_ext = $file->getClientOriginalExtension();
          $destinationPath = public_path('/payment_upload');
          $check=$file->move($destinationPath, $filename);   
            if($check)
            {
              $data['payment_reference_number'] = $request->payment_reference_number;
              $data['payment_amount'] = $request->payment_amount;
              $data['payment_method'] = $request->payment_method;
              $data['payment_file_name'] = $filename;
              $data['business_contact_person_id'] = $request->contact_id;
              $data['business_id'] = $request->business_id;
              $data['payment_status'] = 'submitted';
              $check_insert = TblPaymentModel::insert($data);
          if($check_insert)
            {
              return Redirect::to('/merchant/redirect/exist');
            }
             else
            {
          echo "mali ka";
        }
       }
      }
    }
  public function payment_merchant(Request $request,$id)
  {
    $data['method'] = TblPaymentMethod::get();
    $data['countyList'] = TblCountyModel::get();
    $data["merchant_info"] = TblBusinessModel::where('tbl_business.business_id', $id)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                          ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                          ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                          ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                          ->first();

    return view('front.pages.payment_merchant', $data);
  }

	  public function profile()
	  {
		  Self::allow_logged_in_users_only();
		  $data['page']				     = 'Profile';
      $data['merchant_info']   = TblBusinessModel::where('business_id',session('business_id'))
                               ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                                ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id') 
                                ->first();
		  $data['_payment_method'] = Tbl_payment_method::get(); 
      $data['_other_info']     = TblBusinessOtherInfoModel::where('business_id',session('business_id'))->get();
      $data['_business_hours'] = TblBusinessHoursmodels::where('business_id',session('business_id'))->get();
      $data['_images']   = TblBusinessImages::where('business_id',session('business_id'))->get();
		  return view ('merchant.pages.profile', $data);		
	  }

	  public function view_info()
	  {
		  Self::allow_logged_in_users_only();
		  $data['page']			        	= 'Profile';
	 	  return view ('merchant.pages.view_info', $data);		
	  }

    public function add_other_info(Request $request)//
    {
    
      Self::allow_logged_in_users_only();
      $data["company_information"] = $request->company_information;
      $data["business_website"]    = $request->business_website;
      $data["year_established"]    = $request->year_established;
      TblBusinessOtherInfoModel::where('business_id',session('business_id'))->update($data);
      Session::flash('add_info', "Information Updated");
      return Redirect::back();
    }

    public function update_hours(Request $request)
    {

      $business_hours_to = $request->input('business_hours_to');
      $business_hours_from = $request->input('business_hours_from');
      $business_id = $request->input('business_id');
      $days = $request->input('days');
      foreach($business_hours_from as $key => $business_hours_f)
      {
          // echo $sp." to time ".$business_hours_to[$key]." with day ".$days[$key]."<br>";
          $data['business_hours_from']= $business_hours_f;
          $data['business_hours_to']= $business_hours_to[$key];  
          $check  = TblBusinessHoursmodels::where('business_id',$business_id[$key])->where('days',$days[$key])->update($data);
      }
      
      return Redirect::back();  
    
    }

     public function add_payment_method(Request $request)
    {
      $data["payment_method_id"]   = $request->payment_method_id;
      $data["payment_method_name"] = $request->payment_method_name;
      TblPaymentMethod::insert($data); 
      Session::flash('message', "Payment Save");
        return Redirect::back();
  
    }

     public function delete_payment_method($id)
    {
      TblPaymentMethod::where('payment_method_id',$id)->delete();
      Session::flash('danger', "Payment Deleted");
      return Redirect::back();
    }

    public function delete_messages($id)
    {
      TblGuestMessages::where('guest_messages_id',$id)->delete();
      Session::flash('danger', "Message Information Deleted");
      return Redirect::back();
    }

    public function edit_payment_method(Request $request)
    {
      $data["payment_method_id"]   = $request->payment_method_id;
      $data["payment_method_name"] = $request->payment_method_name;
      TblPaymentMethod::where($data)->update($data);
      return Redirect::back();
    }

    public function add_business_category(Request $request)
    {
      $data["business_category_id"]   = $request->business_category_id;
      $data["business_category_name"] = $request->business_category_name;
      Tbl_business_category::insert($data); 
      Session::flash('message', "Category Added");
      return Redirect::back();
    }

    public function delete_business_category($id)
    {
      Tbl_business_category::where('business_category_id',$id)->delete();
      Session::flash('danger', "Category Deleted");
      return Redirect::back();
    }

     public function add_images(Request $request)
    { 
        $file = $request->file('business_banners');
        $file1 = $request->file('other_image_one');
        $file2 = $request->file('other_image_two');
        $file3 = $request->file('other_image_three');
        if($file==null||$file=='')
          {
            echo "Walang kang picture eh!!!";
          }
        else
          {
          $filename='/business_images/'.uniqid().$file->getClientOriginalName();
          $filename1='/business_images/'.uniqid().$file1->getClientOriginalName();
          $filename2='/business_images/'.uniqid().$file2->getClientOriginalName();
          $filename3='/business_images/'.uniqid().$file3->getClientOriginalName();
          $file_ext = $file->getClientOriginalExtension();
          $file_ext = $file1->getClientOriginalExtension();
          $file_ext = $file2->getClientOriginalExtension();
          $file_ext = $file3->getClientOriginalExtension();
          $destinationPath = public_path('/business_images');
          $check=$file->move($destinationPath, $filename);
          $check=$file1->move($destinationPath, $filename1);
          $check=$file2->move($destinationPath, $filename2);
          $check=$file3->move($destinationPath, $filename3);
            if($check)
            {
              $data['business_banner'] = $filename;
              $data['other_image_one'] = $filename1;
              $data['other_image_two'] = $filename2;
              $data['other_image_three'] = $filename3;
              $check_insert = TblBusinessImages::where('business_id',session('business_id'))->update($data);
              if($check_insert)
                {
                   return Redirect::back();
                }
              else
                {   
                  echo "mali ka";
                }
          }
        }
    }
     
	  public function category()
	  {
		  Self::allow_logged_in_users_only();
		  $data['page']			 = 'Category';
      $data['_category'] = TblBusinessCategoryModel::where('parent_id',0)->get();
      $data['_subcategory'] = TblBusinessTagCategoryModel::get();
      $data['_keywords'] = TblBusinessKeywordsModel::get();
		  return view('merchant.pages.category', $data);		
  	}

     public function tag_category(Request $request)
    {
      $data['_category'] = TblBusinessCategoryModel::where('parent_id',$request->parent_id)->get();
      return view('merchant.pages.subcategory_list',$data);
    }

     public function add_tag_category(Request $request)
    {
      $data['business_tag_category_id'] = $request->business_tag_category_id;
      $_insert = TblBusinessTagCategoryModel::whereIn('business_id', $request->category_id)->get();
      // dd($request->business_category_id);
      TblBusinessTagCategoryModel::insert($data);
      Session::flash('message1', "Done Tagging!");
      return Redirect::back();
    }

      public function delete_tag_category($id)
    {
      TblBusinessTagCategoryModel::where('business_tag_category_id',$id)->delete();
      Session::flash('delete1', "Tag Category Deleted!");
      return Redirect::back();
    }

       public function add_keywords(Request $request)
    {
      $data['keywords_name'] = $request->keywords_name;
      TblBusinessKeywordsModel::insert($data);
      Session::flash('message', "Keyword Successfully Added!");
      return Redirect::back();
    }


     public function delete_keywords($id)
    {
      TblBusinessKeywordsModel::where('business_tag_keywords_id',$id)->delete();
      Session::flash('delete', "Keyword Deleted!");
      return Redirect::back();
    }
   

    public function messages(Request $request)
    {
      Self::allow_logged_in_users_only();
      $data['page'] = 'Messages';
      $data['guest_messages']    = TblGuestMessages::where('business_id',session('business_id'))->get();
      return view ('merchant.pages.messages', $data);  
    }

  	public function bills()
	  {
		  Self::allow_logged_in_users_only();
		  $data['page']	= 'Bills';
		  return view ('merchant.pages.bills', $data);		
	  }

	  public function sample()
	  {
		  return view ('merchant.pages.sample');	
	  }

    public function sample2()
    {
        return view ('sample2');  
    }

    public function sample1()
    {
       
        $address = '1700 Parañaque City Philippines';
        $data['coordinates']  = Self::getCoordinates_long($address);
        $data['coordinates1'] = Self::getCoordinates_lat($address);
        return view ('merchant.pages.sample1',$data);
    }

    function getCoordinates_long($address){
    $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
    $response = file_get_contents($url);
    $json = json_decode($response,TRUE); //generate array object from the response from the web
    // $lat = $json['results'][0]['geometry']['location']['lat'];
    $long = $json['results'][0]['geometry']['location']['lng'];
    return $long;
    }
    function getCoordinates_lat($address){
    $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
    $response = file_get_contents($url);
    $json = json_decode($response,TRUE); //generate array object from the response from the web
    $lat = $json['results'][0]['geometry']['location']['lat'];
    return $lat;
    }

}
  
