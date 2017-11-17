<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductSN;
use App\StockHistory;
use App\StockInReference;
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
            $products = [];
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
                    $product = Product::find($p['product_id'][$i]);
                    $ais_deal = false;
                    if($request->has('ais_deal_'.$i))
                        $ais_deal = true;
                    if($p['type_sn'][$i] == 1){
                        $product_sn = new ProductSN();
                        $product_sn->product_id = $p['product_id'][$i];
                        $product_sn->sn = $p['sn'][$i];
                        $product_sn->ais_deal = $ais_deal;
                        $product_sn->save();

                        $product->amount += 1;
                        $product->save();

                    }else{
                        $product->amount += $p['count'][$i];
                        $product->save();
                    }
                    $products[$i] = [
                        'id' => $product->id,
                        'amount' => $p['count'][$i],
                        'type_sn' => $product->type_sn,
                        'sn' => $p['sn'][$i],
                        'ais_deal' => $ais_deal
                    ];
                }

                $stockin_reference = $this->createStockInHistory($products);


                return view('pages.stock-in-document')->with(compact('stockin_reference'));
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

    public function createStockInHistory($products)
    {
        $stockin_reference = new StockInReference();
        $stockin_reference->employee_id = 1;
        $stockin_reference->branch = 1;
        $stockin_reference->save();

        foreach ($products as $product){
            $stock_in = new StockHistory();
            $stock_in->product_id = $product['id'];
            $stock_in->ais_deal = $product['ais_deal'];
            $stock_in->reference_id = $stockin_reference->id;
            $stock_in->status = 2;

            if($product['type_sn'] == 1){
                $stock_in->sn = $product['sn'];
                $stock_in->amount = 1;
            }else{
                $stock_in->amount = $product['amount'];
            }

            $stock_in->save();
        }

        return $stockin_reference;
    }
}
