<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business_images', function (Blueprint $table) {
            $table->increments('business_images_id');
            $table->string('business_banner');  
            $table->string('other_image_one'); 
            $table->string('other_image_two');
            $table->string('other_image_three'); 
            $table->string('business_id');
              
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
