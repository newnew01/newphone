<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function save(Request $request,$id)
    {
        //dd($request->all()['model']);
        $product = Product::find($id);
        if($product != null){
            $r = $request->all();

            if($request->has('type_sn'))
                $product->type_sn = true;
            else
                $product->type_sn = false;

            $product->category_id = $r['category_id'];
            $product->brand_id = $r['brand_id'];
            $product->product_name = $r['product_name'];
            $product->model = $r['model'];
            $product->price = $r['price'];
            $product->description = $r['description'];
            $product->save();

            Session::flash('flash_msg_success',['title' => 'สำเร็จ','text' => 'แก้ไขข้อมูลสำเร็จ']);
        }


        return redirect('/product-list');
    }
}
