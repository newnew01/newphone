<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    //

    public function newBrand(Request $request)
    {
        //dd($request->all());
        $data = $request->all();

        $brand = new Brand();
        if(!$brand->isDuplucated($data['brand_name'])){
            $brand->brand_name = $data['brand_name'];
            $brand->save();
            Session::flash('flash_msg_success',['title'=>'สำเร็จ','text'=>'เพิ่มยี่ห้อ '. $data['brand_name']]);
        }else
            Session::flash('flash_msg_danger',['title'=>'ผิดพลาด','text'=>'ยี่ห้อซ้ำ '. $data['brand_name']]);

        return redirect('/product-catebrand');
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        if($brand != null){
            $brand->delete();
            Session::flash('flash_msg_success',['title'=>'สำเร็จ','text'=>'ลบยี่ห้อแล้ว '.$brand->brand_name]);
        }else{
            Session::flash('flash_msg_danger',['title'=>'ผิดพลาด','text'=>'ไม่พบยี่ห้อในระบบ']);
        }
        return redirect('/product-catebrand');
    }
}
