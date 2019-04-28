<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

	protected $table = 'slider';

	public function items()
	{
		return $this->hasMany("App\SliderItem");
	}

}
