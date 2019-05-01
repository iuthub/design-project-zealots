<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Product;



class SiteController extends Controller{
	
	public function __construct(){
		$this->middleware('auth');

	}

	public function index(){
		$products = Product::all();

		return view("index", ["products" => $products]);
	}

	public function product($id){
		$product = Product::find($id);

		return view("product", ["product" => $product]);
	}


}