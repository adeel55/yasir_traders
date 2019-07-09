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

        $all = OrderBooker::where($filter)->paginate(10);
        return request()->json('200',$all);
    }


    /**
     * Display a list of searched items.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $ss = $request->searchString;
        $results = OrderBooker::where('name','like','%'.$ss.'%')->limit(8)->pluck('name')->toArray();
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
    public function show(OrderBooker $orderBooker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderBooker  $orderBooker
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderBooker $orderBooker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderBooker  $orderBooker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderBooker $orderBooker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderBooker  $orderBooker
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderBooker $orderBooker)
    {
        //
    }
}
