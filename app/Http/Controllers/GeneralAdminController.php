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
use App\Models\TblCountyModel;
use App\Models\TblTeamModel;
use App\Models\TblAgentmodels;
use App\Models\TblSupervisorModels;
use DB;
use Response;
use Session;
use Redirect;
use insert;


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

    public function general_admin_business_list()
    {
        Self::allow_logged_in_users_only();
        return view('general_admin.pages.business');
    }

    public function general_admin_dashboard()
    {
         Self::allow_logged_in_users_only();
        return view('general_admin.pages.dashboard');
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
        $data['clients'] = TblUserAccountModel::where('status','registered')
                                          ->join('tbl_business','tbl_business.business_id','=','tbl_user_account.business_id')
                                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_business.membership')
                                          ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                                          ->join('tbl_county','tbl_county.county_id','=','tbl_city.county_id')
                                          ->orderBy('tbl_business.date_created',"asc")

                                          ->get();
        return view('general_admin.pages.merchants',$data);
    }

    public function general_admin_payment_monitoring()
    {
      
      $data['business_list'] = TblPaymentModel::join('tbl_business','tbl_business.business_id','=','tbl_payment.business_id')
                                          ->join('tbl_business_contact_person','tbl_business_contact_person.business_contact_person_id','=','tbl_payment.business_contact_person_id')
                                          ->join('tbl_payment_method','tbl_payment_method.payment_method_id','=','tbl_payment.payment_method')
                                          ->get();
         // dd($data);
         return view('general_admin.pages.payment_monitoring',$data);
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
        $business_info = DB::table('tbl_business')->join('tbl_business_contact_person', 'tbl_business.business_id', '=', 'tbl_business_contact_person.business_id')->where('tbl_business.business_id', '=', $request->business_id)->first();

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
      Self::allow_logged_in_users_only();
      $data['category'] = TblBusinessCategoryModel::get();
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
  
}
