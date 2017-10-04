<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTblAgent092820170517pm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_agent', function (Blueprint $table) {
            $table->string('last_name')->after('agent_id');  
            $table->string('first_name')->after('agent_id'); 
            $table->renameColumn('full_name', 'prefix')->after('agent_id');
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_agent', function (Blueprint $table) {
            //
        });
    }
}
