<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblCityModel extends Model
{
    protected $table = 'tbl_city';
    protected $primaryKey = 'city_id';
    public $timestamps = false;
}
