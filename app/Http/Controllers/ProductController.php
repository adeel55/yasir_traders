<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = filter($request);


        $data = Product::join('companies','companies.id','company_id')->select('products.id as product_id','products.name as product','companies.name as company','qty','unit_purchase','unit_sale','products.created_at')->where($filter)->paginate(30);
        return view('stock.stock_items',compact('data'));
    }

    /**
     * Display a list of searched items.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $ss = $request->searchString;
        $products = Product::select('name')->where('name','like','%'.$ss.'%')->limit(8)->get();
        // $products = Product::where('name','like','%'.$ss.'%')->limit(8)->pluck('name')->toArray();
        return request()->json(200,$products);
        // dd($products);
    }

    public function getSalePrice(Request $request)
    {
       $product = Product::where('name','like',$request->product)->first();
       if(!is_null($product))
           echo $product->unit_sale;
       else
            echo 0.00;
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
