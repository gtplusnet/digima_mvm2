<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_admin extends Model
{
	protected $table = 'tbl_admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
}