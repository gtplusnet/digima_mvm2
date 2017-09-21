<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;

class AdminController extends Controller
{

	public function index()
	{

		$data['page']	= 'Dashboard';
		$data['county_list'] = TblCountyModel::get();
		return view ('admin.pages.dashboard', $data);		
	}

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


		public function logout()
	{
		Session::forget('user_email');
		Session::forget('user_password');
		return Redirect::back();
	}



}