<?php

namespace App\Http\Controllers;

use App\SaleMan;
use Illuminate\Http\Request;

class SaleManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = array();
        foreach($request->input() as $key => $val ) {
            if(strpos($key, 'filter') === 0){
                array_push($filter, [ltrim($key,'filter'),'like','%'.$val.'%']);
            }
        };


        $all = SaleMan::where($filter)->paginate(10);
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
        $results = SaleMan::where('name','like','%'.$ss.'%')->limit(8)->pluck('name')->toArray();
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
        $rec = SaleMan::create($request->all());
        if($rec) echo "success"; else echo "fail";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaleMan  $saleMan
     * @return \Illuminate\Http\Response
     */
    public function show(SaleMan $saleMan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleMan  $saleMan
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleMan $saleMan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleMan  $saleMan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleMan $saleMan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleMan  $saleMan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleMan $saleMan)
    {
        //
    }
}
