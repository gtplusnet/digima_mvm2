<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TblPasswordResetModel extends Model

{
	protected $table = 'tbl_password_reset';
    protected $primaryKey = 'password_reset_id';
    public $timestamps = false;
}