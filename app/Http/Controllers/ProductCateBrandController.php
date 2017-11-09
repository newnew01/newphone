<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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
        //dd($request->all());
        $data = $request->all();
        if($request->has('form_type')){

            if($data['form_type'] == 'category_name'){
                $cate = new Category();
                if(!$cate->isDuplicated($data['category_name'])){
                    $cate->cate_name = $data['category_name'];
                    $cate->save();
                    Session::flash('flash_msg_success',['title'=>'สำเร็จ','text'=>'เพิ่มหมวดหมู่ '.$data['category_name']]);
                }else
                    Session::flash('flash_msg_danger',['title'=>'ผิดพลาด','text'=>'หมวดหมู่ซ้ำ '.$data['category_name']]);

            }else if($data['form_type'] == 'brand_name'){
                $brand = new Brand();
                if(!$brand->isDuplucated($data['brand_name'])){
                    $brand->brand_name = $data['brand_name'];
                    $brand->save();
                    Session::flash('flash_msg_success',['title'=>'สำเร็จ','text'=>'เพิ่มยี่ห้อ '. $data['brand_name']]);
                }else
                    Session::flash('flash_msg_danger',['title'=>'ผิดพลาด','text'=>'ยี่ห้อซ้ำ '. $data['brand_name']]);

            }
        }
        return redirect('/product-catebrand');
    }





}
