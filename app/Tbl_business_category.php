<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_business_category extends Model
{
    protected $table = 'tbl_business_category';
	protected $primaryKey = "business_category_id";
    public $timestamps = false;

    public function childs() 
    {
        return $this->hasMany('App\Tbl_business_category','parent_id','id') ;
    }
}
