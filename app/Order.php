<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	public function products(){
		return $this->hasMany("order_product", "order_id", "product_id");
	}
}
