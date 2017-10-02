<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSupervisor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbl_supervisor', function (Blueprint $table) 
       {
            $table->increments('supervisor_id');
            $table->string('full_name');  
            $table->string('password');     
            $table->string('email');    
            $table->string('position');   
            $table->string('date_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_supervisor');
    }
}
