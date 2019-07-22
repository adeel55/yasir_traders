<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\Invoice;


class Expense extends Model
{
    protected $fillable = ['sale_man_id','receive_invoice_id','amount','description','created_at','updated_at'];

    public function invoice()
    {
    	return $this->belongsTo(Invoice::class);
    }

    public function created_at()
    {
        return date('Y-m-d',strtotime($this->created_at));
    }
}
