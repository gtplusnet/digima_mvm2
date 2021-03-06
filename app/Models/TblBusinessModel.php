<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class TblBusinessModel extends Model
{
    protected $table = 'tbl_business';
    protected $primaryKey = 'business_id';
    public $timestamps = false;
    public function scopeBusinessCounty($query)
    {
        $query  ->leftjoin('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                ->leftjoin('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        return $query;
    }
    public function scopeBusinessAdmin($query)
    {
        $query  ->leftjoin('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                ->leftjoin('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                ->leftjoin('tbl_user_info','tbl_user_info.user_id','=','tbl_business.user_id')
                ->leftjoin('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id');
        
        return $query;
    }
    public function scopeBusinessAdmin2($query)
    {
        $query  ->leftjoin('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                ->leftjoin('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                ->leftjoin('tbl_user_info','tbl_user_info.user_id','=','tbl_business.user_id');
        
        return $query;
    }
    public function scopeBusiness($query,$businessKeyword)
    {
    	$query->leftjoin('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        $query->leftjoin('tbl_business_tag_category','tbl_business_tag_category.business_id','=','tbl_business.business_id');
        $query->leftjoin('tbl_business_tag_keywords','tbl_business_tag_keywords.business_id','=','tbl_business.business_id');
        $query->leftjoin('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id');
        $query->leftjoin('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id');
        $query->where(function($query) use ($businessKeyword)
                {
                    $query->orWhere('tbl_business.business_name', 'like', '%'.$businessKeyword.'%')
                    ->orWhere('tbl_business_tag_keywords.keywords_name', 'like', '%'.$businessKeyword.'%')
                    ->orWhere('tbl_business_category.business_category_name', 'like', '%'.$businessKeyword.'%');

                });
        return $query;

    }
    public function scopeBusinessInfo($query)
    {
        $query  ->leftjoin('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                ->leftjoin('tbl_business_other_info','tbl_business_other_info.business_id','=','tbl_business.business_id')
                ->leftjoin('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                ->leftjoin('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                ->leftjoin('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                ->leftjoin('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                ->leftjoin('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id');
        return $query;
    }
    public function scopeBusinesses($query,$businessKeyword,$postalCode)
    {
    	$query->leftjoin('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        $query->leftjoin('tbl_business_tag_category','tbl_business_tag_category.business_id','=','tbl_business.business_id');
        $query->leftjoin('tbl_business_tag_keywords','tbl_business_tag_keywords.business_id','=','tbl_business.business_id');
        $query->leftjoin('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id');
        $query->leftjoin('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id');
        $query->where('tbl_business.business_name', 'like', '%'.$businessKeyword.'%');
        $query->orWhere('tbl_city.postal_code', $postalCode);
        $query->orWhere('tbl_city.city_name', $postalCode);
        $query->orWhere('tbl_business_tag_keywords.keywords_name', 'like', '%'.$businessKeyword.'%');
        $query->orWhere('tbl_business_category.business_category_name', 'like', '%'.$businessKeyword.'%');
        return $query;
	}
    public function scopeCheckPhone($query, $userPhone,$userAltPhone)
    {
        return $query->select('business_phone')->where('business_phone', $userPhone);
    }
    public function scopeBusinessInformation($query)
    {
        $query  ->leftjoin('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                ->leftjoin('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                ->leftjoin('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                ->leftjoin('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        return $query;
    }
    public function scopeBusinessFront($query,$status,$membership)
    {
        $query  ->leftjoin("tbl_city","tbl_city.city_id","=","tbl_business.city_id")
                ->select('tbl_business.*','tbl_business_images.business_banner','tbl_business_images.other_image_one','tbl_business_images.other_image_two','tbl_business_images.other_image_three','tbl_city.*')
                ->where('business_status',$status)
                ->where('membership',$membership)
                ->leftjoin('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                ->orderBy('tbl_business.business_name','ASC')
                ->groupBy('tbl_business.business_id');
        return $query;
    }
   
}
