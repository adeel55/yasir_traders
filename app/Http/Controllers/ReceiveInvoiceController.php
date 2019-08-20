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
    public function store(Request $req)
    {
        $expnses = $req->expenses;
        $received_at = $req->date;
        $rec = [
                'sale_man_id' => $req->saleman,
                'order_booker_id' => $req->orderbooker,
                'discount_total' => $req->discount_total,
                'received_amount' => $req->received_amount,
                'received_at' => $req->date
            ];
        $received_invoices_id = ReceiveInvoice::create($rec)->id;
        foreach ($expnses as $expnse) {
            $rec = [
                'sale_man_id' => $req->saleman,
                'receive_invoice_id' => $received_invoices_id,
                'amount' => $expnse['amount'],
                'description' => $expnse['description'],
                'create_at' => $received_at
            ];
            Expense::create($rec);
        }

        $invoices = $req->invoices;
        foreach ($invoices as $inv) {

            $invoice = Invoice::find($inv['id']);
            $invoice->received_amount = $inv['received_amount'];
            $invoice->received = 1;
            $invoice->balance = $invoice->discount_total - $invoice->received_amount;
            $invoice->save();

            $customer = Customer::find($invoice->customer_id);

            foreach($invoice->sales as $sale)
               Product::find($sale->product_id)->decrement('qty',$sale->qty + $sale->bonus);
            
            if($invoice->balance>0) 
                $customer->credit($invoice->balance,"Paid less on invoice",$received_at,$invoice->id);
            if($invoice->balance<0) 
                $customer->debit($invoice->balance,"Paid extra on invoice",$received_at,$invoice->id);

            // die(json_encode($rec));
        }

        return view('components.alert',['msg'=>'Invoices Received Successfully','type'=>'success']);
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
     * @param  \Illuminate\Http\req  $request
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
