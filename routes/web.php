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

Auth::routes();


// Searching Routes
Route::get('/search_companies', 'CompanyController@search');
Route::get('/search2_companies', 'CompanyController@search2');
Route::get('/search_products', 'ProductController@search');
Route::get('/search_salemen', 'SaleManController@search');
Route::get('/search2_salemen', 'SaleManController@search2');
Route::get('/search_orderbooker', 'OrderBookerController@search');
Route::get('/search2_orderbooker', 'OrderBookerController@search2');
Route::get('/search_customer', 'CustomerController@search');
Route::get('/search2_customer', 'CustomerController@search2');
Route::get('/search_area', 'CustomerController@searchArea');
Route::get('/search2_invoiceid', 'InvoiceController@searchid');


Route::group(['middleware'=> 'auth'], function(){

	Route::get('/', function () {
	    return view('dashboard');
	});
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/companies', 'CompanyController@index')->name('conmapy');
	Route::get('/get_sale_price', 'ProductController@getSalePrice');
	Route::get('/get_invoice_no', 'InvoiceController@getInvoiceNo');
	Route::get('/get_invoice_row', 'InvoiceController@getRow');
	Route::get('/get_stock_row', 'InventoryController@getRow');
	Route::get('/get_expense_row', 'ExpenseController@getRow');
	Route::post('/invoice_receive', 'InvoiceController@receiveInvoice');
	Route::get('/invoice_receive', 'InvoiceController@showReceiveInvoice');
	Route::get('/invoice_receive_edit', 'InvoiceController@receiveInvoiceEdit');
	Route::get('/product_report', 'SaleController@productReport');
	Route::get('/customer_report', 'SaleController@customerReport');
	Route::get('/sale_report', 'SaleController@saleReport');
	Route::get('/purchase_report', 'InventoryController@purchasesReport');
	Route::resource('/inventory', 'InventoryController');
	Route::resource('/saleman', 'SaleManController');
	Route::resource('/orderbooker', 'OrderBookerController');
	Route::resource('/product', 'ProductController');
	Route::resource('/company', 'CompanyController');
	Route::resource('/invoice', 'InvoiceController');
	Route::resource('/sale', 'SaleController');
	Route::resource('/customer', 'CustomerController');
	Route::resource('/statement', 'StatementController');
	Route::resource('/expense', 'ExpenseController');
	Route::resource('/receive_invoices', 'ReceiveInvoiceController');
	Route::get('/invoice_print', 'InvoiceController@printInvoices');
	Route::post('/invoice_print', 'InvoiceController@printInvoices');
	Route::post('/invoice_received', 'InvoiceController@received');
});

// Route::get('/orderbookerpost', 'OrderBookerController@store');
// Route::get('/inventorypost', 'InventoryController@store');
// Route::get('/invoicepost', 'InvoiceController@store');
// Route::get('/invoiceupdate', 'InvoiceController@update');
// Route::get('/invoice_receivepost', 'ReceiveInvoiceController@store');
