<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleMan extends Model
{
    protected $fillable = ['name','phone','created_at','updated_at'];


    public static function findOrSaveSaleman($val){
        $saleman = SaleMan::firstOrCreate(['name' => $val]);
        return $saleman->id;
    }


    public function created_at()
    {
        return date('Y-m-d',strtotime($this->created_at));
    }

}
