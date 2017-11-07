<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblBusinessModel;
use App\Models\TblAdminModels;
use App\Models\TblUserAccountModel;
use App\Models\TblPaymentModel;
use App\Models\TblBusinessCategoryModel;

use App\Models\TblBusinessContactPersonModel;
use App\Models\TblInvoiceModels;
use App\Models\TblCityModel;
use App\Models\TblCountyModel;
use App\Models\TblTeamModel;
use App\Models\TblAgentModel;
use App\Models\TblSupervisorModels;
use App\Models\TblMembeshipModel;
use App\Models\TblBusinessSubCategoryModel;
use App\Models\TblBusinessSubSubCategoryModel;

use DB;
use Response;
use Session;
use Redirect;

use PDF2;
use PDF;
use Mail;



class GeneralAdminController extends Controller
{
    public static function allow_logged_in_users_only()
    {
        if(session("general_admin_login") != true)
        {
            return Redirect::to("/general_admin")->send();
        }
    }

    public static function allow_logged_out_users_only()
    {
        if(session("general_admin_login") == true)
        {
            return Redirect::to("/general_admin/dashboard")->send();
        }
    }


      public function index()

    {
        $data['countyList'] = TblCountyModel::get();
        return view('general_admin.pages.general_admin_login',$data);

    }
    public function general_admin_login_submit(Request $request)
    {

        $validate_login = TblAdminModels::where('email','=',$request->email)->first();

        if($validate_login)
        {

            if (password_verify($request->password, $validate_login->password)) 

                {
                    Session::put("general_admin_login",true);
                    Session::put("admin_id",$validate_login->admin_id);
                    Session::put("full_name",$validate_login->full_name);
                    Session::put("email",$validate_login->email);
                    Session::put("position",$validate_login->position);
                    // Session::put("login",$validate_login->email);
                    $data['page']   = 'Dashboard';
                    return Redirect::to('/general_admin/dashboard');
                }

            else
            {
                $data['page']  = 'Admin login';
                return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
            }
        }
        else
        {
            return Redirect::back()->withErrors(['User Login is Incorect!', 'User Login is Incorect!']);
        }
    }

    public function general_admin_logout()
    {
        Session::forget("general_admin_login");
        return Redirect::to("/general_admin");
    }

    public function general_admin_business_list(Request $request)
    {

          $data['business_list'] = $this->business_data($request['business_name']);
          return view('general_admin.pages.business',$data)->render();

        Self::allow_logged_in_users_only();
       
    }

    public function general_admin_dashboard()
    {
         Self::allow_logged_in_users_only();
         $count_merchant = TblUserAccountModel::get();
         $count_agent = TblAgentModel::get();
         $count_supervisor = TblSupervisorModels::get();
         $count_admin = TblAdminModels::get();
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
         $count_merchant_admin = TblBusinessModel::where('business_status',3)->get();
         $count_merchant_admin_payment = TblBusinessModel::where('business_status',4)->get();
         $count_merchant_admin_activated = TblBusinessModel::where('business_status',5)->get();
         $data['countCall'] = $count_merchant_agent->count();
         $data['countMP3'] = $count_merchant_supervisor->count();
         $data['countInvoice'] = $count_merchant_admin->count();
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
        
        return view('general_admin.pages.dashboard',$data);
    }

    public function get_business_list(Request $request)
    {
        if($request->ajax())
        {
            $business_list = $this->business_data($request['business_name']);

            if((!empty($request['business_name'])))
            {
                $business_name = $request['business_name'];
                $view = view('general_admin.pages.business_list', compact('business_list', 'business_name'))->render();
                return Response::json($view);
            }
        }
    }

    public function general_admin_merchants()
    {
        Self::allow_logged_in_users_only();
        $data['page']    = 'Merchant';
        $data['clients'] = TblBusinessModel::where('business_status', 3)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->join('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        $data['agentAdded'] = TblBusinessModel::where('business_status', 20)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        $data['pending_clients'] = TblBusinessModel::where('business_status', 4)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                          ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
        $data['registered_clients'] = TblBusinessModel::where('business_status', 5)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
      
        return view('general_admin.pages.merchants',$data);
    }
    public function general_admin_send_invoice($id)
    {
      $check=TblInvoiceModels::where('business_id',$id)->first();
      if($check)
        {
           return Redirect::to('/general_admin/merchants');
        }
      else
      {
         $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$id)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id')
                          ->first();
        $data['id']=$id;
        return view('general_admin.pages.invoice',$data);
       }
    }

    public function general_admin_send_save_invoice(Request $request,$id)
    {

      $checked=TblInvoiceModels::where('business_id',$id)->first();
      if($checked)
        {
          Session::flash('error', 'Transaction Failed! You already issue an invoice to this person. Note: goto Manage Invoice to Resend/View the invoice!');
          return Redirect::to('/general_admin/merchants');
        }
      else
      {
      $business_id = $request->business_id;
      $business_contact_person_id = $request->business_contact_person_id;
      $invoice_number = $request->invoice_number;
      $data['invoice_number'] = $request->invoice_number;

      
      
       if($request->submit == 'Print') 
       {
            $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$business_id)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id')
                          ->first();
            $format["title"] = "james";
            $format["format"] = "A4";
            $format["default_font"] = "sans-serif";
            $pdf = PDF::loadView('mail', $data, [], $format);
            $unique=uniqid();
            $file_name  = $data['invoice_info']->contact_first_name."-".$data['invoice_info']->business_name."-".$unique.'.pdf';
            $save_pdf = $pdf->save(public_path('invoice/'.$file_name));
            $invoice['invoice_number'] = $invoice_number;
            $invoice['invoice_name'] = $file_name;
            $invoice['invoice_path'] = '/invoice/'.$file_name;
            $invoice['invoice_status'] = 'Print';
            $invoice['business_id'] = $business_id;
            $invoice['business_contact_person_id'] = $business_contact_person_id;
            TblInvoiceModels::insert($invoice);
            $update['business_status'] = 4;
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
            $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$business_id)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id')
                                ->first();
            $format["title"] = "james";
            $format["format"] = "A4";
            $format["default_font"] = "sans-serif";
            $pdf = PDF::loadView('mail', $data, [], $format);
            $unique=uniqid();
            $file_name  = $data['invoice_info']->contact_first_name."-".$data['invoice_info']->business_name."-".$unique.'.pdf';
            $save_pdf = $pdf->save(public_path('invoice/'.$file_name));
            $invoice['invoice_number'] = $invoice_number;
            $invoice['invoice_name'] = $file_name;
            $invoice['invoice_path'] = '/invoice/'.$file_name;
            $invoice['invoice_status'] = 'Download';
            $invoice['business_id'] = $business_id;
            $invoice['business_contact_person_id'] = $business_contact_person_id;
            TblInvoiceModels::insert($invoice);
            $update['business_status'] = 4;
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
            $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$business_id)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id')
                          ->first();
            $format["title"] = "james";
            $format["format"] = "A4";
            $format["default_font"] = "sans-serif";
            $unique=uniqid();
            $file_name  = $data['invoice_info']->contact_first_name."-".$data['invoice_info']->business_name."-".$unique.'.pdf';
            $pdf = PDF::loadView('mail', $data, [], $format);
            $save_pdf = $pdf->save(public_path('invoice/'.$file_name));
            // $save_pdf = $pdf->save(public_path('invoice'));
            $invoice['invoice_number'] = $invoice_number;
            $invoice['invoice_name'] = $file_name;
            $invoice['invoice_path'] = '/invoice/'.$file_name;
            $invoice['invoice_status'] = 'send';
            $invoice['business_id'] = $business_id;
            $invoice['business_contact_person_id'] = $business_contact_person_id;
            TblInvoiceModels::insert($invoice);
            $update['business_status'] = 4;
            $update['date_transact'] = date("Y/m/d");
            TblBusinessModel::where('business_id',$business_id)->update($update);
            if($save_pdf)
            {
                $email_name = $data['invoice_info']->contact_first_name; 
                $email_email = $data['invoice_info']->user_email;
                $date=date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));
                $data = array('name'=>$email_name,'date'=>$date,'email'=>$email_email,'business_id'=>$business_id,'path'=>'invoice/'.$file_name,'remarks'=>'Please Pay As Soon As Possible.');
                
                // $data = array('name'=>'james_ako','date'=>'james','email'=>'guardians35836@gmail.com','business_id'=>$business_id,'remarks'=>'Please Pay As Soon As Possible.');
                $pathfile='invoice/'.$file_name;
                $mail_send = Mail::send('general_admin.pages.send_email_invoice', $data, function($message) use ($pathfile) {
                   $message->to('guardians35836@gmail.com', 'Tutorials Point')->subject
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
    public function general_admin_manage_invoice()
    {

      $data['_invoice'] = TblBusinessModel::where('business_status', 4)->orWhere('business_status', 5)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                          ->join('tbl_agent','tbl_agent.agent_id','=','tbl_business.agent_id')
                          ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                          ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                          ->orderBy('tbl_invoice.invoice_id',"asc")
                          ->get();
          return view('general_admin.pages.manage_invoice',$data);
    }
    public function general_admin_resend_invoice(Request $request)
    {
        $email = $request->resend_email;
        $contact_name = $request->resend_contact_name;
        $remarks = $request->remarks;
        $business_id = $request->resend_business_id;
        $date=date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));
        $invoice_name = $request->invoice_name_resend;
        $data = array('name'=>$contact_name,'remarks'=>$remarks,'date'=>$date,'email'=>$email,'business_id'=>$business_id);
                $pathfile='invoice/'.$invoice_name;
                $mail_send = Mail::send('general_admin.pages.send_email_invoice', $data, function($message) use ($data,$pathfile) {
                   $message->to($data['email'], 'Croatia Directory')->subject
                      ('Your Croatia Directory Invoice');
                   $message->attach(public_path($pathfile));
                   $message->from('guardians35836@gmail.com','Croatia Directory');
                });
                  if($mail_send)
                  {
                     return "<div class='alert alert-success'><strong>Success!</strong>Invoice Send.</div><br><center><button type='button' class='btn btn-default' onClick='window.location.reload();'' data-dismiss='modal'>Close</button></center>";
                  }
                  else
                  {
                     return "<div class='alert alert-danger'><strong>Failed to send!</strong>Please try again.</div>";
                  }
    }

    public function general_admin_payment_monitoring()
    {
      
      $data['business_list'] = TblPaymentModel::where('payment_status','submitted')
                                          ->join('tbl_business','tbl_business.business_id','=','tbl_payment.business_id')
                                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_contact_person_id','=','tbl_payment.business_contact_person_id')
                                          ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                                          ->get();
         // dd($data);
      return view('general_admin.pages.payment_monitoring',$data);
    }
    public function general_admin_accept_and_activate(Request $request)
    {
      $business_id = $request->business_id;
      $update['business_status'] = '5';
      $user['status'] = 'activated';
      $update['date_transact'] = date("Y/m/d"); 
      $payment['payment_status'] = 'Paid';
      $check_insert = TblPaymentModel::where('business_id',$business_id)->update($payment);
      TblBusinessModel::where('business_id',$business_id)->update($update);
      TblUserAccountModel::where('business_id',$business_id)->update($user);
      $info = TblBusinessModel::where('tbl_business.business_id',$business_id)
                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                          ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                          ->first();
      $name = $info->contact_prefix." ".$info->contact_first_name." ".$info->contact_last_name;
      $email = $info->user_email;
      $password = $info->string_password;

      $data = array('name'=>$name,'email'=>$email,'password'=>$password);
      $check_mail = Mail::send('general_admin.pages.activated_merchant_notif', $data, function($message) use($data) {
      $message->to($data['email'], 'Activated Merchant')->subject
            ('THE RIGHT PLACE FOR BUSINESS');
         $message->from('guardians35836@gmail.com','Croatia Customer');
        });





      return "<h4 class='modal-title' >Success! Account already activated.</h4>";

    }
    public function general_admin_decline_and_deactivate(Request $request)
    {
      $business_id = $request->business_id;
      $update['business_status'] = '19';//19 for deactivated user
      $user['status'] = 'deactivated';
      $update['date_transact'] = date("Y/m/d"); 
      $invoice['invoice_status'] = 'Paid';
      TblPaymentModel::where('business_id',$business_id)->update($invoice);
      TblBusinessModel::where('business_id',$business_id)->update($update);
      TblUserAccountModel::where('business_id',$business_id)->update($user);
      return "<h4 class='modal-title' >Success! Account already deactivated.</h4>";

    }

    public function get_business_list_info(Request $request)
    {
        if($request->ajax())
        {
            $business_list = $this->business_data($request['business_name']);
    
            $business_name = $request['business_name'];
            $view = view('general_admin.pages.business_list', compact('business_list', 'business_name'))->render();
            return Response::json($view);
        }
    }

    public function get_business_info(Request $request)
    {
        $business_info = DB::table('tbl_business')
                      ->join('tbl_business_contact_person', 'tbl_business.business_id', '=', 'tbl_business_contact_person.business_id')
                      ->where('tbl_business.business_id', '=', $request->business_id)->first();

        $view = view('general_admin.pages.business_info', compact('business_info'))->render();
        return Response::json($view);
    }

    public function business_data($business_name)
    {
        $business_list = DB::table('tbl_business')->join('tbl_user_account', 'tbl_business.business_id', '=', 'tbl_user_account.business_id')->where('tbl_business.business_id', '=', 'tbl_user_account.business_id')->orWhere('business_name','LIKE', '%'.$business_name.'%')->paginate(5);
       
        return $business_list;
    }

    public function email_invoice()
    {
      Self::allow_logged_in_users_only();
        return view('general_admin.pages.email_invoice');
    }
    public function general_admin_manage_user()
    {

      Self::allow_logged_in_users_only();
      $data['_data_agent'] = TblAgentModel::get();
      $data['_data_team'] = TblTeamModel::get();
      $data['_data_supervisor'] = TblSupervisorModels::get();
      $data['_data_admin'] = TblAdminModels::get();
      $data['page'] = 'Manage Users';
      return view('general_admin.pages.manage_user', $data);

    }
    public function general_admin_manage_website()
    {
      $data['_membership'] = TblMembeshipModel::get();
      $data['_county'] = TblCountyModel::get();
      $data['_city'] = TblCityModel::
                       join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')
                       ->get();
      return view('general_admin.pages.manage_website',$data);
    }
    public function general_admin_add_membership(Request $request)
    {
      $data['membership_name'] = $request->membershipName;
      $data['membership_price']= $request->membershipPrice;
      TblMembeshipModel::insert($data);
      return "<div class='alert alert-success'><strong>Success!</strong>Membership Added.</div>"; 
    }
    public function general_admin_update_membership(Request $request)
    {
      $mem_id = $request->mem_id;
      $mem['membership_name'] = $request->mem_name;
      $mem['membership_price'] = $request->mem_id;
      TblMembeshipModel::where('membership_id',$mem_id)->update($mem);
      return "<div class='alert alert-success'><strong>Success!</strong>Membership updated.</div>";
    }
    public function general_admin_delete_membership(Request $request)
    {
      $membership_id = $request->delete_id;
      TblMembeshipModel::where('membership_id',$membership_id)->delete();
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

    public function general_admin_manage_categories()
    {

      $data['category'] = TblBusinessCategoryModel::where('parent_id',0)->paginate(10);

      return view('general_admin.pages.manage_categories',$data);
    }
    public function general_admin_add_category(Request $request)
    {
      $data['business_category_name'] = $request->cat_name;
      $data['business_category_information'] = $request->cat_info;
      $data['parent_id'] = 0;
      TblBusinessCategoryModel::insert($data);
      return "<div class='alert alert-success'><strong>Success!</strong>Category Added.</div>";
    }

    public function general_admin_edit_category(Request $request)
    {
      $data['business_category_name'] = $request->cat_name;
      $data['business_category_information'] = $request->cat_info;
      TblBusinessCategoryModel::where('business_category_id',$request->cat_id)->update($data);
      return "<div class='alert alert-success'><strong>Success!</strong>Category Updated.</div>";
    }
    public function general_admin_search_category(Request $request)
    {
      $search_key = $request->search_key;
      $data['category'] = TblBusinessCategoryModel::where('business_category_name','like','%'.$search_key.'%')->orWhere('business_category_information','like','%'.$search_key.'%')->get();
      return view('general_admin.pages.search_blade',$data);
    }
    public function general_admin_delete_category(Request $request)
    {
      $id=$request->delete_id;
      TblBusinessCategoryModel::where('business_category_id',$id)->delete();
      return "<div class='alert alert-success'><strong>Success!</strong>Category Deleted.</div>";
    }
    public function general_admin_get_sub_category(Request $request)
    {
      $business_category_id = $request->cat_id;
      $data['_sub_category'] = TblBusinessCategoryModel::where('parent_id',$business_category_id)->get();
      return view('general_admin.pages.get_sub_category',$data);
    }

    public function general_admin_add_sub_category(Request $request)
    {
      $ins['business_category_name'] = $request->cat_name;
      $ins['business_category_information'] = $request->cat_info;
      $ins['parent_id'] = $request->cat_id;
      $check = TblBusinessCategoryModel::insert($ins);
      if($check)
      {
        return "<div class='alert alert-success'><strong>Success!</strong>Sub Category Added.</div><br><center><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></center>";
      }
      else
      {
        return "<div class='alert alert-danger'><strong>Failed!</strong>Failed to Insert.</div><br><center><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></center>";
      }
    }
    public function general_admin_edit_sub_category(Request $request)
    {
      $ins['business_category_name'] = $request->cat_name;
      $ins['business_category_information'] = $request->cat_info;
      $category_id = $request->cat_id;
      // dd($category_id);
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
    public function general_admin_get_sub_sub_category(Request $request)
    {
      $sub_category_id = $request->cat_id;
      $data['_sub_category'] = TblBusinessCategoryModel::where('parent_id',$sub_category_id)->get();
      return view('general_admin.pages.get_sub_sub_category',$data);
    }
    public function general_admin_add_sub_sub_category(Request $request)
    {
      $ins['business_category_name'] = $request->cat_name;
      $ins['business_category_information'] = $request->cat_info;
      $ins['parent_id'] = $request->cat_id;
      $check = TblBusinessCategoryModel::insert($ins);
      if($check)
      {
        return "<div class='alert alert-success'><strong>Success!</strong>Sub Sub Category Added.</div><br><center><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></center>";
      }
      else
      {
        return "<div class='alert alert-danger'><strong>Failed!</strong>Failed to Insert.</div><br><center><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></center>";
      }
    }


    public function report()
    {
      Self::allow_logged_in_users_only();
        return view('general_admin.pages.report');
    }

    public function sample_invoice()
    {
      return view('general_admin.pages.invoice');
    }

    
  public function general_admin_add_agent(Request $request)
  { 

    $ins['prefix'] = $request->prefix;
    $ins['first_name'] = $request->first_name;
    $ins['last_name'] = $request->last_name;
    $ins['email'] = $request->email;
    $ins['position'] = 'agent';
    $ins['team_id'] = $request->team_id;
    $ins['primary_phone'] = $request->primary;
    $ins['secondary_phone'] = $request->secondary;
    $ins['other_info'] = $request->other_info;
    $ins['date_created'] = date("Y/m/d");
    $ins['agent_call'] = '0';
    $ins['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    dd($ins);
        if($ins['password']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Password.</div>";
        }
        else if($ins['first_name']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input First Name.</div>";
        }
        else if($ins['last_name']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Last Name.</div>";
        }
        else if($ins['email']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Email.</div>";
        }
        else if($ins['primary_phone']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Primary Phone.</div>";
        }
        
        else
        {
            $check_insert = TblAgentModel::insert($ins);
            echo "james";
            if($check_insert)
            {
              return "<div class='alert alert-success'><strong>Success!</strong>Agent Added Successfully!</div>";  
            }
            else
            {
                return "<div class='alert alert-danger'><strong>Fail!</strong>Something went wrong!</div>";
            }
        }
  }
  public function general_admin_assign_agent(Request $request)
  {
    $agent_id = $request->agent_id;
    $update['team_id'] = $request->team_id;
    TblAgentModel::where('agent_id',$agent_id)->update($update);
    return "<div class='alert alert-success'><strong>Success!</strong>Agent Assigned Successfully!</div>";
  }
  public function general_admin_add_team(Request $request)
  {  
    $data['team_name'] = $request->team_name;
    $data['team_information'] = $request->team_info;
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

  public function general_admin_add_supervisor(Request $request)
  {
    $ins['prefix'] = $request->prefix;
    $ins['first_name'] = $request->first_name;
    $ins['last_name'] = $request->last_name;
    $ins['email'] = $request->email;
    $ins['position'] = 'supervisor';
    $ins['primary_phone'] = $request->primary;
    $ins['secondary_phone'] = $request->secondary;
    $ins['address'] = $request->address;
    $ins['other_info'] = $request->other_info;
    $ins['date_created'] = date("Y/m/d");
    $ins['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        if($ins['password']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Password.</div>";
        }
        else if($ins['first_name']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input First Name.</div>";
        }
        else if($ins['last_name']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Last Name.</div>";
        }
        else if($ins['email']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Email.</div>";
        }
        else if($ins['primary_phone']=='')
        {
            return "<div class='alert alert-danger'><strong>Please!</strong>Input Primary Phone.</div>";
        }
        
        else
        {
            $check_insert = TblSupervisorModels::insert($ins);
            if($check_insert)
            {
              return "<div class='alert alert-success'><strong>Success!</strong>Supervisor Added Successfully!</div>";  
            }
            else
            {
                return "<div class='alert alert-danger'><strong>Fail!</strong>Something went wrong!</div>";
            }
        }  
  }
  public function general_admin_add_generaladmin(Request $request)
  {
    $data['full_name'] = $request->full_name;
    $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    $data['email'] = $request->email;
    if($data['full_name']=='')
    {
        return "<div class='alert alert-danger'><strong>Please!</strong>Input Full Name.</div>";
    }
    else if($data['password']=='')
    {
        return "<div class='alert alert-danger'><strong>Please!</strong>Input Password.</div>";
    }
    else if($data['email']=='')
    {
        return "<div class='alert alert-danger'><strong>Please!</strong>Input Email.</div>";
    }
    
    else
    {
        
        $check_insert = TblAdminModels::insert($data);
        if($check_insert)
        {
          return "<div class='alert alert-success'><strong>Success!</strong>Admin Added Successfully!</div>";  
        }
        else
        {
            return "<div class='alert alert-danger'><strong>Fail!</strong>Something went wrong!</div>";
        }
    }

  }

  public function general_admin_delete_team(Request $request)
  {
     $team_id = $request->delete_team_id;
     TblTeamModel::where('team_id',$team_id)->delete();
     return "<div class='alert alert-success'><strong>Success!</strong>Team Deleted Successfully!</div>";
  }





    public function edit_admin_submit(Request $request)
  {
    // dd($request->all());
    $data['full_name'] = $request->full_name;
    $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    $data['email'] = $request->email;
    TblAdminModels::where('admin_id',$request->admin_id)->update($data);
    return view ('general_admin.pages.add_generaladmin ', $data);
   }

    public function delete_admin_submit($id)
    {
      TblAdminModels::where('admin_id',$id)->delete();
      Session::flash('message', "Admin Deleted");
      return Redirect::back();
    }



  
  public function edit_team_submit(Request $request)
  {
    $data['team_name'] = $request->team_name;
    $data['team_information'] = $request->team_information;
    TblTeamModel::where('team_id',$request->team_id)->update($data);
      return"Update Success";
   }

  


  public function add_agent_submit(Request $request)
  {
    $data['first_name'] = $request->first_name;
    $data['last_name'] = $request->last_name;
    $data['email'] = $request->email;
    $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    $data['primary_phone'] = $request->primary_phone;
    $data['secondary_phone'] = $request->secondary_phone;
    $data['other_info'] = $request->other_info;
    TblAgentModel::insert($data);
    return "<div class='alert alert-success'  ><center><span >SUCCESS! </span></center></div>";
  }

   public function edit_agent_submit(Request $request)
  {
     $data['first_name'] = $request->first_name;
     $data['last_name'] = $request->last_name;
     $data['email'] = $request->email;
     $data['primary_phone'] = $request->primary_phone;
     $data['secondary_phone'] = $request->secondary_phone;
     $data['other_info'] = $request->other_info;
    TblAgentModel::where('agent_id',$request->agent_id)->update($data);
    return "<div class='alert alert-success'  ><center><span >SUCCESS! </span></center></div>";
   }

  public function general_admin_delete_agent(Request $request)
  {
      $agent_id = $request->delete_agent_id;
      TblAgentModel::where('agent_id',$agent_id)->delete();
      return "<div class='alert alert-success'><strong>Success!</strong>Agent Deleted Successfully!</div>";
  }

  public function add_supervisor_submit(Request $request)
  {
    $data['first_name'] = $request->first_name;
    $data['last_name'] = $request->last_name;
    $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    $data['email'] = $request->email;
    $data['position'] = 'supervisor';
    TblSupervisorModels::insert($data);
    return "<div class='alert alert-success'  ><center>
  <span >SUCCESS! </span>
   </center></div>";
  }

   public function edit_supervisor_submit(Request $request)
  {
    $data['first_name'] = $request->first_name;
    $data['last_name'] = $request->last_name;
    $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    $data['email'] = $request->email;
    TblSupervisorModels::where('supervisor_id',$request->supervisor_id)->update($data);
      return"Success";
   }
    public function delete_supervisor_submit($id)
    {
      TblSupervisorModels::where('supervisor_id',$id)->delete();
      Session::flash('message', "Supervisor Deleted");
      return Redirect::back();
    }


      public function pdfview(Request $request)
    {
        // $items = DB::table("tbl_business")->get();
        // view()->share('items',$items);

        // if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        // }

        return view('pdfview');
    }

}
