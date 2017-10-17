<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTblSupervisor310pmoctober extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tbl_supervisor', function (Blueprint $table) {
            $table->string('primary_phone'); 
            $table->string('secondary_phone'); 
            $table->string('address'); 
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
