<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUserTeamModel extends Model
{
	protected $table = 'tbl_user_team';
    protected $primaryKey = 'user_team_id';
    public $timestamps = false;
}