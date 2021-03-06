<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Product;
use App\ProductAmount;
use App\ProductSN;
use App\StockHistory;
use App\StockReference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Milon\Barcode\DNS1D;

class StockController extends Controller
{
    const REF_TYPE_STOCKIN = 1;
    const REF_TYPE_STOCKTRANSFER = 2;
    const REF_TYPE_SALE = 3;
    const REF_TYPE_REFUND = 4;
    const REF_TYPE_REPAIR =5;

    public function view_stockIn()
    {
        $branches = Branch::all();
        return view('pages.stock-in')->with(compact('branches'));
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
        $ref_type = StockReference::find($reference_id)->ref_type;
        switch ($ref_type){
            case self::REF_TYPE_STOCKIN:
                return $this->view_stockInReference($reference_id);
                break;
            case self::REF_TYPE_STOCKTRANSFER:
                return $this->view_stockTransferReference($reference_id);
                break;
            case self::REF_TYPE_SALE:
                return $this->view_stockSaleReference($reference_id);
                break;
            case self::REF_TYPE_REFUND:
                return $this->view_stockRefundReference($reference_id);
                break;
            case self::REF_TYPE_REPAIR:
                return $this->view_stockRepairReference($reference_id);
                break;

        }
    }

    public function view_stockInReference($reference_id)
    {
        //dd($reference_id);
        $stock_reference = StockReference::find($reference_id);
        $ref_id_barcode = DNS1D::getBarcodePNG(sprintf('%06d', $reference_id), "C128");

        return view('pages.stock-in-document')
            ->with(compact('stock_reference'))
            ->with(compact('ref_id_barcode'));
    }

    public function view_stockTransferReference($reference_id)
    {
        //dd($reference_id);
        $stock_reference = StockReference::find($reference_id);
        $ref_id_barcode = DNS1D::getBarcodePNG(sprintf('%06d', $reference_id), "C128");

        return view('pages.stock-transfer-document')
            ->with(compact('stock_reference'))
            ->with(compact('ref_id_barcode'));
    }

    public function stockIn(Request $request)
    {

        $branch_id = $request->input('source_branch_id');  //get data from user branch_id
        $emp_id = Auth::user()->id; //user id

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
                $stock_reference = $this->createStockInReference($branch_id,$emp_id);
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
                        $product_sn->branch_id = 1;
                        $product_sn->save();

                        $product->amount += 1;
                        $product->save();

                        $this->createStockHistoryWithSN($stock_reference,$p['product_id'][$i],$p['sn'][$i],$ais_deal);

                    }else{
                        $q = ProductAmount::where('product_id','=',$p['product_id'][$i])
                            ->where('branch_id','=',$branch_id);

                        if($q->exists()){
                            $p_amount = $q->first();
                            $p_amount->amount += $p['count'][$i];
                            $p_amount->save();
                        } else{
                            $p_amount = new ProductAmount();
                            $p_amount->product_id = $p['product_id'][$i];
                            $p_amount->branch_id = $branch_id;
                            $p_amount->amount = $p['count'][$i];
                            $p_amount->save();
                        }

                        $product->amount += $p['count'][$i];
                        $product->save();

                        $this->createStockHistory($stock_reference,$product->id,$p['count'][$i]);
                    }
                }

                //$stock_reference = $this->createStockInHistoryWithSN($products);

                return $this->view_stockInReference($stock_reference);
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

    public function stockTransfer(Request $request)
    {
        $emp_id = Auth::user()->id;
        $source_branch_id = $request->input('source_branch_id'); //get from user branch_id
        $dest_branch_id = $request->input('dest_branch_id');
        //return $request->all();

        $p = $request->all();
        //dd($p);
        if($request->has('product_id'))
        {
            //check productsn in source branch and check product_amount in source branch
            for($i=0;$i<count($p['product_id']);$i++){
                $product = Product::find($p['product_id'][$i]);
                if($product->type_sn == 1){
                    if(!$product->isInBranch($source_branch_id,$p['sn'][$i])){
                        //return error productsn not found in branch
                        Session::flash('flash_msg_danger',['title' => 'ผิดพลาด','text' => 'ไม่พบสินค้า SN ในสาขา ['.$p['sn'][$i].']']);
                        return redirect('/stock/transfer');
                    }
                }else{
                    if($product->getAmountInBranch($source_branch_id) < $p['count'][$i]){
                        //return error product_amount is not enough in source branch
                        Session::flash('flash_msg_danger',['title' => 'ผิดพลาด','text' => 'สินค้าในสาขาต้นทางไม่เพียงพอ ('.$product->product_name.')']);
                        return redirect('/stock/transfer');
                    }
                }
            }


            for($i=0;$i<count($p['product_id']);$i++){
                $product = Product::find($p['product_id'][$i]);
                if($product->type_sn == 1){
                    $product_sn = ProductSN::where('sn','=',$p['sn'][$i])
                        ->where('branch_id','=',$source_branch_id)
                        ->where('product_id','=',$product->id);
                    if($product_sn->exists()){
                        $p_sn = $product_sn->first();
                        $p_sn->branch_id = $dest_branch_id;
                        $p_sn->save();
                    }else{
                        //return error not found product sn in source branch
                    }
                }else{
                    $q = ProductAmount::where('product_id','=',$product->id)->where('branch_id','=',$source_branch_id);

                    if($q->exists()){
                        $product_amount_source = $q->first();

                        if($product_amount_source->amount >= $p['count'][$i]){
                            $product_amount_source->amount -= $p['count'][$i];
                            $product_amount_source->save();

                            $q2 = ProductAmount::where('product_id','=',$product->id)->where('branch_id','=',$dest_branch_id);
                            if($q2->exists()) {
                                $product_amount_dest = $q2->first();
                                $product_amount_dest->amount += $p['count'][$i];
                                $product_amount_dest->save();
                            }else{
                                $product_amount_dest = new ProductAmount();
                                $product_amount_dest->amount = $p['count'][$i];
                                $product_amount_dest->branch_id = $dest_branch_id;
                                $product_amount_dest->product_id = $product->id;
                                $product_amount_dest->save();
                            }
                        }else{
                            //return error source branch amount is not enough
                            Session::flash('flash_msg_danger',['title' => 'ผิดพลาด','text' => 'สินค้าในสาขาต้นทางมีไม่เพียงพอ']);
                            return redirect('/stock/transfer');
                        }

                    } else{
                        //return error source branch product not found
                    }

                    //change product amount of each branch
                }

            }

            $stock_ref = $this->createStockTransferReference($source_branch_id,$dest_branch_id,$emp_id);
            for($i=0;$i<count($p['product_id']);$i++){
                $product = Product::find($p['product_id'][$i]);
                if($product->type_sn == 1){
                    $q = ProductSN::where('product_id','=',$product->id)->where('sn','=',$p['sn'][$i]);
                    if($q->exists()){
                        $p_sn = $q->first();
                        $this->createStockHistoryWithSN($stock_ref,$product->id,$p['sn'][$i],$p_sn->ais_deal);
                    }else{
                        //not found product_sn
                    }

                }else{
                    $this->createStockHistory($stock_ref,$product->id,$p['count'][$i]);
                }
            }

            return $this->view_stockTransferReference($stock_ref);


        }else{
            Session::flash('flash_msg_danger',['title' => 'ผิดพลาด','text' => 'ไม่มีข้อมูลสินค้าสำหรับโอน']);
            return redirect('/stock/transfer');
        }
    }

    public static function createStockReference($ref_type,$emp_id,$source_branch_id,$dest_branch_id,$doc_ref = null,$status_id = 1)
    {
        $stock_ref = new StockReference();
        $stock_ref->employee_id = $emp_id;
        $stock_ref->source_branch = $source_branch_id;
        $stock_ref->destination_branch = $dest_branch_id;
        $stock_ref->ref_type = $ref_type;
        $stock_ref->document_ref = $doc_ref;
        $stock_ref->status_id = $status_id;
        $stock_ref->save();

        return $stock_ref->id;
    }



    public static function createStockInReference($branch_id,$emp_id)
    {
        return StockController::createStockReference(self::REF_TYPE_STOCKIN,$emp_id,$branch_id,$branch_id);
    }

    public static function createStockTransferReference($source_branch,$dest_branch,$emp_id)
    {
        return StockController::createStockReference(self::REF_TYPE_STOCKTRANSFER,$emp_id,$source_branch,$dest_branch);
    }

    public static function createStockHistory($ref_id,$product_id,$amount=1,$type_sn=0,$sn=null,$ais_deal=false,$status=1)
    {
        $stock_history = new StockHistory();
        $stock_history->product_id = $product_id;
        $stock_history->ais_deal = $ais_deal;
        $stock_history->reference_id = $ref_id;
        $stock_history->status = $status;

        if($type_sn == 1){
            $stock_history->sn = $sn;
            $stock_history->amount = 1;
        }else{
            $stock_history->amount = $amount;
        }

        $stock_history->save();

        return $stock_history->id;
    }

    public static function createStockHistoryWithSN($ref_id, $product_id, $sn, $ais_deal)
    {
        return StockController::createStockHistory($ref_id,$product_id,1,1,$sn,$ais_deal);
    }

    public static function deleteProductAmount($product_id, $amount, $branch_id)
    {
        $product_amount = ProductAmount::where('product_id','=',$product_id)->where('branch_id','=',$branch_id);
        if($product_amount->exists()){
            $product_amount = $product_amount->first();
            $product_amount->amount -= $amount;
            $product_amount->save();

            $product = Product::find($product_id);
            $product->amount -= $amount;
            $product->save();

            return true;
        }

        return false;
    }

    public static function deleteProductSN($product_id, $product_sn, $branch_id)
    {
        $product_sn = ProductSN::where('product_id','=',$product_id)->where('sn','=',$product_sn)->where('branch_id','=',$branch_id);

        if($product_sn->exists()){
            $product_sn = $product_sn->first();
            $product_sn->delete();

            $product = Product::find($product_id);
            $product->amount -= 1;
            $product->save();

            return true;
        }

        return false;
    }

    public static function transferProductSN($product_id, $product_sn, $source_branch_id,$dest_branch_id)
    {
        $product_sn = ProductSN::where('product_id','=',$product_id)->where('sn','=',$product_sn)->where('branch_id','=',$source_branch_id);

        if($product_sn->exists()){
            $product_sn = $product_sn->first();
            $product_sn->branch_id = $dest_branch_id;
            $product_sn->save();

            return true;
        }

        return false;
    }




}
