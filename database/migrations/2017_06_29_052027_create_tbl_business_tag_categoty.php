<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessTagCategoty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business_tag_category', function (Blueprint $table) {
            $table->increments('business_tag_category_id');
            $table->integer('business_category_id');
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
        Schema::drop('tbl_business_tag_category');
    }
}
