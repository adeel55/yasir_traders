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
    	return $this->hasMany('App\Sale');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer','id');
    }

    public function sale_man()
    {
        return $this->belongsTo('App\SaleMan','id');
    } 

    public function order_booker()
    {
        return $this->belongsTo('App\OrderBooker','id');
    }



    public function created_at()
    {
        return date('Y-m-d',strtotime($this->created_at));
    }
    
}
