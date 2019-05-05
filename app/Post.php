<?php

namespace BrandShop;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	const MODERATION = 'moderation';
	const PUBLISHED = 'published';


	public static $statuses = [
		self::MODERATION,
		self::PUBLISHED
	];
	
	protected $fillable = ['title', "slug", "content", "thumbnail", "status"];

	protected $table = 'post';


	public function getDate(){
		return date("M j", strtotime($this->created_at));
	}

	public function getStatus(){
		return ucfirst($this->status);
	}


	public function getExcerpt(){
		if (strlen($this->content) < 30) {
			return $this->content;
		}else {

			$new = wordwrap($this->content, 28);
			$new = explode("\n", $new);

			$new = $new[0] . '...';

			return $new;
		}
	}
	

}
