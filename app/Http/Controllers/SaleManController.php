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
        $filter = filter($request);

        $data = SaleMan::where($filter)->orderBy('id','DESC')->paginate(40);

        if($request->ajax())
            return view('ajax_tables.salemen',compact('data'));
        else
            return view('saleman.saleman_list');
    }

    /**
     * Display a list of searched items.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $ss = $request->searchString;
        $results = SaleMan::select('name')->where('name','like','%'.$ss.'%')->limit(8)->get();
        // $results = SaleMan::where('name','like','%'.$ss.'%')->limit(8)->pluck('name')->toArray();
        return request()->json(200,$results);
        // dd($products);
    }
    public function search2(Request $request)
    {
        $ss = $request->searchString;
        $results = SaleMan::select('id','name as text')->where('name','like','%'.$ss.'%')->limit(8)->get();
        return request()->json(200,['results'=>$results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saleman.create_saleman');
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
    public function show(SaleMan $saleman)
    {
        return view("saleman.view_saleman", compact('saleman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleMan  $saleMan
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleMan $saleman)
    {
        return view("saleman.edit_saleman", compact('saleman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleMan  $saleMan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleMan $saleman)
    {
        // return json_encode($saleman);
        $saleman->update($request->all());
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleMan  $saleMan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SaleMan::destroy($id);
        return view('components.alert',['msg'=>'Sale Man deleted!','type'=>'primary']);
    }
}
