<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUserTeamModel extends Model
{
	protected $table = 'tbl_user_team';
   	protected $primaryKey = 'user_team_id';
    	public $timestamps = false;

    	public function scopeTeamAgent($query)
    	{
    		$query  ->join('tbl_team','tbl_team.team_id','=','tbl_user_team.team_id')
                    ->join('tbl_user','tbl_user.user_id','=','tbl_user_team.user_id')
                    ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id');

            return $query;
    	}
        public function scopeBusiness($query,$archived)
        {
            $query  ->join('tbl_user','tbl_user.user_id','=','tbl_user_team.user_id')
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id')
                    ->join('tbl_business_contact_person','tbl_business_contact_person.business_id','=','tbl_business.business_id')
                    ->join('tbl_membership','tbl_membership.membership_id','=','tbl_business.membership')
                    ->where('tbl_business.business_status',$archived);
        }
}