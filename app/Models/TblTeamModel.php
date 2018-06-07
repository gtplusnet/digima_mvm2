<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblTeamModel extends Model
{
    protected $table = 'tbl_team';
    protected $primaryKey = 'team_id';
    public $timestamps = false;


    public function scopeTeamUser($query)
    {
    		$query    ->join('tbl_user_team','tbl_user_team.team_id','=','tbl_team.team_id')
                    ->join('tbl_user','tbl_user.user_id','=','tbl_user_team.user_id')
                    ->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id');
          return $query;
    }
    public function scopeTeamBusiness($query)
    {
    		$query    ->join('tbl_user_team','tbl_user_team.team_id','=','tbl_team.team_id')
    		          ->join('tbl_user','tbl_user.user_id','=','tbl_user_team.user_id')
                    ->join('tbl_business','tbl_business.user_id','=','tbl_user.user_id');
          return $query;
    }
}