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
    public function index()
    {
        //
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
        $rows = $request->productrows;
         // dd($request->company);
        // $rows = array(array('product' => 'candy','qty' => 12,'carton' => 12,'expire' => '2012-12-23','unit_purchase_price' => 18,'unit_sale_price' => 20,'total_purchase' => 500 ),array('product' => 'lays','qty' => 16,'carton' => 12,'expire' => '2012-12-23','unit_purchase_price' => 15,'unit_sale_price' => 25,'total_purchase' => 300 ));

        $company_id = Company::findOrSaveCompany($request->company);
        $purchasedate = $request->purchasedate;

        foreach ($rows as $key => $val) {

            $product_id = Product::findOrSaveProduct($val,$company_id);

            $rec = [
                'company_id' => $company_id,
                'product_id' => $product_id,
                'qty' => $val['qty'],
                'carton' => $val['carton'],
                'expire' => $val['expire'],
                'unit_purchase_price' => $val['unit_purchase_price'],
                'unit_sale_price' => $val['unit_sale_price'],
                'total_purchase' => $val['total_purchase'],
                'created_at' => $purchasedate
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

}
