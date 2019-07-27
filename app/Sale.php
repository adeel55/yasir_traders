<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\Invoice;
use app\Customer;
use app\Product;

class Sale extends Model
{

    protected $fillable = ['invoice_id','product_id','qty','bonus','unit_price','total_price','discount','discount_amount','discount_total','created_at','updated_at'];


    public function invoice()
    {
    	return $this->belongsTo('App\Invoice');
    }

    public function customers()
    {
    	return hasManyThrough('App\Customer', 'App\Invoice');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
    public function profit($qty, $disc)
    {
        return (($this->product->unit_sale * $qty) - ($this->product->unit_purchase * $qty)) - $disc;
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
