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
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/companies', 'CompanyController@index')->name('conmapy');
Route::get('/search_companies', 'CompanyController@search')->name('searchcompany');
Route::get('/search_products', 'ProductController@search');
Route::get('/search_salemen', 'SaleManController@search');
Route::get('/search_orderbooker', 'OrderBookerController@search');
Route::get('/search_customer', 'CustomerController@search');
Route::get('/get_sale_price', 'ProductController@getSalePrice');
Route::get('/get_invoice_no', 'InvoiceController@getInvoiceNo');
Route::get('/get_invoice_row', 'InvoiceController@getRow');
Route::get('/get_stock_row', 'InventoryController@getRow');
Route::get('/get_expense_row', 'ExpenseController@getRow');
Route::get('/invoice_receive', 'InvoiceController@showReceiveInvoice');
Route::get('/invoice_receive_edit', 'InvoiceController@receiveInvoiceEdit');
Route::post('/invoice_receive', 'InvoiceController@receiveInvoice');
Route::get('/orderbooker_customer_report', 'SaleController@orderbookerCustomerReport');
Route::get('/orderbooker_product_report', 'SaleController@orderbookerProductReport');
Route::get('/sales_report', 'SaleController@salesReport');
Route::resource('/inventory', 'InventoryController');
Route::resource('/saleman', 'SaleManController');
Route::resource('/orderbooker', 'OrderBookerController');
Route::resource('/product', 'ProductController');
Route::resource('/company', 'CompanyController');
Route::resource('/invoice', 'InvoiceController');
Route::resource('/expense', 'ExpenseController');
Route::resource('/sale', 'SaleController');
Route::resource('/customer', 'CustomerController');
Route::resource('/statement', 'StatementController');
Route::resource('/receive_invoices', 'ReceiveInvoiceController');
Route::post('/invoice_received', 'InvoiceController@received');
Route::get('/orderbookerpost', 'OrderBookerController@store');
Route::get('/inventorypost', 'InventoryController@store');
Route::get('/invoicepost', 'InvoiceController@store');
Route::get('/invoiceupdate', 'InvoiceController@update');
Route::get('/invoice_receivepost', 'ReceiveInvoiceController@store');
