<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    protected $table = 'stock_history';

    public function productInfo()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
