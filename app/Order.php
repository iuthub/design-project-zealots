<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	const MODERATION = 'moderation';
	const APPROVED = 'approved';
	const CANCELED = "canceled";
	const DELIVERY = "delivery";


	public static $statuses = [
		self::MODERATION,
		self::APPROVED,
		self::CANCELED,
		self::DELIVERY
	];

	protected $fillable = ["user_id", "status"];


	protected $table = 'order';

	public function products(){
		return $this->belongsToMany('App\Product', "order_product", "order_id", "product_id");
	}


	public function user(){
		return $this->belongsTo("App\User");
	}

}
