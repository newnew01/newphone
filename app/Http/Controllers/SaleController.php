<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceDetail;
use App\Product;
use App\StockReference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Milon\Barcode\DNS1D;

class SaleController extends Controller
{
    public function view_NewOrder()
    {
        return view('pages.sale-neworder');
    }

    public function newOrder(Request $request)
    {
        //dd($request->all());
        //return 1;

        $branch_id = Auth::user()->branch_id;
        $emp_id = Auth::user()->id; //user id

        $data = $request->all();

        $invoice = new Invoice();
        $invoice->customer_fname = $request->input('first_name');
        $invoice->customer_lname = $request->input('last_name');
        $invoice->gender = $request->input('gender');
        $invoice->customer_address = $request->input('address');
        $invoice->customer_tumbol = $request->input('tumbol');
        $invoice->customer_ampher = $request->input('ampher');
        $invoice->customer_province = $request->input('province');
        $invoice->customer_zipcode = $request->input('zip_code');
        $invoice->customer_tel = $request->input('customer_tel');
        $invoice->employee_id = $emp_id;
        $invoice->branch_id = $branch_id;

        $invoice->save();

        $stock_ref = StockController::createStockReference(StockController::REF_TYPE_SALE,$emp_id,$branch_id,$branch_id,$invoice->id);


        foreach ($data['product_id'] as  $index=>$product_id){
            $product = Product::find($product_id);
            $price = $product->price;
            $amount = $data['count'][$index];
            $discount = $data['discount'][$index];
            $type_sn = $data['type_sn'][$index];
            $free_gift = $data['free_gift'][$index];
            $sn = $data['sn'][$index];
            $ais_deal = $data['ais_deal'][$index];

            if($ais_deal == null) $ais_deal = 0;




            $invoice_detail = new InvoiceDetail();
            $invoice_detail->invoice_id = $invoice->id;
            $invoice_detail->product_id = $product_id;
            $invoice_detail->price = $price;
            $invoice_detail->ais_deal = $ais_deal;

            if($free_gift == 'false'){
                $invoice_detail->discount = $discount;
                $invoice_detail->free_gift = false;
            }
            else{
                $invoice_detail->discount = 0;
                $invoice_detail->free_gift = true;
            }

            if($type_sn == 1){
                $invoice_detail->sn = $sn;
                $invoice_detail->amount = 1;
            }else{
                $invoice_detail->amount = $amount;
            }

            StockController::createStockHistory($stock_ref,$product_id,$amount,$type_sn,$sn,$ais_deal);

            if($type_sn == 1){
                StockController::deleteProductSN($product_id,$sn,$branch_id);
            }else{
                StockController::deleteProductAmount($product_id,$amount,$branch_id);
            }

            $invoice_detail->save();

        }

        return self::view_invoice($invoice->id);

    }

    public static function view_invoice($id){
        $invoice = Invoice::find($id);
        $ref_id_barcode = DNS1D::getBarcodePNG(sprintf('%06d', $id), "C128");

        return view('pages.sale-invoice-document')->with(compact('invoice'))->with(compact('ref_id_barcode'));
    }
}
