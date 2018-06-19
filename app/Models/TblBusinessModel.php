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
        $query  ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        return $query;
    }
    public function scopeBusinessAdmin($query)
    {
        $query  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_business.user_id')
                ->join('tbl_user_account','tbl_user_account.business_contact_person_id','=','tbl_business_contact_person.business_contact_person_id');
        
        return $query;
    }
    public function scopeBusiness($query,$businessKeyword)
    {
    	$query->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        $query->join('tbl_business_tag_category','tbl_business_tag_category.business_id','=','tbl_business.business_id');
        $query->join('tbl_business_tag_keywords','tbl_business_tag_keywords.business_id','=','tbl_business.business_id');
        $query->join('tbl_business_category','tbl_business_category.business_category_id','=','tbl_business_tag_category.business_category_id');
        $query->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id');
        $query->where(function($query) use ($businessKeyword)
                {
                    $query->where('tbl_business.business_name', 'like', '%'.$businessKeyword.'%')
                    ->orWhere('tbl_business_tag_keywords.keywords_name', 'like', '%'.$businessKeyword.'%')
                    ->orWhere('tbl_business_category.business_category_name', 'like', '%'.$businessKeyword.'%');

                });
        return $query;

    }
    public function scopeBusinessInfo($query)
    {
        $query  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                ->join('tbl_business_other_info','tbl_business_other_info.business_id','=','tbl_business.business_id')
                ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id')
                ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                ->join('tbl_user_account','tbl_user_account.business_id','=','tbl_business.business_id')
                ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id');
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
    public function scopeBusinessInformation($query)
    {
        $query  ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                ->join('tbl_county','tbl_county.county_id','=','tbl_business.county_id')
                ->join('tbl_city','tbl_city.city_id','=','tbl_business.city_id');
        return $query;
    }
    public function scopeBusinessFront($query,$status,$membership)
    {
        $query  ->where('business_status',$status)
                ->where('membership',$membership)
                ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                ->orderBy('tbl_business.business_name','ASC')
                ->groupBy('tbl_business.business_id');
        return $query;
    }
   
}
