<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business', function (Blueprint $table) {
            $table->increments('business_id');
            $table->string('business_name');  
            $table->integer('city_id');           
            $table->string('business_complete_address');            
            $table->string('business_phone', 50);            
            $table->string('business_alt_phone', 50);
            $table->string('business_fax', 50);
            $table->string('facebook_url', 100)->nullable();
            $table->string('twitter_url', 100)->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('date_created');
        });

        Schema::hasTable('city_id', function (Blueprint $table) {
            $table->foreign('city_id')->references('city_id')->on('tbl_city')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::hasTable('tbl_business', function (Blueprint $table) {
            $table->dropForeign('city_id');
        });
        Schema::drop('tbl_business');
    }
}
