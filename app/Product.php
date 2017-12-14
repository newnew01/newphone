<?php

namespace App;

use bar\baz\source_with_namespace;
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

    public function isInBranch($branch_id, $sn)
    {
        $psn = ProductSN::where('product_id','=',$this->id)->
            where('sn','=',$sn)->
            where('branch_id','=',$branch_id);

        return $psn->exists();
    }

    public function getAmountInBranch($branch_id)
    {
        $product_amount = ProductAmount::where('product_id','=',$this->id)->
            where('branch_id','=',$branch_id);

        if($product_amount->exists()){
            return $product_amount->first()->amount;
        }else{
            return 0;
        }
    }
}






