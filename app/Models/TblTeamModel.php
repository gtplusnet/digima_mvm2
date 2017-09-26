<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblTeamModel extends Model
{
	protected $table = 'tbl_team';
    protected $primaryKey = 'team_id';
    public $timestamps = false;
}