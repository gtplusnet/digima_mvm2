<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblPaymentModel extends Model
{
	
	protected $table = 'tbl_payment';
	protected $primaryKey = "payment_id";
    public $timestamps = false;

}
