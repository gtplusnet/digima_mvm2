<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TblBusinessContactPersonModel extends Model
{
    protected $table = 'tbl_business_contact_person';
    protected $primaryKey = 'business_contact_person_id';
    public $timestamps = false;
}
