<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\Tbl_admin;
use Session;
use Redirect;

class AdminController extends Controller
{

	/*public function index()
	{

		$data['page']	= 'Dashboard';
		$data['county_list'] = TblCountyModel::get();
		return view ('admin.pages.dashboard', $data);		
	}
*/
	public function profile()
	{
		$data['page']	= 'Profile';
		return view ('admin.pages.profile', $data);		
	}

	public function client()
	{
		$data['page']	= 'Client';
		return view ('admin.pages.client', $data);		
	}
	public function add_team()
	{
		$data['county_list'] = TblCountyModel::get();
		$data['page']	= 'Add Team';
		return view ('admin.pages.add_team', $data);
	}
	public function add_agent()
	{
		$data['county_list'] = TblCountyModel::get();
		$data['page']	= 'Add Agent';
		return view ('admin.pages.add_agent', $data);		
	}

	public function get_city(Request $request)
    {
        $county_id = $request->county_id;

        $city_list = TblCityModel::where('county_id','=',$county_id)->get();

        $county_name = TblCountyModel::select('county_name')->where('county_id','=',$county_id)->first();

        $city_dropdown_output = '';

        $city_dropdown_output .= '<option value="--Select City--">--Select City for '.$county_name->county_name.'--</option>';

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
    public function admin_login ()
    {
    	$data['page']   = 'Admin Login';
        return view('front.pages.adminlogin', $data);
    }

    public function admin_login_submit (Request $request)
    {
    	$validate_login = Tbl_admin::where('email','=',$request->email)->first();
        if($validate_login)
        {

        	if (password_verify($request->password, $validate_login->password)) 
				{
    				Session::put("login", true);
					$data['page']	= 'Dashboard';
					return view ('admin.pages.dashboard', $data);					
				}
		}
        else
        {
            echo 'Incorrect Email/Password.';
        }
    }

    public function dashboard()
    {
    	$data['page']	= 'Dashboard';
		return view ('admin.pages.dashboard', $data);	
    }


		public function admin_logout ()
	{
		Session::put("login", true);
		$data['page']   = 'Admin Login';
        return view('front.pages.adminlogin', $data);

	}
	
}