<?php

namespace App\Http\Controllers;

use App\Product;
use App\Inventory;
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


        $data = Product::join('companies','companies.id','company_id')->selectRaw('products.id as product_id,products.name as product,companies.name as company,qty,unit_purchase,unit_sale,products.created_at,qty*unit_purchase as total_purchase')->where($filter)->paginate(45);
        $all = Product::selectRaw('*, qty*unit_purchase as total_purchase')->get();


         if($request->ajax())
            return view('ajax_tables.products_list',compact('data','all'));
        else
            return view('product.products_list');

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

    public function search2(Request $request)
    {
        $ss = $request->searchString;
        $results = Product::select('id','name as text')->where('name','like','%'.$ss.'%')->limit(8)->get();
        return request()->json(200,['results'=>$results]);
    }

    public function getSalePrice(Request $req)
    {
        return Product::find($req->product)->getSalePriceAndMaxQty();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.view_product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit_product',compact('product'));
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
        $product->update($request->all());
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return view('components.alert',['msg'=>'Product deleted!','type'=>'primary']);
    }
}
