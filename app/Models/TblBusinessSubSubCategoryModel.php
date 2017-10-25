<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessSubSubCategoryModel extends Model
{
    protected $table = 'tbl_business_sub_sub_category';
    protected $primaryKey = 'sub_sub_category_id';
    public $timestamps = false;
}
