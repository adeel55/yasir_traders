<?php

namespace App;
use app\Sale;
use app\Invoice;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = ['name','phone','balance','address','area','created_at','updated_at'];

	public function invoices()
	{
		return $this->hasMany('App\Invoice');
	}

    public function sales()
    {
        return $this->hasManyThrough('App\Sale','App\Invoice');
    }
    public static function findOrSaveCustomer($val){
        $customer = Customer::firstOrCreate(['name' => $val]);
        return $customer->id;
    }

    public function totalSaleAmount(){

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
