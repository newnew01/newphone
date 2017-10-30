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
            return null;
    }
}
