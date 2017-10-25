<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessSubCategory2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business_sub_sub_category', function (Blueprint $table) {
            $table->increments('sub_sub_category_id');
            $table->string('sub_sub_category_name');  
            $table->string('sub_sub_category_info'); 
            $table->string('sub_category_id'); 
              
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
