<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = ['company_id','product_id','qty','carton','expire','unit_purchse_price','unit_sale_price'];
}
