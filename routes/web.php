<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard');
});



Route::get('/product-list', function () {
    return view('pages.product-list');
});

Route::get('/product-new', function () {
    return view('pages.product-new');
});

Route::get('/stock-in', function () {
    return view('pages.stock-in');
});

Route::get('/stock-transfer', function () {
    return view('pages.stock-transfer');
});

Route::get('/stock-list', function () {
    return view('pages.stock-list');
});

<<<<<<< HEAD

=======
Route::get('/sale-neworder', function () {
    return view('pages.sale-neworder');
});

Route::get('/sale-list', function () {
    return view('pages.sale-list');
});
>>>>>>> 505b5e1913bb1dbea13e67118df8bbd43bb504e0
