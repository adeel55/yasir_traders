<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\Invoice;


class Expense extends Model
{
    protected $fillable = ['sale_man_id','receive_invoice_id','amount','description','created_at','updated_at'];

    public function receive_invoice()
    {
    	return $this->belongsTo('App\ReceiveInvoice');
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
