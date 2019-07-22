<?php

namespace App\Http\Controllers;

use App\OrderBooker;
use Illuminate\Http\Request;

class OrderBookerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = filter($request);

        $data = OrderBooker::where($filter)->orderBy('id','DESC')->paginate(15);
        
         if($request->ajax())
            return view('ajax_tables.orderbookers',compact('data'));
        else
            return view('orderbooker.orderbooker_list');
    }


    /**
     * Display a list of searched items.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $ss = $request->searchString;
        $results = OrderBooker::select('name')->where('name','like','%'.$ss.'%')->limit(8)->get();
        // $results = OrderBooker::where('name','like','%'.$ss.'%')->limit(8)->pluck('name')->toArray();
        return request()->json(200,$results);
        // dd($products);
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
        // dd($request->all());
          $rec = OrderBooker::create($request->all());
         if($rec) echo "success"; else echo "fail";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderBooker  $orderBooker
     * @return \Illuminate\Http\Response
     */
    public function show(OrderBooker $orderbooker)
    {
        return view("orderbooker.view_orderbooker", compact('orderbooker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderBooker  $orderBooker
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderBooker $orderbooker)
    {
        return view("orderbooker.edit_orderbooker", compact('orderbooker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderBooker  $orderBooker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderBooker $orderbooker)
    {
        $orderbooker->update($request->all());
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderBooker  $orderBooker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderBooker::destroy($id);
        return view('components.alert',['msg'=>'Inventory deleted!','type'=>'primary']);
    }
}
