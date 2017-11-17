<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class BarcodeController extends Controller
{
    public function viewCustom()
    {
        return view('pages.barcode-custom');
    }

    public function viewPrint(Request $request)
    {
        $barcode_data = $request->all();

        //dd($barcode_data['product_name'][1]);

        $barcode_img = [];
        for($i=0;$i<56;$i++){
            $barcode_img[$i] = '';
            if($barcode_data['barcode'][$i] != '')
                $barcode_img[$i] =  DNS1D::getBarcodePNG($barcode_data['barcode'][$i], "C128");
        }

        //$test_img =  DNS1D::getBarcodePNG('11112222000000', "C128");
        //position in cm
        $pos_x = [2.8,6.8,11,15.1];
        $pos_y = [0.2,1.8,3.4,5.0,
                    6.6,8.2,9.8,11.4,
                    13.0,14.6,16.2,17.9,
                    19.5,21.1];

        return view('template.barcode-print')
            ->with(compact('barcode_data'))
            ->with(compact('barcode_img'))
            ->with(compact('pos_x'))
            ->with(compact('pos_y'));
    }
}
