<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveInvoice extends Model
{
    protected $fillable = ['sale_man_id','order_booker_id','discount_total','received_amount','received_at'];


}
