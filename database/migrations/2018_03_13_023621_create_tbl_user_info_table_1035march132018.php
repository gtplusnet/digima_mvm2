<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserInfoTable1035march132018 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::create('tbl_user_info', function (Blueprint $table) {
            $table->increments('user_info_id'); 
            $table->string('user_profile'); 
            $table->string('user_first_name'); 
            $table->string('user_last_name');
            $table->string('user_gender');
            $table->string('user_phone_number');
            $table->text('user_address');
            $table->string('user_created');
            $table->integer('user_id');
            $table->tinyInteger('archived')->default(0); 
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
