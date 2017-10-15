<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductNewController extends Controller
{
    public function index(){
        return view('pages.product-new');
    }

    public function store(Request $request)
    {
        $product = $request->all();
        if($request->has('type_sn'))
            $product['type_sn'] = true;
        else
            $product['type_sn'] = false;

        Product::create($product);
        \Session::flash('flash_message','เพิ่มข้อมูลสำเร็จ!');
        return redirect('/product-new');
    }

}
