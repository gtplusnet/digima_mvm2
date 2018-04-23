<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblPaymentModel extends Model
{
	
	protected $table = 'tbl_payment';
	protected $primaryKey = "payment_id";
    public $timestamps = false;

    public function scopePaymentAdmin($query)
    {
        $query  ->join('tbl_business','tbl_business.business_id','=','tbl_payment.business_id')
                ->join('tbl_business_contact_person','tbl_business_contact_person.business_contact_person_id','=','tbl_payment.business_contact_person_id')
                ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
        		->join('tbl_invoice','tbl_invoice.business_id','=','tbl_business.business_id');
        return $query;
    }

}
