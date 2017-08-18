<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblCityModel extends Model
{
    protected $table = 'tbl_city';
    protected $primaryKey = 'city_id';
    public $timestamps = false;

    public function scopeGetCity($query, $countyId)
    {
    	return $query->where('county_id', $countyId);
    }

    public function scopeGetPostalCode($query, $cityId)
    {
    	return $query->where('city_id', $cityId);
    }
}
