<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	protected $table = 'tag';

	public function products(){
		return $this->hasMany("product_tag", "tag_id", "product_id");
	}
}
