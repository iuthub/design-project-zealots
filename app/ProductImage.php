<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	protected $fillable = ["url", "caption", "title", "product_id"];

	protected $table = 'product_image';

	public function product(){
		return $this->belongsTo("App\Product", "id", "product_id");
	}
}
