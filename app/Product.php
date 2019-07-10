<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['company_id','name','qty','pcs_per_carton','unit_purchase_price','unit_sale_price','created_at','updated_at'];



    public static function findOrSaveProduct($val,$company_id){
        $unit_purchase_price = $val['unit_purchase_price'];
        $pro = Product::firstOrCreate(['company_id' => $company_id,'name' => $val['product']]);
        $pro->increment('qty',intval($val['qty']));

        // Count Average Unit Purchase price
        if($pro->unit_purchase_price>0)

            $pro->update(['unit_purchase_price' => ($pro->unit_purchase_price + $val['unit_purchase_price'])/2]);
        else
            $pro->update(['unit_purchase_price' => $val['unit_purchase_price']]);


        // Count Average Unit Sale price
        if($pro->unit_sale_price>0)

            $pro->update(['unit_sale_price' => ($pro->unit_sale_price + $val['unit_sale_price'])/2]);
        else
            $pro->update(['unit_sale_price' => $val['unit_sale_price']]);

        $pro->save();
        return $pro->id;
    }

    
}
