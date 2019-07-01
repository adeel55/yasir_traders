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

        foreach ($rows as $key => $val) {

            $company_id = $this->findOrSaveCompany($val);
            $product_id = $this->findOrSaveProduct($val);

            $rec = [
                'company_id' => $company_id,
                'product_id' => $product_id,
                'qty' => $val['qty'],
                'carton' => $val['carton'],
                'expire' => $val['expire'],
                'unit_purchse_price' => $val['unit_purchse_price'],
                'unit_sale_price' => $val['unit_sale_price']
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

    function findOrSaveProduct($val){
        $pro = Product::firstOrCreate(['name' => $val['product']]);
        $pro->increment('qty',intval($val['qty']));
        $pro->save();
        return $pro->id;
    }
    function findOrSaveCompany($val){
        $company = Company::firstOrCreate(['name' => $val['company']]);
        return $company->id;
    }
}
