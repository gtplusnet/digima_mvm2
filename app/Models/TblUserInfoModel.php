<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUserInfoModel extends Model
{
    protected $table = 'tbl_user_info';
    protected $primaryKey = 'user_info_id';
    public $timestamps = false;
}
