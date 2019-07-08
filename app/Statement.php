<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\Customer

class Statement extends Model
{

	protected $fillable = ['customer_id','debit','credit','balance','created_at','updated_at'];

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }
}
