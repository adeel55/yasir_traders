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
    	return $this->belongsTo('App\Invoice');
    }

    public function customers()
    {
    	return hasManyThrough('App\Customer', 'App\Invoice');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function tColor()
    {
        if(($this->qty * $this->unit_price) > $this->total_price) return 'text-danger';
        if(($this->qty * $this->unit_price) < $this->total_price) return 'text-primary';
    }
    public function dColor()
    {
        if(($this->total_price - $this->product->avg_purchase() * $this->qty) < $this->discount_amount) return 'text-danger';
    }
    public function dtColor()
    {
        if(($this->qty * $this->unit_price) - $this->discount_amount > $this->discount_total) return 'text-danger';
        if(($this->qty * $this->unit_price) - $this->discount_amount < $this->discount_total) return 'text-primary';
    }
    public function proColor($pro)
    {
        if($pro > 0)
            return 'text-success';
        else
            return 'text-danger';
    }
    public function udArrow($pro)
    {
        if($pro > 0)
            return "<i class='fa fa-arrow-up'></i>";
        else
            return "<i class='fa fa-arrow-down'></i>";
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
