<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\Statement;
use app\Customer;

class Statement extends Model
{

	protected $fillable = ['customer_id','invoice_id','debit','credit','balance','description','created_at','updated_at'];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
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
