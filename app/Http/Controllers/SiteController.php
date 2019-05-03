<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\Post;



class SiteController extends Controller{
	

	public function index(){
		$products = Product::all();
		$posts = Post::all();

		return view("index", ["products" => $products, "posts" => $posts]);
	}

	public function product($id){
		$product = Product::find($id);

		return view("product", ["product" => $product]);
	}

	public function post($id){
		$post = Post::find($id);

		return view("post", ["post" => $post]);
	}


}