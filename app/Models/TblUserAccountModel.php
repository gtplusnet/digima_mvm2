<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUserAccountModel extends Model
{
    protected $table = 'tbl_user_account';
    protected $primaryKey = 'user_account_id';
    public $timestamps = false;
}
