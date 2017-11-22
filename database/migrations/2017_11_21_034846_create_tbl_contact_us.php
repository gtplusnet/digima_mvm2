<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblContactUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_contact_us', function (Blueprint $table) {
            $table->increments('contact_us_id'); 
            $table->string('phone_number'); 
            $table->string('complete_address'); 
            $table->string('email'); 
            $table->string('latitude'); 
            $table->string('longitude'); 
           });
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
