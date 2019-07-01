<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBooker extends Model
{
    protected $fillable = ['name','phone','target'];
}
