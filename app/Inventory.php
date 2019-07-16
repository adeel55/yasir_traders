<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = ['company_id','product_id','qty','carton','expire','unit_purchase','unit_sale','total_purchase','created_at'];
}
