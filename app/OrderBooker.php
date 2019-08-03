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
        $customers_ids = $this->hasMany('App\Invoice')->when($req->date, function ($q) use ($req) { return $q->whereDate('invoices.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('invoices.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('invoices.created_at','<=', $req->dateto); })->pluck('customer_id')->toArray();
        return Customer::find($customers_ids);
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
