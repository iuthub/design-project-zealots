<?php

namespace BrandShop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use BrandShop\Product;

class Cart extends Model
{
	protected $table = 'cart';

	protected $fillable = ["session_id", "user_id"];

	public function products(){
		return $this->belongsToMany('BrandShop\Product', "cart_product", "cart_id", "product_id");
	}

	public function addProduct($id){

		$this->products()->syncWithoutDetaching($id);
	}

	public function removeProduct($id){

		$this->products()->detach($id);
	}


	public function has($id){
		$flag = false;
		foreach($this->products as $product){
			if($product->id == $id){
				$flag = true;
				break;
			}
		}

		return $flag;
	}

	public function total(){
		$total = 0;
		foreach($this->products as $product)
			$total += $product->price;

		return $total;
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

				return $cart;
			}
		}else{
			$cart = self::where("session_id", $sessionId)->first();

			if($cart)
				return $cart;
			else{
				$cart = new Cart();
				$cart->session_id = $sessionId;
				$cart->save();
				return $cart;
			}
		}
	}

}
