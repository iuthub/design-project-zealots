<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\Post;
use App\Review;
use App\Slider;
use App\SliderItem;
use App\Cart;


class SiteController extends Controller{
	

	public function index(Request $request){
		$products = Product::all()->take(3);
		$posts = Post::where(["status" => Post::PUBLISHED])->take(2)->get();
		$reviews = Review::where(["status" => Review::PUBLISHED])->take(10)->get();

		$slider = Slider::where(["slug" => "main_slider"])->first();
		$cart = Cart::getCart($request->session()->getId());

		return view("index", ["products" => $products, "cart" => $cart, "slider" => $slider, "posts" => $posts, "reviews" => $reviews]);
	}

	public function product($id, Request $request){
		$product = Product::find($id);
		$reviews = Review::where(["status" => Review::PUBLISHED, "product_id" => $id])->get();
		$cart = Cart::getCart($request->session()->getId());

		return view("product", ["product" => $product, "reviews" => $reviews, "cart" => $cart]);
	}

	public function post($id, Request $request){
		$post = Post::find($id);
		$cart = Cart::getCart($request->session()->getId());


		return view("post", ["post" => $post, "cart" => $cart]);
	}


}