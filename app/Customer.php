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

    public function sales($req)
    {
        return $this->hasManyThrough('App\Sale','App\Invoice')->when($req->date, function ($q) use ($req) { return $q->whereDate('sales.created_at', $req->date); })->when($req->datefrom, function ($q) use ($req) { return $q->whereDate('sales.created_at','>=', $req->datefrom); })->when($req->dateto, function ($q) use ($req) { return $q->whereDate('sales.created_at','<=', $req->dateto); })->get();
    }
    public static function findOrSaveCustomer($val){
        $customer = Customer::firstOrCreate(['name' => $val]);
        return $customer->id;
    }

    public function totalSaleAmount(){

    }

    public function debit($amount, $desc, $date, $invoice_id=NULL)
    {
        $amount = abs($amount);
        $this->balance = $this->balance - $amount;
        $this->save();
        $rec = ['customer_id' => $this->id, 'invoice_id' => $invoice_id,'debit'=>$amount,'balance'=>$this->balance,'description' => $desc,'created_at' => $date];
        Statement::create($rec);
    }


    public function credit($amount, $desc, $date, $invoice_id=NULL)
    {
        $amount = abs($amount);
        $this->balance = $this->balance + $amount;
        $this->save();
        $rec = ['customer_id' => $this->id, 'invoice_id' => $invoice_id,'credit'=>$amount,'balance'=>$this->balance, 'description' => $desc, 'created_at' => $date];
        Statement::create($rec);
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
