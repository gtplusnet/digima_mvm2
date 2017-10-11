<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbl_invoice', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->string('invoice_number');
            $table->string('invoice_name');
            $table->string('status');
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
        //
    }
}
