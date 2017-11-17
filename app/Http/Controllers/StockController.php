<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductSN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StockController extends Controller
{
    public function view_stockIn()
    {
        return view('pages.stock-in');
    }

    public function view_stockTransfer()
    {
        return view('pages.stock-transfer');
    }

    public function view_stockList()
    {
        return view('pages.stock-list');
    }

    public function stockIn(Request $request)
    {

        $p = $request->all();
        //dd($p);
        if($request->has('product_id'))
        {
            $isDuplicateSN = false;
            $duplicatedSN = '';
            for($i=0;$i<count($p['product_id']);$i++) {
                if($p['type_sn'][$i] == 1) {
                    $result = ProductSN::where('product_id','=',$p['product_id'][$i])
                        ->where('sn','=',$p['sn'][$i]);

                    if($result->exists()){
                        $duplicatedSN = $p['sn'][$i];
                        $isDuplicateSN = true;
                        break;
                    }

                }

            }

            if(!$isDuplicateSN){
                for($i=0;$i<count($p['product_id']);$i++){
                    if($p['type_sn'][$i] == 1){
                        $product_sn = new ProductSN();
                        $product_sn->product_id = $p['product_id'][$i];
                        $product_sn->sn = $p['sn'][$i];
                        if($request->has('ais_deal_'.$i))
                            $product_sn->ais_deal = true;
                        $product_sn->save();

                        $product = Product::find($p['product_id'][$i]);
                        $product->amount += 1;
                        $product->save();

                    }else{
                        $product = Product::find($p['product_id'][$i]);
                        $product->amount += $p['count'][$i];
                        $product->save();
                    }
                }
            }else{
                //error duplicated SN
                Session::flash('flash_msg_danger',['title' => 'ผิดพลาด','text' => 'มี SN/IMEI ซ้ำในระบบ '.$duplicatedSN]);
                return redirect('/stock/in');
            }


        }else{
            Session::flash('flash_msg_danger',['title' => 'ผิดพลาด','text' => 'ไม่มีข้อมูลนำเข้าสต๊อค']);
            return redirect('/stock/in');
        }
    }
}
