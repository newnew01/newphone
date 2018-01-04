<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function view_NewOrder()
    {
        return view('pages.sale-neworder');
    }

    public function newOrder(Request $request)
    {
        dd($request->all());
    }
}
