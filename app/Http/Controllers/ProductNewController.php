<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductNewController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $categories = Category::all();

        return view('pages.product-new')->
                with(compact('brands'))->
                with(compact('categories'));
    }

    public function store(Request $request)
    {
        $product = $request->all();
        if($request->has('type_sn'))
            $product['type_sn'] = true;
        else
            $product['type_sn'] = false;

        Product::create($product);
        \Session::flash('flash_msg_success',['title' => 'สำเร็จ','text' => 'เพิ่มข้อมูลสำเร็จ']);
        return redirect('/product-new');
    }

}
