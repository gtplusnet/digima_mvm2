<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessTagKeywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business_tag_keywords', function (Blueprint $table) {
            $table->increments('business_tag_keywords_id');
            $table->string('keywords_name');
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
        Schema::drop('tbl_business_tag_keywords');
    }
}
