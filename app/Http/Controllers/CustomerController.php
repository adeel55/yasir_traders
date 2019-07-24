<?php

namespace App\Http\Controllers;

use App\Customer;
use App\OrderBooker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = filter($request);

        $data = Customer::where($filter)->paginate(40);

        if($request->ajax())
            return view('ajax_tables.customers',compact('data'));
        else
            return view('accounts.customer_list');
    }


    /**
     * Display a list of searched items.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $ss = $request->searchString;
        $results = Customer::select('name')->where('name','like','%'.$ss.'%')->limit(8)->get();
        // $results = Customer::where('name','like','%'.$ss.'%')->limit(8)->pluck('name')->toArray();
        return request()->json(200,$results);
        // dd($products);
    }

    /**
     * Display a list of searched items.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchArea(Request $request)
    {
        $ss = $request->searchString;
        $results = Customer::selectRaw('distinct(area) as name')->where('area','like','%'.$ss.'%')->limit(8)->get();
        return request()->json(200,$results);
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
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.view_customer',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit_customer',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return view('components.alert',['msg'=>'Customer deleted!','type'=>'primary']);
        
    }




    public function salesReport(Request $request)
    {
        $filter = filter($request);

        $customers = Customer::select()->paginate(50);

        if($request->ajax())
            return view('ajax_tables.customer_sales',compact('customers'));
        else
            return view('accounts.customer_list');
    }



}
