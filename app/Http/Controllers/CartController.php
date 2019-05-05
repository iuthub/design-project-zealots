<?php

namespace BrandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BrandShop\Cart;
use BrandShop\CartProduct;


class CartController extends Controller{

	public function __construct(){
		$this->middleware('auth');

	}

	public function index(Request $request){
		$cart = Cart::getCart($request->session()->getId());

		return view("cart.index", ["cart" => $cart]);
	}


	public function add($id, Request $request){
		$cart = Cart::getCart($request->session()->getId());

		$cart->addProduct($id);

		return redirect()->back();
	}

	public function remove($id, Request $request){
		$cart = Cart::getCart($request->session()->getId());

		$cart->removeProduct($id);

		return redirect()->back();
	}



}