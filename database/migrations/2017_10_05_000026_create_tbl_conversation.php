<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblConversation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_conversation', function (Blueprint $table) {
            $table->increments('conversation_id');
            $table->string('file_path');
            $table->string('file_name');
            $table->integer('business_id');
            $table->integer('business_contact_person_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_conversation');
    }
}
