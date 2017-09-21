<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblPaymentMethod extends Model
{
	
	protected $table = 'tbl_payment_method';
	protected $primaryKey = "payment_method_id";
    public $timestamps = false;

}
