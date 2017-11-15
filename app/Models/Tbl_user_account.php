<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_user_account extends Model
{
    protected $table = 'tbl_user_account';
    protected $primaryKey = 'user_account_id';
    public $timestamps = false;

    public function scopeCheckEmail($query, $userEmail)
    {
    	return $query->select('user_email')->where('user_email', $userEmail);
    }
    
}
