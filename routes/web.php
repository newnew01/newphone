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
use Milon\Barcode\DNS1D;

Route::get('/', function () {
    return redirect('/login');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });
    Route::get('/login',function (){
        return view('template.login');
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
    Route::post('/stock/in','StockController@stockIn');
    Route::get('/stock/transfer','StockController@view_stockTransfer');
    Route::post('/stock/transfer','StockController@stockTransfer');
    Route::get('/stock/list','StockController@view_stockList');
    Route::get('/stock/list/{reference_id}','StockController@view_stockReference');

    Route::get('/user/list','UserController@view_userList');
    Route::get('/user/new','UserController@view_userNew');
    Route::post('/user/new','UserController@newUser');
    Route::get('/user/{id}','UserController@view_userDetail');
    Route::get('/user/role','UserController@view_userRole');




    Route::get('/barcode/custom','BarcodeController@viewCustom');
    Route::post('/barcode/print','BarcodeController@viewPrint');


    Route::get('/sale/neworder','SaleController@view_newOrder');
    Route::get('/sale/{id}','SaleController@view_invoice');

    Route::post('/sale/neworder','SaleController@newOrder');

    Route::get('/sale-list', function () {
        return view('pages.sale-list');
    });

    Route::get('/service-product/find-by-id/{id}','ServiceProductController@findProductById');
    Route::get('/service-product/find-by-barcode/{barcode}','ServiceProductController@findProductByBarcode');
    Route::get('/service-product/find-productsn-by-id-sn/{id},{sn}','ServiceProductController@findProductSNbyIdSN');
    Route::get('/service-product/gen-barcode','ServiceProductController@getGenBarcode');
    Route::get('/service-product/check-duplicated-sn/{id},{sn}','ServiceProductController@checkDuplicatedSN');
    Route::get('/service-product/find-productsn-in-branch/{id},{sn},{branch_id}','ServiceProductController@findProductSnInBranch');
    Route::get('/service-product/find-product-amount-in-branch/{id},{branch_id}','ServiceProductController@findProductAmountInBranch');

});





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

Route::get('/test_barcode', function()
{
    //echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T",3,33,"green", true);
    //echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+",3,33,array(1,1,1), true) . '" alt="barcode"   />';
    //return DNS1D::getBarcodeHTML("11113333000009", "C128",1,16);
    //echo '<img width="3cm" src="data:image/png;base64,' . DNS1D::getBarcodePNG("11113333000009", "C128") . '" alt="barcode"   />';
    //return '<img src="' . DNS1D::getBarcodePNG("4", "C39+",3,33,array(1,1,1)) . '" alt="barcode"   />';
    $barcode_number = '11113333000009';
    $barcode =  DNS1D::getBarcodePNG($barcode_number, "C128");

    return view('template.barcode-print')->with(compact('barcode'))->with(compact('barcode_number'));
});

Route::get('/test_invoice', function()
{

    $invoice = \App\Invoice::find(1);
    $ref_id_barcode = DNS1D::getBarcodePNG(sprintf('%06d', 1), "C128");

    return view('pages.sale-invoice-document')->with(compact('invoice'))->with(compact('ref_id_barcode'));
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
