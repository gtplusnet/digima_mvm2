<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CityTableSeeder::class);
        $this->call(CountyTableSeeder::class);
        $this->call(BusinessCategoryTableSeeder::class);
        $this->call(tbl_payment_method::class); 
        Model::reguard();
    }
}
