<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TblABusinessPaymentMethodModel extends Model

{
	protected $table = 'tbl_business_payment_method';
    protected $primaryKey = 'payment_method_id';
    public $timestamps = false;
}