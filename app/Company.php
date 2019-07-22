<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name','created_at','updated_at'];



    public function findOrSaveCompany($val){
        $company = Company::firstOrCreate(['name' => $val]);
        return $company->id;
    }


    public function sales()
    {
        return $this->hasManyThrough('App\Sale','App\Product')->select('*');
    }

    public function created_at()
    {
        return date('Y-m-d',strtotime($this->created_at));
    }
    
}
