<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblInvoiceModels extends Model
{
    protected $table = 'tbl_invoice';
    protected $primaryKey = 'invoice_id';
    public $timestamps = false;
}
