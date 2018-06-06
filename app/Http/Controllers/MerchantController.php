<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MerchantAuthController;

use Illuminate\Http\Request;

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


class MerchantController extends MerchantAuthController
{
	public function index()
	{	
  	    $data['page']= 'Dashboard';

        $data['jan'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 01)->value('business_views');
        $data['feb'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 02)->value('business_views');
        $data['mar'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 03)->value('business_views');
        $data['apr'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 04)->value('business_views');
        $data['may'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 05)->value('business_views');
        $data['jun'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 06)->value('business_views');
        $data['jul'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 07)->value('business_views');
        $data['aug'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', '08')->value('business_views');
        $data['sep'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', '09')->value('business_views');
        $data['oct'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', '10')->value('business_views');
        $data['nov'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 11)->value('business_views');
        $data['dec'] = TblReportsModel::where('business_id',session('business_id'))->whereMonth('report_date', '=', 12)->value('business_views');
   
        $views       = TblReportsModel::where('business_id',session('business_id'))->get();
        $sum         = 0;
        
        if($views==null)
        {
            $data['page_view']  = 0;
        }
        else
        {
            foreach($views as $view)
            {
                $sum = $sum + $view->business_views;
            }
            $data['page_view'] = $sum;
        }
        $data['guest_messages'] =   $messages  = TblGuestMessages::where('business_id',session('business_id'))->count();
        $total_stats            = $data['page_view'] + $messages;
        $data['stat_views']     = ($data['page_view']/$total_stats)*100;
        $data['stat_message']   = ($messages/$total_stats)*100;

        $facebook_url                     = TblBusinessModel::where("business_id",session('business_id'))->value('facebook_url');
        if($facebook_url==""||$facebook_url==null)
        {
            $data['fb']         = "0";
        }
        else
        {
            $fb_page      = $facebook_url;
            $access_token = 'EAANMzzmHyFEBAKoD8BJBavX3tSTq26iVlAF341XFf58nfbbP7tctBESSqaQqbtss7vUQm2HlQJeONGJ2LnZBAyMrcZAeXNgY7t5GzZBwmk5YbFojzVySNnaOkz5doG19oB84YwUaol0vPO3KknZA1dNQNNbrBS26D1q5WKPZCv4QaK0EGjhOrgu7AI69CFmUwYeSgBsRRIgZDZD';
            $url          = "https://graph.facebook.com/v2.10/".$fb_page.'?fields=id,name,fan_count&access_token='.$access_token;
            $curl         = curl_init($url);
                          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   
                          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $result       = curl_exec($curl);  
                          curl_close($curl);
            $details      = json_decode($result,true);
            if(isset($details['fan_count']) == null)
            {
                $data['fb']   = '0';
            }
            else
            {
                $data['fb']   = $details['fan_count'];
            }
        }
        return view('merchant.pages.dashboard', $data);	
	}
  

  
  public function profile()
  {
    
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
      if(Crypt::decrypt($merchant_password->user_password)==$request->current_password)
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
		  

		  $data['page']			    = 'Category';
      $data['_category']    = TblBusinessCategoryModel::where('parent_id',0)->paginate(6, ['*'], 'category');
      $data['_subcategory'] = TblBusinessTagCategoryModel::where('business_id',session('business_id'))
                            ->join('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id')
                            ->paginate(10);

      $data['_keywords'] = TblBusinessKeywordsModel::where('business_id',session('business_id'))->paginate(10, ['*'], 'keywords');
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
      
      $data['page']              = 'Messages';
      $data['guest_messages']    = TblGuestMessages::where('business_id',session('business_id'))->paginate(8);
      return view ('merchant.pages.messages', $data);  
    }

  	public function bills(Request $request)
	  {
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
  
