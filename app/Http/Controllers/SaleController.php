<?php

namespace App\Http\Controllers;

use App\Sale;
use App\OrderBooker;
use App\Company;
use App\Product;
use App\Customer;
use App\Expense;
use App\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if($req->ajax()){


            $q = Sale::query();
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);

            $sales = $q->orderBy('id','DESC')->paginate(45);
            if($req->has('product')) {
                $sales = Product::find($req->product)->sales($req)->paginate(40);
            }

        
            return view('ajax_tables.sales',compact('sales','req'));
        }
        else
            return view('sale.sales_list');

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sale.view_sale',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('sale.edit_sale',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $sale->update($request->all());
        return view('components.alert',['msg'=>'Sale Updated Successfully','type'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $invoice = $sale->invoice;
        $sale->delete();
        $invoice->updateTotal();
    }



    public function productReport(Request $req)
    {
        // $filter = filter($request);
        if($req->ajax()){

            $q = Company::query();
            if($req->has('company')) $q->where('id',$req->company);
            $companies = $q->get();
            
            $q = Sale::query();
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $sales = $q->get();
            if($req->has('company')) 
                $sales = Company::find($req->company)->group_sales($req);
            if($req->has('orderbooker') and !$req->has('company')) 
                $sales = OrderBooker::find($req->orderbooker)->sales($req);

            return view('ajax_tables.product_report',compact('companies','sales','req'));
        }
        else
            return view('reports.product_report');
        
    }

    public function customerReport(Request $req)
    {

        // $req->date = '2019-07-26';
        // $req->orderbooker = 1;
        if($req->ajax()){

            if($req->has('orderbooker'))
            {
                $orderbooker = OrderBooker::find($req->orderbooker);
                $customers = $orderbooker->customers($req);
            }else{
                
                $customers = Customer::all();
            }
            
            $q = Sale::query();
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $sales = $q->get();

            if($req->has('orderbooker') and !$req->has('company')) 
                $sales = OrderBooker::find($req->orderbooker)->sales($req);

            return view('ajax_tables.customer_report',compact('customers','sales','req'));
        }
        else
            return view('reports.customer_report');
        
    }

    public function saleReport(Request $req)
    {   
        // $req->date = '2019-07-26';
        // $req->datefrom = '2019-07-26';
        // $req->dateto = '2019-07-28';
        if($req->ajax()){

            $q = Company::query();
            if($req->has('company')) $q->where('id',$req->company);
            $companies = $q->get();

            $q = Sale::query();
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $sales = $q->get();
            if($req->has('company')) $sales = Company::find($req->company)->sales($req);
            if($req->has('orderbooker') and !$req->has('company'))
                $sales = OrderBooker::find($req->orderbooker)->sales($req);

            $q = Expense::query();
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $expenses = $q->sum('amount');

            $q = Statement::query();
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $balance = $q->sum('credit');

            return view('ajax_tables.sale_report',compact('companies','sales','expenses','balance','req'));
        }
        else
            return view('reports.sale_report');  
    }

}
