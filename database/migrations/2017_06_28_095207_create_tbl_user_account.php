<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_account', function (Blueprint $table) {
            $table->increments('user_account_id');
            $table->string('user_email');
            $table->string('user_password'); 
            $table->string('user_category', 100); 
            $table->string('status');               
            $table->integer('business_id')->nullable();         
            $table->integer('business_contact_person_id');

            /*Set foreign key*/
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_user_account');
    }
}
