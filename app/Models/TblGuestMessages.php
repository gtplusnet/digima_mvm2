<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblGuestMessages extends Model
{
    protected $table = 'tbl_guest_messages';
    protected $primaryKey = 'guest_messages_id';
    public $timestamps = false;
}
