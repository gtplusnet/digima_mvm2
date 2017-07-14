<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblBusinessModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblUserAccountModel;
use Carbon\Carbon;
use Redirect;
use DB;

class AgentController extends Controller
{

	public function index()
	{

		$data['page']	= 'Dashboard';
		$data['county_list'] = TblCountyModel::get();
		return view ('agent.pages.dashboard', $data);		
	}

	public function profile()
	{
		$data['page']	= 'Profile';
		return view ('agent.pages.profile', $data);		
	}
	public function get_client(Request $request)
	{
		$search = $request->search;
		$output = '';
		$clients = TblBusinessModel::contact_person()
						    ->other_info()
						    ->user_account()
							->where('contact_prefix','LIKE','%'.$search.'%')
							->orwhere('date_created','LIKE','%',$search,'%')
							->orwhere('business_name','LIKE','%',$search,'%')
							->orwhere('contact_first_name','LIKE','%',$search,'%')
							->orwhere('contact_last_name','LIKE','%',$search,'%')
							->orwhere('status','LIKE','%',$search,'%')->get();
		if(count($clients) > 0 )
		{
			foreach ($clients as $client) {
				$output.=	'<tr>
                                <td>'.$client->contact_prefix.''.$client->contact_first_name.''.$client->contact_last_name.'</td>
                               	<td>'.$client->date_created.'</td>
                               	<td>'.$client->business_name.'</td>
                               	<td>'.$client->status.'</td>
                         	</tr>';
			}
		}
		else 
		{
			$output.='data not found';
		}
		return $output;
	}
	public function add_client()
	{
		$data['county_list'] = TblCountyModel::get();
		$data['page']	= 'Add Client';
		return view ('agent.pages.add_client', $data);		
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
	public function register_business(Request $request)
    {
        $check_email_availability = TblUserAccountModel::select('user_email')->where('user_email','=',$request->email)->first();

        if(count($check_email_availability) == 1)
        {
            echo 'Email has already been used.';
        }
        else
        {
        $business_data = new TblBusinessModel;
        $business_data->business_id = '';
        $business_data->business_name = $request->business_name;
        $business_data->city_id = $request->city_list;
        $business_data->business_complete_address = $request->business_address;
        $business_data->business_phone = $request->primary_business_phone;
        $business_data->business_alt_phone = $request->secondary_business_phone;
        $business_data->date_created = Carbon::now();

        $business_data->save();

        $contact_data = new TblBusinessContactPersonModel;
        $contact_data->business_contact_person_id = '';
        $contact_data->contact_prefix = $request->prefix;
        $contact_data->contact_first_name = $request->first_name;
        $contact_data->contact_last_name = $request->last_name;
        $contact_data->business_id = $business_data->business_id;

        $contact_data->save();

        $account_data = new TblUserAccountModel;
        $account_data->user_email = $request->email;
        $account_data->user_password ='water123';
        $account_data->user_category = 'merchant';
        $account_data->status = 2;
        $account_data->business_id = $business_data->business_id;
        $account_data->business_contact_person_id = $contact_data->business_contact_person_id;

        $account_data->save();

        echo 'Registered successfully ! But your account is pending.';
        }   
    }



}