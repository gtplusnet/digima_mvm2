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

        // $this->call(UserTableSeeder::class);
<<<<<<< HEAD
           $this->call(CountyTableSeeder::class);
           $this->call(CityTableSeeder::class);
=======
            $this->call(CityTableSeeder::class);
            $this->call(CountyTableSeeder::class);

>>>>>>> 3b3f28f2e9bdb7113be70786f88f738da7e17c46
        Model::reguard();
    }
}
