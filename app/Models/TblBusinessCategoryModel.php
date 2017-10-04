<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessCategoryModel extends Model
{
    protected $table = 'tbl_business_category';
    protected $primaryKey = 'business_category_id';
    public $timestamps = false;
}
