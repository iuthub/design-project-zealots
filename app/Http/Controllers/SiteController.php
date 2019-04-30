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

	public function welcome(){
		$products = Product::all();

		return view("welcome", ["products" => $products]);
	}


}