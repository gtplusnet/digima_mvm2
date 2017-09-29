<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessModel extends Model
{
    protected $table = 'tbl_business';
    protected $primaryKey = 'business_id';
    public $timestamps = false;
}
