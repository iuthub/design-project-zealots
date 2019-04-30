<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order';

	public function products(){
		return $this->hasMany('App\Product', "order_product", "order_id", "product_id");
	}
}
