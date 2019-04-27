<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function orders(){
		return $this->belongsToMany('App\Product', "order_product", "product_id", "order_id");
	}
}
