<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductNewController extends Controller
{
    public function index(){
        return view('pages.product-new');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $product = new Product;

        $product->product_name = $request->input('product_name');
        $product->brand_id = $request->input('brand_id');
        $product->model = $request->input('model');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->barcode = $request->input('barcode');
        $product->image = $request->input('image');

        if($request->input('type_sn') == 'on')
            $product->type_sn = true;
        else
            $product->type_sn = false;
        $product->save();

        return redirect('/product-new');
    }

}
