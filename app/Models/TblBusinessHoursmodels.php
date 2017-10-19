<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessHoursmodels extends Model
{
    protected $table = 'tbl_business_hours';
    protected $primaryKey = 'business_hours_id';
    public $timestamps = false;
}