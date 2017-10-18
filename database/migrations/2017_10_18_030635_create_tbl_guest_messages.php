<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblGuestMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_guest_messages', function (Blueprint $table) 
       {
            $table->increments('guest_messages_id');
            $table->string('full_name');    
            $table->string('email');    
            $table->string('subject');   
            $table->string('messages');
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
