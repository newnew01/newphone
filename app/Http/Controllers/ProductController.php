<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function view_productList()
    {
        $products = Product::all();
        return view('pages.product-list')->with(compact('products'));
    }

    public function view_editProduct($id){
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);

        return view('pages.product-edit')->
        with(compact('brands'))->
        with(compact('categories'))->
        with(compact('product'));
    }

    public function view_newProduct()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('pages.product-new')->
        with(compact('brands'))->
        with(compact('categories'));
    }


    public function newProduct(Request $request)
    {


        ////////////////////////////////////////////////////////////
        $product = $request->all();
        if($request->has('type_sn'))
            $product['type_sn'] = true;
        else
            $product['type_sn'] = false;

        //dd($product);
        //dd($product['img_input']);
        //$jpg_url = "product-".time().".jpg";
        //$path = public_path($jpg_url);
        //Image::make(base64_decode($base64_str))->save($path);
        $r = Product::create($product);

        if($product['img_input'] != null){
            $url = '/assets/images/products/';
            $image_name = "product-".$r->id.".jpg";
            $path = public_path($url.$image_name);
            Image::make(base64_decode($product['img_input']))->save($path);
            $r->image = $url.$image_name;
            $r->save();
        }


        Session::flash('flash_msg_success',['title' => 'สำเร็จ','text' => 'เพิ่มข้อมูลสำเร็จ']);
        return redirect('/product/list');
    }

    public function editProduct(Request $request,$id)
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


        return redirect('/product/list');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if($product != null){
            $product->delete();

            Session::flash('flash_msg_success',['title' => 'สำเร็จ','text' => 'ลบข้อมูลแล้ว']);
        } else {
            Session::flash('flash_msg_danger',['title' => 'ผิดพลาด','text' => 'ไม่พบสินค้าที่ต้องการลบ']);
        }

        return redirect('/product/list');
    }
}