<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table="invoice_detail";

    public function productInfo()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
