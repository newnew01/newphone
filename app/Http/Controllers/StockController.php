<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
