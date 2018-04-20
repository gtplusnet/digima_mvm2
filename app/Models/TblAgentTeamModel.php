<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblAgentTeamModel extends Model
{
	protected $table = 'tbl_agent_team';
    protected $primaryKey = 'agent_team_id';
    public $timestamps = false;
}