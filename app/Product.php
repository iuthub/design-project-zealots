<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	const MODERATION = 'moderation';
	const PUBLISHED = 'published';

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

	public function getFirstImg(){
		if(!count($this->images))
			return "/img/no-image.svg";
		else
			return $this->images[0]->url;
	}
}
