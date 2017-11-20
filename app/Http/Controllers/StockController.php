<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Product;
use App\ProductSN;
use App\StockHistory;
use App\StockReference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Milon\Barcode\DNS1D;

class StockController extends Controller
{
    public function view_stockIn()
    {
        return view('pages.stock-in');
    }

    public function view_stockTransfer()
    {
        $branches = Branch::all();
        return view('pages.stock-transfer')->with(compact('branches'));
    }

    public function view_stockList()
    {
        $stock_reference = StockReference::all();
        return view('pages.stock-list')->with(compact('stock_reference'));
    }

    public function view_stockReference($reference_id)
    {
        //dd($reference_id);
        $stock_reference = StockReference::find($reference_id);
        $ref_id_barcode = DNS1D::getBarcodePNG(sprintf('%06d', $reference_id), "C128");

        if($stock_reference->ref_type == 1)
            return view('pages.stock-in-document')
                ->with(compact('stock_reference'))
                ->with(compact('ref_id_barcode'));
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

                $stock_reference = $this->createStockInHistory($products);

                return $this->view_stockReference($stock_reference->id);
                //return view('pages.stock-in-document')->with(compact('stock_reference'));
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
        $stock_ref = new StockReference();
        $stock_ref->employee_id = 1;
        $stock_ref->source_branch = 1;
        $stock_ref->destination_branch = 1;
        $stock_ref->ref_type = 1;
        $stock_ref->document_ref = null;
        $stock_ref->status_id = 1;
        $stock_ref->save();

        foreach ($products as $product){
            $stock_in = new StockHistory();
            $stock_in->product_id = $product['id'];
            $stock_in->ais_deal = $product['ais_deal'];
            $stock_in->reference_id = $stock_ref->id;
            $stock_in->status = 2;

            if($product['type_sn'] == 1){
                $stock_in->sn = $product['sn'];
                $stock_in->amount = 1;
            }else{
                $stock_in->amount = $product['amount'];
            }

            $stock_in->save();
        }

        return $stock_ref;
    }
}
