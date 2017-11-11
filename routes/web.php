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

use Intervention\Image\Facades\Image;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard');
});



Route::get('/product/list','ProductController@view_productList');
Route::get('/product/edit/{id}','ProductController@view_editProduct');
Route::post('/product/edit/{id}','ProductController@editProduct');
Route::get('/product/delete/{id}','ProductController@delete');

Route::get('/product/new','ProductController@view_newProduct');
Route::post('/product/new','ProductController@newProduct');

Route::get('/product-catebrand','ProductCateBrandController@index');

Route::post('/brand/new','BrandController@newBrand');
Route::post('/category/new','CategoryController@newCategory');
Route::get('/brand/delete/{id}','BrandController@deleteBrand');
Route::get('/category/delete/{id}','CategoryController@deleteCategory');

Route::get('/stock/in','StockController@view_stockIn');
Route::get('/stock/transfer','StockController@view_stockTransfer');
Route::get('/stock/list','StockController@view_stockList');


Route::get('/sale-neworder', function () {
    return view('pages.sale-neworder');
});

Route::get('/sale-list', function () {
    return view('pages.sale-list');
});

Route::get('/service-product/find-by-id/{id}','ServiceProductController@findProductById');
Route::get('/service-product/find-by-barcode/{barcode}','ServiceProductController@findProductByBarcode');
Route::get('/service-product/gen-barcode','ServiceProductController@getGenBarcode');





Route::get('/test-session',function (){
    $x['title'] = 'my title';
    $x['text'] = 'my text';
    \Session::flash('flash_test',$x);
    dd(session('flash_test'));
});


Route::get('/test_image', function()
{
    $img = Image::make('foo.jpg')->resize(300, 200);

    return $img->response('jpg');
});