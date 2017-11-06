<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ServiceProductController extends Controller
{
    public function findProductByBarcode($barcode)
    {
        $p = Product::where('barcode','=',$barcode);
        if($p->count() > 0){
            $product = $p->first();
            $product['brand_name'] = $product->brand->brand_name;
            $product['cate_name'] = $product->category->cate_name;

            return $product;
        }

        else
            return 'null';
    }

    public function getGenBarcode()
    {
        $barcode = '11112222000001';
        $p = Product::where('barcode','like','11112222%')->orderBy('barcode','desc');
        if($p->count() > 0){
            $barcode_ = $p->first()->barcode;
            $number = explode('11112222',$barcode_)[1];
            $number = sprintf("%06d", ++$number);
            $barcode = '11112222'.$number;
        }

        return $barcode;
    }
}
