<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessOtherInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business_other_info', function (Blueprint $table) {
            $table->increments('business_other_info_id');
            $table->string('company_information')->nullable();         
            $table->string('business_website')->nullable();            
            $table->integer('year_established')->lenght(4)->nullable();    
            $table->integer('business_id');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_business_other_info');
    }
}
