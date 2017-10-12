<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblMembeshipModel extends Model
{
    protected $table = 'tbl_membership';
    protected $primaryKey = 'membership_id';
    public $timestamps = false;
}
