<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{

	protected $fillable = ["slider_id", "url", "image", "text"];

	protected $table = 'slider_item';
	
	public function slider(){
		return $this->belongsTo("App\Slider");
	}
}
