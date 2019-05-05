<?php

namespace BrandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use BrandShop\Product;
use BrandShop\Post;
use BrandShop\Review;
use BrandShop\Slider;
use BrandShop\SliderItem;
use BrandShop\Cart;
use BrandShop\Chuck;


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

	public function products(Request $request){
		$cart = Cart::getCart($request->session()->getId());
		$products = Product::paginate(15);

		return view("products", ["products" => $products, "cart" => $cart]);
	}

	public function posts(Request $request){
		$cart = Cart::getCart($request->session()->getId());
		$posts = Post::paginate(15);

		return view("posts", ["posts" => $posts, "cart" => $cart]);
	}


	public function aboutus(Request $request){
		$cart = Cart::getCart($request->session()->getId());

		return view("aboutus", ["cart" => $cart]);
	}

	public function contact(Request $request){
		$cart = Cart::getCart($request->session()->getId());

		return view("contact", ["cart" => $cart]);
	}

	public function feedbackSend(Request $request){

	}

	public function external(Request $request){
		$cart = Cart::getCart($request->session()->getId());
		$quote = Chuck::getRandomQuote();

		return view("external", ["cart" => $cart, "quote" => $quote]);
	}

}