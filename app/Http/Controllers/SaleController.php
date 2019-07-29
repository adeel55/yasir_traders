<?php

namespace App\Http\Controllers;

use App\Sale;
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
    public function index(Request $request)
    {
        

        $filter = filter($request);


        $all = Sale::selectRaw('product_id, products.name as product_name, sum_qty, sum_bonus, avg_unit_price, sum_sales_amount, sum_qty * products.unit_purchase as sum_purchase_amount, sum_sales_amount - (products.unit_purchase * sum_qty) as profit')->from(DB::raw('(select product_id, sum(sales.qty) as sum_qty, sum(sales.bonus) as sum_bonus, AVG(unit_price) avg_unit_price, SUM(discount_total) as sum_sales_amount from sales group by product_id) as groupsales'))->join('products','products.id','product_id')->where($filter)->paginate(20);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
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
            if($req->has('company')) $sales = Company::find($req->company)->sales($req);

            return view('ajax_tables.product_report',compact('companies','sales','req'));
        }
        else
            return view('reports.product_report');
        
    }

    public function customerReport(Request $req)
    {

        // $req->date = '2019-07-26';
        if($req->ajax()){

            $q = Customer::query();
            if($req->has('customer')) $q->where('id',$req->customer);
            $customers = $q->get();
            
            $q = Sale::query();
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $sales = $q->get();
            if($req->has('customer')) $sales = Customer::find($req->customer)->sales($req);

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
