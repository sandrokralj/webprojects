<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
    	'deal_name',
    	'deal_price',
    	'deal_qty'
    ];
}
