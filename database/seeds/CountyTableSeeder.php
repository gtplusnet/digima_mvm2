<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CountyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
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
        Model::reguard();
    }
}
