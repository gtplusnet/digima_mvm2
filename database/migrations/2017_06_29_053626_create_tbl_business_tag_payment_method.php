<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessTagPaymentMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_business_tag_payment_method', function (Blueprint $table) {
            $table->increments('business_tag_payment_method_id');
            $table->integer('payment_method_id'); 
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
        Schema::drop('tbl_business_tag_payment_method');    
    }
}
