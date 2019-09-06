<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use app\Sale;

class Product extends Model
{
    //
    protected $fillable = ['company_id','name','qty','pcs_per_carton','unit_purchase','unit_sale','created_at','updated_at'];



    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function update_avg_sale($unit_sale)
    {
        if($this->unit_sale>0)
            $this->update(['unit_sale' => ($this->unit_purchase+$unit_sale)/2]);
        else
            $this->update(['unit_sale' => $unit_sale]);
        
    }

    public function update_avg_purchase($unit_purchase)
    {
        if($this->unit_purchase>0)
            $this->update(['unit_purchase' => ($this->unit_purchase + $unit_purchase)/2]);
        else
            $this->update(['unit_purchase' => $unit_purchase]);
        
    }

    public function avg_sale()
    {
        return round($this->allSales()->avg('unit_price'),2);
    }

    public function avg_purchase()
    {
        return round($this->allInventories()->avg('unit_purchase'),2);
    }

    public function reserved_qty()
    {
        return Invoice::where('received',0)->join('sales','invoices.id','invoice_id')->where('product_id',$this->id)->sum('qty');
    }

    public function getSalePriceAndMaxQty()
    {
        $unit_sale =  floatVal(Inventory::where('product_id',$this->id)->orderBy('created_at','DESC')->first()->unit_sale);
        return [$unit_sale,$this->getMaxQty()];
    }

    public function getMaxQty()
    {
        return $this->qty - $this->reserved_qty();
    }

    public function total_purchase()
    {
        $result = Inventory::selectRaw('unit_purchase * qty as total_purchase')->where('product_id' , $this->id)->sum('total_purchase');
        die(json_encode($result));
        // return $result['total_purchases'];
    }

    public function total_sale()
    {
        return Sale::selectRaw('SUM(unit_price)/SUM(qty) as purchase')->where('product_id',$this->id)->purchase;
    }

    public function sales($req)
    {
        return $this->hasMany('App\Sale')->when($req->date, function ($q) use ($req) { return $q->whereDate('created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('created_at','<=', $req->dateto); });
    }

    public function profit($req)
    {
        // return 
        return (($this->avg_sale() - $this->avg_purchase()) * $this->sales($req)->sum('qty')) - $this->sales($req)->sum('discount_amount');
    }

    public function allSales()
    {
        return $this->hasMany('App\Sale');
    }

    public function allInventories()
    {
        return $this->hasMany('App\Inventory');
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
