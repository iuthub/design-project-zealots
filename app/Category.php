<?php

namespace BrandShop;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = ['name', "slug", "desc", "thumbnail"];

	protected $table = 'category';

	public function products()
	{
		return $this->hasMany("BrandShop\Product");
	}
}
