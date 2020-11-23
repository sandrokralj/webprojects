<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Product extends Model
{
	use CrudTrait;
	
	/*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

	protected $table = 'products';
	//protected $primaryKey = 'id';
	// public $timestamps = false;
	// protected $guarded = ['id'];
	protected $fillable = ['imagePath1', 'imagePath2', 'imagePath3', 'category', 'price', 'title', 'description'];
	// protected $hidden = [];
    // protected $dates = [];

	public static function search($keyword){
		return Product::where('title', 'LIKE', '%'.$keyword.'%')->get();
	}
	
	
}
