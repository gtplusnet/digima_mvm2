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

use App\Models\TblCountyModel;
use App\Models\TblTeamModel;
use App\Models\TblAgentmodels;
use App\Models\TblSupervisorModels;

use DB;
use Response;
use Session;
use Redirect;

use PDF2;
use \PDF;
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
            return Redirect::to("/general_admin/dashboard'")->send();
        }
    }


      public function index()

    {
        return view('general_admin.pages.general_admin_login');
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
         $count_agent = TblAgentModels::get();
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
         $count_merchant_admin_activated = TblBusinessModel::where('business_status',2)->get();
         $data['countAgent'] = $count_merchant_agent->count();
         $data['countSupervisor'] = $count_merchant_supervisor->count();
         $data['countAdmin'] = $count_merchant_admin->count();
         $data['countAdminP'] = $count_merchant_admin_payment->count();
         $data['countAdminA'] = $count_merchant_admin_activated->count();


         // dd($data);

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

                $data = array('name'=>"croatia");
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
                          ->orderBy('tbl_business.date_created',"asc")
                          ->get();
          return view('general_admin.pages.manage_invoice',$data);
    }
    public function general_admin_resend_invoice(Request $request)
    {
        
        $email = $request->resend_email;
        $remarks = $request->remarks;
        $invoice_name = $request->invoice_name_resend;
        $data = array('name'=>"croatia");
                $pathfile='invoice/'.$invoice_name;
                $mail_send = Mail::send('general_admin.pages.send_email_invoice', $data, function($message) use ($pathfile) {
                   $message->to('guardians35836@gmail.com', 'Croatia Directory')->subject
                      ('Your Croatia Directory Invoice');
                   $message->attach(public_path($pathfile));
                   $message->from('guardians35836@gmail.com','Croatia Directory');
                });
                  if($mail_send)
                  {
                     return "<div class='alert alert-success'><strong>Success!</strong>Invoice Send.</div>";
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
      $data['_data'] = TblAdminModels::get();
      $data['page'] = 'Add Admin';
      return view('general_admin.pages.manage_user', $data);

    }

    public function general_admin_manage_categories()
    {

      $data['category'] = TblBusinessCategoryModel::paginate(10);

      return view('general_admin.pages.manage_categories',$data);
    }
    public function general_admin_add_category(Request $request)
    {
      $data['business_category_name'] = $request->cat_name;
      $data['business_category_information'] = $request->cat_info;
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
    public function general_admin_delete_category($id)
    {
      TblBusinessCategoryModel::where('business_category_id',$id)->delete();
      Session::flash('message', "Category Deleted");
      return Redirect::back();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 
    }

    public function add_team()
  {
     $data['_data'] = TblTeamModel::get();
    $data['county_list'] = TblCountyModel::get();
    $data['page'] = 'Add Team';
    return view ('general_admin.pages.add_team', $data);
  }

    public function add_generaladmin()
  {
    $data['_data'] = TblAdminModels::get();
    $data['page'] = 'Add Admin';
    return view ('general_admin.pages.add_generaladmin ', $data);    
  }

   public function add_agent()
  {
    $data['_data'] = TblAgentmodels::get();
    $data['county_list'] = TblCountyModel::get();
    $data['team_list'] = TblTeamModel::get();
    $data['page'] = 'Add Agent';
    return view ('general_admin.pages.add_agent', $data);   
  }

  public function add_supervisor()
  {
    $data['_data'] = TblSupervisorModels::get();
    $data['page'] = 'Add supervisor';
    return view ('general_admin.pages.add_supervisor ', $data);   
  }

  public function add_admin_submit(Request $request)
  {
    $data['full_name'] = $request->full_name;
    $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    $data['email'] = $request->email;
    TblAdminModels::insert($data);
   return "<div class='alert alert-success'  ><center>
  <span >SUCCESS! </span>
   </center></div>";
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



  public function add_team_submit(Request $request)
  {  
    $data['team_name'] = $request->team_name;
    $data['team_information'] = $request->team_information;
    TblTeamModel::insert($data);
    return "<div class='alert alert-success'  ><center>
  <span >SUCCESS! </span>
   </center></div>";
  }
  public function edit_team_submit(Request $request)
  {
    $data['team_name'] = $request->team_name;
    $data['team_information'] = $request->team_information;
    TblTeamModel::where('team_id',$request->team_id)->update($data);
      return"Update Success";
   }

  public function delete_team_submit($id)
  {
     TblTeamModel::where('team_id',$id)->delete();
     Session::flash('message', "Team Deleted");
     return Redirect::back();
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
    TblAgentmodels::insert($data);
    return "<div class='alert alert-success'  ><center>
  <span >SUCCESS! </span>
   </center></div>";
  }

   public function edit_agent_submit(Request $request)
  {
     $data['first_name'] = $request->first_name;
     $data['last_name'] = $request->last_name;
     $data['email'] = $request->email;
     $data['primary_phone'] = $request->primary_phone;
     $data['secondary_phone'] = $request->secondary_phone;
     $data['other_info'] = $request->other_info;
    TblAgentmodels::where('agent_id',$request->agent_id)->update($data);
    return "<div class='alert alert-success'  ><center>
  <span >SUCCESS! </span>
   </center></div>";
   }

  public function delete_agent_submit($id)
  {
      TblAgentmodels::where('agent_id',$id)->delete();
      Session::flash('message', "Agent Deleted");
      return Redirect::back();
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
