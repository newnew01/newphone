<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSN extends Model
{
    protected $table = 'products_sn';
    //

    public function productInfo()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
