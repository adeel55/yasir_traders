<?php

namespace App;

use app\Customer;
use app\Expense;
use app\Sale;

use Illuminate\Database\Eloquent\Model;
class Invoice extends Model
{
    protected $fillable = ['customer_id','sale_man_id','order_booker_id','total_amount','total_discount', 'discount_total','received_amount','balance','received','created_at','updated_at'];


    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    // public function expenses()
    // {
    // 	return $this->hasMany(Expense::class);
    // }
    
}
