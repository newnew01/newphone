<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','brand_id','model','category_id','description','amount','price','type_sn','barcode','image'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    static public function isDuplicatedBarcode($barcode)
    {
        if(Product::where('barcode','=',$barcode)->exists())
            return true;
        else
            return false;
    }
}






