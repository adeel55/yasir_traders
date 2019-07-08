<?php

namespace App;
use app\Invoice

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = ['name','phone','balance','address'];

	public function FunctionName()
	{
		return $this->hasMany(Invoice::class);
	}

    public static function findOrSaveCustomer($val){
        $customer = Customer::firstOrCreate(['name' => $val]);
        return $customer->id;
    }
}
