<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['sale_man_id','amount','description','created_at','updated_at'];
}
