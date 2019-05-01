<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $table = 'product';

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function orders(){
		return $this->belongsToMany('App\Order', "order_product", "product_id", "order_id");
	}

	public function images(){
		return $this->hasMany("App\ProductImage", "product_id");
	}
}
