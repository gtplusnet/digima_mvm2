<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_agent extends Model
{
	protected $table = 'tbl_business';
    protected $primaryKey = 'business_id';
    public $timestamps = false;

    public function scopeContact_person($query)
    {
    	return $query->leftjoin('tbl_business_contact_person', 'tbl_business_contact_person.business_id', '=' , 'tbl_business.business_id');
    }
    public function scopeOther_info($query)
    {
    	return $query->leftjoin('tbl_business_other_info', 'tbl_business_other_info.business_id', '=' , 'tbl_business.business_id');
    }
     public function scopeUser_account($query)
    {
    	return $query->leftjoin('tbl_user_account', 'tbl_user_account.business_id', '=' , 'tbl_business.business_id');
    }
}
	