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
use App\Statement;
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

        $data = Invoice::join('customers','customers.id','customer_id')
        ->join('sale_men','sale_men.id','sale_man_id')
        ->join('order_bookers','order_bookers.id','order_booker_id')
        ->select('invoices.id as invoice_id','customers.name as customer_name','order_bookers.name as orderbooker_name','sale_men.name as saleman_name','discount_total','received_amount','invoices.created_at')->where($filter)->orderBy('invoices.id','DESC')->paginate(25);

        // die($request);

        
        if($request->ajax())
            return view('ajax_tables.invoices',compact('data'));
        else
            return view('invoice.invoices_list');


            // return view('invoice/invoices_list');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice/create_invoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rows = $request->rows;
        // dd($request->input());

        // $rows = array(array('product' => 'Lays','qty' => 12,'bonus' => 12,'unit_price' => 50,'total_price' => 5000,'discount' => 5,'discount_amount' => 50,'discount_total' => 5000 ),array('product' => 'Kurkuray','qty' => 25,'bonus' => 25,'unit_price' => 25,'total_price' => 2500,'discount' => 2,'discount_amount'=> 50,'discount_total' => 2300 ));

        // dd($rows);
        $customer_id = Customer::findOrSaveCustomer($request->customer);
        $orderbooker_id = OrderBooker::findOrSaveOrderBooker($request->orderbooker);
        $saleman_id = SaleMan::findOrSaveSaleman($request->saleman);
        $invoicedate = $request->date;
        Customer::find($customer_id)->area = $request->area;

        // die($request->invoice_total);

        $rec = [
                'customer_id' => $customer_id,
                'order_booker_id' => $orderbooker_id,
                'sale_man_id' => $saleman_id,
                'created_at' => $invoicedate
            ];


        $invoice = Invoice::create($rec);
        // dd($rec,$invoice);

        $invoice_id = $invoice->id;

     
        foreach ($rows as $key => $val) {

            $product_id = Product::where('name','like', $val['product'])->first()->id;
            
            // echo "success"; die($val['total_price']);
            $record = [ 
                'invoice_id' => $invoice_id,
                'product_id' => $product_id,
                'qty' => $val['qty'],
                'bonus' => $val['bonus'],
                'unit_price' => $val['unit_price'],
                'total_price' => $val['total_price'],
                'discount' => $val['discount'],
                'discount_amount' => $val['discount_amount'],
                'discount_total' => $val['discount_total'],
                'created_at' => $invoicedate
            ];
            // dd($record);
            Sale::create($record);
            // Product::find($product_id)->decrement('qty', $val['qty']);
            // Product::find($product_id)->decrement('qty', $val['bonus']);
        }

        // Update Invoice attributes
        $invoice->total_amount = $invoice->sales()->sum('total_price');
        $invoice->total_discount = $invoice->sales()->sum('discount_amount');
        $invoice->discount_total = $invoice->sales()->sum('discount_total');
        $invoice->balance = $invoice->discount_total - $invoice->received_amount;

        // dd($invoice->sales()->sum('discount_amount'));

        $invoice->save();

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
        return view('invoice.view_invoice',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoice.edit_invoice',compact('invoice'));
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
        $rows = $request->rows;
        $invoice = Invoice::find($request->id);
        $invoicedate = $request->date;
         // dd($request->company);
        // $rows = array(array("sale_id" => 3,"product_id" => 3,"product" => "Lays","bonus" => 10,"qty" => 10,"total" => "5000.00","discount" => "12.00","disctotal" => "500.00","unit_price" => "50.00"),array("sale_id" => 4,"product_id" => 3,"product" => "Lays","bonus" => 5,"qty" => 40,"total" => "1200.00","discount" => "3.00","disctotal" => "1000.00","unit_price" => "55.00"));

        // $req = array("customer" => "Ilias genral Store pakki kotly","orderbooker" => "Amna","saleman" => "Ali","invoicedate" => "2019-07-07");


        // $customer_id = Customer::findOrSaveCustomer($req['customer']);
        // $orderbooker_id =OrderBooker::findOrSaveOrderBooker($req['orderbooker']);
        // $saleman_id = SaleMan::findOrSaveSaleman($req['saleman']);
        // $invoicedate = $req['invoicedate'];





        foreach ($rows as $key => $val) {

            // Update Inventory
            // $old_qty = Sale::find($val['sale_id'])->first()->qty;
            // $change = $old_qty - $val['qty'];
            // $ch = array('change' => $change,'old_qty' => $old_qty,'newqty' => $val['qty'] );
            // dd($ch);
            // if($change < 0){
            //     $change = abs($change);
            //     Product::find($val['product_id'])->decrement('qty', $change);
            // }
            // if($change > 0){
            //     Product::find($val['product_id'])->increment('qty', $change);
            // }

            $product_id = Product::where('name','like', $val['product'])->first()->id;
            
            // echo "success"; die($val['total_price']);
            $record = [
                'product_id' => $product_id,
                'qty' => $val['qty'],
                'bonus' => $val['bonus'],
                'unit_price' => $val['unit_price'],
                'total_price' => $val['total_price'],
                'discount' => $val['discount'],
                'discount_amount' => $val['discount_amount'],
                'discount_total' => $val['discount_total'],
                'updated_at' => $invoicedate
            ];
            Sale::find($val['sale_id'])->update($record);

        }

        $customer_id = Customer::findOrSaveCustomer($request->customer);
        $orderbooker_id = OrderBooker::findOrSaveOrderBooker($request->orderbooker);
        $saleman_id = SaleMan::findOrSaveSaleman($request->saleman);
        $cust = Customer::find($customer_id)->update(['area'=>$request->area]);
        // $cust->area = $request->area;
        // $cust->save();

        $rec = [
            'customer_id' => $customer_id,
            'order_booker_id' => $orderbooker_id,
            'sale_man_id' => $saleman_id,
            'updated_at' => $invoicedate
        ];

        // Update Invoice
        $invoice->update($rec);
        // Update Invoice attributes
        $invoice->total_amount = $invoice->sales()->sum('total_price');
        $invoice->total_discount = $invoice->sales()->sum('discount_amount');
        $invoice->discount_total = $invoice->sales()->sum('discount_total');
        $invoice->balance = $invoice->discount_total - $invoice->received_amount;
        $invoice->save();

        echo "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::destroy($id);
        return view('components.alert',['msg'=>'Invoice deleted!','type'=>'primary']);
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
                $invoice = Invoice::find($val['invoice_id'])->first();
                $customer = $invoice->customer();
                $invoice->received = 1;
                $invoice->received_amount = $val['received'];
                $change = $invoice->total_amount - $val['received'];
                if($change > 0){
                    $customer->increment('balance',$change);
                    $customer->save();
                    Statement::create(['customer_id' => $invoice->customer->id,'credit' => $change,'balance' => $customer->balance]);
                }
                if($change < 0){
                    $change = abs($change);
                    $customer->decrement('balance',$change);
                    $customer->save();
                    Statement::create(['customer_id' => $invoice->customer->id,'debit' => $change,'balance' => $customer->balance]);
                }
            }
            foreach ($expense as $key => $val) {
                Expense::create(['sale_man_id' => $saleman_id,'amount' => $val['amount'],'description' => $val['desc'],'created_at' => $invoicedate]);
            }

        }

    }

    
    public function showReceiveInvoice(Request $request)
    {
         // dd(filter($request));
        $filter = filter($request);

        $data = Invoice::join('customers','customers.id','customer_id')
        ->join('sale_men','sale_men.id','sale_man_id')
        ->join('order_bookers','order_bookers.id','order_booker_id')
        ->select('invoices.id as invoice_id','customers.name as customer_name','order_bookers.name as orderbooker_name','sale_men.name as saleman_name','discount_total','invoices.created_at')->where($filter)->where('received',0)->get();

        // die($request);

        
        if($request->ajax())
            return view('ajax_tables.receive_invoices',compact('data'));
        else
            return view('invoice.receive_invoices');


            // return view('invoice/invoices_list');
    }

    public function receiveInvoiceEdit(Request $request)
    {
        $data = array();
        $sales = Sale::join('products','products.id','product_id')->select('sales.id','product_id','products.name as product_name','bonus','sales.qty','total_price','discount','discount_amount','discount_total','unit_price')->where('invoice_id',$invoice->id)->get();

        $invoice = Invoice::join('customers','customers.id','customer_id')
        ->join('sale_men','sale_men.id','sale_man_id')
        ->join('order_bookers','order_bookers.id','order_booker_id')
        ->select('invoices.id','customers.name as customer','order_bookers.name as orderbooker','sale_men.name as saleman','total_amount','total_discount','discount_total','invoices.created_at as invoicedate')->where('invoices.id',$invoice->id)->get()[0];

        $invoice->invoicedate = date('Y-m-d',strtotime($invoice->invoicedate));
        $expenses = $invoice->expenses();


        return view('invoice.edit_invoice',compact('invoice','sales','expenses'));
        
    }

    public function receiveInvoice(Request $request)
    {
        $invoice = Invoice::find($request->id);
        $invoice->received_amount = $request->received_amount;
        $invoice->received = 1;
        $invoice->balance = $invoice->discount_total - $invoice->received_amount;
        $invoice->save();

        $customer = Customer::find($invoice->customer_id);

        $sales = Sale::where('invoice_id',$invoice->id)->get();
        $sales = $invoice->sales;
        foreach($sales as $sale){
           Product::find($sale->product_id)->decrement('qty',$sale->qty);
        }
        // die("success");

        if($invoice->balance>0){

            $customer->balance = $customer->balance + $invoice->balance;
            $rec = ['customer_id'=> $customer->id,'credit'=>$invoice->balance,'balance'=>$customer->balance];
            $customer->save();
            Statement::create($rec);
        }
        if($invoice->balance<0){

            $customer->balance = $customer->balance - abs($invoice->balance);
            $rec = ['customer_id'=>$customer->id,'debit'=>abs($invoice->balance),'balance'=>$customer->balance];
            $customer->save();
            Statement::create($rec);
        }
    }
    
    public function getInvoiceNo()
    {
        $status = DB::select("show table status like 'invoices'");
        echo $status[0]->Auto_increment;
    }


    public function getRow()
    {
        return view('components.invoice_row');
    }

}
