<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class ProductCateBrandController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('pages.product-catebrand')->with(compact('categories'))->with(compact('brands'));
    }
}
