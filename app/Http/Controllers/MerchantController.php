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
use App\Models\TblReportsModel;
use App\Models\TblBusinessTagCategoryModel;
use App\Models\TblCityModel;
use App\Models\TblContactUs;
use App\Models\TblABusinessPaymentMethodModel;
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

  public function truncate($table_name)
  {
      DB::table($table_name)->truncate();
      echo "success truncate" . $table_name;
  }


	public function login()
    {
      	Self::allow_logged_out_users_only();

        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['_mob_categories']    = TblBusinessCategoryModel::all();
        $data['contact_us']         = TblContactUs::first();
        $data['page']   = 'login';
        return view('front.pages.login', $data);
    }
  public function login_submit(Request $request)
    {
        $validate_login = TblUserAccountModel::where('user_email',$request->email)->first();
                       
        if($validate_login)
        {
            if (password_verify($request->password, $validate_login->user_password)) 
                {
                   if($validate_login->status=="Activated"||$validate_login->status=="activated")
                   {
                    $user_info = TblBusinessContactPersonModel::where('business_contact_person_id',$validate_login->business_contact_person_id)
                                ->first();
                    Session::put("merchant_login",true);
                    Session::put("business_id",$user_info->business_id);
                    Session::put("business_banner",$validate_login->business_banner);
                    Session::put("email",$validate_login->user_email);
                    Session::put("full_name",$user_info->contact_first_name." ".$user_info->contact_last_name);
                    $data['page']   = 'Dashboard';
                    return Redirect::to('/merchant/dashboard');
                   }
                   elseif($validate_login->status=="registered"||$validate_login->status=="Registered")
                   {
                    $user_info = TblUserAccountModel::where('user_account_id',$validate_login->user_account_id)
                                          ->join('tbl_business','tbl_business.business_id','=','tbl_user_account.business_id')
                                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                                          ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                                          ->join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')
                                          ->first();
                    Session::put("full_name",$user_info->contact_first_name." ".$user_info->contact_last_name);
                    Session::put("email",$user_info->user_email);
                    Session::put("business_name",$user_info->business_name);
                    Session::put("business_id",$user_info->business_id);
                    Session::put("business_contact_person_id",$user_info->business_contact_person_id);
                    Session::put("business_address",$user_info->business_complete_address);
                    Session::put("city_state",$user_info->city_name.", ".$user_info->county_name);
                    Session::put("zip_code",$user_info->postal_code);
                   
                    $data['page']   = 'Redirect';

                    return Redirect::to('/merchant/redirect');
                   }
                   elseif($validate_login->status=="deactivated"||$validate_login->status=="Deactivated")
                   {
                     $data['page']   = 'Merchant Login';
                     return Redirect::to('/redirect');
                   }
                }
            else
            {
                $data['page']   = 'Merchant Login';
                return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
            }
        }
        else
        {
            $data['page']   = 'Merchant Login';
            return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
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

        $data['page'] = 'Dashboard';
        $views = TblReportsModel::where('business_id',session('business_id'))->count();
        $data['guest_messages'] = TblGuestMessages::where('business_id',session('business_id'))->count();
        $fb = TblBusinessModel::where("business_id",session('business_id'))->first();
        if($fb->facebook_url==""||$fb->facebook_url==null)
        {
          $data['fb']         = "0";
          if($views==0)
          {
            $data['page_view']  ="0";
          }
          else
          {
            $business_views = TblReportsModel::where('business_id',session('business_id'))->first();
            $data['page_view'] = $business_views->business_views;
          }
        }
        else
        {
          $fb_page      = $fb->facebook_url;
          $access_token = 'EAAD6rZBdEZBzABAFQIyH9AYydJUw1MlR7gVTCjqKLG7rVFQZBNTgFcVPE1UHfbGtCsHY12R5pdRIoDPp4i6BSy5gU9rUGZBnC3snzuj2VU7ZBZA4csIYLSGPGnovoayRhZBb3qUTKIXvkyMdH5TFWyo2IoArQ8oTj4g6sZC4l3tJ0QZDZD';
          $url          = "https://graph.facebook.com/v2.10/".$fb_page.'?fields=id,name,fan_count&access_token='.$access_token;
          $curl         = curl_init($url);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
          $result       = curl_exec($curl);  
          curl_close($curl);
          $details      = json_decode($result,true);
          $data['fb']   = $details['fan_count'];
          if($views==0)
          {
            $data['page_view']  ="0";
          }
          else
          {
            $business_views = TblReportsModel::where('business_id',session('business_id'))->first();
            $data['page_view'] = $business_views->business_views;
          }
        }
    return view ('merchant.pages.dashboard', $data);	
		
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
      $data['countyList'] = TblCountyModel::get();
      return view('front.pages.success',$data);

    }

    public function payment()
    {
      $data['page']             = 'payment';
      $data['_mob_categories']  = TblBusinessCategoryModel::all();
        $data['countyList']     = TblCountyModel::orderBy('county_name','ASC')->get();
      $data['method']           = TblPaymentMethod::get();
      $data['picture']          = TblPaymentModel::get();
      $check = TblPaymentModel::where('business_id',session('business_id'))->first();
        if($check)
        {
            return Redirect::to('/merchant/redirect/exist');
        }
        else
        {
          $data['method']           = TblPaymentMethod::get();
          $data['_mob_categories']  = TblBusinessCategoryModel::all();
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
          $data["merchant_info"]    = TblBusinessModel::where('tbl_business.business_id', session('business_id'))
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
    }
    public function upload_payment(Request $request)
    {
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
          $filename='/payment_upload/'.uniqid().$file->getClientOriginalName();
          $file_ext = $file->getClientOriginalExtension();
          $destinationPath = public_path('/payment_upload');
          $check=$file->move($destinationPath, $filename);   
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
      $data['method']           = TblPaymentMethod::get();
      $data['_mob_categories']  = TblBusinessCategoryModel::all();
        $data['countyList']     = TblCountyModel::orderBy('county_name','ASC')->get();
      $data["merchant_info"] = TblBusinessModel::where('tbl_business.business_id', $id)
                            ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                            ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                            ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                            ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                            ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                            ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                            ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                            ->where('tbl_invoice.invoice_status','!=','paid')
                            ->first();

    return view('front.pages.payment_merchant', $data);
    }


	  public function profile()
    {
      Self::allow_logged_in_users_only();
      $data['page']             = 'Profile';
      $data['merchant_info']    = TblBusinessModel::where('business_id',session('business_id'))
                                ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                                ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id') 
                                ->first();


		  $data['_payment_method']  = TblABusinessPaymentMethodModel::where('business_id',session('business_id'))->paginate(10);
      $data['other_info']       = TblBusinessOtherInfoModel::where('business_id',session('business_id'))->first();
      $data['_business_hours']  = TblBusinessHoursmodels::where('business_id',session('business_id'))->get();
      $images                   = TblBusinessImages::where('business_id',session('business_id'))->count();
      if($images==0)
      {
        $data['images']  = 0;
      }
      else
      {
        $data['images']  = 1;
        $data['_images'] = TblBusinessImages::where('business_id',session('business_id'))->first();
      }
      return view ('merchant.pages.profile', $data);		
	  }


	  public function view_info()
	  {
		  Self::allow_logged_in_users_only();
		  $data['page']			        	= 'Profile';
	 	  return view ('merchant.pages.view_info', $data);		
	  }

    public function update_merchant_info(Request $request)//
    {

    $data['transaction']      = 'profile';
    $data['county_list']      = TblCountyModel::get();
    $data['merchant_info']    = TblBusinessModel::where('business_id',session('business_id'))
                                ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                                ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id') 
                                ->first();     
    return view('merchant.pages.update_merchant_info',$data); 
    
     
   }

   public function saving_merchant_info(Request $request)
   {

    $data['city_id']        = $request->city_id;
    $data['county_id']      = $request->county_id;
    $data['twitter_url']    = $request->twitter_url;
    $data['facebook_url']   = $request->facebook_url;
    $data['business_complete_address']     = $request->business_complete_address;
  
    $check = TblBusinessModel::where('business_id',session('business_id'))->update($data);
    if($check)
    {
      return "<div class='alert alert-success'><strong>Thank you!</strong> Profile successfully updated.</div>";
    }
    else
    {
      return "<div class='alert alert-danger'><strong>Sorry!</strong>  Transaction failure.</div>"; 
    } 
   }

   public function get_city(Request $request)
    {
      
        $county_id = $request->county_id;

        $city_list = TblCityModel::where('county_id','=',$county_id)->get();

        $county_name = TblCountyModel::select('county_name')->where('county_id','=',$county_id)->first();

        $city_dropdown_output = '';

        $city_dropdown_output .= $county_name->county_name;

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

    public function update_other_info(Request $request)
    {
      
      $data["company_information"] = $request->company_information;
      $data["business_website"]    = $request->business_website;
      $data["year_established"]    = $request->year_established;
      TblBusinessOtherInfoModel::where('business_id',session('business_id'))->update($data);
      return "<div class='alert alert-success'><strong>Success!</strong>  Other Information Updated.</div>";
    }
    

    public function update_hours(Request $request)
    {


      $business_hours_to    = $request->input('business_hours_to');
      $business_hours_from  = $request->input('business_hours_from');
      $desc                 = $request->input('disable');
      $business_id          = $request->input('business_id');
      $days                 = $request->input('days');
      
      foreach($business_hours_from as $key => $business_hours_f)
      {
          $data['business_hours_from']  = $business_hours_f;
          $data['business_hours_to']    = $business_hours_to[$key]; 
          $data['act']                  = $desc[$key]; 
          
          $check  = TblBusinessHoursmodels::where('business_id',$business_id[$key])->where('days',$days[$key])->update($data);

      }
      Session::flash('success_merchant', 'success');
      return Redirect::back();  
    
    }

     public function add_payment_method(Request $request)
    {
      $data["payment_method_name"] = $request->paymentMethodName;
      $data["payment_method_info"] = "not available";
      $data["business_id"]         = session("business_id");
      TblABusinessPaymentMethodModel::insert($data); 
      Session::flash('add_payment_method_success', 'success');
      return  "<div class='alert alert-success'><strong>Success!</strong> Payment Method Added.</div>"; 
    }

     public function delete_payment_method(Request $request)
    {
      $id = $request->paymentMethodId;
      TblABusinessPaymentMethodModel::where('payment_method_id',$id)->delete();
      Session::flash('danger', "Payment Deleted");
      return "<div class='alert alert-danger'><strong>Success!</strong> Payment Method deleted.</div>";
    }

    public function delete_messages($id)
    {
 
      TblGuestMessages::where('guest_messages_id',$id)->delete();
      Session::flash('danger', "Message  Deleted!");
      return Redirect::back();
    }

    public function edit_payment_method(Request $request)
    {
      $data["payment_method_id"]   = $request->payment_method_id;
      $data["payment_method_name"] = $request->payment_method_name;
      TblPaymentMethod::where($data)->update($data);
      return Redirect::back();
    }

    public function merchant_change_password(Request $request)
    {

        $merchant_password = TblUserAccountModel::where('business_id',session('business_id'))->first();             
        if(password_verify($request->current_password,$merchant_password->user_password))
        {
              if($request->new_password == $request->confirm_password) 
                {
                  $data['user_password'] = password_hash($request->new_password, PASSWORD_DEFAULT);
                  TblUserAccountModel::where('business_id',session('business_id'))->update($data);
                  return "<div class='alert alert-success'><strong>Success!</strong>  Password Changed</div>";
                 }
              else
              {
                return "<div class='alert alert-danger'><strong>Sorry!</strong> Password you entered did not match to your current password.</div>";
              }
        }
        else
        {
          return "<div class='alert alert-danger'><strong>Sorry!</strong> Password you entered did not match to your current password.</div>";
        }

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
        $file = $request->file('business_banner');
        $file1 = $request->file('other_image_one');
        $file2 = $request->file('other_image_two');
        $file3 = $request->file('other_image_three');
        $my_file = $request->business_banner_text;
        $my_file1 = $request->other_image_one_text;
        $my_file2 = $request->other_image_two_text;
        $my_file3 = $request->other_image_three_text;

        if($file==null||$file=="")
        {
          $filename = $my_file;
        }
        else
        {
          $filename='/business_images/'.uniqid().$file->getClientOriginalName();
          $file_ext = $file->getClientOriginalExtension();
          $destinationPath = public_path('/business_images');
          $check=$file->move($destinationPath, $filename);
        }
        if($file1==null||$file1=="")
        {
          $filename1 = $my_file1;
        }
        else
        {
          $filename1='/business_images/'.uniqid().$file1->getClientOriginalName();
          $file_ext1 = $file1->getClientOriginalExtension();
          $destinationPath = public_path('/business_images');
          $check=$file1->move($destinationPath, $filename1);
        }
        if($file2==null||$file2=="")
        {
          $filename2 =  $my_file2;
        }
        else
        {
          $filename2='/business_images/'.uniqid().$file2->getClientOriginalName();
          $file_ext2 = $file2->getClientOriginalExtension();
          $destinationPath = public_path('/business_images');
          $check=$file2->move($destinationPath, $filename2);
          
        }
        if($file3==null||$file3=="")
        {
          $filename3 = $my_file3;
        }
        else
        {
          $filename3='/business_images/'.uniqid().$file3->getClientOriginalName();
          $file_ext3 = $file3->getClientOriginalExtension();
          $destinationPath = public_path('/business_images');
          $check=$file3->move($destinationPath, $filename3);
        }

        $data['business_banner']   = $filename;
        $data['business_id']       =  session("business_id");
        $data['other_image_one']   = $filename1;
        $data['other_image_two']   = $filename2;
        $data['other_image_three'] = $filename3;
        // dd($data);
        $check_data = TblBusinessImages::where('business_id',session('business_id'))->count();
        if($check_data==1)
        {
          $check_insert = TblBusinessImages::where('business_id',session('business_id'))->update($data);
          if($check_insert)
          {
            Session::flash('success_merchant', "success");
            return Redirect::back();
          }
          else
          {   
            Session::flash('success_merchant', "success");
            return Redirect::back();
          }
        }
        else
        {
          $check_insert = TblBusinessImages::where('business_id',session('business_id'))->insert($data);
          if($check_insert)
          {
            Session::flash('success_merchant', "success");
            return Redirect::back();
          }
          else
          {   
            Session::flash('success_merchant', "success");
            return Redirect::back();
          }
        }       
    }
     
	  public function category()
	  {
		  Self::allow_logged_in_users_only();

		  $data['page']			    = 'Category';
      $data['_category']    = TblBusinessCategoryModel::where('parent_id',0)->paginate(6);
      $data['_subcategory'] = TblBusinessTagCategoryModel::where('business_id',session('business_id'))
                            ->join('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id')
                            ->paginate(10);

      $data['_keywords'] = TblBusinessKeywordsModel::where('business_id',session('business_id'))->paginate(10);
		  return view('merchant.pages.category', $data);		
  	}

     public function tag_category(Request $request)
    {
      $data['_category'] = TblBusinessCategoryModel::where('parent_id',$request->parent_id)->get();
      return view('merchant.pages.subcategory_list',$data);
    }

     public function add_tag_category(Request $request)
    {
      $data_id = $request->checkbox;
      if ($data_id) 
      {
       foreach($data_id as $key=>$id)
        {
          $data['business_category_id'] = $id;
          $data['business_id'] = session('business_id');
          $_check  = TblBusinessTagCategoryModel::where('business_id',session('business_id'))->where('business_category_id',$id)->first();
          $_check2 = TblBusinessTagCategoryModel::where('business_id',session('business_id'))->count();
          if($_check)
          {
            echo "hi";
          } 
          elseif($_check2<6)
          {
            Session::flash('message1', "Gotovo Označavanje!");
            $_insert = TblBusinessTagCategoryModel::whereIn('business_id',session('business_id'))->insert($data);
          }  
        }  
      }
      else
      {

      }
      return Redirect::back();
    }

      public function delete_tag_category($id)
    {
      TblBusinessTagCategoryModel::where('business_tag_category_id',$id)->delete();
      Session::flash('delete1', "Kategorija Oznaka Izbrisana Je!");
      return Redirect::back();
    }

       public function add_keywords(Request $request)
    {
      $data['keywords_name'] = $request->keywords_name;
      $data['business_id']   = session('business_id');
      TblBusinessKeywordsModel::insert($data);
      Session::flash('message', "Uspješno dodana ključna riječ!");
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
      $data['page']              = 'Messages';
      $data['guest_messages']    = TblGuestMessages::where('business_id',session('business_id'))->paginate(8);
      return view ('merchant.pages.messages', $data);  
    }

  	public function bills(Request $request)
	  {
		  Self::allow_logged_in_users_only();

      $data['contact_us'] = TblContactUs::first();
		  $data['page']   	  = 'Bills';

      $data['bills'] = TblBusinessModel::where('tbl_business.business_id',session('business_id'))
                      ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                      ->join('tbl_payment','tbl_payment.business_id','=','tbl_business.business_id')
                      ->orderBy('tbl_payment.payment_id','DESC')
                      ->get();
      $data['bill'] = TblBusinessModel::where('tbl_business.business_id',session('business_id'))
                      ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                      ->join('tbl_payment','tbl_payment.business_id','=','tbl_business.business_id')
                      ->first();

                      // dd($data['bill']);
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
       
        
        return view ('merchant.pages.sample1');
    }
}
  
