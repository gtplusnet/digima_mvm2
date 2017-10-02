<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblSupervisorModels extends Model
{
	protected $table = 'tbl_supervisor';
    protected $primaryKey = 'supervisor_id';
    public $timestamps = false;
}