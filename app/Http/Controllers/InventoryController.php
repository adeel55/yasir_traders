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
        ->select('inventories.id as inventory_id','products.name as product','companies.name as company','inventories.qty','inventories.unit_purchase','inventories.unit_sale','total_purchase','inventories.created_at')->orderBy('inventories.id','DESC')->where($filter)->paginate(30);

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
         // dd($request->company);
        // $rows = array(array('carton'=> '','expire'=> '1975-01-01','product'=> "nnc",'qty'=> "25",'total_purchase'=> "5000",'unit_purchase'=> "200.00",'unit_sale'=> "250"),array('carton'=> "10",'expire'=> "2019-07-11",'product'=> "SSB",'qty'=> "50",'total_purchase'=> "2550",'unit_purchase'=> "51.00",'unit_sale'=> "60"));

        // echo '-|'.$request->date.'|-';
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }


    public function getRow()
    {
        return view('components.stock_row');
    }

}
