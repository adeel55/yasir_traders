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
    	return $this->belongsTo('App\Customer');
    }

    public function sale_man()
    {
        return $this->belongsTo('App\SaleMan');
    } 

    public function order_booker()
    {
        return $this->belongsTo('App\OrderBooker');
    }

    public function updateTotal()
    {
        $this->total_amount = $this->sales()->sum('total_price');
        $this->total_discount = $this->sales()->sum('discount_amount');
        $this->discount_total = $this->sales()->sum('discount_total');
        $this->balance = $this->discount_total - $this->received_amount;
        $this->save();
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
