<?php

use Illuminate\Database\Seeder;

class tbl_payment_method extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_payment_method')->truncate();
        $statement = "
        	INSERT INTO `tbl_payment_method` VALUES
	            (1, 'American Express'),
	            (2, 'Mastercard'),
	            (3, 'Visa'),
	            (4, 'Cash'),
	            (5, 'Paypal')
        	";
        DB::statement($statement);
    }
}
