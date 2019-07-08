<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Customer;
use App\OrderBooker;
use App\SaleMan;
use App\Product;
use App\Invoice;
use App\Inventory;
use App\Expense;
use App\Sale;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        // dd(filter($request));
        $filter = filter($request);


        $all = Invoice::join('customers','customers.id','customer_id')
        ->join('sale_men','sale_men.id','sale_man_id')
        ->join('order_bookers','order_bookers.id','order_booker_id')
        ->select('invoices.id as invoice_id','customers.name as customer_name','order_bookers.name as orderbooker_name','sale_men.name as saleman_name',DB::raw('(select sum(discount_total_price) from sales where invoice_id=invoices.id) as total'))->where($filter)->limit(100)->get();
        return request()->json('200',$all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rows = $request->productrows;
         // dd($request->company);
        $rows = array(array('product' => 'Lays','qty' => 12,'bonus' => 12,'unit_price' => 50,'total' => 5000,'discount' => 12.00,'discount_total_price' => 13000,'disctotal' => 5000 ));

        $customer_id = Customer::findOrSaveCustomer($request->customer);
        $orderbooker_id = OrderBooker::findOrSaveOrderBooker($request->orderbooker);
        $saleman_id = SaleMan::findOrSaveSaleman($request->saleman);
        $invoicedate = $request->invoicedate;

        $rec = [
                'customer_id' => $customer_id,
                'orderbooker_id' => $orderbooker_id,
                'saleman_id' => $saleman_id,
                'created_at' => $invoicedate
            ];


        $invoice = Invoice::create($rec);

        $invoice_id = $invoice->id;

     
        foreach ($rows as $key => $val) {

            $product_id = Product::where('name','like', $val['product'])->first()->id;

            $record = [    
                'invoice_id' => $invoice_id,
                'product_id' => $product_id,
                'qty' => $val['qty'],
                'bonus' => $val['bonus'],
                'unit_price' => $val['unit_price'],
                'total_price' => $val['total'],
                'discount' => $val['discount'],
                'discount_total_price' => $val['disctotal'],
                'created_at' => $invoicedate
            ];
            Sale::create($record);
            Product::find($product_id)->decrement('qty', $val['qty']);
        }

        echo "success";
    }



    
   

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $data = array();
        $data['sales'] = Sale::join('products','products.id','product_id')->select('sales.id as sale_id','product_id','products.name as product','bonus','sales.qty','total_price as total','discount','discount_total_price as disctotal','unit_price')->where('invoice_id',$invoice->id)->get();

        $data['invoice'] = Invoice::join('customers','customers.id','customer_id')
        ->join('sale_men','sale_men.id','sale_man_id')
        ->join('order_bookers','order_bookers.id','order_booker_id')
        ->select('customers.name as customer','order_bookers.name as orderbooker','sale_men.name as saleman','invoices.created_at as invoicedate')->where('invoices.id',$invoice->id)->get()[0];

        $data['invoice']['invoicedate'] = date('Y-m-d',strtotime($data['invoice']['invoicedate']));
        return request()->json('200',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $rows = $request->productrows;
         // dd($request->company);
        // $rows = array(array("sale_id" => 3,"product_id" => 3,"product" => "Lays","bonus" => 10,"qty" => 10,"total" => "5000.00","discount" => "12.00","disctotal" => "500.00","unit_price" => "50.00"),array("sale_id" => 4,"product_id" => 3,"product" => "Lays","bonus" => 5,"qty" => 40,"total" => "1200.00","discount" => "3.00","disctotal" => "1000.00","unit_price" => "55.00"));

        // $req = array("customer" => "Ilias genral Store pakki kotly","orderbooker" => "Amna","saleman" => "Ali","invoicedate" => "2019-07-07");


        // $customer_id = Customer::findOrSaveCustomer($req['customer']);
        // $orderbooker_id =OrderBooker::findOrSaveOrderBooker($req['orderbooker']);
        // $saleman_id = SaleMan::findOrSaveSaleman($req['saleman']);
        // $invoicedate = $req['invoicedate'];




        $customer_id = Customer::findOrSaveCustomer($request->customer);
        $orderbooker_id = OrderBooker::findOrSaveOrderBooker($request->orderbooker);
        $saleman_id = SaleMan::findOrSaveSaleman($request->saleman);
        $invoicedate = $request->invoicedate;

        $rec = [
            'customer_id' => $customer_id,
            'orderbooker_id' => $orderbooker_id,
            'saleman_id' => $saleman_id,
            'updated_at' => $invoicedate
        ];


        // Update Invoice
        $invoice = $invoice->update($rec);

        
        foreach ($rows as $key => $val) {

            // Update Inventory
            $old_qty = Sale::find($val['sale_id'])->first()->qty;
            $change = $old_qty - $val['qty'];
            // $ch = array('change' => $change,'old_qty' => $old_qty,'newqty' => $val['qty'] );
            // dd($ch);
            if($change < 0){
                $change = abs($change);
                Product::find($val['product_id'])->decrement('qty', $change);
            }
            if($change > 0){
                Product::find($val['product_id'])->increment('qty', $change);
            }

            // Update Sales
            $record = [    
                'qty' => $val['qty'],
                'total_price' => $val['total'],
                'discount_total_price' => $val['disctotal'],
                'updated_at' => $invoicedate
            ];
            Sale::find($val['sale_id'])->update($record);

        }

        echo "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
    }

        /**
     * Receive status to invoices.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function received(Request $request)
    {
        $rows = $request->productrows;
        $customer = $request->customer;
        $orderbooker = $request->orderbooker;
        $saleman_id = SaleMan::where('name' , 'like' ,$request->saleman)->first()->id;
        $expense = $request->expense;
        $invoicedate = $request->invoicedate;

        if(count($rows)>0){

            foreach ($rows as $key => $val) {
                Invoice::find($val['invoice_id'])->first()->received = 1;
            }
            foreach ($expense as $key => $val) {
                Expense::create(['sale_man_id' => $saleman_id,'amount' => $val['amount'],'description' => $val['desc'],'created_at' => $invoicedate]);
            }

        }


    }
}
