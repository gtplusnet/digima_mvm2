<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessSubCategoryModel extends Model
{
    protected $table = 'tbl_business_sub_category';
    protected $primaryKey = 'sub_category_id';
    public $timestamps = false;
}
