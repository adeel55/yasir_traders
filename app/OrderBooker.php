<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBooker extends Model
{
    protected $fillable = ['name','phone','target','created_at'];


    public static function findOrSaveOrderBooker($val){
        $orderbooker = OrderBooker::firstOrCreate(['name' => $val]);
        return $orderbooker->id;
    }

    public function customers($req)
    {
        $customers_ids = $this->hasMany('App\Invoice')->when($req->date, function ($q) use ($req) { return $q->whereDate('invoices.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('invoices.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('invoices.created_at','<=', $req->dateto); })->distinct('customer_id')->pluck('customer_id')->toArray();
        return Customer::find($customers_ids);
    }

    public function statements($req)
    {
        return $this->hasManyThrough('App\Statement','App\Invoice')->where('invoices.received',1)->when($req->date, function ($q) use ($req) { return $q->whereDate('invoices.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('invoices.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('invoices.created_at','<=', $req->dateto); })->orderBy('statements.id','DESC')->paginate(40);
    }


    public function sales($req)
    {
        return $this->hasManyThrough('App\Sale','App\Invoice')->when($req->date, function ($q) use ($req) { return $q->whereDate('sales.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('sales.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('sales.created_at','<=', $req->dateto); })->get();
    }

    public function group_sales($req)
    {
        return $this->hasManyThrough('App\Sale','App\Invoice')->selectRaw('sales.product_id, products.name, sum(sales.qty) as qty, sum(sales.bonus) as bonus, avg(sales.unit_price) as unit_price, sum(sales.total_price) as total_price, sum(sales.discount) as discount, sum(sales.discount_amount) as discount_amount, sum(sales.discount_total) as discount_total')->when($req->date, function ($q) use ($req) { return $q->whereDate('sales.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('sales.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('sales.created_at','<=', $req->dateto); })->groupBy('sales.product_id')->get();
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
