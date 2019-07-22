<?php

namespace App\Http\Controllers;

use App\ReceiveInvoice;
use App\Customer;
use App\OrderBooker;
use App\SaleMan;
use App\Invoice;
use App\Sale;
use App\Expense;
use App\Product;
use App\Statement;
use Illuminate\Http\Request;

class ReceiveInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $expnses = $request->expenses;
        $received_at = $request->received_at;
        $sale_man_id = SaleMan::where('name',$request->saleman)->first()->id;
        $order_booker_id = OrderBooker::where('name',$request->orderbooker)->first()->id;
        // die("-->".$order_booker_id);

        // $invoice = Invoice::find($request->invoice);
        // dd($invoice);
        // $sales = $invoice->sales;
        // $sales = Sale::where('invoice_id',$request->invoice)->get();

        // dd($sales);

        $rec = [
                'sale_man_id' => $sale_man_id,
                'order_booker_id' => $order_booker_id,
                'discount_total' => $request->discount_total,
                'received_amount' => $request->received_amount,
                'received_at' => $request->received_at
            ];
        // die(json_encode($rec));
        $received_invoices = ReceiveInvoice::create($rec);
        $received_invoices_id = $received_invoices->id;
        // die(json_encode($received_invoices_id));
        foreach ($expnses as $expnse) {
            $rec = [
                'sale_man_id' => $sale_man_id,
                'receive_invoice_id' => $received_invoices_id,
                'amount' => $expnse['amount'],
                'description' => $expnse['description'],
                'create_at' => $received_at
            ];

            Expense::create($rec);
        }
        // die('success');

        // Invoices Stock Detuctions And Customers Accounts


        $invoices = $request->invoices;

        foreach ($invoices as $inv) {

            $invoice = Invoice::find($inv['id']);
            $invoice->received_amount = $inv['received_amount'];
            $invoice->received = 1;
            $invoice->balance = $invoice->discount_total - $invoice->received_amount;
            $invoice->save();

            $customer = Customer::find($invoice->customer_id);

            $sales = Sale::where('invoice_id',$invoice->id)->get();
            // $sales = $invoice->sales;
            foreach($sales as $sale){
               Product::find($sale->product_id)->decrement('qty',$sale->qty + $sale->bonus);
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
            // die(json_encode($invoice->balance));
        }

        echo "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReceiveInvoice  $receiveInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveInvoice $receiveInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceiveInvoice  $receiveInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiveInvoice $receiveInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceiveInvoice  $receiveInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiveInvoice $receiveInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceiveInvoice  $receiveInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiveInvoice $receiveInvoice)
    {
        //
    }
}
