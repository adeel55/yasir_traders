<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Invoice extends Model
{
    protected $fillable = ['customer_id','sale_man_id','order_booker_id','created_at','updated_at'];


    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }

    public function invoice_sum()
	{
	    return $this->sales()->withCount("discount_total_price")->get();
	}
}
