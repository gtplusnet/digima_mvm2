<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessContactPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business_contact_person', function (Blueprint $table) {
            $table->increments('business_contact_person_id');
            $table->string('contact_prefix');
            $table->string('contact_first_name');         
            $table->string('contact_last_name');            
            $table->string('position', 100)->nullable();          
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
        Schema::drop('tbl_business_contact_person');
    }
}
