<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','brand_id','model','category_id','description','amount','price','type_sn','barcode','image'];
}






