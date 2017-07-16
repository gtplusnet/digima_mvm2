<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pricing_table', function (Blueprint $table) {
            $table->increments('pricing_table_id');
            $table->string('pricing_title', 100); 
            $table->string('pricing_desc'); 
            $table->decimal('price', 10, 2);
            $table->integer('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_pricing_table');    
    }
}
