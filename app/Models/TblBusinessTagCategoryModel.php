<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessTagCategoryModel extends Model
{
  	protected $table = "tbl_business_tag_category";
 	protected $primaryKey = "business_tag_category_id";
    public $timestamps = false;

    public function scopeBusinessFront($query,$parent_id)
    {
        $query  ->where('tbl_business.membership',1)->where('business_category_id',$parent_id)->where('business_status',5)
	            ->join('tbl_business','tbl_business.business_id','=','tbl_business_tag_category.business_id')
	            ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
	            ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
	            ->groupBy('tbl_business.business_id')
	            ->orderBy('tbl_business.membership',"ASC");
        return $query;
    }
}
