<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleMan extends Model
{
    protected $fillable = ['name','phone'];


    public static function findOrSaveSaleman($val){
        $saleman = SaleMan::firstOrCreate(['name' => $val]);
        return $saleman->id;
    }

}
