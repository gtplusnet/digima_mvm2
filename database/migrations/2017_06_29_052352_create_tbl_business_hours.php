<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessHours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business_hours', function (Blueprint $table) {
            $table->increments('business_hours_id');
            $table->time('business_hours_from')->nullable();
            $table->time('business_hours_to')->nullable();
            $table->string('desc', 100)->nullable();
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
        Schema::drop('tbl_business_hours');    
    }
}
