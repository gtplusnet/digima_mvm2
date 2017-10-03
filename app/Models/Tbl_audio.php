<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_audio extends Model
{
    protected $table = 'tbl_audio';
    protected $primaryKey = 'audio_id';
    public $timestamps = false;
}
