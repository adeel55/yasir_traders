<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\Invoice;

class Sale extends Model
{

    protected $fillable = ['invoice_id','product_id','qty','bonus','unit_price','total_price','discount','discount_amount','discount_total','created_at','updated_at'];


    public function invoice()
    {
    	return $this->belongsTo(Invoice::class);
    }
}
