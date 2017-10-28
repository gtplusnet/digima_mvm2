<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblAgentModels extends Model
{
	protected $table = 'tbl_agent';
    protected $primaryKey = 'agent_id';
    public $timestamps = false;

    public function scopeTeam($query)
    {
    	$query->join('tbl_team', 'tbl_team.team_id', '=', 'tbl_agent.team_id');
    	return $query;
    }
}