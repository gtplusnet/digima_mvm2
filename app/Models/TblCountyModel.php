<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblCountyModel extends Model
{
    protected $table = 'tbl_county';
    protected $primaryKey = 'county_id';
    public $timestamps = false;
}
