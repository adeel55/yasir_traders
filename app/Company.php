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

    
}
