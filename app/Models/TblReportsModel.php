<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblReportsModel extends Model
{
    protected $table = 'tbl_reports';
    protected $primaryKey = 'report_id';
    public $timestamps = false;


    public function scopeBusinessFront($query,$status,$membership)
    {
        $query  ->join('tbl_business','tbl_business.business_id','=','tbl_reports.business_id')
                ->join('tbl_business_images','tbl_business_images.business_id','=','tbl_business.business_id')
                ->where('business_status',$status)
                ->where('membership',$membership)
                ->orderBy('business_views','DESC')
                ->groupBy('tbl_business.business_id')
                ->limit(4);
        return $query;
    }
}
