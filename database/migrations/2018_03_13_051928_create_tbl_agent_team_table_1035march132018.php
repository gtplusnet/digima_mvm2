<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAgentTeamTable1035march132018 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_agent_team', function (Blueprint $table) {
            $table->increments('agent_team_id'); 
            $table->integer('team_id');
            $table->integer('user_id');
            $table->string('agent_added');
            $table->tinyInteger('archived')->default(0); 
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
