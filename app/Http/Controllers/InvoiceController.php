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
    public function index(Request $req)
    {


        // dd(filter($request));
        // $filter = filter($req);
        if($req->ajax()){


            $q = Invoice::query();
            if($req->has('invoiceid')) $q->where('id', $req->invoiceid);
            if($req->has('customer')) $q->where('customer_id', $req->customer);
            if($req->has('orderbooker')) $q->where('order_booker_id', $req->orderbooker);
            if($req->has('saleman')) $q->where('sale_man_id', $req->saleman);
            if($req->has('received')) $q->where('received', $req->received);
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $invoices = $q->orderBy('id','DESC')->paginate(45);



        // $invoices = Invoice::where($filter)->orderBy('invoices.id','DESC')->paginate(40);

        // die($request);

        
            return view('ajax_tables.invoices',compact('invoices','req'));
        }
        else
            return view('invoice.invoices_list');


            // return view('invoice/invoices_list');

    }

    public function printInvoices(Request $req)
    {
        if($req->ajax()){
            $q = Invoice::query();
            if($req->has('invoiceid')) $q->where('id', $req->invoiceid);
            if($req->has('customer')) $q->where('customer_id', $req->customer);
            if($req->has('orderbooker')) $q->where('order_booker_id', $req->orderbooker);
            if($req->has('saleman')) $q->where('sale_man_id', $req->saleman);
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $invoices = $q->get();

            return view('ajax_tables.print_invoices',compact('invoices','req'));
        }
        else
            return view('invoice.print_invoices');

    }

    public function searchid(Request $request)
    {
        $ss = $request->searchString;
        $q = Invoice::query();
        // when($req->d, function ($q) use ($req) { return $q->whereDate('created_at','>=', $req->d); })
        $q->select('id','id as text')->when($ss, function($q) use($ss){ return $q->where('id',$ss); })->limit(8);
        $results = $q->get();
        return request()->json(200,['results'=>$results]);
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
        $customer_id = Customer::findOrSaveCustomer($request->customer);
        $orderbooker_id = OrderBooker::findOrSaveOrderBooker($request->orderbooker);
        $saleman_id = SaleMan::findOrSaveSaleman($request->saleman);
        $invoicedate = $request->date;
        $customer = Customer::find($customer_id);
        $customer->area = $request->area;
        $customer->save();

        // die($request->invoice_total);

        // die($request."|----|".$customer_id.$request->area);

        $rec = [
                'customer_id' => $customer_id,
                'order_booker_id' => $orderbooker_id,
                'sale_man_id' => $saleman_id,
                'created_at' => $invoicedate
            ];


        $invoice = Invoice::create($rec);
        $invoice_id = $invoice->id;

     
        foreach ($rows as $key => $val) {

            $record = [ 
                'invoice_id' => $invoice_id,
                'product_id' => $val['product'],
                'qty' => $val['qty'],
                'bonus' => $val['bonus'],
                'unit_price' => $val['unit_price'],
                'total_price' => $val['total_price'],
                'discount' => $val['discount'],
                'discount_amount' => $val['discount_amount'],
                'discount_total' => $val['discount_total'],
                'created_at' => $invoicedate
            ];
            Sale::create($record);
        }
        $invoice->updateTotal();

        return view('components.alert',['msg'=>'Invoice Created Successfully','type'=>'success']);
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
        $invoicedate = $request->date;
         // dd($request->company);

        foreach ($rows as $key => $val) {
    
            // echo "success"; die($val['total_price']);
            $record = [
                'product_id' => $val['product'],
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

        $rec = [
            'customer_id' => $customer_id,
            'order_booker_id' => $orderbooker_id,
            'sale_man_id' => $saleman_id,
            'updated_at' => $invoicedate
        ];

        // Update Invoice
        $invoice->update($rec);
        $invoice->updateTotal();


        return view('components.alert',['msg'=>'Invoice Updated Successfully','type'=>'success']);
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


    public function showReceiveInvoice(Request $req)
    {
        if($req->ajax()){
            $q = Invoice::query();
            if($req->has('invoiceid')) $q->where('id', $req->invoiceid);
            if($req->has('customer')) $q->where('customer_id', $req->customer);
            if($req->has('orderbooker')) $q->where('order_booker_id', $req->orderbooker);
            if($req->has('saleman')) $q->where('sale_man_id', $req->saleman);
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $data = $q->where('received',0)->orderBy('id','DESC')->get();
            return view('ajax_tables.receive_invoices',compact('data'));
        }
        else
            return view('invoice.receive_invoices');
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
