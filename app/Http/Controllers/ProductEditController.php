<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductEditController extends Controller
{
    public function index($id){
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);

        return view('pages.product-edit')->
        with(compact('brands'))->
        with(compact('categories'))->
        with(compact('product'));
    }
}
