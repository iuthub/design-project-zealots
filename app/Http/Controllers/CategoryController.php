<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryController extends Controller{

	public function __construct(){
		$this->middleware('auth');
	}


	public function index(){
		$categories = Category::all();

		return view("admin.category.index", ["models" => $categories]);
	}

	public function create(){
		$categories = Category::all();

		return view("admin.category.index", ["models" => $categories]);
	}
	
}
