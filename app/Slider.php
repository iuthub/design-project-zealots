<?php

namespace BrandShop;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

	protected $fillable = ['name', "slug"];

	protected $table = 'slider';

	public function items()
	{
		return $this->hasMany("BrandShop\SliderItem");
	}

}
