<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_business extends Model
{
    protected $table = 'tbl_business';
    protected $primaryKey = 'business_id';
    public $timestamps = false;

    public function scopeSearchBusinessResult($query, $businessKeyword, $countyId,$cityID)
    {
    	return $query->where('business_name', 'LIKE', '%'.$businessKeyword.'%')->where('county_id', $countyId)->where('city_id',$cityID);
    }
}
