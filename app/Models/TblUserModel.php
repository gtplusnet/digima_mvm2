<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function scopeAgent($query)
    {
    	$query->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id');
    	$query->where('user_access_level','AGENT');
    	return $query;

    }
    public function scopeSuper($query)
    {
    	$query->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id');
    	$query->where('user_access_level','SUPERVISOR');
    	return $query;
    }
    public function scopeAdmin($query)
    {
    	$query->join('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id');
    	$query->where('user_access_level','ADMIN');
    	return $query;
    }
    public function scopeTeamUser($query)
    {
        $query  ->leftjoin('tbl_user_info','tbl_user_info.user_id','=','tbl_user.user_id')
                ->leftjoin('tbl_user_team','tbl_user_team.user_id','=','tbl_user.user_id')
                ->leftjoin('tbl_team','tbl_team.team_id','=','tbl_user_team.team_id');
        return $query;
    }

}
