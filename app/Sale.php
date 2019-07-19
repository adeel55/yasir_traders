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
    	return $this->belongsTo(Invoice::class);
    }

    public function customers()
    {
    	return hasManyThrough(Customer::class, Invoice::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
