<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblBusinessModel;
use App\Models\TblAgent;
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

	public function client()
	{
		$data['page']	= 'Client';
		$data['_clients'] = TblBusinessModel::contact_person()
						  ->other_info()
						  ->user_account()
						  ->get();
		return view ('agent.pages.client', $data);		
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



}