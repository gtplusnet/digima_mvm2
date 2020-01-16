<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ActiveAuthController;

use App\Models\TblBusinessModel;

use App\Models\TblUserAccountModel;
use App\Models\TblPaymentModel;
use App\Models\TblBusinessCategoryModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblInvoiceModels;
use App\Models\TblCityModel;
use App\Models\TblCountyModel;
use App\Models\TblTeamModel;


use App\Models\TblMembeshipModel;
use App\Models\TblBusinessSubCategoryModel;
use App\Models\TblBusinessSubSubCategoryModel;
use App\Models\TblPaymentMethod;
use App\Models\TblReportsModel;
use App\Models\TblABusinessPaymentMethodModel;
use App\Models\TblBusinessOtherInfoModel;
use App\Models\TblBusinessHoursmodels;
use App\Models\TblBusinessImages;
use App\Models\TblAboutUs;
use App\Models\TblContactUs;
use App\Models\TblTerms;
use App\Models\TblThankYou;
use App\Models\TblBusinessTagCategoryModel;

use App\Models\TblUserModel;
use App\Models\TblUserInfoModel;


use App\Models\TblUserTeamModel;
use App\Models\Tbl_business_hours;
use App\Models\Tbl_user_account;

use DB;
use Response;
use Session;
use Redirect;
use PDF2;
use PDF;
use Mail;
use Excel;
use Crypt;
use Validator;
use Carbon\Carbon;
use Input;





class GeneralAdminController extends ActiveAuthController
{

  public function general_admin_merchants_import()
  {
      $data['user']               = Self::global();
      return view('general_admin.pages.import.import_merchant', $data);
  }
  public function import_free_list()
  {
      $data['user']               = Self::global();
      return view('general_admin.pages.import.import_freelisting', $data);
  }
  public function general_admin_merchants_import_template()
  {
      Excel::create("CroatiaMerchantTemplate", function($excel)
      {
         // Set the title
          $excel->setTitle('Croatia');

          // Chain the setters
          $excel->setCreator('DigimaWebSolutions')
                ->setCompany('DigimaWebSolutions');

          $excel->sheet('Template', function($sheet) {
            $header = [
                     'prefix',
                     'first_name',
                     'surname',
                     'email_address',
                     'password',
                     'company_name',
                     'membership',
                     'main_telephone',
                     'alternative_phone',
                     'fax_number',
                     'business_address',
                     'country',
                     'city',
                     'zip_code',
                     'facebook_url',
                     'twitter_username'
                     ];
            $sheet->freezeFirstRow();
              $sheet->row(1, $header);

          });

      })->download('csv');
  }
  public function general_admin_merchants_import_freelist()
  {

      $excels['data'][0] = ['Business Name*','City*'];
        // dd($excels);
      Excel::create('CroatiaFreeListingTemplate', function($excel) use ($excels) {

            $data = $excels['data'];
            $excel->setTitle('Payroll');
            $excel->setCreator('Laravel')->setCompany('DIGIMA');
            $excel->setDescription('payroll file');

            $excel->sheet("Free Listing", function($sheet) use ($data) 
            {
                $sheet->fromArray($data, null, 'A1', false, false);

                  $number_of_rows = 1000;

                  for($row = 1, $rowcell = 2; $row <= $number_of_rows; $row++, $rowcell++)
                  {
                    $city_cell = $sheet->getCell('B'.$rowcell)->getDataValidation();
                    $city_cell->setType(\PHPExcel_Cell_DataValidation::TYPE_LIST);
                    $city_cell->setErrorStyle(\PHPExcel_Cell_DataValidation::STYLE_INFORMATION);
                    $city_cell->setAllowBlank(false);
                    $city_cell->setShowInputMessage(true);
                    $city_cell->setShowErrorMessage(true);
                    $city_cell->setShowDropDown(true);
                    $city_cell->setErrorTitle('Input error');
                    $city_cell->setError('Value is not in list.');
                    $city_cell->setFormula1('City');
                  }
            });


            $excel->sheet('reference', function($sheet) {
              $cities          = DB::table('tbl_city')->join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')->get();

              /* PROJECT REFERENCE */
              $sheet->SetCellValue("B1", "City");
              $city_count = 2;


              foreach($cities as $city)
              {
                $sheet->SetCellValue("B".$city_count, $city->city_name);
                $city_count++;
              }
              $city_count--;

              $sheet->_parent->addNamedRange(
                  new \PHPExcel_NamedRange(
                  'city', $sheet, 'B2:B'.$city_count
                  )
              );
            });
        })->download('xlsx');
  }
  public function import_freelisting()
  {
    $file = Input::file('file');
    $_data = Excel::selectSheetsByIndex(0)->load($file, function($reader){})->all();
    $report = array();

    foreach ($_data as $key => $data) 
    {
        $city_info = DB::table('tbl_city')->where('city_name',$data['city'])->first();
        $count = DB::table('tbl_business')->where('business_name',$data['business_name'])->count();

        if($count == 0)
        {
          $ins['business_name']               = $data['business_name'];
          $ins['county_id']                   = $city_info->county_id;
          $ins['city_id']                     = $city_info->city_id;
          $ins['business_complete_address']   = 'NA';
          $ins['business_phone']              = 'NA';
          $ins['business_alt_phone']          = 'NA';
          $ins['business_fax']                = 'NA';
          $ins['facebook_url']                = 'NA';
          $ins['twitter_url']                 = 'NA';
          $ins['membership']                  = 9;
          $ins['transaction_status']          = 1;
          $ins['business_status']             = 6;
          $ins['date_transact']               = date("Y/m/d");
          $ins['date_created']                = date("Y/m/d");

          $business_id = DB::table("tbl_business")->insertGetId($ins);
          array_push($report, ["business_name" => $data['business_name'],"city" => $data['city'],"status" => "Inserted"]);
        }
        else
        {
          array_push($report, ["business_name" => $data['business_name'],"city" => $data['city'],"status" => "Exist"]);
        }
    }

      $return['status']   = 'success';
      $return['message']  = '<table class="table table-bordered" style="background-color: #FFFFFF;margin-top:20px;">
      <thead>
        <tr>
          <th>Business Name</th>
          <th>City</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>';

      foreach ($report as $key => $value) {
        $return['message'] .= '<tr>
          <td>'.$value["business_name"].'</td>
          <td>'.$value["city"].'</td>
          <td>'.$value["status"].'</td>
        </tr>';
      }

      
      $return['message'] .= '</tbody>
      </table>';

      return $return;

  }

  public function general_admin_merchants_import_read(Request $request)
  {
    Session::forget("import_merchant_error");

    $value     = $request->value;
    $input     = $request->input;
    $ctr        = $request->ctr;
    $data_length  = $request->data_length;
    $error_data   = $request->error_data;
    if($ctr != $data_length)
    {
      $rules["first_name"]                = 'required';
      $rules["surname"]                   = 'required';
      $rules["main_telephone"]            = 'required';
      $rules["alternative_phone"]         = 'required';
      $rules["email_address"]             = 'email|required';
      $rules["password"]                  = 'required';
      $rules["company_name"]              = 'required';
      $rules["membership"]                = 'required';
      $rules["facebook_url"]              = 'url';
      $rules["company_name"]              = 'required';
      $rules["business_address"]          = 'required';
      $rules["country"]                   = 'required';
      $rules["city"]                      = 'required';
      // $rules["fax_number"]                = 'required';

      $validator = Validator::make($value, $rules);
      if($validator->fails())
      {
        $json["status"]   = "error";
        $json["message"]    = $validator->errors()->first();
      }
      else
      {
         $get_country_id = DB::table('tbl_county')->where('county_name',$value['country'])->value('county_id');
         $get_city_id = DB::table('tbl_city')->where('city_name',$value['city'])->value('city_id');

         $check_email = Tbl_user_account::checkEmail($value['email_address'])->first();
         $check_phone = TblBusinessModel::checkPhone($value['main_telephone'],$value['alternative_phone'])->first();

         if(!$check_email)
         {
            // if(!$check_phone)
            // {
               if($get_country_id && $get_city_id)
               {
                  $membership_id = DB::table('tbl_membership')->where('membership_name',$value['membership'])->value('membership_id');
                  if($membership_id)
                  {
                     $ins['business_name']               = $value['company_name'];
                     $ins['county_id']                   = $get_country_id;
                     $ins['city_id']                     = $get_city_id;
                     $ins['business_complete_address']   = $value['business_address'];
                     $ins['business_phone']              = $value['main_telephone'];
                     $ins['business_alt_phone']          = $value['alternative_phone'];
                     $ins['business_fax']                = $value['fax_number'];
                     $ins['facebook_url']                = $value['facebook_url'];
                     $ins['twitter_url']                 = $value['twitter_username'];
                     $ins['membership']                  = $membership_id;
                     $ins['transaction_status']          = 1;
                     $ins['business_status']             = 5;
                     $ins['date_transact']               = date("Y/m/d");
                     $ins['date_created']                = date("Y/m/d");

                     $business_id = DB::table("tbl_business")->insertGetId($ins);

                    /*CATEGORY*/ 
                    $arr_cat_id = array();
                    if($value['category'])
                    {
                        $arr_category = explode("/", $value['category']);
                        if(count($arr_category) > 0)
                        {
                            foreach ($arr_category as $cat_key => $cat_val)
                            {
                                $sub_cat = explode("-", $cat_val);
                                if(count($sub_cat) > 0)
                                {
                                    if(isset($sub_cat[0]))
                                    {
                                        $check = DB::table('tbl_business_category')->where("business_category_name", $sub_cat[0])->value("business_category_id");
                                        if($check)
                                        {
                                            $cat_id = $check;
                                        }
                                        else
                                        {
                                            $cat_id = DB::table('tbl_business_category')->insertGetId(["business_category_name" => $sub_cat[0]]);
                                        }
                                        $arr_cat_id[] = $cat_id;
                                    }
                                    if(count($sub_cat) > 1)
                                    {
                                        foreach ($sub_cat as $key_sub_cat => $value_sub_cat) 
                                        {
                                            if($key_sub_cat != 0)
                                            {
                                                $check = DB::table('tbl_business_category')->where("business_category_name", $value_sub_cat)->value("business_category_id");
                                                if($check)
                                                {
                                                    $subcat_id = $check;
                                                }
                                                else
                                                {
                                                    $subcat_id = DB::table('tbl_business_category')->insertGetId(["business_category_name" => $value_sub_cat,"parent_id"=> $cat_id]);
                                                }
                                                $arr_cat_id[] = $subcat_id;                                    
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if(count($arr_cat_id) > 0)
                    {
                        foreach ($arr_cat_id as $keycat => $valuecat) 
                        {
                            $ins_business_cat[$keycat]['business_category_id'] = $valuecat;
                            $ins_business_cat[$keycat]['business_id'] = $business_id;
                        }
                        DB::table("tbl_business_tag_category")->insert($ins_business_cat);
                    }
                    /*END CATEGORY*/ 
                    /*KEYWORDS*/
                    $arr_keywords_id = array();
                    if($value['keywords'])
                    {
                        $arr_keywords = explode("/", $value['keywords']);
                        if(count($arr_keywords) > 0)
                        {
                            foreach ($arr_keywords as $key_words => $val_words)
                            {
                                $check = DB::table('tbl_business_tag_keywords')->where("keywords_name", $val_words)->where("business_id", $business_id)->first();
                                if(!$check)
                                {
                                    DB::table('tbl_business_tag_keywords')->insert(["keywords_name" => $val_words,"business_id" => $business_id]);
                                }
                            }
                        }
                    }
                    /*END KEYWORDS*/ 

                     $ins_bp['contact_prefix']           = $value['prefix'];
                     $ins_bp['contact_first_name']       = $value['first_name'];
                     $ins_bp['contact_last_name']        = $value['surname'];
                     $ins_bp['business_id']              = $business_id;

                     $bp_id = DB::table("tbl_business_contact_person")->insertGetId($ins_bp);

                     $ins_ua['user_email']                  = $value['email_address'];
                     $ins_ua['user_password']               = Crypt::encrypt($value['password']);
                     $ins_ua['user_category']               = 'merchant';
                     $ins_ua['status']                      = 'registered';
                     $ins_ua['business_id']                 = $business_id;
                     $ins_ua['business_contact_person_id']  = $bp_id;
                     $ins_ua['string_password']             = 'none';

                     $ua_id = DB::table("tbl_user_account")->insertGetId($ins_ua);

                     $ins_oi['business_other_info_id']      = '';
                     $ins_oi['company_information']         = 'none';
                     $ins_oi['business_website']            = 'none';
                     $ins_oi['year_established']            = 'none';
                     $ins_oi['company_profile']             = '';
                     $ins_oi['business_id']                 = $business_id;

                     $oi_id = DB::table("tbl_business_other_info")->insertGetId($ins_oi);

                     $businessHoursData = new Tbl_business_hours;
                     $businessHoursData->insert(array(
                         array('days' => 'Ponedjeljak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                         'desc' => 'none', 'business_id' => $business_id),
                         array('days' => 'Utorak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                         'desc' => 'none', 'business_id' => $business_id),
                         array('days' => 'Srijeda', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                         'desc' => 'none', 'business_id' => $business_id),
                         array('days' => 'Četvrtak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                         'desc' => 'none', 'business_id' => $business_id),
                         array('days' => 'Petak', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                         'desc' => 'none', 'business_id' => $business_id),
                         array('days' => 'Subota', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                         'desc' => 'none', 'business_id' => $business_id),
                         array('days' => 'Nedjelja', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                         'desc' => 'none', 'business_id' => $business_id)
                     ));

                     $update_user_id = DB::table('tbl_business')->whereNull('user_id')->leftjoin('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')->get();
                     foreach ($update_user_id as $key => $value) 
                     {
                        DB::table('tbl_business')->where("business_id", $value->business_id)->update(['user_id'=>$value->user_account_id]);
                     }

                     $json["status"]   = "success";
                     $json["message"]  = "Success";
                     $json["item_id"]  = 1;
                  }
                  else
                  {
                     $json["status"]   = "error";
                     $json["message"]    = "Membership not found";
                  }
               }
               else
               {
                  $json["status"]   = "error";
                  $json["message"]    = "Country or city not found";
               }
            // }
            // else
            // {
            //       $json["status"]   = "error";
            //       $json["message"]    = "Check main and alternative telephone";
            // }
         }
         else
         {
            $json["status"]   = "error";
            $json["message"]    = "Email already exist";
         }
      }

      $status_color     = $json["status"] == 'success' ? 'green' : 'red';
      $json["tr_data"]  = "<tr>";
      $json["tr_data"]   .= "<td class='$status_color'>".$json["status"]."</td>";
      $json["tr_data"]   .= "<td nowrap>".$json["message"]."</td>";
      $json["tr_data"]   .= "<td nowrap>".'-'."</td>";
      // $json["tr_data"]   .= "<td nowrap>".$value['first_name']."</td>";
      // $json["tr_data"]   .= "<td>".$value['surname']."</td>";
      // $json["tr_data"]   .= "<td nowrap>".$value['email_address']."</td>";
      // $json["tr_data"]   .= "<td>".$value['password']."</td>";
      // $json["tr_data"]   .= "<td>".$value['company_name']."</td>";
      // $json["tr_data"]   .= "<td nowrap>".$value['membership']."</td>";
      // $json["tr_data"]   .= "<td>".$value['main_telephone']."</td>";
      // $json["tr_data"]   .= "<td>".$value{'alternative_phone'}."</td>";
      // $json["tr_data"]   .= "<td>".$value['fax_number']."</td>";
      // $json["tr_data"]   .= "<td>".$value['business_address']."</td>";
      // $json["tr_data"]   .= "<td nowrap>".$value['country']."</td>";
      // $json["tr_data"]   .= "<td nowrap>".$value['city']."</td>";
      // $json["tr_data"]   .= "<td>".$value['zip_code']."</td>";
      // $json["tr_data"]   .= "<td>".$value['facebook_url']."</td>";
      // $json["tr_data"]   .= "<td>".$value['twitter_username']."</td>";
      $json["tr_data"]   .= "</tr>";

      $json["value_data"] = $value;
      $length       = sizeOf($json["value_data"]);

      // foreach($json["value_data"] as $key=>$value)
      // {
        // $json["value_data"]['Error Description'] = $json["message"];
      // }
    }
   else /* DETERMINE IF LAST IN CSV */
   {
      Session::put("import_merchant_error", $error_data);
      $json["status"] = "end";
   }
    return json_encode($json);
  }
  public function general_admin_merchants_import_error()
  {
      $_value = Session::get("import_merchant_error");

      if($_value)
      {
         Excel::create("CroatiaMerchantTemplateError", function($excel) use($_value)
         {
            // Set the title
             $excel->setTitle('Croatia');

             // Chain the setters
             $excel->setCreator('DigimaWebSolutions')
                   ->setCompany('DigimaWebSolutions');

             $excel->sheet('Template', function($sheet) use($_value) {
               $header = [
                           'prefix',
                           'first_name',
                           'surname',
                           'email_address',
                           'password',
                           'company_name',
                           'membership',
                           'main_telephone',
                           'alternative_phone',
                           'fax_number',
                           'business_address',
                           'county',
                           'city',
                           'zip_code',
                           'facebook_url',
                           'twitter_username',
                           'Error_Description'
                        ];
               $sheet->freezeFirstRow();
                 $sheet->row(1, $header);
                 foreach($_value as $key=>$value)
                 {
                  $sheet->row($key+2, $value);
                 }

             });
         })->download('csv');
      }
      else
      {
         return Redirect::back();
      }
  }
  public function general_admin_merchants_import_url()
  {
    /*DO NOT REMOVE*/
  }
  public static function global()
  {
    $user_info = TblUserInfoModel::where('tbl_user_info.user_id',session('user_id'))
                ->join('tbl_user','tbl_user.user_id','=','tbl_user_info.user_id')
                ->first();
    return $user_info;
  }
  public function general_admin_dashboard()
  {
    $data['user']         = Self::global();
    $count_merchant       = TblUserAccountModel::get();
    $count_agent          = TblUserModel::where('archived',0)->where('user_access_level','AGENT')->get();
    $count_supervisor     = TblUserModel::where('archived',0)->where('user_access_level','SUPERVISOR')->get();
    $count_admin          = TblUserModel::where('archived',0)->where('user_access_level','ADMIN')->get();
     
    $data['resultCountM'] = $resM = $count_merchant->count();
    $data['resultCountA'] = $resA = $count_agent->count();
    $data['resultCountS'] = $resS = $count_supervisor->count();
    $data['resultCountAd'] = $resAd =$count_admin->count();

      $data['sum'] =$sum= $resM +$resA +$resS +$resAd;
      $data['sumP1'] = ($resM/$sum)*100;
      $data['sumP2'] = ($resA/$sum)*100;
      $data['sumP3'] = ($resS/$sum)*100;
      $data['sumP4'] = ($resAd/$sum)*100;
      $count_merchant_agent = TblBusinessModel::where('business_status',1)->get();
      $count_merchant_supervisor = TblBusinessModel::where('business_status',2)->get();
      $count_merchant_agent_added = TblBusinessModel::where('business_status',20)->get();
      $count_merchant_admin = TblBusinessModel::where('business_status',3)->get();
      $count_merchant_admin_payment = TblBusinessModel::where('business_status',4)->get();
      $count_merchant_admin_activated = TblBusinessModel::where('business_status',5)->get();
      $data['countCall'] = $count_merchant_agent->count();
      $data['countMP3'] = $count_merchant_supervisor->count();
      $data['countInvoice'] = $count_merchant_admin->count() + $count_merchant_agent_added->count();
      $data['countPayment'] = $count_merchant_admin_payment->count();
      $data['countActivated'] = $count_merchant_admin_activated->count();
      $data['count_jan']  = TblBusinessModel::whereMONTH('date_created', '=', 01 )->count();
      $data['count_feb']  = TblBusinessModel::whereMONTH('date_created', '=', 02 )->count();
      $data['count_mar']  = TblBusinessModel::whereMONTH('date_created', '=', 03 )->count();
      $data['count_apr']  = TblBusinessModel::whereMONTH('date_created', '=', 04 )->count();
      $data['count_may']  = TblBusinessModel::whereMONTH('date_created', '=', 05 )->count();
      $data['count_jun']  = TblBusinessModel::whereMONTH('date_created', '=', 06 )->count();
      $data['count_jul']  = TblBusinessModel::whereMONTH('date_created', '=', 07 )->count();
      $data['count_aug']  = TblBusinessModel::whereMONTH('date_created', '=', '08' )->count();
      $data['count_sep']  = TblBusinessModel::whereMONTH('date_created', '=', '09' )->count();
      $data['count_oct']  = TblBusinessModel::whereMONTH('date_created', '=', '10' )->count();
      $data['count_nov']  = TblBusinessModel::whereMONTH('date_created', '=', 11 )->count();
      $data['count_dec']  = TblBusinessModel::whereMONTH('date_created', '=', 12 )->count();

      $data['counts_jan']  = TblBusinessModel::whereMONTH('date_transact', '=', 01 )->where('business_status',5)->count();
      $data['counts_feb']  = TblBusinessModel::whereMONTH('date_transact', '=', 02 )->where('business_status',5)->count();
      $data['counts_mar']  = TblBusinessModel::whereMONTH('date_transact', '=', 03 )->where('business_status',5)->count();
      $data['counts_apr']  = TblBusinessModel::whereMONTH('date_transact', '=', 04 )->where('business_status',5)->count();
      $data['counts_may']  = TblBusinessModel::whereMONTH('date_transact', '=', 05 )->where('business_status',5)->count();
      $data['counts_jun']  = TblBusinessModel::whereMONTH('date_transact', '=', 06 )->where('business_status',5)->count();
      $data['counts_jul']  = TblBusinessModel::whereMONTH('date_transact', '=', 07 )->where('business_status',5)->count();
      $data['counts_aug']  = TblBusinessModel::whereMONTH('date_transact', '=', '08' )->where('business_status',5)->count();
      $data['counts_sep']  = TblBusinessModel::whereMONTH('date_transact', '=', '09' )->where('business_status',5)->count();
      $data['counts_oct']  = TblBusinessModel::whereMONTH('date_transact', '=', '10' )->where('business_status',5)->count();
      $data['counts_nov']  = TblBusinessModel::whereMONTH('date_transact', '=', 11 )->where('business_status',5)->count();
      $data['counts_dec']  = TblBusinessModel::whereMONTH('date_transact', '=', 12 )->where('business_status',5)->count();
      $data['year1']  = $year1 = date('Y', strtotime('-3 years'));
      $data['year2']  = $year2 = date('Y', strtotime('-2 years'));
      $data['year3']  = $year3 = date('Y', strtotime('-1 years'));
      $data['year4']  = $year4 = date('Y');
      $data['year5']  = $year5 = date('Y', strtotime('+1 years'));
      $data['year6']  = $year6 = date('Y', strtotime('+2 years'));
      $data['year7']  = $year7 = date('Y', strtotime('+3 years'));

      $data['count_year1']  = TblBusinessModel::whereBetween("date_transact",[$year1.'/01/01',$year1.'/12/31'])->where('business_status',5)->count();
      $data['count_year2']  = TblBusinessModel::whereBetween("date_transact",[$year2.'/01/01',$year2.'/12/31'])->where('business_status',5)->count();
      $data['count_year3']  = TblBusinessModel::whereBetween("date_transact",[$year3.'/01/01',$year3.'/12/31'])->where('business_status',5)->count();
      $data['count_year4']  = TblBusinessModel::whereBetween("date_transact",[$year4.'/01/01',$year4.'/12/31'])->where('business_status',5)->count();
      $data['count_year5']  = TblBusinessModel::whereBetween("date_transact",[$year5.'/01/01',$year5.'/12/31'])->where('business_status',5)->count();
      $data['count_year6']  = TblBusinessModel::whereBetween("date_transact",[$year6.'/01/01',$year6.'/12/31'])->where('business_status',5)->count();
      $data['count_year7']  = TblBusinessModel::whereBetween("date_transact",[$year7.'/01/01',$year7.'/12/31'])->where('business_status',5)->count();/*business status ay tanggalin pag binago*/
    return view('general_admin.pages.dashboard',$data);
  }
  public function general_admin_merchants()
  {
      $data['user']               = Self::global();
      $data['page']               = 'Merchant';
      $client                     = TblBusinessModel::where('business_status', 3)->BusinessAdmin()->leftjoin('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')->orderBy('tbl_business.date_created',"asc")->get();
      $signupOnline               = TblBusinessModel::where('business_status', 1)->orderBy('tbl_business.date_created',"asc")->BusinessAdmin2()->get();
      $data['clients']            = $client->merge($signupOnline);
      $data['agentAdded']         = TblBusinessModel::where('business_status', 20)->BusinessAdmin()->orderBy('tbl_business.date_created',"asc")->paginate(10, ['*'], 'agent_added');
      $data['pending_clients']    = TblBusinessModel::where('business_status', 4)->BusinessAdmin()->leftjoin('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')->orderBy('tbl_business.date_created',"asc")->paginate(10, ['*'], 'pending_client');
      $data['registered_clients'] = TblBusinessModel::where('business_status', 5)->BusinessAdmin()->orderBy('tbl_business.date_created',"asc")->paginate(10, ['*'], 'registered_client');
      foreach ($data['registered_clients'] as $key => $registered_clients) 
      {
        $data['registered_clients'][$key]['due_date'] =  date("F j, Y", strtotime('+1 month', strtotime($registered_clients['date_transact'])));
      }

      return view('general_admin.pages.merchants',$data);
  }
    public function general_admin_send_invoice($id)
    {
        $data['user']         = Self::global();
        $data['contact_us']   = TblContactUs::first();
        $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$id)->BusinessAdmin()->first();
        $data['id']           = $id;
        $data['status']       = "";
        return view('general_admin.pages.invoice',$data);
    }
    public function general_admin_send_save_invoice(Request $request,$id)
    {
        $checked_number     = TblInvoiceModels::where('invoice_number',$request->invoice_number)->first();
    
        if($checked_number)
        {
          Session::flash('error', 'Transaction Failed! Invoice number has already been issued to another person.');
          return Redirect::back();
        }  
        else
        {
            $business_id                = $request->business_id;
            $business_contact_person_id = $request->business_contact_person_id;
            $invoice_number             = $request->invoice_number;
            $data['invoice_number']     = $request->invoice_number;
            if($request->submit       == 'Print') 
            {
                $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$business_id)
                              ->BusinessAdmin()
                              ->first();
                $format["title"]          = "james";
                $format["format"]         = "A4";
                $format["default_font"]   = "sans-serif";
                $pdf                      = PDF::loadView('mail', $data, [], $format);
                $unique                   = uniqid();
                $file_name                = $data['invoice_info']->contact_first_name."-".$data['invoice_info']->business_name."-".$unique.'.pdf';
                $save_pdf                 = $pdf->save(public_path('invoice/'.$file_name));
                $invoice['invoice_number']= $invoice_number;
                $invoice['invoice_name']  = $file_name;
                $invoice['invoice_path']  = '/invoice/'.$file_name;
                $invoice['invoice_status']= 'Print';
                $invoice['business_id']   = $business_id;
                $invoice['business_contact_person_id'] = $business_contact_person_id;
                TblInvoiceModels::insert($invoice);
                if($request->status==5)
                {
                  $update['business_status'] = 5;
                }
                else
                {
                  $update['business_status'] = 4;
                }
                $update['date_transact'] = date("Y/m/d");
                TblBusinessModel::where('business_id',$business_id)->update($update);
                if($save_pdf)
                {
                  return $pdf->stream('document.pdf');
                }
                else
                {
                  echo "Error";
                }
               
            }
            elseif($request->submit == 'Download') 
            {
                $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$business_id)->BusinessAdmin()->first();
                $format["title"]        = "james";
                $format["format"]       = "A4";
                $format["default_font"] = "sans-serif";
                $pdf                    = PDF::loadView('mail', $data, [], $format);
                $unique                 = uniqid();
                $file_name              = $data['invoice_info']->contact_first_name."-".$data['invoice_info']->business_name."-".$unique.'.pdf';
                $save_pdf               = $pdf->save(public_path('invoice/'.$file_name));
                $invoice['invoice_number']  = $invoice_number;
                $invoice['invoice_name']    = $file_name;
                $invoice['invoice_path']    = '/invoice/'.$file_name;
                $invoice['invoice_status']  = 'Download';
                $invoice['business_id']     = $business_id;
                $invoice['business_contact_person_id'] = $business_contact_person_id;
                TblInvoiceModels::insert($invoice);
                if($request->status==5)
                {
                  $update['business_status'] = 5;
                }
                else
                {
                  $update['business_status'] = 4;
                }
                $update['date_transact'] = date("Y/m/d");
                TblBusinessModel::where('business_id',$business_id)->update($update);
                if($save_pdf)
                {
                    return $pdf->download('invoice.pdf');
                }
                else
                {
                  echo "Error";
                }
            }
            else
            {
                $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$business_id)->BusinessAdmin()->first();
                $format["title"]                        = "james";
                $format["format"]                       = "A4";
                $format["default_font"]                 = "sans-serif";
                $unique=uniqid();
                $file_name                              = $data['invoice_info']->contact_first_name."-".$data['invoice_info']->business_name."-".$unique.'.pdf';
                $pdf                                    = PDF::loadView('mail', $data, [], $format);
                $save_pdf                               = $pdf->save(public_path('invoice/'.$file_name));
                $invoice['invoice_number']              = $invoice_number;
                $invoice['invoice_name']                = $file_name;
                $invoice['invoice_path']                = '/invoice/'.$file_name;
                $invoice['invoice_status']              = 'sent';
                $invoice['date_send']                   = date("Y/m/d");
                $invoice['business_id']                 = $business_id;
                $invoice['business_contact_person_id']  = $business_contact_person_id;
                TblInvoiceModels::insert($invoice);
                if($request->status==5)
                {
                  $update['business_status'] = 5;
                }
                else
                {
                  $update['business_status'] = 4;
                }
                $update['date_transact']                = date("Y/m/d");
                TblBusinessModel::where('business_id',$business_id)->update($update);
                if($save_pdf)
                {
                    $email_name       = $data['invoice_info']->contact_first_name; 
                    $email_email      = $data['invoice_info']->user_email;
                    $date             = date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));
                    $link             = "http://mvm.digimahouse.com/merchant/payment/".$business_id."/".$email_name;
                    $data             = array('name'=>$email_name,'date'=>$date,'email'=>$email_email,'business_id'=>$business_id,'path'=>'invoice/'.$file_name,'remarks'=>'Please Pay As Soon As Possible.','link'=>$link);
                    $pathfile         ='invoice/'.$file_name;
                    $mail_send        = Mail::send('general_admin.pages.send_email_invoice', $data, function($message) use ($data,$pathfile)
                     {
                       $message->to($data['email'],'Croatia Invoice')->subject
                          ('Your Croatia Directory Invoice');
                       $message->attach(public_path($pathfile));
                       $message->from('guardians35836@gmail.com','Croatia Directory');
                    });
                      if($mail_send)
                      {
                        Session::flash('success', 'Thank you!. Invoice Save and Send Successfully!');
                        return Redirect::to('/general_admin/merchants');
                      }
                      else
                      {
                        Session::flash('error', 'Transaction Failed! The file was save but failed to send. Note: goto Invoice to Resend the invoice!');
                        return Redirect::to('/general_admin/merchants');
                      }
                }
                else
                {
                  echo "Error";
                }
            }
        }
    }
    public function general_admin_send_new_invoice($id,$id2)
    {
        $data['user']         = Self::global();
        $data['contact_us']   = TblContactUs::first();
        $check                = TblInvoiceModels::where('business_id',$id)->where('invoice_status','!=','paid')->count();
        if($check!=0)
        {
            Session::flash('error', 'USER has pending INVOICE. Resend his/her old Invoice at Manage Invoice!');
            return Redirect::back();
        }
        else
        {
            $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$id)->BusinessAdmin()->first();
            $data['id']           = $id;
            $data['status']       = $id2;
            return view('general_admin.pages.invoice',$data);
        }
    }
    public function export_report_excel(Request $request,$params,$param)
    {
        $data['param'] = $param;
        if($param=='merchant')
        {
            $data['registered_clients'] = TblBusinessModel::where('business_status', 5)->BusinessAdmin()->orderBy('tbl_business.date_created',"asc")->get();
            foreach ($data['registered_clients'] as $key => $registered_clients) 
            {
                $data['registered_clients'][$key]['due_date'] =  date("F j, Y", strtotime('+1 month', strtotime($registered_clients['date_transact'])));
            }
              
        }
        elseif($param=='due')
        {
            $data['registered_clients'] = TblBusinessModel::where('business_status', 5)
                            ->BusinessAdmin()
                            ->orderBy('tbl_business.date_created',"asc")
                            ->get();
            $data['dueDate']  = date("F j, Y", strtotime("+".$params." days"));
            foreach ($data['registered_clients'] as $key => $registered_clients) 
            {
                $data['registered_clients'][$key]['due_date'] =  date("F j, Y", strtotime('+1 month', strtotime($registered_clients['date_transact'])));
            }
        }
        else
        {
            $start  = date("Y/m/d",strtotime($params));
            $end    = date("Y/m/d",strtotime($param));
            $data['registered_clients'] = TblBusinessModel::where('business_status', 5)->whereBetween('date_transact',[$start,$end])->BusinessAdmin()->orderBy('tbl_business.date_created',"asc")->get();
            foreach ($data['registered_clients'] as $key => $registered_clients) 
            {
                $data['registered_clients'][$key]['due_date'] =  date("F j, Y", strtotime('+1 month', strtotime($registered_clients['date_transact'])));
            }
        }
        Excel::create("MERCHANT LIST",function($excel) use ($data)
        {
            $excel->sheet('clients',function($sheet) use ($data)
            {
              $sheet->loadView('general_admin.pages.export_report_excel',$data);
            });
        })->download('xls');
        
    }
    public function filter_due_date(Request $request)
    {
        $data['first']              = $dueDate = $request->dueDate;
        $data['second']             = 'due';
        $data['registered_clients'] = TblBusinessModel::where('business_status',5)->BusinessAdmin()->orderBy('tbl_business.date_created',"asc")->paginate(10, ['*'], 'registered_client');
        $data['dueDate']          = date("F j, Y", strtotime("+".$dueDate." days"));
        $data['link']             = '/general_admin/export_data/0/{{$dueDate}}';
        foreach ($data['registered_clients'] as $key => $registered_clients) 
        {
            $data['registered_clients'][$key]['due_date'] =  date("F j, Y", strtotime('+1 month', strtotime($registered_clients['date_transact'])));
        }
        return view('general_admin.pages.search_registered',$data);
    }
    public function get_client(Request $request)
    {
        $data['first']    = $s_date = $request->date_start;
        $data['second']   = $e_date = $request->date_end;
        $data['clients']  = TblBusinessModel::where('business_status', 3)->whereBetween('date_transact',[$s_date,$e_date])->BusinessAdmin()
                        ->join('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'client');
        return view('general_admin.pages.search_merchant_invoice',$data);
    }
    public function get_client1(Request $request)
    {
        $data['first']    = $s_date = $request->date_start1;
        $data['second']   = $e_date = $request->date_end1;
        $data['agentAdded'] = TblBusinessModel::where('business_status',20)->whereBetween('date_transact',[$s_date,$e_date])->BusinessAdmin()
                        ->orderBy('tbl_business.date_created',"asc")->paginate(10, ['*'], 'agent_added');
        return view('general_admin.pages.search_agent_added',$data);
    }
    public function get_client2(Request $request)
    {
        $data['first']    = $s_date = $request->date_start2;
        $data['second']   = $e_date = $request->date_end2;
        $data['pending_clients'] = TblBusinessModel::where('business_status',4)
                        ->whereBetween('date_transact',[$s_date,$e_date])
                        ->BusinessAdmin()
                        ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'pending_client');
        return view('general_admin.pages.search_pending',$data);
    }
    public function get_client3(Request $request)
    {
        $s_date = $request->date_start3;
        $e_date = $request->date_end3;
        $data['first']    = date("Y-m-d",strtotime($s_date));
        $data['second']   = date("Y-m-d",strtotime($e_date));
      
        $data['registered_clients'] = TblBusinessModel::where('business_status', 5)->whereBetween('date_transact',[$s_date,$e_date])
                        ->BusinessAdmin()
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'registered_client');
        foreach ($data['registered_clients'] as $key => $registered_clients) 
        {
            $data['registered_clients'][$key]['due_date'] =  date("F j, Y", strtotime('+1 month', strtotime($registered_clients['date_transact'])));
        }
    
        return view('general_admin.pages.search_registered',$data);
    }
    public function search_send_invoice(Request $request)
    {
        $search_key1 = $request->search_key1;
        $data['clients'] = TblBusinessModel::where('business_name','like','%'.$search_key1.'%')->where('business_status', 3)
                            ->BusinessAdmin()
                            ->join('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')
                            ->orderBy('tbl_business.date_created',"asc")
                            ->paginate(10, ['*'], 'client');
        return view('general_admin.pages.search_merchant_invoice',$data);
    }
    public function search_agent(Request $request)
    {
        $search_key2 = $request->search_key2;
        $data['agentAdded'] = TblBusinessModel::where('business_name','like','%'.$search_key2.'%')->where('business_status', 20)
                        ->BusinessAdmin()
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'agent_added');
        return view('general_admin.pages.search_agent_added',$data);

    }
    public function search_pending(Request $request)
    {
        $search_key3              = $request->search_key3;
        $data['pending_clients']  = TblBusinessModel::where('business_name','like','%'.$search_key3.'%')
                                ->where('business_status', 4)
                                ->BusinessAdmin()
                                ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                                ->orderBy('tbl_business.date_created',"asc")
                                ->paginate(10, ['*'], 'pending_client');
        return view('general_admin.pages.search_pending',$data);
    }
    public function search_registered(Request $request)
    {
        $data['first']              = $search_key4 = $request->search_key4;
        $data['second']             = 'search';
        $data['registered_clients'] = TblBusinessModel::where('business_name','like','%'.$search_key4.'%')
                                      ->where('business_status', 5)
                                      ->BusinessAdmin()
                                      ->orderBy('tbl_business.date_created',"asc")
                                      ->paginate(10, ['*'], 'registered_client');
        return view('general_admin.pages.search_registered',$data);
    }
  
    public function general_admin_resend_invoice(Request $request)
    {
        $email            = $request->resend_email;
        $contact_name     = $request->resend_contact_name;
        $remarks          = $request->remarks;
        $business_id      = $request->resend_business_id;
        $date             = date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));
        $invoice_name     = $request->invoice_name_resend;
        $link             = "http://mvm.digimahouse.com/merchant/payment/".$business_id."/".$contact_name;
        $data             = array('name'=>$contact_name,'remarks'=>$remarks,'date'=>$date,'email'=>$email,'business_id'=>$business_id,'link'=>$link);
        $pathfile         = 'invoice/'.$invoice_name;
        $mail_send        = Mail::send('general_admin.pages.send_email_invoice', $data, function($message) use ($data,$pathfile) 
                          {
                             $message->to($data['email'], 'Zute Stranice')->subject('Your Invoice');
                             $message->attach(public_path($pathfile));
                             $message->from('zutestranice@gmail.com','Yellow Pages');
                          });
        if($mail_send)
        {
            $invoice['invoice_status']  = 'sent';
            TblInvoiceModels::where('business_id',$business_id)->update($invoice);
            return "<div class='alert alert-success'><strong>Success!</strong>Invoice Send.</div><br><center><button type='button' class='btn btn-default' onClick='window.location.reload();'' data-dismiss='modal'>Close</button></center>";
        }
        else
        {
            return "<div class='alert alert-danger'><strong>Failed to send!</strong>Please try again.</div>";
        }
    }
    public function general_admin_deactivate_user(Request $request,$id)
    {
        $business_id                  = $id;
        $update['business_status']    = '19';//19 for payment deactivated user and 18 for merchant deact.
        $user['status']               = 'deactivated';
        $update['date_transact']      = date("Y/m/d"); 
        $invoice['invoice_status']    = 'DECLINED';
                                        TblInvoiceModels::where('business_id',$business_id)->update($invoice);
                                        TblBusinessModel::where('business_id',$business_id)->update($update);
                                        TblUserAccountModel::where('business_id',$business_id)->update($user);
        Session::flash('success', "Merchant Already Deactivated");
        return Redirect::back();
    }
    public function general_admin_payment_monitoring()
    {
        $data['user']           = Self::global();
        $data['business_list']  = TblPaymentModel::where('payment_status','submitted')
                                ->PaymentAdmin()
                                ->groupBy('tbl_payment.payment_id')
                                ->paginate(10);
        return view('general_admin.pages.payment_monitoring',$data);
    }
    public function general_admin_view_payment_details(Request $request)
    {
        $payment_id = $request->id;
        $data['business_item'] = TblPaymentModel::where('payment_id',$payment_id)
                            ->PaymentAdmin()
                            ->where('tbl_invoice.invoice_status','!=','paid')
                            ->first();
        return view('general_admin.pages.payment_blade',$data);
    }
    public function general_admin_accept_and_activate(Request $request)
    {
        $business_id                = $request->business_id;
        $update['business_status']  = '5';
        $user['status']             = 'activated';
        $update['date_transact']    = date("Y/m/d"); 
        $payment['payment_status']  = 'Paid';
        $invoice['invoice_status']  = 'Paid';
        $check_insert = TblPaymentModel::where('business_id',$business_id)->update($payment);
                        TblBusinessModel::where('business_id',$business_id)->update($update);
                        TblUserAccountModel::where('business_id',$business_id)->update($user);
                        TblInvoiceModels::where('business_id',$business_id)->update($invoice);
        $info         = TblBusinessModel::where('tbl_business.business_id',$business_id)
                        ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                        ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                        ->first();
        $name         = $info->contact_prefix." ".$info->contact_first_name." ".$info->contact_last_name;
        $email        = $info->user_email;
        $password     = Crypt::decrypt($info->user_password);
        $link         = 'http://mvm.digimahouse.com/merchant/dashboard';
        $data         = array('name'=>$name,'email'=>$email,'password'=>$password,'link'=>$link);
        $check_mail   = Mail::send('general_admin.pages.activated_merchant_notif', $data, function($message) use($data) 
                        {
                          $message->to($data['email'], 'Activated Merchant')->subject('THE RIGHT PLACE FOR BUSINESS');
                          $message->from('guardians35836@gmail.com','Yellow Pages Customer');
                        });
        return "<h4 class='modal-title' >Success! Account already activated.</h4>";
    }
    public function general_admin_decline_and_deactivate(Request $request)
    {
        $business_id                = $request->business_id;
        $update['business_status']  = '19';//19 for payment deactivated user and 18 for merchant deact.
        $user['status']             = 'deactivated';
        $update['date_transact']    = date("Y/m/d"); 
        $invoice['invoice_status']  = 'DECLINED';
                                      TblInvoiceModels::where('business_id',$business_id)->update($invoice);
                                      TblBusinessModel::where('business_id',$business_id)->update($update);
                                      TblUserAccountModel::where('business_id',$business_id)->update($user);
        return "<h4 class='modal-title' >Success! Account already deactivated.</h4>";
    }
    public function general_admin_decline_user(Request $request,$id)
    {
        $business_id                = $id;
        $update['business_status']  = '18';//19 for payment deactivated user and 18 for merchant deact.
        $user['status']             = 'deactivated';
        $update['date_transact']    = date("Y/m/d"); 
                                      TblBusinessModel::where('business_id',$business_id)->update($update);
                                      TblUserAccountModel::where('business_id',$business_id)->update($user);
        Session::flash('success', "Merchant Already Deactivated");
        return Redirect::back();
    }
    public function general_admin_manage_invoice()
    {
        $data['user']       = Self::global();
        $data['_invoice']   = TblBusinessModel::where('business_status', 4)->orWhere('business_status', 5)
                            ->BusinessAdmin()
                            ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                            ->orderBy('tbl_invoice.business_id',"DESC")
                            ->paginate(10);
        return view('general_admin.pages.manage_invoice',$data);
    }
  
    public function general_admin_manage_user(Request $request)
    {

        $data['user']                 = Self::global();
        $data['page']                 = 'Manage Users';
        $data['_data_agent']          = TblUserModel::where('tbl_user.archived',0)->where('user_access_level','AGENT')->TeamUser()->paginate(10, ['*'], 'agent');
        $data['_team_super']          = TblUserModel::where('tbl_user.archived',0)
                                      ->where('user_access_level','SUPERVISOR')
                                      ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id')
                                      ->get();

        $data['_data_team']           = TblTeamModel::where('tbl_team.archived',0)
                                      ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_team.supervisor_id')
                                      ->paginate(10, ['*'], 'team');
                                      // dd($data['_data_team']);
        $data['_team_select']         = TblTeamModel::where('archived',0)->get();
        $data['_teams']               = TblTeamModel::all();
        $data['agent_merchant']       = TblBusinessModel::where('business_status',5)->get();
        $data['_data_supervisor']     = TblUserModel::where('tbl_user.archived',0)->where('user_access_level','SUPERVISOR')->TeamUser()->paginate(10, ['*'], 'supervisor');
        $data['_data_admin']          = TblUserModel::where('tbl_user.archived',0)
                                      ->where('user_access_level','ADMIN')
                                      ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id')
                                      ->paginate(10, ['*'], 'admin');
        $data['_merchant']            = TblBusinessModel::where('business_status',5)->BusinessAdmin()->paginate(10, ['*'], 'registered_client');
        
        return view('general_admin.pages.manage_user', $data);

    }
    public function general_admin_manage_user_details(Request $request)
    {
        $data['user_details']  = TblUserModel::where('tbl_user.user_id',$request->user_id)->TeamUser()->first();
        $data['_team_select']  = TblTeamModel::where('archived',0)->get();
        $data['user_password'] = Crypt::decrypt($data['user_details']->user_password);

        return view('general_admin.pages.user_details', $data);
    }
    public function general_admin_add_user(Request $request)
    { 
        $check = TblUserModel::where('user_email',$request->user_email)->first();
        if(count($check)==1)
        {
          return "email_exist";
        }
        else
        {
            $password   = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890"), 0,8);
          
            $userData = new TblUserModel;
            $userData->user_email         = $request->user_email;
            $userData->user_password      = Crypt::encrypt($password);
            $userData->user_access_level  = $request->user_access_level;
            $userData->save();

            $userInfoData = new TblUserInfoModel;
            $userInfoData->user_profile     = '/user_profile/default_profile.jpg';
            $userInfoData->user_first_name  = $request->user_first_name ;
            $userInfoData->user_last_name   = $request->user_last_name ;
            $userInfoData->user_gender      = $request->user_gender;
            $userInfoData->user_phone_number = $request->user_phone_number ;
            $userInfoData->user_address     = $request->user_address ;
            $userInfoData->user_created     = Carbon::now();
            $userInfoData->user_id          = $userData->user_id;
            $userInfoData->save();

            $teamData = new TblUserTeamModel;
            $teamData->team_id          = $request->team_id;
            $teamData->user_id          = $userData->user_id;
            $teamData->user_added       = Carbon::now();
            $teamData->user_calls       = 0;
            $teamData->save();

            $name       = $request->user_first_name." ".$request->user_last_name;
            $email      = $userData->user_email;
            $password   = Crypt::decrypt($userData->user_password);
            $link       = 'http://mvm.digimahouse.com/user/login';
            $data       = array('name'=>$name,'email'=>$email,'password'=>$password,'link'=>$link);
            $check_mail = Mail::send('email.email_file', $data, function($message) use($data) 
                      {
                        $message->to($data['email'], 'YELLOW PAGES')->subject('MVM Login');
                        $message->from('yeallowpages@noreply.com','Croatia Assistance');
                      });
            if($userInfoData->save()&&$teamData->save())
            {
                return "success";
            }
            else 
            {
                return "error";
            }
        }
    }
    public function general_admin_delete_user(Request $request)
    {
        $user_id = $request->delete_user_id;
        $archived['archived'] = '1';
        TblUserModel::where('user_id',$user_id)->update($archived);
        return "<div class='alert alert-success'><strong>Success!</strong>User Deleted Successfully!</div>";
    }
    public function general_admin_update_user(Request $request)
    {
        $userID                           = TblUserInfoModel::whereUser_info_id($request->user_info_id)->value("user_id");
        $userInfoData['user_first_name']  = $request->user_first_name;
        $userInfoData['user_last_name']   = $request->user_last_name;
        $userInfoData['user_gender']      = $request->user_gender;
        $userInfoData['user_phone_number']= $request->user_phone_number;
        $userInfoData['user_address']     = $request->user_address;
        $user['user_email']               = $request->user_email;
        $user['user_password']            = Crypt::encrypt($request->user_password);

        TblUserInfoModel::where('user_info_id',$request->user_info_id)->update($userInfoData);
        TblUserModel::whereUser_id($userID)->update($user);

        return "<div class='alert alert-success'><strong>Success!</strong>User Updated Successfully!</div>";  
    }
    public function general_admin_update_team_info(Request $request)
    {
        $id   = $request->id;
        $name = $request->name;
        $info = $request->info;
        $data['team_name'] = $name;
        $data['team_information'] =  $info;
        TblTeamModel::where('team_id',$id)->update($data);
        return "<div class='alert alert-success'><strong>Success!</strong>Team Information Updated Successfully!</div>";  
    }
    public function general_admin_assign_user(Request $request)
    {
        $user_id           = $request->user_id;
        $update['team_id'] = $request->team_id;
        TblUserTeamModel::where('user_id',$user_id)->update($update);
        return "<div class='alert alert-success'><strong>Success!</strong>User Assigned Successfully!</div>";
    }
    public function general_admin_assign_supervisor(Request $request)
    {
        $team_id                    = $request->team_id;
        $update['supervisor_id']    = $request->user_id;
        TblTeamModel::where('team_id',$team_id)->update($update);
        return "<div class='alert alert-success'><strong>Success!</strong>Supervsior Assigned Successfully!</div>";
    }
  
    public function general_admin_add_team(Request $request)
    {  
        $data['team_name']        = $request->team_name;
        $data['team_information'] = $request->team_info;
        $data['supervisor_id']    = $request->team_super;
        if($data['team_name']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Team Name.</div>";
        }
        else if($data['team_information']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Team Information.</div>";
        }
        
        else
        {
          TblTeamModel::insert($data);
          return "<div class='alert alert-success'><strong>Success!</strong>Team Added Successfully!</div>";
        }
    }
    public function general_admin_view_all_members(Request $request)
    {
        $id = $request->team_id;
        $data['supervisor'] = TblTeamModel::where('tbl_team.team_id',$id)
                              ->where('tbl_team.archived',0)
                              ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_team.supervisor_id')
                              ->first();
        $data['_data_agent'] = TblUserTeamModel::where('tbl_user_team.team_id',$id)->where('tbl_user_team.archived',0)->TeamAgent()->get();
        return view('general_admin.pages.viewmember',$data);
    }
    public function general_admin_delete_team(Request $request)
    {
        $team_id          = $request->delete_team_id;
        $data['archived'] = 1;
        TblTeamModel::where('team_id',$team_id)->update($data);
        return "<div class='alert alert-success'><strong>Success!</strong>Team Deleted Successfully!</div>";
    }
    public function update_merchant_business_info(Request $request)//
    {
  
        $data['user']         = Self::global();
        $id = $request->business_id;
        $business["company_information"] = $request->company_information;
        $business["business_website"]    = $request->business_website;
        $business["year_established"]    = $request->year_established;
        TblBusinessOtherInfoModel::where('business_id',$id)->update($business);
        return "<div class='alert alert-success'><strong>Success!</strong>Information Updated.</div>";
    }
    public function merchant_update_images(Request $request)
    {
      $file = $request->file('business_banner');
      $file1 = $request->file('other_image_one');
      $file2 = $request->file('other_image_two');
      $file3 = $request->file('other_image_three');
      $my_file = $request->business_banner_text;
      $my_file1 = $request->other_image_one_text;
      $my_file2 = $request->other_image_two_text;
      $my_file3 = $request->other_image_three_text;
      $business_id = $request->business_image_id;

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

      $data['business_banner'] = $filename;
      $data['business_id']    =  $business_id;
      $data['other_image_one'] = $filename1;
      $data['other_image_two'] = $filename2;
      $data['other_image_three'] = $filename3;
      // dd($data);
      $check_data = TblBusinessImages::where('business_id',$business_id)->count();
      if($check_data==1)
      {
        $check_insert = TblBusinessImages::where('business_id',$business_id)->update($data);
        if($check_insert)
        {
          Session::flash('success', "Merchant Information Updated");
          return Redirect::back();
        }
        else
        {   
          Session::flash('success', "Merchant Information Updated");
          return Redirect::back();
        }
      }
      else
      {
        $check_insert = TblBusinessImages::insert($data);
        if($check_insert)
        {
          Session::flash('success', "Merchant Information Updated");
          return Redirect::back();
        }
        else
        {   
          Session::flash('success', "Merchant Information Updated");
          return Redirect::back();
        }
      }

    }
    public function merchant_update_hours(Request $request)
    {
        $business_hours_to = $request->input('business_hours_to');
        $business_hours_from = $request->input('business_hours_from');
        $business_id = $request->input('business_id');
        $days = $request->input('days');
        foreach($business_hours_from as $key => $business_hours_f)
        {
            $data['business_hours_from']= $business_hours_f;
            $data['business_hours_to']= $business_hours_to[$key];  
            $check  = TblBusinessHoursmodels::where('business_id',$business_id[$key])->where('days',$days[$key])->update($data);
        }
        Session::flash('success', 'Merchant Information Updated');
        return Redirect::back();  
    }
    public function add_merchant_payment_method(Request $request)
    {
        $data["payment_method_name"] = $request->paymentMethodName;
        $data["payment_method_info"] = "not available";
        $data["business_id"] = $request->businessId;
        TblABusinessPaymentMethodModel::insert($data); 
        return "<div class='alert alert-success'><strong>Success!</strong>Payment Method Added.</div>";
    }
  public function delete_merchant_payment_method(Request $request)
  {
    $id = $request->paymentMethodId;
    TblABusinessPaymentMethodModel::where('payment_method_id',$id)->delete();
    Session::flash('danger', "Payment Deleted");
    return "<div class='alert alert-success'><strong>Success!</strong>Payment Method deleted.</div>";

  }
  public function general_admin_manage_website()
  {
    $data['user']                 = Self::global();
    $data['_membership']          = TblMembeshipModel::where('archived',0)->paginate(10, ['*'], 'membership');
    $data['_payment_method']      = TblPaymentMethod::where('archived',0)->paginate(10, ['*'], 'payment');
    $data['_county']              = TblCountyModel::paginate(10, ['*'], 'county');
    $data['_county_city']         = TblCountyModel::get();
    $data['_city']                = TblCityModel::join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')
                                  ->paginate(10, ['*'], 'city');
    return view('general_admin.pages.manage_website',$data);
  }

  public function general_admin_add_membership(Request $request)
  {
    $data['membership_name'] = $request->membershipName;
    $data['membership_price']= $request->membershipPrice;
    $data['membership_info'] = $request->membershipInfo;
    TblMembeshipModel::insert($data);
    return "<div class='alert alert-success'><strong>Success!</strong>Membership Added.</div>"; 
  }
  public function general_admin_add_payment_method(Request $request)
  {
    $data['payment_method_name']= $request->paymentMethodName;
    TblPaymentMethod::insert($data);
    return "<div class='alert alert-success'><strong>Success!</strong>Payment Method Added.</div>"; 
  }
  public function general_admin_update_payment_method(Request $request)
  {
    $id = $request->pay_id;
    $data['payment_method_name'] = $request->pay_name;
    TblPaymentMethod::where('payment_method_id',$id)->update($data);
    return "<div class='alert alert-success'><strong>Success!</strong>Payment Method Updated.</div>"; 
  }
  public function general_admin_delete_payment_method(Request $request)
  {
    $payment_method_id  = $request->delete_id;
    $data['archived']   = 1;
    TblPaymentMethod::where('payment_method_id',$payment_method_id)->update($data);
    return "<div class='alert alert-success'><strong>Success!</strong>Payment Method Deleted.</div>";
  }
  public function general_admin_update_membership(Request $request)
  {
    $mem_id = $request->mem_id;
    $mem['membership_name'] = $request->mem_name;
    $mem['membership_price'] = $request->mem_price;
    $mem['membership_info']   = $request->mem_info;
    TblMembeshipModel::where('membership_id',$mem_id)->update($mem);
    return "<div class='alert alert-success'><strong>Success!</strong>Membership updated.</div>";
  }
  public function general_admin_delete_membership(Request $request)
  {
    $membership_id = $request->delete_id;
    $data['archived'] =1;
    TblMembeshipModel::where('membership_id',$membership_id)->update($data);
    return "<div class='alert alert-success'><strong>Success!</strong>Membership Deleted.</div>";
    
  }
  public function general_admin_update_county(Request $request)
  {
    $count_id = $request->count_id;
    $data['county_name']= $request->count_name;
    TblCountyModel::where('county_id',$count_id)->update($data);
    return "<div class='alert alert-success'><strong>Success!</strong>County Updated.</div>"; 
  
  }
  public function general_admin_delete_county(Request $request)
  {
    $county_id = $request->delete_id;
    TblCountyModel::where('county_id',$county_id)->delete();
    return "<div class='alert alert-success'><strong>Success!</strong>County Deleted.</div>";
    
  }
  public function general_admin_update_city(Request $request)
  {
    $data_id= $request->city_id;
    $data['city_name']= $request->city_name;
    $data['postal_code']= $request->city_zip;
    TblCityModel::where('city_id',$data_id)->update($data);
    return "<div class='alert alert-success'><strong>Success!</strong>City Updated.</div>"; 
  }
  public function general_admin_delete_city(Request $request)
  {
    $city_id = $request->delete_id;
    TblCityModel::where('city_id',$city_id)->delete();
    return "<div class='alert alert-success'><strong>Success!</strong>City Deleted.</div>";
    
  }
  public function general_admin_add_county(Request $request)
  {
    $data['county_name']= $request->countyName;
    TblCountyModel::insert($data);
    return "<div class='alert alert-success'><strong>Success!</strong>County Added.</div>"; 
  }
  public function general_admin_add_city(Request $request)
  {
    $data['county_id']= $request->countyID;
    $data['city_name']= $request->cityName;
    $data['postal_code']= $request->cityZip;
    TblCityModel::insert($data);
    return "<div class='alert alert-success'><strong>Success!</strong>City Added.</div>"; 
  }
  public function general_admin_manage_front()
  {
    $data['user']                 = Self::global();
    $data['page']                 = 'Manage Front';
    $data['about_us']             = TblAboutUs::first();
    $data['contact_us']           = TblContactUs::first();
    $data['thank_you']            = TblThankYou::first();
    $data['terms']                = TblTerms::first();
    return view('general_admin.pages.manage_front',$data);
  }
  public function general_admin_update_about_us(Request $request)
  {
    $data['information_header'] = $request->information_header;
    $data['information']        = $request->information;
    $check = TblAboutUs::count();
    if ($check)
    {
      TblAboutUs::where('about_us_id',1)->update($data);
      return "<div class='alert alert-success'><strong>Success!</strong> About Us Information updated.</div>";
    }
    else
    {
      TblAboutUs::insert($data);
    }
    return "<div class='alert alert-success'><strong>Success!</strong> About Us Information updated.</div>";
  }
  public function general_admin_update_contact_us(Request $request)
  {

    $data['phone_number']       = $request->phone_number;
    $data['complete_address']   = $request->complete_address;
    $data['email']              = $request->email;
    $check = TblContactUs::count();
    if($check)
    {

      TblContactUs::where('contact_us_id',1)->update($data);

    }
    else
    {
        TblContactUs::insert($data);
    }

     return "<div class='alert alert-success'><strong>Success!</strong> Contact Us Information updated.</div>";
  }
  public function general_admin_update_thank_you(Request $request)
  { 
    $data['header']                  = $request->header;
    $data['information_thank_you']   = $request->information_thank_you;

    $check = TblThankYou::count();
    if($check)
    {
      TblThankYou::where('thank_you_id',1)->update($data);
    }
    else
    {
      TblThankYou::insert($data);
    }
    return "<div class='alert alert-success'><strong>Success!</strong> Thank you Information updated.</div>";
  }
  public function general_admin_update_terms(Request $request)
  {
    $data['terms_of_offers']  = $request->terms_of_offers;

    $check = TblTerms::count();
    if($check)
    {
      TblTerms::where('terms_id',1)->update($data);
    }
    else
    {
      TblTerms::insert($data);
    }

    return "<div class='alert alert-success'><strong>Success!</strong> Terms of Offers updated.</div>";
  }public function general_admin_manage_categories()
  {
    $data['user']         = Self::global();
    $data['category']     = TblBusinessCategoryModel::where('parent_id',0)->where('archived',0)->paginate(10, ['*'], 'category');
    return view('general_admin.pages.manage_categories',$data);
  }
  public function general_admin_add_category(Request $request)
  {
    $data['business_category_name']         = $request->cat_name;
    $data['business_category_information']  = $request->cat_info;
    $data['parent_id']                      = 0;
    TblBusinessCategoryModel::insert($data);
    return "<div class='alert alert-success'><strong>Success!</strong>Category Added.</div>";
  }

  public function general_admin_edit_category(Request $request)
  {
    $data['business_category_name']         = $request->cat_name;
    $data['business_category_information']  = $request->cat_info;
    TblBusinessCategoryModel::where('business_category_id',$request->cat_id)->update($data);
    return "<div class='alert alert-success'><strong>Success!</strong>Category Updated.</div>";
  }
  public function general_admin_search_category(Request $request)
  {
    $search_key         = $request->search_key;
    $data['category']   = TblBusinessCategoryModel::where('business_category_name','like','%'.$search_key.'%')->where('archived',0)->paginate(10, ['*'], 'search_result_category');
    return view('general_admin.pages.search_blade',$data);
  }
  public function general_admin_delete_category(Request $request)
  {
    $id                 = $request->delete_id;
    $data['archived']   = 1;
    TblBusinessCategoryModel::where('business_category_id',$id)->update($data);
    TblBusinessTagCategoryModel::where('business_category_id',$id)->delete();

    return "<div class='alert alert-success'><strong>Success!</strong>Category Deleted.</div>";
  }
  public function general_admin_get_sub_category(Request $request)
  {
    $business_category_id  = $request->cat_id;
    $data['_sub_category'] = TblBusinessCategoryModel::where('parent_id',$business_category_id)->where('archived',0)->get();
    return view('general_admin.pages.get_sub_category',$data);
  }

  public function general_admin_add_sub_category(Request $request)
  {
    $ins['business_category_name']        = $request->cat_name;
    $ins['business_category_information'] = $request->cat_info;
    $ins['parent_id']                     = $request->cat_id;
    $check = TblBusinessCategoryModel::insert($ins);
    if($check)
    {
      $data['_sub_category'] = TblBusinessCategoryModel::where('parent_id',$request->cat_id)->get();
      return view('general_admin.pages.get_sub_category',$data);
    }
    else
    {
      return "<div class='alert alert-danger'><strong>Failed!</strong>Failed to Insert.</div><br><center><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></center>";
    }
  }
  public function general_admin_edit_sub_category(Request $request)
  {
    $ins['business_category_name']        = $request->cat_name;
    $ins['business_category_information'] = $request->cat_info;
    $category_id                          = $request->cat_id;
    $check = TblBusinessCategoryModel::where('business_category_id',$category_id)->update($ins);
    if($check)
    {
      return "<div class='alert alert-success'><strong>Success!</strong>Sub Category Updated.</div><br>";
    }
    else
    {
      return "<div class='alert alert-danger'><strong>Failed!</strong>Failed to Insert.</div><br>";
    }
  }

  public function general_admin_view_merchant_info(Request $request)
  {

    $data['merchant_id'] = $business_id = $request->business_id;

    TblBusinessModel::where('tbl_business.business_id',$business_id)
                    ->join('tbl_business_hours','tbl_business_hours.business_id','=','tbl_business.business_id')
                    ->get();
    $data['merchant_info']    = TblBusinessModel::where('business_id',$business_id)
                              ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                              ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id') 
                              ->first();
    $data['_payment_method']  = TblABusinessPaymentMethodModel::where('business_id',$business_id)->paginate(5);
    $data['other_info']       = TblBusinessOtherInfoModel::where('business_id',$business_id)->first();
    $data['_business_hours']  = TblBusinessHoursmodels::where('business_id',$business_id)->get();
    $data['_images']          = TblBusinessImages::where('business_id',$business_id)->get();
    $images                   = TblBusinessImages::where('business_id',$business_id)->count();
    if($images==0)
    {
      $data['images']  = 0;
    }
    else
    {
      $data['images']  = 1;
      $data['_images'] = TblBusinessImages::where('business_id',$business_id)->first();
    }
    return view("general_admin.pages.view_merchant_info",$data);

  }
  public function general_admin_update_merchant_info(Request $request)
  {
    $data['user']         = Self::global();
    $data["company_information"] = $request->company_information;
    $data["business_website"]    = $request->business_website;
    $data["year_established"]    = $request->year_established;
    $check = TblBusinessOtherInfoModel::where('business_id',$request->business_id)->update($data);
    if($check)
    {
      return "<div class='alert alert-success'><strong>Success!</strong>Information Updated.</div>";
    }
    else
    {
      return "<div class='alert alert-danger'><strong>Sorry!</strong>Transaction Failed.</div>";
    }
   
  }



    

    public function  search_payment_monitoring(Request $request)
    {
      $search_key = $request->search_key;
      $data['business_list'] = TblPaymentModel::where('payment_status','submitted')
                          ->where('business_name','like','%'.$search_key.'%')
                          ->join('tbl_business','tbl_business.business_id','=','tbl_payment.business_id')
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_contact_person_id','=','tbl_payment.business_contact_person_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->get();
      return view('general_admin.pages.search_payment_monitoring',$data);
    }

     public function  search_manage_invoice(Request $request)
    {
      $search_key1 = $request->search_key1;
      $data['_invoice'] = TblBusinessModel::where('business_name','like','%'.$search_key1.'%')
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                          ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                          ->orWhere('tbl_invoice.invoice_number','like','%'.$search_key1.'%')
                          ->orderBy('tbl_invoice.invoice_id',"asc")
                          ->get();

      return view('general_admin.pages.search_manage_invoice',$data);
    }

    

    public function search_merchant(Request $request)
    {

      $search_key_merchant = $request->search_key_merchant;
      $data['_merchant']  = TblBusinessModel::where('business_name','like','%'.$search_key_merchant.'%')
                          ->where('business_status',5)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->get();
       return view('general_admin.pages.search_merchant',$data);
    }


    

    public function search_team_user(Request $request)
    {
      
      $search_key_team              = $request->search_key_team;
      $data['_data_team']           = TblTeamModel::where('team_name','like','%'.$search_key_team.'%')
                                      ->get();
      return view('general_admin.pages.search_team',$data);
    }

    
    

    public function general_admin_archived()
    {

      $data['user']                   = Self::global();
      $data['page']                   = 'Archived';
      $data['_admin']                 = TblUserModel::where('tbl_user.archived',1)->Admin()->get();
      $data['_agent']                 = TblUserModel::where('tbl_user.archived',1)->Agent()->get();
      $data['_supervisor']            = TblUserModel::where('tbl_user.archived',1)->Super()->get();
      $data['_team_archived']         = TblTeamModel::where('archived',1)->get();
      $data['_payment_archived']      = TblPaymentMethod::where('archived',1)->get();
      $data['_membership_archived']   = TblMembeshipModel::where('archived',1)->get();
      
      $data['_category_archived']     = TblBusinessCategoryModel::where('archived',1)->get();
      $data['_merchant']              = TblBusinessModel::where('business_status',18)->orWhere('business_status',19)
                                      ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                      ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                                      ->get();
      
      $data['_supervisor_id']          = collect($data['_supervisor']->toArray())->pluck('user_id')->toArray();
      $data['_agent_id']               = collect($data['_agent']->toArray())->pluck('user_id')->toArray();
      $data['_admin_id']               = collect($data['_admin']->toArray())->pluck('user_id')->toArray();
      $data['_team_id']                = collect($data['_team_archived']->toArray())->pluck('team_id')->toArray();
      $data['_payment_id']             = collect($data['_payment_archived']->toArray())->pluck('payment_method_id')->toArray();
      $data['_membership_id']          = collect($data['_membership_archived']->toArray())->pluck('membership_id')->toArray();
      $data['_category_id']            = collect($data['_category_archived']->toArray())->pluck('business_category_id')->toArray();
      $data['_merchant_id']            = collect($data['_merchant']->toArray())->pluck('business_id')->toArray();

      return view('general_admin.pages.archived',$data);
    }
    public function delete(Request $request)
    {
        switch ($request->table)
        {
          case 'merchant':
              if($request->type == 'one')
              {
                TblBusinessModel::whereBusiness_id($request->id)->delete();
                TblUserAccountModel::whereBusiness_id($request->id)->delete();
                return "<div class='alert alert-success' >Success! Merchant is already deleted</div>";
              }
              else
              {
                TblBusinessModel::whereIn('business_id',explode(",",$request->id))->delete();
                TblUserAccountModel::whereIn('business_id',explode(",",$request->id))->delete();
                return "<div class='alert alert-success' >Success! All Merchants are already deleted</div>";
              }
            break;
          case 'user':
              if($request->type == 'one')
              {
                TblUserModel::whereUser_id($request->id)->delete();
                return "<div class='alert alert-success' >Success! User is already deleted</div>";
              }
              else
              {
                TblUserModel::whereIn('user_id',explode(",",$request->id))->delete();
                return "<div class='alert alert-success' >Success! All Users are already deleted</div>";
              }
          case 'payment':
              if($request->type == 'one')
              {
                TblPaymentMethod::wherePayment_method_id($request->id)->delete();
                return "<div class='alert alert-success' >Success! Payment is already deleted</div>";
              }
              else
              {
                TblPaymentMethod::whereIn('payment_method_id',explode(",",$request->id))->delete();
                return "<div class='alert alert-success' >Success! All Payments are already deleted</div>";
              }
          case 'membership':
              if($request->type == 'one')
              {
                TblMembeshipModel::whereMembership_id($request->id)->delete();
                return "<div class='alert alert-success' >Success! Membership is already deleted</div>";
              }
              else
              {
                TblMembeshipModel::whereIn('membership_id',explode(",",$request->id))->delete();
                return "<div class='alert alert-success' >Success! All Memberships are already deleted</div>";
              }
          case 'team':
              if($request->type == 'one')
              {
                 TblTeamModel::whereTeam_id($request->id)->delete();
                 return "<div class='alert alert-success' >Success! Team is already deleted</div>";
              }
              else
              {
                TblTeamModel::whereIn('team_id',explode(",",$request->id))->delete();
                 return "<div class='alert alert-success' >Success! All Teams are already deleted</div>";
              }
          case 'category':
              if($request->type == 'one')
              {
                 TblBusinessCategoryModel::whereBusiness_category_id($request->id)->delete();
                 return "<div class='alert alert-success' >Success! Category is already deleted</div>";
              }
              else
              {
                 TblBusinessCategoryModel::whereIn('business_category_id',explode(",",$request->id))->delete();
                 return "<div class='alert alert-success' >Success! All Categories are already deleted</div>";
              }
        }
    }

    public function archived_restore_merchant(Request $request)
    {
      $business_id  = $request->id;
      $status       = $request->status;
      if($status==18)
      {
        $update['business_status'] = '3';//19 for payment deactivated user and 18 for merchant deact.
        $user['status'] = 'registered';
        $update['date_transact'] = date("Y/m/d"); 
        TblBusinessModel::where('business_id',$business_id)->update($update);
        TblUserAccountModel::where('business_id',$business_id)->update($user);
        return "<div class='alert alert-success' >Success! Account already restore, goto merchant in merchant TAB to issue invoice.</div>";
      }
      elseif($status==19)
      {
        $update['business_status'] = '5';
        $user['status'] = 'Activated';
        $update['date_transact'] = date("Y/m/d"); 
        $invoice['invoice_status'] = 'paid';
        TblInvoiceModels::where('business_id',$business_id)->update($invoice);
        TblBusinessModel::where('business_id',$business_id)->update($update);
        TblUserAccountModel::where('business_id',$business_id)->update($user);
        return "<div class='alert alert-success' >Success! Account already Activated.</div>";
      }
    }
    public function archived_restore_user(Request $request)
    {
      $user_id          = $request->id;
      $data['archived'] = 0;
      TblUserModel::where('user_id',$user_id)->update($data);
      return "<div class='alert alert-success' >Success! Account already Activated.</div>";
    }
    
    public function archived_restore_payment(Request $request)
    {
      $id  = $request->id;
      $data['archived'] = 0;
      TblPaymentMethod::where('payment_method_id',$id)->update($data);
      return "<div class='alert alert-success' >Success! Account already Activated.</div>";
    }
    public function archived_restore_membership(Request $request)
    {
      $id  = $request->id;
      $data['archived'] = 0;
      TblMembeshipModel::where('membership_id',$id)->update($data);
      return "<div class='alert alert-success' >Success! Account already Activated.</div>";
    }
    public function archived_restore_team(Request $request)
    {
      $id  = $request->id;
      $data['archived'] = 0;
      TblTeamModel::where('team_id',$id)->update($data);
      return "<div class='alert alert-success' >Success! Account already Activated.</div>";
    }
    public function archived_restore_category(Request $request)
    {
      $id  = $request->id;
      $data['archived'] = 0;
      TblBusinessCategoryModel::where('business_category_id',$id)->update($data);
      return "<div class='alert alert-success' >Success! Account already Activated.</div>";
    }
}



