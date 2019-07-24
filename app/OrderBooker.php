<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBooker extends Model
{
    protected $fillable = ['name','phone','target','created_at'];


    public static function findOrSaveOrderBooker($val){
        $orderbooker = OrderBooker::firstOrCreate(['name' => $val]);
        return $orderbooker->id;
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
