<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    //

    public function newCategory(Request $request)
    {
        $data = $request->all();

        $cate = new Category();
        if(!$cate->isDuplicated($data['category_name'])){
            $cate->cate_name = $data['category_name'];
            $cate->save();
            Session::flash('flash_msg_success',['title'=>'สำเร็จ','text'=>'เพิ่มหมวดหมู่ '.$data['category_name']]);
        }else
            Session::flash('flash_msg_danger',['title'=>'ผิดพลาด','text'=>'หมวดหมู่ซ้ำ '.$data['category_name']]);

        return redirect('/product-catebrand');
    }

    public function deleteCategory($id)
    {
        $cate = Category::find($id);
        if($cate != null){
            $cate->delete();
            Session::flash('flash_msg_success',['title'=>'สำเร็จ','text'=>'ลบหมวดหมู่แล้ว '.$cate->cate_name]);
        }else{
            Session::flash('flash_msg_danger',['title'=>'ผิดพลาด','text'=>'ไม่พบหมวดหมู่ในระบบ']);
        }

        return redirect('/product-catebrand');
    }
}
