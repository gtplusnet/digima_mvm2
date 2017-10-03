<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTblSupervisorTable1032017938am extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_supervisor', function (Blueprint $table) {
            $table->string('last_name')->after('supervisor_id');  
            $table->string('first_name')->after('supervisor_id'); 
            $table->renameColumn('full_name', 'prefix')->after('supervisor_id');
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
