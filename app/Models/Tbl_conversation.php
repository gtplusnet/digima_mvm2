<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_conversation extends Model
{
    protected $table = 'tbl_conversation';
    protected $primaryKey = 'conversation_id';
    public $timestamps = false;
}
