<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTblAgent10282017827 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('tbl_agent', function (Blueprint $table) {
            $table->integer('team_id'); 
            $table->string('primary_phone'); 
            $table->string('secondary_phone'); 
            $table->string('other_info'); 
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
