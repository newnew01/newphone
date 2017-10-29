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



Route::get('/product-list','ProductListController@index');

Route::get('/product-new','ProductNewController@index');
Route::post('/product-new','ProductNewController@store');

Route::get('/product-catebrand','ProductCateBrandController@index');
Route::post('/product-catebrand','ProductCateBrandController@store');
Route::get('/product-catebrand/delete-brand/{id}','ProductCateBrandController@deleteBrand');
Route::get('/product-catebrand/delete-category/{id}','ProductCateBrandController@deleteCategory');

Route::get('/stock-in', function () {
    return view('pages.stock-in');
});

Route::get('/stock-transfer', function () {
    return view('pages.stock-transfer');
});

Route::get('/stock-list', function () {
    return view('pages.stock-list');
});


Route::get('/sale-neworder', function () {
    return view('pages.sale-neworder');
});

Route::get('/sale-list', function () {
    return view('pages.sale-list');
});


Route::get('/test-session',function (){
    $x['title'] = 'my title';
    $x['text'] = 'my text';
    \Session::flash('flash_test',$x);
    dd(session('flash_test'));
});