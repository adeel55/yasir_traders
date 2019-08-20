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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchasesReport(Request $req)
    {
        if($req->ajax()){


            $q = Company::query();
            if($req->has('company')) $q->where('id',$req->company);
            $companies = $q->get();

            $q = Inventory::query();
            if($req->has('date')) $q->whereDate('created_at', $req->date);
            if($req->has('datefrom')) $q->whereDate('created_at','>=', $req->datefrom);
            if($req->has('dateto')) $q->whereDate('created_at','<=', $req->dateto);
            $inventories = $q->get();
            
            if($req->has('company')) 
                $inventories = Company::find($req->company)->group_inventories($req);

            // dd(json_encode($data));

            return view('ajax_tables.purchase_report',compact('companies','inventories','req'));
        }
        else
            return view('reports.purchase_report');

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
        $date = $request->date;
        foreach ($request->rows as $key => $val) {

            Product::find($val['product'])->increment('qty',$val['qty']);
            $rec = [
                'company_id' => $request->company,
                'product_id' => $val['product'],
                'qty' => $val['qty'],
                'expire' => $val['expire'],
                'unit_purchase' => $val['unit_purchase'],
                'unit_sale' => $val['unit_sale'],
                'total_purchase' => $val['total_purchase'],
                'created_at' => $date
            ];

            Inventory::create($rec);

        }

        return view('components.alert',['msg'=>'Stock Added Successfully','type'=>'success']);
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

        $product = $inventory->product;
        $product->decrement('qty',$inventory->qty);
        $product->increment('qty',$request->qty);
        $product->save();

        $inventory->update($request->all());

        return view('components.alert',['msg'=>'Purchase Updated Successfully','type'=>'success']);
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
