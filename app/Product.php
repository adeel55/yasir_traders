<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\Sale;

class Product extends Model
{
    //
    protected $fillable = ['company_id','name','qty','pcs_per_carton','unit_purchase','unit_sale','created_at','updated_at'];



    public function findOrSaveProduct($val,$company_id){
        
        $pro = Product::firstOrCreate(['company_id' => $company_id,'name' => $val['product']]);
        $pro->increment('qty',intval($val['qty']));

        // Count Average Unit Purchase
        $this->avg_sale($pro,$val['unit_sale']);

        // Count Average Unit Sale
        $this->avg_purchase($pro,$val['unit_purchase']);

        $pro->save();
        return $pro->id;
    }



    public function avg_sale($pro,$unit_sale)
    {
        if($pro->unit_sale>0)
            $pro->update(['unit_sale' => ($pro->unit_purchase+$unit_sale)/2]);
        else
            $pro->update(['unit_sale' => $unit_sale]);
        
    }

    public function avg_purchase($pro,$unit_purchase)
    {
        if($pro->unit_purchase>0)
            $pro->update(['unit_purchase' => ($pro->unit_purchase + $unit_purchase)/2]);
        else
            $pro->update(['unit_purchase' => $unit_purchase]);
        
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function putdate()
    {
        return date('Y-m-d',strtotime($this->created_at));
    }

    public function showdate()
    {
        return date('d-M-Y',strtotime($this->created_at));
    }

    
}
