<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ActiveAuthController;

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

use DB;
use Response;
use Session;
use Redirect;
use PDF2;
use PDF;
use Mail;
use Excel;
use Crypt;
use Carbon\Carbon;





class GeneralAdminController extends ActiveAuthController
{
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
      $data['user']         = Self::global();
      $data['page']    = 'Merchant';
      $data['clients'] = TblBusinessModel::where('business_status', 3)
                        ->BusinessAdmin()
                        ->join('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'client');
      $data['agentAdded'] = TblBusinessModel::where('business_status', 20)
                        ->BusinessAdmin()
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'agent_added');
      $data['pending_clients'] = TblBusinessModel::where('business_status', 4)
                        ->BusinessAdmin()
                        ->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id')
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'pending_client');
      $data['registered_clients'] = TblBusinessModel::where('business_status', 5)
                        ->BusinessAdmin()
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'registered_client');
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
    $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$id)
                          ->BusinessAdmin()
                          ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id')
                          ->first();
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
            $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$business_id)
                                    ->BusinessAdmin()
                                    ->first();
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
            $data['invoice_info'] = TblBusinessModel::where('tbl_business.business_id',$business_id)
                                                    ->BusinessAdmin()
                                                    ->first();
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
      $data['registered_clients'] = TblBusinessModel::where('business_status', 5)
                        ->BusinessAdmin()
                        ->orderBy('tbl_business.date_created',"asc")
                        ->get();
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
      $data['registered_clients'] = TblBusinessModel::where('business_status', 5)
                        ->whereBetween('date_transact',[$start,$end])
                        ->BusinessAdmin()
                        ->orderBy('tbl_business.date_created',"asc")
                        ->get();
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
    $data['registered_clients'] = TblBusinessModel::where('business_status', 5)
                                ->BusinessAdmin()
                                ->orderBy('tbl_business.date_created',"asc")
                                ->paginate(10, ['*'], 'registered_client');
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
      $data['clients']  = TblBusinessModel::where('business_status', 3)
                        ->whereBetween('date_transact',[$s_date,$e_date])
                        ->BusinessAdmin()
                        ->join('tbl_conversation','tbl_conversation.business_id','=','tbl_business.business_id')
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'client');
      return view('general_admin.pages.search_merchant_invoice',$data);
  }
  public function get_client1(Request $request)
  {
      $data['first']    = $s_date = $request->date_start1;
      $data['second']   = $e_date = $request->date_end1;
      $data['agentAdded'] = TblBusinessModel::where('business_status',20)
                        ->whereBetween('date_transact',[$s_date,$e_date])
                        ->BusinessAdmin()
                        ->orderBy('tbl_business.date_created',"asc")
                        ->paginate(10, ['*'], 'agent_added');
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
      
      $data['registered_clients'] = TblBusinessModel::where('business_status', 5)
                        ->whereBetween('date_transact',[$s_date,$e_date])
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
                             $message->to($data['email'], 'Croatia Directory')->subject('Your Croatia Directory Invoice');
                             $message->attach(public_path($pathfile));
                             $message->from('guardians35836@gmail.com','Yellow Pages');
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
                            ->groupBy('tbl_invoice.invoice_number')
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
    $data['_data_agent']          = TblUserModel::where('tbl_user.archived',0)
                                  ->where('user_access_level','AGENT')
                                  ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id')
                                  ->join('tbl_user_team','tbl_user_team.user_id','=','tbl_user.user_id')
                                  ->join('tbl_team','tbl_team.team_id','=','tbl_user_team.team_id')
                                  ->paginate(10, ['*'], 'agent');
    $data['_team_super']          = TblUserModel::where('tbl_user.archived',0)
                                  ->where('user_access_level','SUPERVISOR')
                                  ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id')
                                  ->get();

    $data['_data_team']           = TblTeamModel::where('tbl_team.archived',0)
                                  ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_team.supervisor_id')
                                  ->paginate(10, ['*'], 'team');
    $data['_team_select']         = TblTeamModel::where('archived',0)->get();
    $data['_teams']               = TblTeamModel::all();
    $data['agent_merchant']       = TblBusinessModel::where('business_status',5)->get();
    $data['_data_supervisor']     = TblSupervisorModels::where('archived',0)->paginate(10, ['*'], 'supervisor');
    $data['_data_admin']          = TblAdminModels::where('archived',0)->paginate(10, ['*'], 'admin');
    $data['_merchant']            = TblBusinessModel::where('business_status',5)
                                  ->BusinessAdmin()
                                  ->paginate(10, ['*'], 'registered_client');
    $data['page'] = 'Manage Users';
    return view('general_admin.pages.manage_user', $data);

  }
  public function general_admin_manage_user_details(Request $request)
  {
    $data['user_details'] = TblUserModel::where('tbl_user.user_id',$request->user_id)
                          ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id')
                          ->join('tbl_user_team','tbl_user_team.user_id','=','tbl_user.user_id')
                          ->join('tbl_team','tbl_team.team_id','=','tbl_user_team.team_id')
                          ->first();
    $data['_team_select'] = TblTeamModel::where('archived',0)->get();

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
      $userInfoData->user_gender      = $request->user_gender ;
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
      $link       = 'http://mvm.digimahouse.com/login';
      $data       = array('name'=>$name,'email'=>$email,'password'=>$password,'link'=>$link);
      $check_mail = Mail::send('email.email_file', $data, function($message) use($data) 
                  {
                    $message->to($data['email'], 'MVM Password')->subject('MVM Login');
                    $message->from('croatiaadmin@admin.com','Croatia Assistance');
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
    $userInfoData['user_first_name']  = $request->user_first_name;
    $userInfoData['user_last_name']   = $request->user_last_name;
    $userInfoData['user_gender']      = $request->user_gender;
    $userInfoData['user_phone_number']= $request->user_phone_number;
    $userInfoData['user_address']     = $request->user_address;

    TblUserInfoModel::where('user_info_id',$request->user_info_id)->update($userInfoData);
    
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
    $data['_data_agent'] = TblUserTeamModel::where('tbl_user_team.team_id',$id)
                          ->where('tbl_user_team.archived',0)
                          ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user_team.user_id')
                          ->join('tbl_user','tbl_user.user_id','=','tbl_user_team.user_id')
                          ->get();
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
    $data["company_information"] = $request->company_information;
    $data["business_website"]    = $request->business_website;
    $data["year_established"]    = $request->year_established;
    TblBusinessOtherInfoModel::where('business_id',$id)->update($data);
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

      return view('general_admin.pages.archived',$data);
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
    //MAINTENANCE !important function
    public function developer_website_maintenance()
    {
      if (DB::table('tbl_city')->count() <= 0) 
        {
            //Cities of Zagreb County
            $insert[0]["city_id"]        = 1;
            $insert[0]["city_name"]      = "Zagreb";
            $insert[0]["postal_code"]    = 10000;
            $insert[0]["county_id"]      = 1;

            $insert[1]["city_id"]        = 2;
            $insert[1]["city_name"]      = "Lučko";
            $insert[1]["postal_code"]    = 10250;
            $insert[1]["county_id"]      = 1;

            $insert[2]["city_id"]        = 3;
            $insert[2]["city_name"]      = "Zaprešić";
            $insert[2]["postal_code"]    = 10290;
            $insert[2]["county_id"]      = 1;

            //Cities of Dubrovnik-Neretva
            $insert[3]["city_id"]        = 4;
            $insert[3]["city_name"]      = "Topolo";
            $insert[3]["postal_code"]    = 20205;
            $insert[3]["county_id"]      = 2;

            $insert[4]["city_id"]        = 5;
            $insert[4]["city_name"]      = "Cavtat";
            $insert[4]["postal_code"]    = 20210;
            $insert[4]["county_id"]      = 2;

            $insert[5]["city_id"]        = 6;
            $insert[5]["city_name"]      = "Gruda";
            $insert[5]["postal_code"]    = 20215;
            $insert[5]["county_id"]      = 2;

            //Cities of Split-Dalmatia
            $insert[6]["city_id"]        = 7;
            $insert[6]["city_name"]      = "Prgomet";
            $insert[6]["postal_code"]    = 21201;
            $insert[6]["county_id"]      = 3;

            $insert[7]["city_id"]        = 8;
            $insert[7]["city_name"]      = "Lećevica";
            $insert[7]["postal_code"]    = 21202;
            $insert[7]["county_id"]      = 3;

            $insert[8]["city_id"]        = 9;
            $insert[8]["city_name"]      = "Donji Muć";
            $insert[8]["postal_code"]    = 21203;
            $insert[8]["county_id"]      = 3;

            //Cities of Šibenik-Knin
            $insert[9]["city_id"]        = 10;
            $insert[9]["city_name"]      = "Primošten";
            $insert[9]["postal_code"]    = 22202;
            $insert[9]["county_id"]      = 4;

            $insert[10]["city_id"]       = 11;
            $insert[10]["city_name"]     = "Rogoznica";
            $insert[10]["postal_code"]   = 22203;
            $insert[10]["county_id"]     = 4;

            $insert[11]["city_id"]       = 12;
            $insert[11]["city_name"]     = "Široke";
            $insert[11]["postal_code"]   = 22204;
            $insert[11]["county_id"]     = 4;

            //Cities of Zadar
            $insert[12]["city_id"]       = 13;
            $insert[12]["city_name"]     = "Bibinje";
            $insert[12]["postal_code"]   = 23205;
            $insert[12]["county_id"]     = 5;

            $insert[13]["city_id"]       = 14;
            $insert[13]["city_name"]     = "Sveti Filip i Jakov";
            $insert[13]["postal_code"]   = 23207;
            $insert[13]["county_id"]     = 5;

            $insert[14]["city_id"]       = 15;
            $insert[14]["city_name"]     = "Biograd na Moru";
            $insert[14]["postal_code"]   = 23210;
            $insert[14]["county_id"]     = 5;

            //Cities of Osijek-Baranja
            $insert[15]["city_id"]       = 16;
            $insert[15]["city_name"]     = "Bijelo Brdo";
            $insert[15]["postal_code"]   = 31204;
            $insert[15]["county_id"]     = 6;

            $insert[16]["city_id"]       = 17;
            $insert[16]["city_name"]     = "Aljmaš";
            $insert[16]["postal_code"]   = 31205;
            $insert[16]["county_id"]     = 6;

            $insert[17]["city_id"]       = 18;
            $insert[17]["city_name"]     = "Erdut";
            $insert[17]["postal_code"]   = 31206;
            $insert[17]["county_id"]     = 6;

            //Cities of Vukovar-Srijem
            $insert[18]["city_id"]       = 19;
            $insert[18]["city_name"]     = "Vinkovci";
            $insert[18]["postal_code"]   = 32100;
            $insert[18]["county_id"]     = 7;

            $insert[19]["city_id"]       = 20;
            $insert[19]["city_name"]     = "Ostrovo";
            $insert[19]["postal_code"]   = 32211;
            $insert[19]["county_id"]     = 7;

            $insert[20]["city_id"]       = 21;
            $insert[20]["city_name"]     = "Gaboš";
            $insert[20]["postal_code"]   = 32212;
            $insert[20]["county_id"]     = 7;

            //Cities of Virovitica-Podravina
            $insert[21]["city_id"]       = 22;
            $insert[21]["city_name"]     = "Špišić Bukovica";
            $insert[21]["postal_code"]   = 33404;
            $insert[21]["county_id"]     = 8;

            $insert[22]["city_id"]       = 23;
            $insert[22]["city_name"]     = "Pitomača";
            $insert[22]["postal_code"]   = 33405;
            $insert[22]["county_id"]     = 8;

            $insert[23]["city_id"]       = 24;
            $insert[23]["city_name"]     = "Lukač";
            $insert[23]["postal_code"]   = 33406;
            $insert[23]["county_id"]     = 8;

            //Cities of Požega-Slavonia
            $insert[24]["city_id"]       = 25;
            $insert[24]["city_name"]     = "Jakšić";
            $insert[24]["postal_code"]   = 34308;
            $insert[24]["county_id"]     = 9;

            $insert[25]["city_id"]       = 26;
            $insert[25]["city_name"]     = "Pleternica";
            $insert[25]["postal_code"]   = 34310;
            $insert[25]["county_id"]     = 9;

            $insert[26]["city_id"]       = 27;
            $insert[26]["city_name"]     = "Kuzmica";
            $insert[26]["postal_code"]   = 34311;
            $insert[26]["county_id"]     = 9;

            //Cities of Brod-Posavina
            $insert[27]["city_id"]       = 28;
            $insert[27]["city_name"]     = "Podvinje";
            $insert[27]["postal_code"]   = 35107;
            $insert[27]["county_id"]     = 10;

            $insert[28]["city_id"]       = 29;
            $insert[28]["city_name"]     = "Podcrkavlje";
            $insert[28]["postal_code"]   = 35201;
            $insert[28]["county_id"]     = 10;

            $insert[29]["city_id"]       = 30;
            $insert[29]["city_name"]     = "Gornja Vrba";
            $insert[29]["postal_code"]   = 35207;
            $insert[29]["county_id"]     = 10;

            //Cities of Međimurje
            $insert[30]["city_id"]       = 31;
            $insert[30]["city_name"]     = "Čakovec";
            $insert[30]["postal_code"]   = 40000;
            $insert[30]["county_id"]     = 11;

            $insert[31]["city_id"]       = 32;
            $insert[31]["city_name"]     = "Nedelišće";
            $insert[31]["postal_code"]   = 40305;
            $insert[31]["county_id"]     = 11;

            $insert[32]["city_id"]       = 33;
            $insert[32]["city_name"]     = "Macinec";
            $insert[32]["postal_code"]   = 40306;
            $insert[32]["county_id"]     = 11;

            //Cities of Varaždin
            $insert[33]["city_id"]       = 34;
            $insert[33]["city_name"]     = "Beretinec";
            $insert[33]["postal_code"]   = 42201;
            $insert[33]["county_id"]     = 12;

            $insert[34]["city_id"]       = 35;
            $insert[34]["city_name"]     = "Trnovec Bartolovečki";
            $insert[34]["postal_code"]   = 42202;
            $insert[34]["county_id"]     = 12;

            $insert[35]["city_id"]       = 36;
            $insert[35]["city_name"]     = "Jalžabet";
            $insert[35]["postal_code"]   = 42203;
            $insert[35]["county_id"]     = 12;

            //Cities of Bjelovar-Bilogora
            $insert[36]["city_id"]       = 37;
            $insert[36]["city_name"]     = "Zrinski Topolovac";
            $insert[36]["postal_code"]   = 43202;
            $insert[36]["county_id"]     = 13;

            $insert[37]["city_id"]       = 38;
            $insert[37]["city_name"]     = "Kapela";
            $insert[37]["postal_code"]   = 43203;
            $insert[37]["county_id"]     = 13;

            $insert[38]["city_id"]       = 39;
            $insert[38]["city_name"]     = "Predavac";
            $insert[38]["postal_code"]   = 43211;
            $insert[38]["county_id"]     = 13;

            //Cities of Sisak-Moslavina
            $insert[39]["city_id"]       = 40;
            $insert[39]["city_name"]     = "Martinska Ves";
            $insert[39]["postal_code"]   = 44201;
            $insert[39]["county_id"]     = 14;

            $insert[40]["city_id"]       = 41;
            $insert[40]["city_name"]     = "Topolovac";
            $insert[40]["postal_code"]   = 44202;
            $insert[40]["county_id"]     = 14;

            $insert[41]["city_id"]       = 42;
            $insert[41]["city_name"]     = "Gušće";
            $insert[41]["postal_code"]   = 44203;
            $insert[41]["county_id"]     = 14;

            //Cities of Karlovac
            $insert[42]["city_id"]       = 43;
            $insert[42]["city_name"]     = "Draganić";
            $insert[42]["postal_code"]   = 47201;
            $insert[42]["county_id"]     = 15;

            $insert[43]["city_id"]       = 44;
            $insert[43]["city_name"]     = "Rečica";
            $insert[43]["postal_code"]   = 47203;
            $insert[43]["county_id"]     = 15;

            $insert[44]["city_id"]       = 45;
            $insert[44]["city_name"]     = "Šišljavić";
            $insert[44]["postal_code"]   = 47204;
            $insert[44]["county_id"]     = 15;

            //Cities of Koprivnica-Križevci
            $insert[45]["city_id"]       = 46;
            $insert[45]["city_name"]     = "Sveti Ivan Žabno";
            $insert[45]["postal_code"]   = 48214;
            $insert[45]["county_id"]     = 16;

            $insert[46]["city_id"]       = 47;
            $insert[46]["city_name"]     = "Križevci";
            $insert[46]["postal_code"]   = 48260;
            $insert[46]["county_id"]     = 16;

            $insert[47]["city_id"]       = 48;
            $insert[47]["city_name"]     = "Kloštar Vojakovački";
            $insert[47]["postal_code"]   = 48264;
            $insert[47]["county_id"]     = 16;

            //Cities of Krapina-Zagorj
            $insert[48]["city_id"]       = 49;
            $insert[48]["city_name"]     = "Zabok";
            $insert[48]["postal_code"]   = 49210;
            $insert[48]["county_id"]     = 17;

            $insert[49]["city_id"]       = 50;
            $insert[49]["city_name"]     = "Veliko Trgovišće";
            $insert[49]["postal_code"]   = 49214;
            $insert[49]["county_id"]     = 17;

            $insert[50]["city_id"]       = 51;
            $insert[50]["city_name"]     = "Tuhelj";
            $insert[50]["postal_code"]   = 49215;
            $insert[50]["county_id"]     = 17;

            //Cities of Primorje-Gorski Kotar
            $insert[51]["city_id"]       = 52;
            $insert[51]["city_name"]     = "Rijeka";
            $insert[51]["postal_code"]   = 51000;
            $insert[51]["county_id"]     = 18;

            $insert[52]["city_id"]       = 53;
            $insert[52]["city_name"]     = "Matulji";
            $insert[52]["postal_code"]   = 51211;
            $insert[52]["county_id"]     = 18;

            $insert[53]["city_id"]       = 54;
            $insert[53]["city_name"]     = "Vele Mune";
            $insert[53]["postal_code"]   = 51212;
            $insert[53]["county_id"]     = 18;

            //Cities of Istria
            $insert[54]["city_id"]       = 55;
            $insert[54]["city_name"]     = "Pazin";
            $insert[54]["postal_code"]   = 52000;
            $insert[54]["county_id"]     = 19;

            $insert[55]["city_id"]       = 56;
            $insert[55]["city_name"]     = "Pula";
            $insert[55]["postal_code"]   = 52100;
            $insert[55]["county_id"]     = 19;

            $insert[56]["city_id"]       = 57;
            $insert[56]["city_name"]     = "Medulin";
            $insert[56]["postal_code"]   = 52203;
            $insert[56]["county_id"]     = 19;

            //Cities of Lika-Senj
            $insert[57]["city_id"]       = 58;
            $insert[57]["city_name"]     = "Gospić";
            $insert[57]["postal_code"]   = 53000;
            $insert[57]["county_id"]     = 20;

            $insert[58]["city_id"]       = 59;
            $insert[58]["city_name"]     = "Lički Osik";
            $insert[58]["postal_code"]   = 53201;
            $insert[58]["county_id"]     = 20;

            $insert[59]["city_id"]       = 60;
            $insert[59]["city_name"]     = "Perušić";
            $insert[59]["postal_code"]   = 53202;
            $insert[59]["county_id"]     = 20;

            DB::table('tbl_city')->insert($insert);
        }

        if (DB::table('tbl_county')->count() <= 0) 
        {
            $insert[0]["county_id"]    = 1;
            $insert[0]["county_name"]  = "Zagreb";

            $insert[1]["county_id"]    = 2;
            $insert[1]["county_name"]  = "Dubrovnik-Neretva";

            $insert[2]["county_id"]    = 3;
            $insert[2]["county_name"]  = "Split-Dalmatia";

            $insert[3]["county_id"]    = 4;
            $insert[3]["county_name"]  = "Šibenik-Knin";

            $insert[4]["county_id"]    = 5;
            $insert[4]["county_name"]  = "Zadar";

            $insert[5]["county_id"]    = 6;
            $insert[5]["county_name"]  = "Osijek-Baranja";

            $insert[6]["county_id"]    = 7;
            $insert[6]["county_name"]  = "Vukovar-Srijem";

            $insert[7]["county_id"]    = 8;
            $insert[7]["county_name"]  = "Virovitica-Podravina";

            $insert[8]["county_id"]    = 9;
            $insert[8]["county_name"]  = "Požega-Slavonia";

            $insert[9]["county_id"]    = 10;
            $insert[9]["county_name"]  = "Brod-Posavina";

            $insert[10]["county_id"]   = 11;
            $insert[10]["county_name"] = "Međimurje";

            $insert[11]["county_id"]   = 12;
            $insert[11]["county_name"] = "Varaždin";

            $insert[12]["county_id"]   = 13;
            $insert[12]["county_name"] = "Bjelovar-Bilogora";

            $insert[13]["county_id"]   = 14;
            $insert[13]["county_name"] = "Sisak-Moslavina";

            $insert[14]["county_id"]   = 15;
            $insert[14]["county_name"] = "Karlovac";

            $insert[15]["county_id"]   = 16;
            $insert[15]["county_name"] = "Koprivnica-Križevci";

            $insert[16]["county_id"]   = 17;
            $insert[16]["county_name"] = "Krapina-Zagorje";

            $insert[17]["county_id"]   = 18;
            $insert[17]["county_name"] = "Primorje-Gorski Kotar";

            $insert[18]["county_id"]   = 19;
            $insert[18]["county_name"] = "Istria";

            $insert[19]["county_id"]   = 20;
            $insert[19]["county_name"] = "Lika-Senj";

            DB::table('tbl_county')->insert($insert);
        }
        if (DB::table('tbl_user')->count() <= 0) 
        {
            $insert[0]["user_id"]           = 1;
            $insert[0]["user_email"]        = "croatiaadmin@gmail.com";
            $insert[0]["user_password"]     = Crypt::encrypt('croatiaadmin');
            $insert[0]["user_access_level"] = "ADMIN";

            $insert[1]["user_id"]           = 2;
            $insert[1]["user_email"]        = "croatiadeveloper@gmail.com";
            $insert[1]["user_password"]     = Crypt::encrypt('croatiadeveloper');
            $insert[1]["user_access_level"] = "ADMIN";

            $info[0]['user_info_id']        = 1;
            $info[0]['user_profile']        = '/user_profile/default_profile.jpg';
            $info[0]['user_first_name']     = 'CROATIA ';
            $info[0]['user_last_name']      = 'ADMIN';
            $info[0]['user_gender']         = 'NOT SPECIFIED';
            $info[0]['user_phone_number']   = '35836';
            $info[0]['user_address']        = 'CROATIA';
            $info[0]['user_created']        = date('Y/m/d');
            $info[0]['user_id']             = 1;

            $info[1]['user_info_id']        = 2;
            $info[1]['user_profile']        = '/user_profile/default_profile.jpg';
            $info[1]['user_first_name']     = 'CROATIA ';
            $info[1]['user_last_name']      = 'DEVELOPER';
            $info[1]['user_gender']         = 'NOT SPECIFIED';
            $info[1]['user_phone_number']   = '358361';
            $info[1]['user_address']        = 'CROATIA';
            $info[1]['user_created']        = date('Y/m/d');
            $info[1]['user_id']             = 2;

            DB::table('tbl_user_info')->insert($info);
            DB::table('tbl_user')->insert($insert);
        }
        if (DB::table('tbl_membership')->count() <= 0) 
        {
            $insert[0]["membership_id"]      = 1;
            $insert[0]["membership_name"]    = "PLATINUM";
            $insert[0]["membership_price"]   = "00.00";
            $insert[0]["membership_info"]    = "Platinum Information";

            $insert[1]["membership_id"]      = 2;
            $insert[1]["membership_name"]    = "PREMIUM";
            $insert[1]["membership_price"]   = '00.00';
            $insert[1]["membership_info"]    = "Premium Information";
            DB::table('tbl_membership')->insert($insert);
        }
    }
    

}



