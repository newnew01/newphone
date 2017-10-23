<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.product-list')->with(compact('products'));
    }
}
