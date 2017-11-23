<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TblCountyModel;
use App\Models\TblCityModel;
use App\Models\TblPaymentMethod;
use App\Models\TblBusinessModel;
use App\Models\TblBusinessContactPersonModel;
use App\Models\TblUserAccountModel;
use App\Models\TblBusinessOtherInfoModel;
use App\Models\Tbl_county;
use App\Models\Tbl_city;
use App\Models\Tbl_business;
use App\Models\Tbl_business_contact_person;
use App\Models\Tbl_user_account;
use App\Models\Tbl_business_hours;
use App\Models\Tbl_audio;
use App\Models\TblMembeshipModel;
use App\Models\TblGuestMessages;
use App\Models\TblBusinessCategoryModel;
use App\Models\TblReportsModel;
use App\Models\TblABusinessPaymentMethodModel;
use App\Models\TblBusinessHoursmodels;
use App\Models\TblBusinessImages;
use App\Models\TblPasswordResetModel;
use App\Models\TblBusinessTagCategoryModel;
use App\Models\TblAboutUs;
use App\Models\TblContactUs;
use App\Models\TblTerms;
use App\Models\TblThankYou;
use Session;
use Carbon\Carbon;
use Redirect;
use DB;
use Mail;

class FrontController extends Controller
{
    // public static function allow_logged_in_users_only()
    // {
    //     if(session("login") != true)
    //     {
    //       return Redirect::to("/login")->send();
    //     }
    // }

    // public static function allow_logged_out_users_only()
    // {
    //     if(session("login") == true)
    //     {
    //       return Redirect::to("/home")->send();
    //     }
    // }
    
    public function index()
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
        
        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
         $data['contact_us']           = TblContactUs::first();
        $data['cityList']           = TblCityModel::get();
        $data['_membership']        = TblMembeshipModel::get();
        $data["_business_list"]     = TblBusinessModel:: where('business_status',5)->where('membership',1)
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_business.business_name','ASC')
                                    ->groupBy('tbl_business.business_id')
                                    ->paginate(9);
        $data["_featured_list"]     = TblBusinessModel::where('membership',1)->where('business_status',5) 
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_business.business_name','DESC')
                                    ->groupBy('tbl_business.business_id')
                                    ->get();
        $data['_categories']        = TblBusinessCategoryModel::where('parent_id',0)->get();
        $data['_most_viewed']       = TblReportsModel::join('tbl_business','tbl_business.business_id','=','tbl_reports.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_reports.business_views','ASC')
                                    ->groupBy('tbl_business.business_id')
                                    ->limit(4)
                                    ->get();
        return view('front.pages.home',$data);

    }
    public function registration()
    {

        $data['countyList']         = TblCountyModel::orderBy('county_name','ASC')->get();
        $data['membership']         = TblMembeshipModel::get();
        $data['countyList']         = Tbl_county::get();
        $data['contact_us']           = TblContactUs::first();
        $data['terms']                = TblTerms::first();
        
        return view('front.pages.registration', $data);
    }
    public function get_sub_category(Request $request)
    {
        $check      = TblBusinessCategoryModel::where('business_category_id',$request->parent_id)->first();
        $cat        = array($check->business_category_name);
        $cat1       = array($check->business_category_id);
        if($check->parent_id!=0)
        {
            
            $check1         = TblBusinessCategoryModel::where('business_category_id',$check->parent_id)->first();
            $cat            = array( $check1->business_category_name,$check->business_category_name);
            $cat1           = array( $check1->business_category_id,$check->business_category_id);
                
            if($check1->parent_id!=0)
            {
                $check2     = TblBusinessCategoryModel::where('business_category_id',$check1->parent_id)->first();
                $cat        = array($check2->business_category_name,$check1->business_category_name,$check->business_category_name);
                $cat1       = array($check2->business_category_id,$check1->business_category_id,$check->business_category_id);
                 
                if($check2->parent_id)
                {
                    $check3 = TblBusinessCategoryModel::where('business_category_id',$check1->parent_id)->first();
                    $cat    = array($check3->business_category_name,$check2->business_category_name,$check1->business_category_name,$check->business_category_name );
                    $cat1   = array($check3->parent_id,$check2->parent_id,$check1->parent_id,$check->parent_id );
                    if($check2->parent_id)
                    {
                        $check4 = TblBusinessCategoryModel::where('business_category_id',$check1->parent_id)->first();
                        $cat    = array($check4->business_category_name,$check3->business_category_name,$check2->business_category_name,$check1->business_category_name,$check->business_category_name );
                        $cat1   = array($check4->parent_id,$check3->parent_id,$check2->parent_id,$check1->parent_id,$check->parent_id );
                    }
                    else
                    {

                    }
                }
                else
                {
                   
                }
            }
            else
            {
               
            }
        }
        else
        {
          
        }
        $data['value']              = $cat1;
        $data['_filtered']          = $cat;
        $data['_categories_list']   = TblBusinessCategoryModel::where('parent_id',0)->get();
        $data['_membership']        = TblMembeshipModel::get();
        $data["_business_list"]     = TblBusinessTagCategoryModel::where('tbl_business.membership',1)->where('business_category_id',$request->parent_id)->where('business_status',5)
                                    ->join('tbl_business','tbl_business.business_id','=','tbl_business_tag_category.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                    ->groupBy('tbl_business.business_id')
                                    ->orderBy('tbl_business.membership',"ASC")
                                    ->paginate(9);
        $data['_categories_list']   = TblBusinessCategoryModel::where('parent_id',0)
                                    ->get();

        $data["_featured_list"]     = TblBusinessModel::where('tbl_business.membership',1)->where('business_status',5)  
                                    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->groupBy('tbl_business.business_id')
                                    ->get();
        $data['_categories']        = TblBusinessCategoryModel::where('parent_id',$request->parent_id)->get();
        $data['_most_viewed']       = TblReportsModel::where('tbl_business.membership',1)->join('tbl_business','tbl_business.business_id','=','tbl_reports.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_reports.business_views','DESC')
                                    ->limit(4)
                                    ->get();
        
        return view("front.pages.show_list",$data);

    }
    public function redirect_deactivated()
    {
        return view('front.pages.deactivated_account');
    }

    public function getCity(Request $request)
    {
        if($request->ajax())
        {
            $cityList               = Tbl_city::getCity($request->countyId)->get();
            $cityOutputList         = '';
            $cityOutputList         .= '<option value="" disabled selected>--City--</option>';
            foreach($cityList as $cityListItem)
            {
                $cityOutputList     .= '<option value="'.$cityListItem->city_id.'">'.$cityListItem->city_name.'</option>';
            }
            return response()->json(['html' => $cityOutputList]);
        }
    }

    public function getPostalCode(Request $request)
    {

        if($request->ajax())
        {
             $postalCode = Tbl_city::getPostalCode($request->cityId)->first();
             return response()->json($postalCode->postal_code);  
        }
    }

    public function registerBusiness(Request $request)
    {
        if($request->ajax())
        {
            $emailAvailability = Tbl_user_account::checkEmail($request->emailAddress)->first();
            $phoneAvailability = TblBusinessModel::checkPhone($request->primaryPhone,$request->alternatePhone)->first();
            if(count($emailAvailability) == 1)
            {
                return response()->json(['status' => 'used', 'message' => 'Email has already been used.']); 
            }
            elseif(count($phoneAvailability) != 0)
            {
                return response()->json(['status' => 'used', 'message' => 'Primary or Secondary Phone has already been used.']); 
            }
            else
            {
            $businessData = new Tbl_business;
            $businessData->business_id = '';
            $businessData->business_name = $request->businessName;
            $businessData->county_id = $request->countyDropdown;
            $businessData->city_id = $request->cityDropdown;
            $businessData->business_complete_address = $request->businessAddress;
            $businessData->business_phone = $request->primaryPhone;
            $businessData->business_alt_phone = $request->alternatePhone;
            $businessData->business_fax = $request->faxNumber;
            $businessData->facebook_url = $request->facebookUrl;
            $businessData->twitter_url = $request->twitterUsername;
            $businessData->membership = $request->membership;
            $businessData->business_status = '1';
            $businessData->agent_call_date = '';
            $businessData->date_transact = date("Y/m/d");
            $businessData->date_created = date("Y/m/d");

            $businessData->save();

            $contactData = new Tbl_business_contact_person;
            $contactData->business_contact_person_id = '';
            $contactData->contact_prefix = $request->prefix;
            $contactData->contact_first_name = $request->firstName;
            $contactData->contact_last_name = $request->lastName;
            $contactData->business_id = $businessData->business_id;
            $contactData->save();

            $accountData = new Tbl_user_account;
            $accountData->user_email = $request->emailAddress;
            $accountData->user_password =  password_hash($request->password, PASSWORD_DEFAULT);
            $accountData->user_category = 'merchant';
            $accountData->status = 'registered';
            $accountData->string_password = "none";
            $accountData->business_id = $businessData->business_id;
            $accountData->business_contact_person_id = $contactData->business_contact_person_id;
            $accountData->save();

            $otherData = new TblBusinessOtherInfoModel;
            $otherData->business_other_info_id = '';
            $otherData->company_information = 'none';
            $otherData->business_website = 'none';
            $otherData->year_established = 'none';
            $otherData->company_profile = '';
            $otherData->business_id = $businessData->business_id;
            $otherData->save();

            $businessHoursData = new Tbl_business_hours;
            $businessHoursData->insert(array(
                array('days' => 'Monday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Tuesday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Wednesday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Thursday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Friday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Saturday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id),
                array('days' => 'Sunday', 'business_hours_from' => '00:00', 'business_hours_to' => '00:00', 
                'desc' => 'none', 'business_id' => $businessData->business_id)
            ));
            return response()->json(['status' => 'success', 'url' => '/success']); 
            } 
        }

	}
    public function businessSearch(Request $request)
    {
        return Redirect::to("/search-business-result?businessKeyword=$request->businessKeyword&countyId=$request->countyDropdown&cityOrpostalCode=$request->postalCode");
    }

    public function businessSearchResult(Request $request)
    {
        $data['contact_us']           = TblContactUs::first();
        $data['businessKeyword'] = $businessKeyword = $request->businessKeyword;
        $data['countyID'] = $countyID = $request->countyId;
        $data['postal_code'] = $postalCode = $request->cityOrpostalCode;
        if($postalCode=="")
        {
            
            $data['_businessResult'] = TblBusinessModel::where('tbl_business.county_id',$countyID)->Business($businessKeyword)
                                    ->groupBy('tbl_business.business_id')
                                    ->orderBy('tbl_business.membership','DESC')
                                    ->paginate(9);  
        }
        else
        {
            
            $data['_businessResult'] = TblBusinessModel::where('tbl_business.county_id',$countyID)->Businesses($businessKeyword,$postalCode)
                                    ->groupBy('tbl_business.business_id')
                                    ->orderBy('tbl_business.membership','DESC')
                                    ->paginate(9);  
        }
        $data['countyList']         = TblCountyModel::get();
        $data['cityList']           = TblCityModel::get();
        $data['_membership']        = TblMembeshipModel::get();
        $data["_business_list"]     = TblBusinessModel:: where('business_status',5)
                                    ->groupBy('tbl_business.business_id')
                                    ->orderBy('tbl_business.membership','ASC')
                                    ->paginate(9);
        $data["_featured_list"]     = TblBusinessModel::where('membership',2)->where('business_status',5)  
                                    ->groupBy('tbl_business.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->get();
        $data['_categories']        = TblBusinessCategoryModel::where('parent_id',0)->get();
        $data['_most_viewed']       = TblReportsModel::join('tbl_business','tbl_business.business_id','=','tbl_reports.business_id')
                                    ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                                    ->orderBy('tbl_reports.business_views','DESC')
                                    ->limit(4)
                                    ->get();
        return view('front.pages.searchresult',$data); 
    }
    public function business(Request $request,$id)
    {
        $data['contact_us']     = TblContactUs::first();
        $data['page']           = 'business';
        $data['countyList']     = TblCountyModel::get();
        $data['business_id']    = $id;

        $check = TblReportsModel::where('business_id',$id)->first();
        if($check)
        {
            $update['business_id']      = $id;
            $update['business_views']   = $check->business_views + 1;
            TblReportsModel::where('business_id',$id)->update($update);   
        }
        else
        {
            $insert['business_id']      = $id;
            $insert['business_views']   = '1';
            TblReportsModel::insert($insert);   
        }
        $data["business_info"] = TblBusinessModel::where('tbl_business.business_id', $id)
                               ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                               ->join('tbl_business_other_info','tbl_business_other_info.business_id','=','tbl_business.business_id')
                               ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                               ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                               ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                               ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                               ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                               ->first();

        $address = $data['business_info']->postal_code." ".$data['business_info']->city_name." ".$data['business_info']->county_name;
        $data['coordinates']            = Self::getCoordinates_long($address);
        $data['coordinates1']           = Self::getCoordinates_lat($address); 

        $data['_tag_category']          = TblBusinessTagCategoryModel::where('business_id',$id)
                                        ->join('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id')
                                        ->get();
        $images                         = TblBusinessImages::where('business_id',$id)->count();
            if($images==0)
            {
                $data['images']         = 0;
            }
            else
            {
                $data['images']         = 1;
                $data['_images']        = TblBusinessImages::where('business_id',$id)->first();
            }
            $data['_business_hours']    = TblBusinessHoursmodels::where('act','!=','yes')->where('business_id',$id)->get();
            $check_payment              = TblABusinessPaymentMethodModel::where('business_id',$id)->get();

            if($check_payment)
            {
                $data['_payment_method']=$check_payment;
            }
            else
            {
                $data['_payment_method']="";
            }
        return view('front.pages.business', $data);
    }
    public function add_messages(Request $request)
    { 
      $data["email"]             = $request->email;
      $data["subject"]           = $request->subject;
      $data["messages"]          = $request->messages;
      $data["business_id"]       = $request->business_id;
      TblGuestMessages::insert($data);;
      // return "<div class='alert alert-success'><strong>Success!</strong> Message Sent.</div>";
       return Redirect::back();
    }

      public function add_messages_send(Request $request)
    { 
  
     
    }


    public static function getCoordinates_long($address){
        $address        = str_replace(" ", "+", $address); 
        $url            = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=".$address;
        $response       = file_get_contents($url);
        $json           = json_decode($response,TRUE); 
        $long           = $json['results'][0]['geometry']['location']['lng'];
        return $long;
    }
    public static function getCoordinates_lat($address){
        $address        = str_replace(" ", "+", $address); 
        $url            = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=".$address;
        $response       = file_get_contents($url);
        $json           = json_decode($response,TRUE); 
        $lat            = $json['results'][0]['geometry']['location']['lat'];
        return $lat;
    }
    

    public function success()
    {
        $data['countyList']     = TblCountyModel::get();
        $data['contact_us']     = TblContactUs::first();
        $data['thank_you']      = TblThankYou::first();
        return view('front.pages.success',$data);
    }

    public function business_info(Request $request)
    {
        $data['countyList']     = TblCountyModel::get();
        $data['contact_us']           = TblContactUs::first();
        $data['business_info']  = DB::table('tbl_business')
                                ->join('tbl_user_account', 'tbl_business.business_id', '=', 'tbl_user_account.business_id')
                                ->where('tbl_business.business_id', '=', $request->business_id)
                                ->get();
        return view('front.pages.business', $data); 
    }

    public function about()
    {
        $data['page']           = 'About';
        $data['countyList']     = TblCountyModel::get();
        $data['_about_us']      = TblAboutUs::first();
         $data['contact_us']           = TblContactUs::first();
        return view('front.pages.about', $data);
    }
    public function contact()
    {
        $data['page']           = 'Contact';
        $data['countyList']     = TblCountyModel::get();
        $data['contact_us']     = TblContactUs::first();
        return view('front.pages.contact', $data);

    }
    public function contact_send(Request $request)
    {
        $contact_name           = $request->name;
        $contact_email_add      = $request->email_add;
        $contact_subject        = $request->subject;
        $contact_help_message   = $request->help_message;
        $date                   = date("F j, Y",strtotime((new \DateTime())->format('Y-m-d')));

        $data                   = array('name'=>$contact_name,'email_add'=>$contact_email_add,'subject'=>$contact_subject,'help_message'=>$contact_help_message,'date'=>$date);
        $check_mail             = Mail::send('front.pages.merchant_sending_email', $data, function($message) {
                                  $message->to('guardians35836@gmail.com', 'Croatia Team')->subject
                                    ('THE RIGHT PLACE FOR BUSINESS');
                                  $message->from('guardians35836@gmail.com','Croatia Customer');
        });
        $data['guest_messages'] = TblBusinessContactPersonModel::get(); 
        if($check_mail)
        {
            Session::flash('success', 'Thank you!. Your Message Send Successfully!');
            return Redirect::to('/contact');
        }
        else
        {
            Session::flash('error', 'Sorry!. Network error, Transaction Fail!');
            return Redirect::to('/contact');
        }
    }

    public function admin()
    {
        $data['page']                 = 'generaladmin';
        $data['contact_us']           = TblContactUs::first();
        return view('generaladmin');
    }

    public function sampleUpload() {
        return view('practice-page.upload');
    }
    //UPLOAD FILE SAMPLE
    public function uploadFile(Request $request) {
        $file = $request->file("file");
        if ($file == "") 
        {
            echo "File is empty.";
        }
        else if($file->getClientOriginalExtension() != "mp3") 
        {
            echo "File is not an audio, please select audio file.";
        }
        else 
        {
            $file->move('uploads', $file->getClientOriginalName());
            $audioInfo = new Tbl_audio;
            $audioInfo ->audio_name = $file->getClientOriginalName();
            $audioInfo->audio_path = '/uploads/'.$file->getClientOriginalName().'';
            $audioInfo->save();
        }
    }
}
