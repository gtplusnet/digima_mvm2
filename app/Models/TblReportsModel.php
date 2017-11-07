<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblReportsModel extends Model
{
    protected $table = 'tbl_reports';
    protected $primaryKey = 'report_id';
    public $timestamps = false;
}
