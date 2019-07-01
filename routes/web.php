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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/companies', 'CompanyController@index')->name('home');
Route::get('/search_companies', 'CompanyController@search');
Route::get('/search_products', 'ProductController@search');
Route::resource('/inventory', 'InventoryController');
Route::resource('/saleman', 'SaleManController');
Route::resource('/orderbooker', 'OrderBookerController');
Route::resource('/product', 'ProductController');
Route::resource('/company', 'CompanyController');
Route::resource('/invoice', 'InvoiceController');
Route::get('/orderbookerpost', 'OrderBookerController@store');
Route::get('/inventorypost', 'InventoryController@store');
