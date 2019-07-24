<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveInvoice extends Model
{
    protected $fillable = ['sale_man_id','order_booker_id','discount_total','received_amount','received_at'];

    public function putdate()
    {
        return date('Y-m-d',strtotime($this->created_at));
    }

    public function showdate()
    {
        return date('d-M-Y',strtotime($this->created_at));
    }

    public function expenses()
    {
    	return $this->hasMany('App\Expense');
    }
}
