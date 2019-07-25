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
        return $this->hasManyThrough('App\Sale','App\Product');
    }

    public function group_sales()
    {
        return $this->hasManyThrough('App\Sale','App\Product')->selectRaw('sales.product_id, products.name, sum(sales.qty) as qty, sum(sales.bonus) as bonus, avg(unit_price) as unit_price, sum(total_price) as total_price, sum(discount) as discount, sum(discount_amount) as discount_amount, sum(discount_total) as discount_total')->groupBy('sales.product_id');
    }


    public function profit()
    {

        return $this->sales()->sum('discount_total');
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
