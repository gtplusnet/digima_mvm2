<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUserAccountModel extends Model
{
    protected $table = 'tbl_user_account';
    protected $primaryKey = 'user_account_id';
    public $timestamps = false;

    public function scopeUserAccount($query)
    {
    		$query 	->join('tbl_business','tbl_business.business_id','=','tbl_user_account.business_id')
                 	->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                 	->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                 	->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                 	->join('tbl_county','tbl_county.county_id','=','tbl_city.county_id');

                 	return $query;
    }
}
