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
        return $this->hasManyThrough('App\Sale','App\Invoice')->join('products','products.id','product_id')->select('*');
    }

    public static function findOrSaveCustomer($val){
        $customer = Customer::firstOrCreate(['name' => $val]);
        return $customer->id;
    }

    public function totalSaleAmount(){

    }

    public function created_at()
    {
        return date('Y-m-d',strtotime($this->created_at));
    }
}
