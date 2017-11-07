<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblReportsTable1026 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbl_reports', function (Blueprint $table) {
            $table->increments('report_id');
            $table->string('business_views');  
            $table->string('search_keywords'); 
            $table->string('search_category');
            $table->string('search_business');  
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
