<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessTagCategoryModel extends Model
{
  	protected $table = "tbl_business_tag_category";
 	protected $primaryKey = "business_tag_category_id";
    public $timestamps = false;
}
