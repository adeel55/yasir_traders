<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name','created_at','updated_at'];



    public function findOrSaveCompany($val){
        $company = Company::firstOrCreate(['name' => $val]);
        return $company->id;
    }

    public function sales($req)
    {
        return $this->hasManyThrough('App\Sale','App\Product')->when($req->orderbooker, function ($q) use ($req) { return $q->join('invoices','invoices.id','invoice_id')->where('order_booker_id', $req->orderbooker); })->when($req->date, function ($q) use ($req) { return $q->whereDate('sales.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('sales.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('sales.created_at','<=', $req->dateto); })->get();
    }

    public function group_sales($req)
    {
        return $this->hasManyThrough('App\Sale','App\Product')->selectRaw('sales.product_id, products.name, sum(sales.qty) as qty, sum(sales.bonus) as bonus, avg(sales.unit_price) as unit_price, sum(sales.total_price) as total_price, sum(sales.discount) as discount, sum(sales.discount_amount) as discount_amount, sum(sales.discount_total) as discount_total')->when($req->orderbooker, function ($q) use ($req) { return $q->join('invoices','invoices.id','invoice_id')->where('order_booker_id', $req->orderbooker); })->when($req->date, function ($q) use ($req) { return $q->whereDate('sales.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('sales.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('sales.created_at','<=', $req->dateto); })->groupBy('sales.product_id')->get();
    }

    public function inventories($req)
    {
        return $this->hasMany('App\Inventory')->when($req->date, function ($q) use ($req) { return $q->whereDate('created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('created_at','<=', $req->dateto); })->get();
    }

    public function group_inventories($req)
    {
        return $this->hasMany('App\Inventory')->when($req->date, function ($q) use ($req) { return $q->whereDate('inventories.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('inventories.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('inventories.created_at','<=', $req->dateto); })->groupBy('product_id')->join('products','products.id','product_id')->selectRaw('products.name as name, sum(inventories.qty) as new_qty, avg(inventories.unit_purchase) as new_unit_purchase, avg(inventories.unit_sale) as unit_sale, sum(inventories.total_purchase) as new_total_purchase')->get();
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
