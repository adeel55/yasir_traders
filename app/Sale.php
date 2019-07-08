<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['invoice_id','product_id','qty','bonus','unit_price','total_price','discount','discount_total_price','created_at','updated_at'];


    
}
