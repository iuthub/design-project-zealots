<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	const MODERATION = 'moderation';
	const PUBLISHED = 'published';

	public static $statuses = [
		self::MODERATION,
		self::PUBLISHED
	];

	protected $fillable = ["product_id", "user_id", "rating", "name", "email", "phone", "status"];

	protected $table = 'review';
	
	public function product(){
		return $this->belongsTo("App\Product");
	}

	public function user(){
		return $this->belongsTo("App\User");
	}

	public function getAuthorName(){
		if($this->user)
			return $this->user->name;
		else
			return $this->name;
	}

	public function getAuthorEmail(){
		if($this->user)
			return $this->user->email;
		else
			return $this->email;
	}

	public function getStatus(){
		return ucfirst($this->status);
	}

	public function getDate(){
		return date("d F Y", strtotime($this->created_at));
	}

	public function excerptComment(){
		if (strlen($this->comment) < 30) {
			return $this->comment;
		}else {

			$new = wordwrap($this->comment, 28);
			$new = explode("\n", $new);

			$new = $new[0] . '...';

			return $new;
		}
	}

	public function getAvatar(){
		return "/img/no-avatar.png";
	}

}
