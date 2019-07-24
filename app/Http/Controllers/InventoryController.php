<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Company;
use App\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // dd(filter($request));
        $filter = filter($request);


        $data = Inventory::join('companies','companies.id','company_id')
        ->join('products','products.id','product_id')
        ->select('inventories.id as inventory_id','products.name as product','companies.name as company','inventories.qty','inventories.unit_purchase','inventories.unit_sale','total_purchase','inventories.created_at')->orderBy('inventories.id','DESC')->where($filter)->paginate(40);

        // dd(json_encode($data));

        if($request->ajax())
            return view('ajax_tables.stock_purchases',compact('data'));
        else
            return view('stock.stock_purchases');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.add_stock');
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
        $date = $request->date;

        $product = new Product;
        $company = new Company;

        $company_id = $company->findOrSaveCompany($request->company);
        foreach ($rows as $key => $val) {

            $product_id = $product->findOrSaveProduct($val,$company_id);

            $rec = [
                'company_id' => $company_id,
                'product_id' => $product_id,
                'qty' => $val['qty'],
                'carton' => $val['carton']||null,
                'expire' => $val['expire'],
                'unit_purchase' => $val['unit_purchase'],
                'unit_sale' => $val['unit_sale'],
                'total_purchase' => $val['total_purchase'],
                'created_at' => $date
            ];

            Inventory::create($rec);

        }

        echo "success";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        $inventory = Inventory::join('companies','companies.id','company_id')->join('products','products.id','product_id')->select('inventories.*','companies.name as company','products.name as product')->where('inventories.id',$inventory->id)->first();

        return view('stock.edit_purchase',compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {

        $company_id = Company::where('name',$request->company)->first()->id;
        $product = Product::where('name',$request->product)->first();

        $product->decrement('qty',$inventory->qty);
        $product->increment('qty',$request->qty);
        $product->save();

        $rec = [
            'company_id' => $company_id,
            'product_id' => $product->id,
            'qty' => $request->qty,
            'carton' => $request->carton?$request->carton:0,
            'unit_purchase' => $request->unit_purchase,
            'unit_sale' => $request->unit_sale,
            'total_purchase' => $request->total_purchase,
            'expire' => $request->expire,
            'updated_at' => $request->date
        ];

        $inventory->update($rec);
        $inventory->save();
        return "success";
        return json_encode($product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $product_id = $inventory->product_id;
        $product = Product::find($product_id);        
        $product->decrement('qty',$inventory->qty);
        $product->save();
        Inventory::destroy($id);

        return view('components.alert',['msg'=>'Inventory deleted!','type'=>'primary']);
    }


    public function getRow()
    {
        return view('components.stock_row');
    }

}
