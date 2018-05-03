<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\TblUserAccountModel;
use App\Models\TblUserModel;

use Session;
use Redirect;
use Input;
use DB;
use Crypt;
class DeveloperController extends Controller
{

    public function truncate($table_name)
    {
        DB::table($table_name)->truncate();
        echo "success truncate " . $table_name;
    }
    public function get_table_data($table_name)
    {
        $data = DB::table($table_name)->get();
        echo "Data of ". $table_name.' TABLE';
        dd($data);
    }
    public function update_all_password()
    {
        $update['user_password'] = 'eyJpdiI6IkpHYzlpNWQyVTdPZnZVcDA1ZmxITWc9PSIsInZhbHVlIjoiZ2ZUUXordzB6eE9vMk1ibVVoZXJIQT09IiwibWFjIjoiMzk4Nzg2Mjg0OTJiZjVmNzhhZGEwZjg5NzUzYTU4MWRkMDFiYzgxMTFlZDU5ODVmMDdlZjU3ZmE5NzFkMjM5NiJ9';
        TblUserAccountModel::where('user_category','merchant')->update($update);

        $updates['user_password'] = 'eyJpdiI6IkpHYzlpNWQyVTdPZnZVcDA1ZmxITWc9PSIsInZhbHVlIjoiZ2ZUUXordzB6eE9vMk1ibVVoZXJIQT09IiwibWFjIjoiMzk4Nzg2Mjg0OTJiZjVmNzhhZGEwZjg5NzUzYTU4MWRkMDFiYzgxMTFlZDU5ODVmMDdlZjU3ZmE5NzFkMjM5NiJ9';
        TblUserModel::where('user_id','!=',0)->update($updates);
        echo "success";
    }
    public function get_credential($business_id)
    {
        $cred = TblUserAccountModel::where('business_id',$business_id)->first();
        $pass = Crypt::decrypt($cred->user_password);
        dd($cred->user_email,$pass);
    }
    public function get_user_credential($user_id)
    {
        $cred = TblUserModel::where('user_id',$user_id)->first();
        $pass = Crypt::decrypt($cred->user_password);
        dd($cred->user_email,$pass);
    }
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