<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = ['company_id','product_id','qty','carton','expire','unit_purchase','unit_sale','total_purchase','created_at','update_at'];

    public function created_at()
    {
    	return date('Y-m-d',strtotime($this->created_at));
    }
}
