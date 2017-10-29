<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductCateBrandController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('pages.product-catebrand')->with(compact('categories'))->with(compact('brands'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->has('form_type')){

            if($data['form_type'] == 'category_name'){
                $cate = new Category();
                $cate->cate_name = $data['category_name'];
                $cate->save();

            }else if($data['form_type'] == 'brand_name'){
                $brand = new Brand();
                $brand->brand_name = $data['brand_name'];
                $brand->save();
            }
        }
        return redirect('/product-catebrand');
    }
}
