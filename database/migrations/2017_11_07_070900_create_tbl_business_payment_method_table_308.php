<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBusinessPaymentMethodTable308 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_business_payment_method', function (Blueprint $table) {
            $table->increments('payment_method_id');
            $table->string('payment_method_name');  
            $table->string('payment_method_info'); 
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
