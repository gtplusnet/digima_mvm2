<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_agent extends Model
{
	protected $table = 'tbl_agent';
    protected $primaryKey = 'agent_id';
    public $timestamps = false;
}