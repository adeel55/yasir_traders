<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = ['name','phone','balance','address'];



    public static function findOrSaveCustomer($val){
        $customer = Customer::firstOrCreate(['name' => $val]);
        return $customer->id;
    }
}
