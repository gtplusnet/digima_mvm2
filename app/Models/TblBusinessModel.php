<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessModel extends Model
{
    protected $table = 'tbl_business';
    protected $primaryKey = 'business_id';
    public $timestamps = false;


    public function scopeBusiness($query,$businessKeyword)
    {
    	$query->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        $query->join('tbl_business_tag_category','tbl_business_tag_category.business_id','=','tbl_business.business_id');
        $query->join('tbl_business_tag_keywords','tbl_business_tag_keywords.business_id','=','tbl_business.business_id');
        $query->join('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id');
        $query->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id');
        $query->where('tbl_business.business_name', 'like', '%'.$businessKeyword.'%');
        $query->orWhere('tbl_business_tag_keywords.keywords_name', 'like', '%'.$businessKeyword.'%');
        $query->orWhere('tbl_business_category.business_category_name', 'like', '%'.$businessKeyword.'%');
        return $query;

    }
    public function scopeBusinesses($query,$businessKeyword,$postalCode)
    {
    	$query->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        $query->join('tbl_business_tag_category','tbl_business_tag_category.business_id','=','tbl_business.business_id');
        $query->join('tbl_business_tag_keywords','tbl_business_tag_keywords.business_id','=','tbl_business.business_id');
        $query->join('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id');
        $query->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id');
        $query->where('tbl_business.business_name', 'like', '%'.$businessKeyword.'%');
        $query->orWhere('tbl_city.postal_code', $postalCode);
        $query->orWhere('tbl_city.city_name', $postalCode);
        $query->orWhere('tbl_business_tag_keywords.keywords_name', 'like', '%'.$businessKeyword.'%');
        $query->orWhere('tbl_business_category.business_category_name', 'like', '%'.$businessKeyword.'%');
        return $query;
	}
    public function scopeCheckPhone($query, $userPhone,$userAltPhone)
    {
        return $query->select('business_phone')->where('business_phone', $userPhone)->orWhere('business_phone',$userAltPhone)
                    ->orWhere('business_alt_phone', $userPhone)->orWhere('business_alt_phone',$userAltPhone);
    }
    
}
