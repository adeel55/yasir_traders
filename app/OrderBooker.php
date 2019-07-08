<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBooker extends Model
{
    protected $fillable = ['name','phone','target'];


    public static function findOrSaveOrderBooker($val){
        $orderbooker = OrderBooker::firstOrCreate(['name' => $val]);
        return $orderbooker->id;
    }
}
