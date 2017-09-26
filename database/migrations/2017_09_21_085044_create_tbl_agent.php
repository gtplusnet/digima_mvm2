<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAgent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_agent', function (Blueprint $table) {
            $table->increments('agent_id');
            $table->string('agent_fname');
            $table->string('agent_lname');
            $table->string('agent_username')->unique();
            $table->string('agent_password');
            $table->string('team_id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_agent');
    }
}
