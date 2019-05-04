<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

	protected $fillable = ["amount", "product_id", "order_id"];

	protected $table = 'order_product';
	
	public function order(){
		return $this->belongsTo("App\Order");
	}

}
