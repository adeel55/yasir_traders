<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','qty','unit_purchase_price'];



    public static function findOrSaveProduct($val,$company_id){
        $unit_purchase_price = $val['unit_purchase_price'];
        $pro = Product::firstOrCreate(['company_id' => $company_id,'name' => $val['product']]);
        $pro->increment('qty',intval($val['qty']));

        if($pro->unit_purchase_price>0)

            $pro->update(['unit_purchase_price' => ($pro->unit_purchase_price + $val['unit_purchase_price'])/2]);
        else
            $pro->update(['unit_purchase_price' => $unit_purchase_price]);

        $pro->save();
        return $pro->id;
    }

    
}
