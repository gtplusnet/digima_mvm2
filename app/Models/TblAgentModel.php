<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblAgentModel extends Model
{
    protected $table = 'tbl_agent';
    protected $primaryKey = 'agent_id';
    public $timestamps = true;
}