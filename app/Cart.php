<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Product;

class Cart extends Model
{
	protected $table = 'cart';

	protected $fillable = ["session_id", "user_id"];

	public function products(){
		return $this->belongsToMany('App\Product', "cart_product", "cart_id", "product_id");
	}

	public function addProduct($id){

		$this->products()->syncWithoutDetaching($id);
	}

	public function removeProduct($id){

		$this->products()->detach($id);
	}

	public static function getCart($sessionId){
		if(Auth::user() && Auth::user()->id){
			$cart = self::find(Auth::user()->id);

			if($cart)
				return $cart;
			else{
				$cart = new Cart();
				$cart->user_id = Auth::user()->id;
				$cart->session_id = $sessionId;
				$cart->save();
			}
		}else{
			$cart = self::where("session_id", $sessionId);

			if($cart)
				return $cart;
			else{
				$cart = new Cart();
				$cart->session_id = $sessionId;
				$cart->save();
			}
		}
	}
}
